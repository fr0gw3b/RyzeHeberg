<?php

require_once '../config/environments.php';

class Routes extends Environments  {
	
	function AntiInjectionSQL() {
		$injection = 'INSERT|UNION|SELECT|NULL|COUNT|FROM|LIKE|DROP|TABLE|WHERE|COUNT|COLUMN|TABLES|INFORMATION_SCHEMA|OR|UPDATE';
		foreach($_GET as $getSearchs) {
			$getSearch = explode(" ", $getSearchs);
			foreach($getSearch as $k => $v) {
				if (in_array(strtoupper(trim($v)) , explode('|', $injection))) {
					$theme = $_ENV['APP_THEME'];
					define("THEME", __DIR__ ."/../../resources/themes/$theme/");
					require_once (THEME .'errors/404.php');
					exit;
				}
			}
		}
	}
	
	function Map()
	{
		// Session Update
		$this->SessionStart();
		// MAINTENANCE
		$url = '';
		$theme = $_ENV['APP_THEME'];
		define("THEME", __DIR__ ."/../../resources/themes/$theme/");
		if ($this->AdressIP() != "f86.253.107.59") {
			if(isset($_GET['url'])) {
				$url = explode('/', $_GET['url']);
				
			}
			if($url == '') {
				
				// Route Index
				$title = "Accueil";
				require_once (THEME .'welcome/index.php');
			} elseif($url[0] == 'offres') {
				
				$title = "Nos offres";
				require_once (THEME .'welcome/services.php');
			} elseif($url[0] == 'terms') {
				
				$title = "Conditions d'utilisations";
				require_once (THEME .'welcome/terms.php');
			} elseif($url[0] == 'privacy') {
				
				$title = "Politique de confidentialité";
				require_once (THEME .'welcome/privacy.php');
			} elseif($url[0] == 'login' AND $url[1] == NULL) {
				
				// Route Login
				$this->isLogging();
				$title = "Connexion";
				require_once (THEME .'auth/login.php');
			} elseif($url[0] == 'login' AND $url[1] == "synchronise") {
				
				// Route Login
				$this->isLogging();
				$title = "Synchronisation";
				require_once (THEME .'auth/synchronise.php');

			} elseif($url[0] == 'login' AND $url[1] == "discord") {
				
				// Route Login
				$this->isLogging();
				$title = "Configuration du compte Discord (1/1)";
				require_once (THEME .'auth/discord/login.php');
			} elseif($url[0] == 'dashboard' AND $url[1] == NULL) {
				
				// Route Login
				$this->isDisconnected();
				$title = "Tableau de bord";
				$page = "accueil";
				require_once (THEME .'dashboard/index.php');
			} elseif($url[0] == 'services' AND $url[1] == NULL) {
				
				// Route Login
				$this->isDisconnected();
				$title = "Mes services";
				$paged = "services";
				require_once (THEME .'dashboard/mes-services.php');
			} elseif($url[0] == 'dev-extensions' AND $url[1] == NULL) {
				$this->isDisconnected();
				$title = "Extensions";
				$paged = "extensions";
				require_once (THEME .'dashboard/extensions.php');
			} elseif($url[0] == 'service' AND $url[1] != NULL AND $url[2] == NULL) {
				
				// Route Login
				$this->isDisconnected();
				$uuid = $url[1];
				$title = "Mon service";
				$paged = "services";
				require_once (THEME .'dashboard/view_service.php');
			} elseif($url[0] == 'tickets' AND $url[1] != NULL) {
				
				// Route Login
				$this->isDisconnected();
				$ticket = $url[1];
				$title = "Voir ticket #{$url[1]}";
				$paged = "tickets";
				require_once (THEME .'dashboard/view_ticket.php');
 			} elseif($url[0] == 'service' AND $url[1] != NULL AND $url[2] == "deleteee") {
				
				// Route Login
				$this->isDisconnected();
				$uuid = $url[1];
				$title = "Service -";
				$paged = "services";
				require_once (THEME .'dashboard/delete_service.php');
			} elseif($url[0] == 'commander' AND $url[1] == 'bot') {
				
				// Route Login
				$this->isDisconnected();
				$title = "Commander un bot discord";
				$page = "commander_bot";
				require_once (THEME .'dashboard/commander_bot.php');
			} elseif($url[0] == 'commander' AND $url[1] == 'web') {
				
				// Route Login
				$this->isDisconnected();
				$title = "Commander un site web";
				$page = "commander_web";
				require_once (THEME .'dashboard/commander_site.php');
			} elseif($url[0] == 'tickets' AND $url[1] == NULL) {
				
				// Route Login
				$this->isDisconnected();
				$title = "Mes tickets";
				$page = "tickets";
				require_once (THEME .'dashboard/mes_tickets.php');
			} elseif($url[0] == 'create' AND $url[1] == 'ticket') {
				
				// Route Login
				$this->isDisconnected();
				$title = "Créer un ticket";
				$page = "createticket";
				require_once (THEME .'dashboard/create_ticket.php');
			} elseif($url[0] == 'panel' AND $url[1] == 'generate') {
				
				$this->isDisconnected();
				$this->RegeneratePasswd();
			} elseif($url[0] == 'panel' AND $url[1] == 'connect') {
				
				// Route Login
				$this->isDisconnected();
				$title = "Connexion automatique";
				$page = "connect";
				require_once (THEME .'system/connect_ptero.php');
			} elseif($url[0] == 'administration' AND $url[1] == NULL) {
				
				// Route Login
				$this->isDisconnected();
				$this->isRank(4);
				$title = "Administration";
				$page = "accueil";
				require_once (THEME .'administration/index.php');
			} elseif($url[0] == 'administration' AND $url[1] == 'tickets' AND $url[2] == NULL) {
				
				// Route Login
				$this->isDisconnected();
				$this->isRank(4);
				$title = "Administration - Tickets";
				$page = "accueil";
				require_once (THEME .'administration/tickets.php');
			} elseif($url[0] == 'administration' AND $url[1] == 'tickets' AND $url[2] != NULL) {
				
				// Route Login
				$this->isDisconnected();
				$ticket = $url[2];
				$title = "Administration - Tickets";
				$page = "accueil";
				require_once (THEME .'administration/view_ticket.php');
			} elseif($url[0] == 'system' AND $url[1] == 'ajax' AND $url[2] == 'synchronise') {
				
				// Route Ajax Login
				$this->isLogging();
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$this->Synchronise();
				} else {
					require_once (THEME .'errors/404.php');
				}
			} elseif($url[0] == 'system' AND $url[1] == 'ajax' AND $url[2] == 'notifications_view') {
			
				// Route Ajax Notifications View
				$this->isDisconnected();
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$this->NotificationsView();
				} else {
					echo 'Erreur';
				}
				
			} elseif($url[0] == 'system' AND $url[1] == 'ajax' AND $url[2] == 'register') {
				
				// Route Ajax Register
				$this->isLogging();
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$this->Register();
				} else {
					require_once (THEME .'errors/404.php');
				}
			} elseif($url[0] == 'system' AND $url[1] == 'ajax' AND $url[2] == 'register_discord') {
				
				// Route Ajax Register
				$this->isLogging();
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$this->RegisterDiscord();
				} else {
					require_once (THEME .'errors/404.php');
				}
			} elseif($url[0] == 'system' AND $url[1] == 'ajax' AND $url[2] == 'commander_bot') {
				
				// Route Ajax Register
				$this->isDisconnected();
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$this->CommanderBot();
				} else {
					require_once (THEME .'errors/404.php');
				}
			} elseif($url[0] == 'system' AND $url[1] == 'ajax' AND $url[2] == 'commander_web') {
				
				// Route Ajax Register
				$this->isDisconnected();
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$this->CommanderWeb();
				} else {
					require_once (THEME .'errors/404.php');
				}
			} elseif($url[0] == 'system' AND $url[1] == 'ajax' AND $url[2] == 'renouvellement') {
				
				// Route Ajax Register
				$this->isDisconnected();
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$this->RenouvellementService();
				} else {
					require_once (THEME .'errors/404.php');
				}
			} elseif($url[0] == 'system' AND $url[1] == 'ajax' AND $url[2] == 'extensions' AND $url[3] == 'addLimitService') {

				// Route Ajax Register
				$this->isDisconnected();
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$this->AddLimitService();
				} else {
					require_once (THEME .'errors/404.php');
				}
			} elseif($url[0] == 'system' AND $url[1] == 'ajax' AND $url[2] == 'extensions' AND $url[3] == 'addRamService') {

				// Route Ajax Register
				$this->isDisconnected();
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$this->AddRamService();
				} else {
					require_once (THEME .'errors/404.php');
				}
			} elseif($url[0] == 'ajax' AND $url[1] == 'server' AND $url[2] =! NULL AND $url[3] == "reinstall") {
				
				// Route Ajax Register
				$this->isDisconnected();
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$this->ReinstallServer();
					header('Location: /services');
				} else {
					require_once (THEME .'errors/404.php');
				}
			} elseif($url[0] == 'ajax' AND $url[1] == 'server' AND $url[2] =! NULL AND $url[3] == "update") {
				
				// Route Ajax Register
				$this->isDisconnected();
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$this->Update();
					header(`Location: /services/`);
				} else {
					require_once (THEME .'errors/404.php');
				}
			} elseif($url[0] == 'system' AND $url[1] == 'ajax' AND $url[2] == 'create_ticket') {
			
				// Route Ajax Create Ticket
				$this->isDisconnected();
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$this->CreateTicket();
				} else {
					echo 'Erreur';
				}
			} elseif($url[0] == 'system' AND $url[1] == 'ajax' AND $url[2] == 'reply_ticket') {
			
				// Route Ajax Reply Ticket
				$this->isDisconnected();
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$this->ReplyTicket($url[3]);
				} else {
					echo 'Erreur';
				}
			} elseif($url[0] == 'system' AND $url[1] == 'ajax' AND $url[2] == 'reply_ticket') {
			
				// Route Ajax Reply Ticket
				$this->isDisconnected();
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$this->ReplyTicket($url[3]);
				} else {
					echo 'Erreur';
				}
			} elseif($url[0] == 'system' AND $url[1] == 'ajax' AND $url[2] == 'admin_close_ticket') {
			
				// Route Ajax Admin Close Ticket
				$this->isRank(4);
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$this->TicketClose($url[3]);
				} else {
					echo 'Erreur';
				}
			} elseif($url[0] == 'system' AND $url[1] == 'ajax' AND $url[2] == 'close_ticket') {
			
				// Route Ajax Admin Close Ticket
				$this->isDisconnected();
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$this->TicketClose1($url[3]);
				} else {
					echo 'Erreur';
				}
			} elseif($url[0] == 'system' AND $url[1] == 'ajax' AND $url[2] == 'admin_ticket_add') {
			
				// Route Ajax Admin Ticket Add
				$this->isRank(4);
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$this->TicketsAdd($url[3]);
				} else {
					echo 'Erreur';
				}
			} elseif($url[0] == 'api' AND $url[1] == 'avatar' AND $url[2] != NULL) {
				
			$db = MySQL::Database();
			$RecoveryEmail = $db->prepare('SELECT * FROM rh_users WHERE username = ?');
			$RecoveryEmail->execute(array($url[2]));
			$fetchRecoveryEmail = $RecoveryEmail->fetch();
			$Count = $RecoveryEmail->rowCount();
			if ($Count == 1) {
				if (stripos($fetchRecoveryEmail['avatar'], '/') == 0) {
					$avatar = "https://ryzeheberg.fr/${fetchRecoveryEmail['avatar']}";
					header('Content-Type: image/jpeg');
					readfile($avatar);
				} else {
					header('Content-Type: image/jpeg');
					readfile($fetchRecoveryEmail['avatar']);
				}
			} else {
				echo "Avatar non trouvé";
			}
			} elseif($url[0] == 'logout') {
				
				// Route Logout
				$_SESSION['account'] = array();
				unset($_SESSION['account']);
				$_SESSION['access_token'] = array();
				unset($_SESSION['access_token']);
				session_destroy();
				header('Location: /');
			} else {
				
				// Route Error 404
				$title = "Erreur";
				require_once (THEME .'errors/404.php');
				
			}
		} else {
			require_once (THEME .'maintenance.php');
		}
	}
}

$Routes = new Routes();