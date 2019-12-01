<?php

date_default_timezone_set($_ENV['APP_TIMEZONE']);

class Administration {
    function TicketsAdd($id)
	{
		$db = MySQL::Database();
		
		if(isset($_SESSION['account']['sso'])) {
			if($_SESSION['account']['rank'] >= 4) {
				$Recovery = $db->prepare('SELECT * FROM rh_support WHERE id = ?');
				$Recovery->execute(array($id));
				$rowCount = $Recovery->rowCount();
				if($rowCount != 0) {		
					$fetch = $Recovery->fetch();
					
					$reply = $this->Security($_POST['reply']);
					if(!empty($reply)) {
						$Add = $db->prepare('INSERT INTO rh_support_responses(ticket_id, reply, added_at, sso, STAFF) VALUES(?, ?, ?, ?, ?)');
						$Add->execute(array($id, $reply, date('Y-m-d H:i:s'), $_SESSION['account']['sso'], 1));
						
						$Update = $db->prepare('UPDATE rh_support SET status = ? WHERE id = ?');
						$Update->execute(array('answered', $id));
						
						$Notification = $db->prepare('INSERT INTO rh_notifications(notification, added_at, icon, sso, view) VALUES(?, ?, ?, ?, ?)');
						$Notification->execute(array('Vous avez reçu une réponse à votre ticket "'.$fetch['sujet'].'".', date('Y-m-d H:i:s'), 'info-circle', $fetch['sso'], 0));
						
						$status = 'success';
					} else {
						$response = 'Veuillez entrer une réponse';
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
    function TicketClose($id)
	{
		$db = MySQL::Database();
		
		if(isset($_SESSION['account']['sso'])) {
			if($_SESSION['account']['rank'] >= 4) {
				$Recovery = $db->prepare('SELECT * FROM rh_support WHERE id = ?');
				$Recovery->execute(array($id));
				$rowCount = $Recovery->rowCount();
				$fetch = $Recovery->fetch();
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
}