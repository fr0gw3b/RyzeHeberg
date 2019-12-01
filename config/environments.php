<?php

date_default_timezone_set($_ENV['APP_TIMEZONE']);

require_once '../config/mysql.php';

class Environments extends MySQL {
	
	function App($variable)
	{
		$json_source = file_get_contents('../config/app.json');
		$json_data = json_decode($json_source);
		
		return $json_data->$variable;
	}
	
	function Security($variable)
	{
		$security = htmlspecialchars(trim(stripslashes($variable)));
		return $security;
	}
	
	function Encryption($variable)
	{
		$hash = password_hash($variable, PASSWORD_ARGON2ID, ['memory_cost' => 1<<17, 'time_cost' => 1, 'threads' => 4]);
		return $hash;
	}
	
	function AdressIP() 
	{
		if (isset($_SERVER['HTTP_CLIENT_IP'])) {
			return $_SERVER['HTTP_CLIENT_IP'];
		}
		elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else {
			return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
		}
	}
	
	function DeleteStorie() {
		$db = MySQL::Database();
		$date = new DateTime();

		$reco = $db->query('SELECT * FROM rh_stories_photos');
		
		while($r = $reco->fetch()) {
			if($r['date'] + 86400 <= $date->getTimestamp()) {
				$del = $db->prepare('DELETE FROM rh_stories_photos WHERE id = ?');
				$del->execute(array($r['id']));
			}
		}
		
		$vide = $db->query('SELECT * FROM rh_stories');
		
		while($v = $vide->fetch()) {
			if($v['date'] + 86400 <= $date->getTimestamp()) {
				$del = $db->prepare('DELETE FROM rh_stories WHERE id = ?');
				$del->execute(array($v['id']));
			}
			
			$check = $db->prepare('SELECT * FROM rh_stories_photos WHERE storie_id = ?');
			$check->execute(array($v['id']));
			
			$row = $check->rowCount();
			
			if($row == 0) {
				$dett = $db->prepare('DELETE FROM rh_stories WHERE id = ?');
				$dett->execute(array($v['id']));
			}
		}
	}
	
	function Chaine($nb_car, $chaine = 'azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN123456789') 
	{
		$nb_lettres = strlen($chaine) - 1;
		$generation = '';
		for ($i = 0; $i < $nb_car; $i++) {
			$pos = mt_rand(0, $nb_lettres);
			$car = $chaine[$pos];
			$generation.= $car;
		}

		return $generation;
	}
	
	function Many($variable)
	{
		if($variable > 1) {
			return 's';
		}
	}
	
	function SessionStart()
	{
		$db = MySQL::Database();
		
		if(isset($_SESSION['account']['sso'])) {
			$RecoverySSO = $db->prepare('SELECT sso FROM rh_users WHERE sso = ?');
			$RecoverySSO->execute(array($_SESSION['account']['sso']));
			$RowCountSSO = $RecoverySSO->rowCount();
			
			if($RowCountSSO == 0) {
				$_SESSION['account'] = array();
				unset($_SESSION['account']);
				session_destroy();
				header('Location: /');
			} else {
				$UpdateSession = $db->prepare('SELECT * FROM rh_users WHERE sso = ?');
				$UpdateSession->execute(array($_SESSION['account']['sso']));
				$Fetch = $UpdateSession->fetch();
				
				$_SESSION['account'] = array(
					'id' => $Fetch['id'],
					'username' => $Fetch['username'],
					'email' => $Fetch['email'],
					'rank' => $Fetch['rank'],
					'avatar' => $Fetch['avatar'],
					'sso' => $Fetch['sso'],
					'gold' => $Fetch['gold'],
					'last_ip' => $Fetch['last_ip'],
					'registration_ip' => $Fetch['registration_ip'],
					'registration_date' => $Fetch['registration_date'],
					'status' => $Fetch['status']
				);
			}
		}
	}

	function ConvertTime($temps)
	{
		$temps = strtotime($temps);
		$diff_temps = time() - $temps;
		if ($diff_temps < 1) {
			return 'À l\'instant';
		}

		$sec = array(
			12 * 30 * 24 * 60 * 60 => 'an',
			30 * 24 * 60 * 60 => 'mois',
			24 * 60 * 60 => 'jour',
			60 * 60 => 'heure',
			60 => 'minute',
			1 => 'seconde'
		);
		foreach($sec as $sec => $value) {
			$div = $diff_temps / $sec;
			if ($div >= 1) {
				$temps_conv = round($div);
				$temps_type = $value;
				if ($temps_conv > 1 && $temps_type != "mois") {
					$temps_type.= "s";
				}

				return 'Il y a ' . $temps_conv . ' ' . $temps_type;
			}
		}
	}
	
	function isLogging()
	{
		if(isset($_SESSION['account']['sso'])) {
			header('Location: /dashboard');
		}
	}
	
	function isDisconnected()
	{
		if(!isset($_SESSION['account']['sso'])) {
			header('Location: /login');
		}
	}
	
	function isRank($rank)
	{
		if(isset($_SESSION['account']['sso'])) {
			if($_SESSION['account']['rank'] >= $rank) {
				
			} else {
				header('Location: /manager');
                exit();
			}
			
		} else {
			header('Location: /manager');
            exit();
		}
	}
	
	function Rank($rank, $option)
	{
		switch($option) {
			case 'letter':
				switch($rank) {
					case 1:
						return 'Membre';
						break;
					case 2:
						return 'Premium';
						break;
					case 3:
						return 'Support';
						break;
					case 4:
						return 'Technicien';
						break;
					case 5:
						return 'Responsable';
						break;
					case 6:
						return 'Développeur';
						break;
					case 7:
						return 'Administrateur';
						break;
					case 8:
						return 'Co-directeur';
						break;
					case 9:
						return 'Directeur';
						break;
				}
			}
		}
	function StatusServices($status)
	{
		if($status == 'active') {
			return 'Actif';
		} elseif($status == 'expired') {
			return 'Expiré';
		} elseif($status == 'suspended') {
			return 'Suspendu';
		}
	}
	function StatusServicePterodactyl($external_id, $status)
	{
		$pterodactyl = new \HCGCloud\Pterodactyl\Pterodactyl(getenv('API_PTERODACTYL'), getenv('URL_PTERODACTYL'));
		$getServer = json_encode($pterodactyl->serverEx($external_id));
		$server = json_decode($getServer, true);
		if ($server['container']['installed'] == '0') {
			if ($status == true) {
				return 'Installation en cours';
				} else {
					return '<td class="text-center">
					<div class="badge badge-pill badge-primary">Installation en cours</div>
				</td>';
				}
			}	elseif ($server['attributes']['suspended'] == '1') {
			if ($status == true) {
			return 'Suspendu';
			} else {
				return '<td class="text-center">
				<div class="badge badge-pill badge-warning">Suspendu</div>
			</td>';
			}
		} else {
			if ($status == true) {
				return 'Actif';
				} else {
					return '<td class="text-center">
					<div class="badge badge-pill badge-success">Actif</div>
				</td>';
				}
		}
	}
	function BarProgress($number) {
		if ($number >= 75) {
			return '<div class="widget-content p-0"> <div class="widget-content-outer"> <div class="widget-content-wrapper"> <div class="widget-content-left pr-2"> <div class="widget-numbers fsize-1 text-info">'.$number.'%</div> </div> <div class="widget-content-right w-100"> <div class="progress-bar-sm progress-bar-animated-alt progress"> <div class="progress-bar bg-info" role="progressbar" aria-valuenow="$number" aria-valuemin="0" aria-valuemax="100" style="width: '.$number.'%;"></div> </div> </div> </div> </div> </div>';
		} elseif ($number >= 50) {
			return '<div class="widget-content p-0"> <div class="widget-content-outer"> <div class="widget-content-wrapper"> <div class="widget-content-left pr-2"> <div class="widget-numbers fsize-1 text-success">'.$number.'%</div> </div> <div class="widget-content-right w-100"> <div class="progress-bar-sm progress-bar-animated-alt progress"> <div class="progress-bar bg-success" role="progressbar" aria-valuenow="$number" aria-valuemin="0" aria-valuemax="100" style="width: '.$number.'%;"></div> </div> </div> </div> </div> </div>';
		} elseif ($number >= 25) {
			return '<div class="widget-content p-0"> <div class="widget-content-outer"> <div class="widget-content-wrapper"> <div class="widget-content-left pr-2"> <div class="widget-numbers fsize-1 text-warning">'.$number.'%</div> </div> <div class="widget-content-right w-100"> <div class="progress-bar-sm progress-bar-animated-alt progress"> <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="$number" aria-valuemin="0" aria-valuemax="100" style="width: '.$number.'%;"></div> </div> </div> </div> </div> </div>';
 		} elseif ($number >= 1) {
			return '<div class="widget-content p-0"> <div class="widget-content-outer"> <div class="widget-content-wrapper"> <div class="widget-content-left pr-2"> <div class="widget-numbers fsize-1 text-danger">'.$number.'%</div> </div> <div class="widget-content-right w-100"> <div class="progress-bar-sm progress-bar-animated-alt progress"> <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="$number" aria-valuemin="0" aria-valuemax="100" style="width: '.$number.'%;"></div> </div> </div> </div> </div> </div>';
 		} elseif ($number <= 0) {
			 $number = 0;
			return '<div class="widget-content p-0"> <div class="widget-content-outer"> <div class="widget-content-wrapper"> <div class="widget-content-left pr-2"> <div class="widget-numbers fsize-1 text-focus">'.$number.'%</div> </div> <div class="widget-content-right w-100"> <div class="progress-bar-sm progress-bar-animated-alt progress"> <div class="progress-bar bg-focus" role="progressbar" aria-valuenow="$number" aria-valuemin="0" aria-valuemax="100" style="width: '.$number.'%;"></div> </div> </div> </div> </div> </div>';
		}
	}
	function StatusSupport($status)
	{
		if($status == 'open') {
			return '<span style="color: green">Ouvert</span>';
		} elseif($status == 'waiting') {
			return '<span style="color: orange">En attente</span>';
		} elseif($status == 'answered') {
			return '<span style="color: blue">Répondu</span>';
		} elseif($status == 'close') {
			return '<span style="color: red">Fermé</span>';
		}
	}
	function StatusSupportE($status)
	{
		if($status == 'open') {
			return '<div class="badge badge-pill badge-success">Ouvert</div>';
		} elseif($status == 'waiting') {
			return '<div class="badge badge-pill badge-warning">En attente</div>';
		} elseif($status == 'answered') {
			return '<div class="badge badge-pill badge-primary">Répondu</div>';
		} elseif($status == 'close') {
			return '<div class="badge badge-pill badge-danger">Fermé</div>';
		}
	}
	function SFTPHost($nodeid) {
		$servername = "127.0.0.1";
		$username = "pterodactyl";
		$password = "VXkyhdaYEjPu5TacEZEm82M4YSERNG4BQEg7yFnvRSwf5Ay7unNZHg8UDAxfbueEqckMStPXxyQja4P2CTxLzkxY8aURuZTSJDnJWJV4pGMCUBUGJSqpMepQdSnWzSeX";

		try {
			$db = new PDO("mysql:host=$servername;dbname=panel", $username, $password);
			// set the PDO error mode to exception
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
		catch(PDOException $e)
			{
				echo "Connexion refusé au serveur MYSQL";
			}
			$stmt = $db->query("SELECT * FROM nodes WHERE id = $nodeid");
			$node = $stmt->fetch();
			return "sftp://{$node['fqdn']}";
	}
	function SFTPPort($nodeid) {
		$servername = "127.0.0.1";
		$username = "pterodactyl";
		$password = "VXkyhdaYEjPu5TacEZEm82M4YSERNG4BQEg7yFnvRSwf5Ay7unNZHg8UDAxfbueEqckMStPXxyQja4P2CTxLzkxY8aURuZTSJDnJWJV4pGMCUBUGJSqpMepQdSnWzSeX";

		try {
			$db = new PDO("mysql:host=$servername;dbname=panel", $username, $password);
			// set the PDO error mode to exception
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
		catch(PDOException $e)
			{
				echo "Connexion refusé au serveur MYSQL";
			}
			$stmt = $db->query("SELECT * FROM nodes WHERE id = $nodeid");
			$node = $stmt->fetch();
			return "{$node['daemonSFTP']}";
	}
	function ExpirationServices()
	{
		$db = MySQL::Database();
		
		if(isset($_SESSION['account']['sso'])) {
			$Services = $db->query('SELECT * FROM rh_services');
			
			while($S = $Services->fetch()) {
				if($S['expire_at'] <= date('Y-m-d H:i:s')) {
					$Update = $db->prepare('UPDATE rh_services SET status = ? WHERE id = ?');
					$Update->execute(array('expired', $S['id']));
				}
			}
		}
	}
}