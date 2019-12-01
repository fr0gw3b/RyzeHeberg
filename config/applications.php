<?php

date_default_timezone_set($_ENV['APP_TIMEZONE']);

require_once '../config/administration.php';

class Applications extends Administration {
		
	function RegisterDiscord()
	{
		$db = MySQL::Database();
		
		if(!isset($_SESSION['account']['sso'])) {
			$pterodactyl = new \HCGCloud\Pterodactyl\Pterodactyl(getenv('API_PTERODACTYL'), getenv('URL_PTERODACTYL'));
			$username = $this->Security($_POST['username']);
			$agree = $this->Security($_POST['agree']);
			if (isset($_SESSION['access_token'])) {
				$apiURLBase = 'https://discordapp.com/api/users/@me';
				$user = $this->apiRequest($apiURLBase);
				$avatar = "https://cdn.discordapp.com/avatars/".$_SESSION['setup_discord']['id']."/".$_SESSION['setup_discord']['avatar'].".png";
					require_once "../lib/recaptchalib.php";
					$captcha          = $this->Security($_POST['g-recaptcha-response']);
					$secret           = getenv('RECAPTCHA_SECRET_KEY');
					$response = null;
					$reCaptcha = new ReCaptcha($secret);
					if ($this->Security($_POST["g-recaptcha-response"])) {
						$response = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"], $_POST["g-recaptcha-response"]);
						if ($response != null && $response->success) {
					if(iconv_strlen($username) >= 3) {
						if(iconv_strlen($username) <= 20) {
							if (ctype_alnum($username)) {
								$RecoveryUsername = $db->prepare('SELECT username FROM rh_users WHERE username = ?');
								$RecoveryUsername->execute(array($username));
								$RowCountRecoveryUsername = $RecoveryUsername->rowCount();
								
								if($RowCountRecoveryUsername == 0) {
										if ($agree == 'yes') {
											try {
												$SSO = $this->Chaine(25);
												$password_pterodactyl = $this->Chaine(16);
											$user = $pterodactyl->createUser([
												"external_id" => $SSO, //Optional
												"email" => "$SSO@ryzeheberg.fr",
												"username" => $username,
												"first_name" => $username,
												"last_name" => $username,
												"language" => 'fr',
												"password" => $password_pterodactyl
											]);	
											} catch (Exception $e) {
												$error = $e;
											}
											finally {
											if (!$error) {
											$CreateAccount = $db->prepare('INSERT INTO rh_users(username, password, sso, rank, gold, avatar, registration_date, status, mood, connexion, id_discord, password_pterodactyl, limit_service) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
											$CreateAccount->execute(array($username, $password, $SSO, 1, 0, $avatar, date('Y-m-d H:i:s'), 1, 'Membre', 'discord', $_SESSION['setup_discord']['id'], $password_pterodactyl, 2));
											
											$_SESSION['account'] = array(
												'username' => $username,
												'sso' => $SSO,
												'rank' => 1,
												'gold' => 0,
												'avatar' => $avatar,
												'last_ip' => $this->AdressIP(),
												'status' => 'active',
												'mood' => 'Membre',
												'connection' => 'discord'
											);
											
											$response = 'Votre compte est maintenant créé';
											$status = 'success';
										}
											}
											if ($error) {
												$response = "Erreur lors de la création de votre compte au panel. Rééssayez plus tard.";										;
												$status = 'error';	
											}
										} else {
											$response = 'Veuillez accepter les conditions d\'utilisations';
											$status = 'error';
										}
								} else {
									$response = 'Votre nom d\'utilisateur est déjà utilisé.';
									$status = 'error';
								}
						} else {
							$response = 'Votre nom d\'utilisateur comporte des caractères interdits.';
							$status = 'error';
						}
						} else {
						$response = 'Votre nom d\'utilisateur est trop long';
						$status = 'error';
					}
				} else {
					$response = 'Votre nom d\'utilisateur est trop court';
					$status = 'error';
				}
			} else {
				$response = 'Veuillez validez le test de sécurité';
				$status = 'error';
			}
			} else {
			$response = 'Veuillez validez le test de sécurité';
			$status = 'error';
			}
			} else {
				$response = 'Un problème est survenu. Veuillez raffraichir la page (Erreur code 1)';
				$status = 'error';
			}
		} else {
			$response = 'Vous êtes déjà connecté';
			$status = 'error';
		}
		echo json_encode(['response' => $response, 'status' => $status], JSON_UNESCAPED_UNICODE);
	}
	function Synchronise()
	{
		$db = MySQL::Database();
		
		if(!isset($_SESSION['account']['sso'])) {
			if (isset($_SESSION['access_token'])) {
				$username = $this->Security($_POST['username']);
				$password = $this->Security($_POST['password']);
				$apiURLBase = 'https://discordapp.com/api/users/@me';
				$user = $this->apiRequest($apiURLBase);
				$avatar = "https://cdn.discordapp.com/avatars/".$_SESSION['setup_discord']['id']."/".$_SESSION['setup_discord']['avatar'].".png";
				if ($_SESSION['setup_discord']['username'] AND $_SESSION['setup_discord']['avatar'] AND $_SESSION['setup_discord']['id']) {
					$RecoveryUsername = $db->prepare('SELECT * FROM rh_users WHERE username = ?');
					$RecoveryUsername->execute(array($username));
					$rowCountRecoveryUsername = $RecoveryUsername->rowCount();
					if ($rowCountRecoveryUsername != 0) {
						$FetchRecoveryUsername = $RecoveryUsername->fetch();
						if (password_verify($password, $FetchRecoveryUsername['password'])) {
							$Edit = $db->prepare('UPDATE rh_users SET connexion = ?, avatar = ?, id_discord = ? WHERE sso = ?');
							$Edit->execute(array('discord', $avatar, $_SESSION['setup_discord']['id'], $FetchRecoveryUsername['sso']));
							$response = 'Synchronisation effectué. Veuillez vous connecter avec Discord.';
							$status = 'success';
										} else {
					$response = 'Mauvais mot de passe.';
					$status = 'error';
				}
				} else {
					$response = 'Aucun utilisateur existe avec ce pseudo.';
					$status = 'error';
				}
				} else {
					$response = 'Erreur, connectez vous à Discord';
					$status = 'error';
				}
			} else {
				$response = 'Erreur, connectez vous à Discord';
				$status = 'error';
			}
		} else {
			$response = 'Vous êtes déjà connecté';
			$status = 'error';
		}
		echo json_encode(['response' => $response, 'status' => $status], JSON_UNESCAPED_UNICODE);
	}
	function CreateTicket()
	{
		$db = MySQL::Database();
		
		if(isset($_SESSION['account']['sso'])) {
			$sujet = $this->Security($_POST['sujet']);
			$department = $this->Security($_POST['department']);
			$contenu = $this->Security($_POST['contenu']);
			$sujet = preg_replace("/\n/m", '\n', $sujet);
			if(!empty($sujet)) {
				if(!empty($department)) {
					if(!empty($contenu)) {
						if(iconv_strlen($sujet) >= 10) {
							if($department == 'Technique' OR $department == 'Autre' OR $department == 'Renseignement') {
								$CreateTicket = $db->prepare('INSERT INTO rh_support(sujet, department, content, created_at, status, sso) VALUES(?, ?, ?, ?, ?, ?)');
								$CreateTicket->execute(array($sujet, $department, $contenu, date('Y-m-d H:i:s'), 'open', $_SESSION['account']['sso']));
								$response = 'Votre ticket a bien été créé';
								$status = "success";
							} else {
								$response = 'Veuillez choisir un département';
								$status = 'error';
							}
							
						} else {
							$response = 'Votre sujet est trop court';
							$status = 'error';
						}
						
					} else {
						$response = 'Veuillez entrer un contenu';
						$status = 'error';
					}
					
				} else {
					$response = 'Veuillez choisir un département';
					$status = 'error';
				}
				
			} else {
				$response = 'Veuillez entrer un sujet';
				$status = 'error';
			}
			
		} else {
			$response = 'Veuillez vous connecter';
			$status = 'error';
		}
		
		echo json_encode(['response' => $response, 'status' => $status], JSON_UNESCAPED_UNICODE);
	}
	
	function ReplyTicket($id)
	{
		$db = MySQL::Database();
		
		if(isset($_SESSION['account']['sso'])) {
			$reply = $this->Security($_POST['reply']);
			if(!empty($reply)) {
				$RecoveryTicket = $db->prepare('SELECT id, sso, status FROM rh_support WHERE id = ? AND sso = ?');
				$RecoveryTicket->execute(array($id, $_SESSION['account']['sso']));
				$rowCountTicket = $RecoveryTicket->rowCount();
				$fetchTicket = $RecoveryTicket->fetch();
				if($rowCountTicket != 0) {
					if(iconv_strlen($reply) >= 5) {
						if($fetchTicket['status'] != 'close') {
							$AddResponse = $db->prepare('INSERT INTO rh_support_responses(ticket_id, reply, added_at, sso, staff) VALUES(?, ?, ?, ?, ?)');
							$AddResponse->execute(array($id, $reply, date('Y-m-d H:i:s'), $_SESSION['account']['sso'], 0));
							
							if($fetchTicket['status'] == 'answered') {
								$Edit = $db->prepare('UPDATE rh_support SET status = ? WHERE id = ? AND sso = ?');
								$Edit->execute(array('waiting', $id, $_SESSION['account']['sso']));
							}
						
							$response = 'OK';
							$status = 'success';
							
						} else {
							$response = 'Votre ticket est fermé';
							$status = 'error';
						}
						
					} else {
						$response = 'Votre réponse est trop courte';
						$status = 'error';
					}
					
				} else {
					$response = 'Erreur';
					$status = 'error';
				}
				
			} else {
				$response = 'Veuillez remplir tous les champs';
				$status = 'error';
			}
			 
		} else {
			$response = 'Veullez vous connecter';
			$status = 'error';
		}
		
		echo json_encode(['response' => $response, 'status' => $status], JSON_UNESCAPED_UNICODE);
	}
	function CommanderBot()
	{
		$db = MySQL::Database();
		
		if(isset($_SESSION['account']['sso'])) {
			$pterodactyl = new \HCGCloud\Pterodactyl\Pterodactyl(getenv('API_PTERODACTYL'), getenv('URL_PTERODACTYL'));
			require_once "../lib/recaptchalib.php";
			$name = $this->Security($_POST['name']);
			$nodejs = $this->Security($_POST['nodejs']);
			$captcha = $this->Security($_POST['g-recaptcha-response']);
			$agree = $this->Security($_POST['agree']);
            $secret = getenv('RECAPTCHA_SECRET_KEY');
            $response = null;
            $reCaptcha = new ReCaptcha($secret);
            if ($this->Security($_POST["g-recaptcha-response"])) {
                $response = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"], $_POST["g-recaptcha-response"]);
                if ($response != null && $response->success) {
					$Services = $db->prepare('SELECT * FROM rh_services WHERE sso = ?');
					$Services->execute(array($_SESSION['account']['sso']));
					$ServicesRowCount = $Services->rowCount();
					$Account = $db->prepare('SELECT * FROM rh_users WHERE sso = ?');
					$Account->execute(array($_SESSION['account']['sso']));
					$AccountFetch = $Account->fetch();
					$AccountRowCount = $Account->rowCount();
					if ($ServicesRowCount != $AccountFetch['limit_service']) {
					if ($ServicesRowCount < $AccountFetch['limit_service']) {
					if(iconv_strlen($name) >= 3) {
						if(iconv_strlen($name) <= 20) {
							if ($agree == "yes") {
								$memory = 256;
								$swap = 256;
								$disk = 1024;
								$io = 500;
								$cpu = 30;
								$databases = 3;
								$allocations = 2;
								if ($nodejs) {
									if ($nodejs == "08" || $nodejs == "010" || $nodejs == "012" || $nodejs == "013") {
									if ($nodejs == "08") {
										$text = "Node.js 8.x";
										$egg_id = getenv('EGG_ID_NODEJS8');
									} elseif ($nodejs == "010") {
										$text = "Node.js 10.x";
										$egg_id = getenv('EGG_ID_NODEJS10');
									} elseif ($nodejs == "012") {
										$text = "Node.js 12.x";
										$egg_id = getenv('EGG_ID_NODEJS12');
									} elseif ($nodejs == "013") {
										$text = "Node.js 13.x";
										$egg_id = getenv('EGG_ID_NODEJS13');
									}
									
									try {
									$egg = $pterodactyl->egg(getenv('NEST_ID_NODEJS'), $egg_id);
									$getUser = json_encode($pterodactyl->userEx($AccountFetch['sso']));
									$user = json_decode($getUser, true);
									$user_id = $user['id'];
									$external_id = $this->Chaine(32);
									$location_id = getenv('LOCATION_ID_BOT');
									$server = $pterodactyl->createServer([
										"external_id" => $external_id,
										"name" => $name,
										"user" => $user_id,
										"egg" => $egg_id,
										"pack" => 0,
										"docker_image" => $egg->dockerImage,
										"skip_scripts" => false,
										"environment" => [
											"STARTUP_COMMAND" => "bash"
										],
										"limits" => [
											"memory" => $memory,
											"swap" => $swap,
											"disk" => $disk,
											"io" => $io,
											"cpu" => $cpu
										],
										"feature_limits" => [
											"databases" => $databases,
											"allocations" => $allocations
										],
										"startup" => $egg->startup,
										"description" => "",
										"deploy" => [
											"locations" => [$location_id],
											"dedicated_ip" => false,
											"port_range" => []
										],
										"start_on_completion" => false
									]);
									} catch (Exception $e) {
									$error = 'true';
								} finally {
									if (!$error) {
										$getServer = json_encode($pterodactyl->serverEx($external_id));
										$server = json_decode($getServer, true);
										$uuid = mb_substr($server['uuid'], 0, 5);
										$uuid = strtoupper($uuid);
										$CreateAccount = $db->prepare('INSERT INTO rh_services(name, solution, status, created_at, expire_at, sso, external_id, version, uuid, last_renew) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
										$CreateAccount->execute(array($name, "Bot discord", active, date('Y-m-d H:i:s'), date('Y-m-d H:i:s', strtotime('' . date('Y-m-d H:i:s') . '' . " +1 month")), $_SESSION['account']['sso'], $external_id, $text, $uuid, date('Y-m-d H:i:s')));
										$Notification = $db->prepare('INSERT INTO rh_notifications(notification, added_at, icon, sso, view) VALUES(?, ?, ?, ?, ?)');
										$Notification->execute(array('Votre service <strong>'.$name.'</strong> vient d\'être livré.', date('Y-m-d H:i:s'), 'info-circle', $_SESSION['account']['sso'], 0));
										$response = "Le service a été créé";
										$status = 'success';
										$uuid = strtolower($uuid);
										$url = "/service/$uuid";
									}
									if ($error) {
										$response = "Le serveur semble ne pas répondre, rééssayez plus tard.";
										$status = 'error';
									}
								}}
						}

						} else {
							$response = 'Veuillez accepter les conditions d\'utilisations';
							$status = 'error';
						}
						} else {
							$response = 'Le nom du bot est trop long';
							$status = 'error';
						}
					} else {
						$response = 'Le nom du bot est trop court';
						$status = 'error';	
					}
				} else {
					$response = 'Vous avez atteint le maximum de services.';
					$status = 'error';
				}
			} else {
				$response = 'Vous avez atteint le maximum de services.';
				$status = 'error';
			}
				} else {
					$response = 'Veuillez valider le test de sécurité';
					$status = 'error';
				}
			} else {
				$response = 'Veuillez valider le test de sécurité';
				$status = 'error';
			}
		}
		echo json_encode(['response' => $response, 'status' => $status, 'url' => $url], JSON_UNESCAPED_UNICODE);
	}
	function CommanderWeb()
	{
		$db = MySQL::Database();
		
		if(isset($_SESSION['account']['sso'])) {
			require_once "../lib/recaptchalib.php";
			$name = $this->Security($_POST['name']);
			$captcha = $this->Security($_POST['g-recaptcha-response']);
			$agree = $this->Security($_POST['agree']);
            $secret = getenv('RECAPTCHA_SECRET_KEY');
            $response = null;
            $reCaptcha = new ReCaptcha($secret);
            if ($this->Security($_POST["g-recaptcha-response"])) {
                $response = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"], $_POST["g-recaptcha-response"]);
                if ($response != null && $response->success) {
					$Services = $db->prepare('SELECT * FROM rh_services WHERE sso = ?');
					$Services->execute(array($_SESSION['account']['sso']));
					$ServicesRowCount = $Services->rowCount();
					$Account = $db->prepare('SELECT * FROM rh_users WHERE sso = ?');
					$Account->execute(array($_SESSION['account']['sso']));
					$AccountFetch = $Account->fetch();
					$AccountRowCount = $Account->rowCount();
					if ($ServicesRowCount != $AccountFetch['limit_service']) {
					if ($ServicesRowCount < $AccountFetch['limit_service']) {
					if(iconv_strlen($name) >= 3) {
						if(iconv_strlen($name) <= 40) {
							if ($agree == "yes") {
								$user = "dyljvjyt";
  								$token = "XMKCBCB97YC26B2QXGLF6W42VBS57V4L";
  								$serveraddr = "srv02.dedigo.fr:2087";
								  $packageName = "dyljvjyt_Défaut";
								  $uuid = strtoupper($this->Chaine(5));
								  $SSO = $_SESSION['account']['sso'];
								  $email = "$SSO@ryzeheberg.fr";
								  $password = $this->Chaine(16);
								$query2 = "https://" . $serveraddr . "/json-api/createacct?api.version=1&username=$uuid&domain=$name&contactemail=$email&password=$password&plan=$packageName";
							
								$curl = curl_init();
								curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
								curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
								curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
							
								$header[0] = "Authorization: whm $user:$token";
							
								curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
								curl_setopt($curl, CURLOPT_URL, $query2);
							
								$result = curl_exec($curl);
							
								$http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
							
								if ($http_status != 200) {
									$response = "Erreur lors de la requête.";
									$status = 'error';
								} else {
								  $json = json_decode($result);
							
								  if ($json->{'metadata'}->{'result'} == '0') {
									$response = $this->Security($json->{'metadata'}->{'reason'});
									$status = 'error';
								  } else {
									$CreateAccount = $db->prepare('INSERT INTO rh_services(name, solution, status, created_at, expire_at, sso, external_id, version, uuid, last_renew, password) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
									$CreateAccount->execute(array($name, "Site Web", active, date('Y-m-d H:i:s'), date('Y-m-d H:i:s', strtotime('' . date('Y-m-d H:i:s') . '' . " +1 month")), $_SESSION['account']['sso'], NULL, NULL, $uuid, date('Y-m-d H:i:s'), $password));
									$Notification = $db->prepare('INSERT INTO rh_notifications(notification, added_at, icon, sso, view) VALUES(?, ?, ?, ?, ?)');
									$Notification->execute(array('Votre service <strong>'.$name.'</strong> vient d\'être livré.', date('Y-m-d H:i:s'), 'info-circle', $_SESSION['account']['sso'], 0));
									$response = "Le service a bien été commandé";
									$status = 'success';
									$url = '/services';
								  }
								}
							
								curl_close($curl);
						} else {
							$response = 'Veuillez accepter les conditions d\'utilisations';
							$status = 'error';
						}
						} else {
							$response = 'Le nom de domaine est trop long';
							$status = 'error';
						}
					} else {
						$response = 'Le nom de domaine est trop court';
						$status = 'error';	
					}
				} else {
					$response = 'Vous avez atteint le maximum de services.';
					$status = 'error';
				}
			} else {
				$response = 'Vous avez atteint le maximum de services.';
				$status = 'error';
			}
				} else {
					$response = 'Veuillez valider le test de sécurité';
					$status = 'error';
				}
			} else {
				$response = 'Veuillez valider le test de sécurité';
				$status = 'error';
			}
		}
		echo json_encode(['response' => $response, 'status' => $status, 'url' => $url], JSON_UNESCAPED_UNICODE);
	}
	function RegeneratePasswd() {
		$db = MySQL::Database();
		
		if(isset($_SESSION['account']['sso'])) {
			$pterodactyl = new \HCGCloud\Pterodactyl\Pterodactyl(getenv('API_PTERODACTYL'), getenv('URL_PTERODACTYL'));
			$RecoveryAccount = $db->prepare('SELECT * FROM rh_users WHERE sso = ?');
			$RecoveryAccount->execute(array($_SESSION['account']['sso']));
			$Account = $RecoveryAccount->fetch();
			$external_id = $Account['sso'];
			$getUser = json_encode($pterodactyl->userEx($external_id));
			$users = json_decode($getUser, true);
			$new_password = $this->Chaine(16);
			$pterodactyl->updateUser($users['id'], array(
				"email" => $Account['email'],
				"username" => $Account['username'],
				"first_name" => $Account['username'],
				"last_name" => $Account['username'],
				"language" => 'fr',
				"password" => $new_password
			));
			$Update = $db->prepare('UPDATE rh_users SET password_pterodactyl = ? WHERE sso = ?');
			$Update->execute(array($new_password, $_SESSION['account']['sso']));
		}
	}
	function ReinstallServer() {
		$db = MySQL::Database();
		if(isset($_SESSION['account']['sso'])) {
			$uuid = $this->Security($_POST['uuid']);
			$nodejs = $this->Security($_POST['nodejs']);
			$pterodactyl = new \HCGCloud\Pterodactyl\Pterodactyl(getenv('API_PTERODACTYL'), getenv('URL_PTERODACTYL'));
			$RecoveryService = $db->prepare('SELECT * FROM rh_services WHERE sso = ? AND uuid = ?');
			$RecoveryService->execute(array($_SESSION['account']['sso'], $uuid));
			$RecoveryServiceRowCount = $RecoveryService->rowCount();
			$Service = $RecoveryService->fetch();
			if ($RecoveryServiceRowCount != 0) {
				if ($nodejs) {
					if ($nodejs == "08" || $nodejs == "010" || $nodejs == "012" || $nodejs == "013") {
					$getServer = json_encode($pterodactyl->serverEx($Service['external_id']));
					$server = json_decode($getServer, true);
					$nest_id = getenv('NEST_ID_NODEJS');
					$location_id = getenv('LOCATION_ID_BOT');
				if ($nodejs == "08") {
					$text = "Node.js 8.x";
					$egg_id = getenv('EGG_ID_NODEJS8');
				} elseif ($nodejs == "010") {
					$text = "Node.js 10.x";
					$egg_id = getenv('EGG_ID_NODEJS10');
				} elseif ($nodejs == "012") {
					$text = "Node.js 12.x";
					$egg_id = getenv('EGG_ID_NODEJS12');
				} elseif ($nodejs == "013") {
					$text = "Node.js 13.x";
					$egg_id = getenv('EGG_ID_NODEJS13');
				}
				$egg = $pterodactyl->egg($nest_id, $egg_id);
				$RecoveryAccount = $db->prepare('SELECT * FROM rh_users WHERE sso = ?');
				$RecoveryAccount->execute(array($_SESSION['account']['sso']));
				$Account = $RecoveryAccount->fetch();
				$external_id = $Account['sso'];
				$getUser = json_encode($pterodactyl->userEx($external_id));
				$users = json_decode($getUser, true);
				$egg = $pterodactyl->egg($nest_id, $egg_id);
				$RecoveryAccount = $db->prepare('SELECT * FROM rh_users WHERE sso = ?');
				$RecoveryAccount->execute(array($_SESSION['account']['sso']));
				$Account = $RecoveryAccount->fetch();
				$external_id = $Account['sso'];
				$external_id1 = $this->Chaine(32);
				$getUser = json_encode($pterodactyl->userEx($external_id));
				$users = json_decode($getUser, true);
				if ($server['container']['installed'] == "1") {
				try {
					$pterodactyl->deleteServer($server['id']);
				} catch (Exception $e) {
					$error == true;
				}
				if (!$error) {
					$server1 = $pterodactyl->createServer([
						"external_id" => $external_id1,
						"name" => $this->Security($server['attributes']['name']),
						"user" => $users['id'],
						"egg" => $egg_id,
						"pack" => 0,
						"docker_image" => $egg->dockerImage,
						"skip_scripts" => false,
						"environment" => [
							"STARTUP_COMMAND" => "bash"
						],
						"limits" => [
							"memory" => $server['attributes']['limits']['memory'],
							"swap" => $server['attributes']['limits']['swap'],
							"disk" => $server['attributes']['limits']['disk'],
							"io" => $server['attributes']['limits']['io'],
							"cpu" => $server['attributes']['limits']['cpu']
						],
						"feature_limits" => [
							"databases" => $server['attributes']['feature_limits']['databases'],
							"allocations" => $server['attributes']['feature_limits']['allocations']
						],
						"startup" => $egg->startup,
						"description" => "",
						"deploy" => [
							"locations" => [$location_id],
							"dedicated_ip" => false,
							"port_range" => []
						],
						"start_on_completion" => false
					]);
					$getServer1 = json_encode($pterodactyl->serverEx($external_id1));
					$server1 = json_decode($getServer1, true);
					$uuid1 = mb_substr($server1['uuid'], 0, 5);
					$uuid1 = strtoupper($uuid1);
					$Update = $db->prepare('UPDATE rh_services SET external_id = ?, version = ?, uuid = ? WHERE sso = ? AND uuid = ?');
					$Update->execute(array($external_id1, $text, $uuid1, $_SESSION['account']['sso'], $uuid));
				}
			}
		}
		}
			}
		}
	}
	function Update() {
		$db = MySQL::Database();
		if(isset($_SESSION['account']['sso'])) {
			$uuid = $this->Security($_POST['uuid']);
			$nodejs = $this->Security($_POST['nodejs']);
			$pterodactyl = new \HCGCloud\Pterodactyl\Pterodactyl(getenv('API_PTERODACTYL'), getenv('URL_PTERODACTYL'));
			$RecoveryService = $db->prepare('SELECT * FROM rh_services WHERE sso = ? AND uuid = ?');
			$RecoveryService->execute(array($_SESSION['account']['sso'], $uuid));
			$RecoveryServiceRowCount = $RecoveryService->rowCount();
			$Service = $RecoveryService->fetch();
			if ($RecoveryServiceRowCount != 0) {
				if ($uuid) {
					$external_id = $Service['external_id'];
					$getServer = json_encode($pterodactyl->serverEx($external_id));
					$server = json_decode($getServer, true);
					$pterodactyl->rebuildServer($server['id']);
				}
			}
		}
	}
	function RenouvellementService() {
		$db = MySQL::Database();
		if(isset($_SESSION['account']['sso'])) {
			$uuid = $this->Security($_POST['uuid']);
			$RecoveryService = $db->prepare('SELECT * FROM rh_services WHERE uuid = ? AND sso = ?');
			$RecoveryService->execute(array($uuid, $_SESSION['account']['sso']));
			$Service = $RecoveryService->fetch();
			$ServiceRow = $RecoveryService->rowCount();
			if ($ServiceRow != 0) {
				$expiration = strtotime($Service['expire_at']);
				$now = strtotime("now");
				$diff  = abs($now - $expiration);
				function secondsToTime($seconds) {
					$dtF = new \DateTime('@0');
					$dtT = new \DateTime("@$seconds");
					return $dtF->diff($dtT)->format('%a');
				}
				if (secondsToTime($diff) <= "15") {
					$final = date("Y-m-d H:i:s", strtotime("+1 month", $expiration));
					$Update = $db->prepare('UPDATE rh_services SET last_renew = ?, expire_at = ? WHERE sso = ? AND uuid = ?');
					$Update->execute(array(date('Y-m-d H:i:s'), $final, $_SESSION['account']['sso'], $uuid));
					$response = 'Le service a été renouvellé d\'une durée de 1 mois';
					$status = 'success';		
				} else {
				$response = 'Veuillez attendre 14 jours avant l\'expiration de votre service';
				$status = 'error';		
				}
			} else {
				$response = 'Ceci n\'est pas votre service';
				$status = 'error';				
			}
		} else {
			$response = 'Vous n\'êtes pas connecté';
			$status = 'error';
		}
		echo json_encode(['response' => $response, 'status' => $status, 'url' => $url], JSON_UNESCAPED_UNICODE);
	}
	function apiRequest($url, $post=FALSE, $headers=array()) {
		session_start();
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$response = curl_exec($ch);
		if($post)
		  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
		$headers[] = 'Accept: application/json';
		if($_SESSION['access_token'])
		  $headers[] = 'Authorization: Bearer ' . $_SESSION['access_token'];
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$response = curl_exec($ch);
		return json_decode($response);
	  }
	  function TicketClose1($id)
	  {
		  $db = MySQL::Database();
		  
		  if(isset($_SESSION['account']['sso'])) {
			$Recovery = $db->prepare('SELECT * FROM rh_support WHERE id = ?');
			$Recovery->execute(array($id));
			$rowCount = $Recovery->rowCount();
			$fetch = $Recovery->fetch();
			  if($_SESSION['account']['sso'] == $fetch['sso']) {
				  if($rowCount != 0) {
					  if($fetch['status'] != 'close') {
						  $Update = $db->prepare('UPDATE rh_support SET status = ? WHERE id = ?');
						  $Update->execute(array('close', $id));
						  
						  $Notification = $db->prepare('INSERT INTO rh_notifications(notification, added_at, icon, sso, view) VALUES(?, ?, ?, ?, ?)');
						  $Notification->execute(array('Votre ticket "'.$fetch['sujet'].'" a été fermé.', date('Y-m-d H:i:s'), 'info-circle', $fetch['sso'], 0));
						  
						  $response = 'Le ticket a bien été fermé';
						  $status = 'success';
					  } else {
						  $response = 'Ce ticket est déjà fermé';
						  $status = 'error';
					  }
					  
				  } else {
					  $response = 'Erreur';
					  $status = 'error';
				  }
				  
			  } else {
				  $response = 'Accès refusé';
				  $status = 'error';
			  }
			  
		  } else {
			  $response = 'Veuillez vous connecter';
			  $status = 'error';
		  }
		  
		  echo json_encode(['response' => $response, 'status' => $status]);
	  }
	  function NotificationsView()
	  {
		  $db = MySQL::Database();
		  
		  if(isset($_SESSION['account']['sso'])) {
			  $Notif = $db->prepare('UPDATE rh_notifications SET view = ? WHERE view = ? AND sso = ?');
			  $Notif->execute(array(1, 0, $_SESSION['account']['sso']));
			  $status = 'success';
		  }
		  
		  echo json_encode(['status' => $status]);
	  }

	  // Extensions

	  function AddLimitService()
	  {
		$db = MySQL::Database();

		if(isset($_SESSION['account']['sso'])) {
			$Account = $db->prepare('SELECT * FROM rh_users WHERE sso = ?');
			$Account->execute(array($_SESSION['account']['sso']));
			$AccountFetch = $Account->fetch();
			$AccountRowCount = $Account->rowCount();

			if($AccountFetch['gold'] >= 50) {

				$money = $AccountFetch['gold'] - 50;

				$Update = $db->prepare('UPDATE rh_users SET gold = ?, limit_service = ? WHERE sso = ?');
				$Update->execute(array($money, $AccountFetch['limit_service'] + 1, $_SESSION['account']['sso']));

				$response = 'Vous avez bien été débiter de 50 diamants';
				$status = 'success';

			} else {
				$response = 'Vous n\'avez pas 50 diamants';
				$status = 'error';
			}
	    }  else {
			$response = 'Veuillez vous connecter';
			$status = 'error';
		}

		echo json_encode(['response' => $response, 'status' => $status], JSON_UNESCAPED_UNICODE);

	 }
}