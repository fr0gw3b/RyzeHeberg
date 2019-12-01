
<?php
$db = MySQL::Database();
$RecoveryService = $db->prepare('SELECT * FROM rh_services WHERE sso = ? AND uuid = ?');
$RecoveryService->execute(array($_SESSION['account']['sso'], $uuid));
$RecoveryServiceRowCount = $RecoveryService->rowCount();
$Service = $RecoveryService->fetch();
$Account = $db->prepare('SELECT * FROM rh_users WHERE sso = ?');
$Account->execute(array($_SESSION['account']['sso']));
$AccountFetch = $Account->fetch();
if ($RecoveryServiceRowCount == 0) {
    header("Location: /"); 
    exit();
} else {
    if ($Service['solution'] == "Bot discord") {
    $pterodactyl = new \HCGCloud\Pterodactyl\Pterodactyl(getenv('API_PTERODACTYL'), getenv('URL_PTERODACTYL'));
    $getServer = json_encode($pterodactyl->serverEx($Service['external_id']));
    $server = json_decode($getServer, true);
    try {
    $pterodactyl->deleteServer($server['id']);
    } catch (Exception $e) {
        $error = $e;
    } finally {
        if (!$error) {
            $Delete = $db->prepare('DELETE FROM rh_services WHERE uuid = ? AND sso = ?');
            $Delete->execute(array($Service['uuid'], $_SESSION['account']['sso']));
        }
    }
    } else if ($Service['solution'] == "Site Web") {
        $user = "dyljvjyt";
        $token = "XMKCBCB97YC26B2QXGLF6W42VBS57V4L";
        $serveraddr = "srv02.dedigo.fr:2087";
        $packageName = "dyljvjyt_Défaut";
        $uuid = strtoupper($this->Chaine(5));
        $email = $_SESSION['account']['email'];
        $password = $this->Chaine(16);
        $uuid = strtolower($Service['uuid']);
      $query2 = "https://" . $serveraddr . "/json-api/removeacct?api.version=1&username=$uuid";
  
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  
      $header[0] = "Authorization: whm $user:$token";
  
      curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
      curl_setopt($curl, CURLOPT_URL, $query2);
  
      $result = curl_exec($curl);
      $Delete = $db->prepare('DELETE FROM rh_services WHERE uuid = ? AND sso = ?');
      $Delete->execute(array($Service['uuid'], $_SESSION['account']['sso']));
  
      $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
      echo $this->Security($json->{'metadata'}->{'reason'});
    }
}
?>