<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
ini_set('max_execution_time', 300); //300 seconds = 5 minutes. In case if your CURL is slow and is loading too much (Can be IPv6 problem)
error_reporting(E_ALL);
define('OAUTH2_CLIENT_ID', '634450139309932544');
define('OAUTH2_CLIENT_SECRET', '0g3Y6yNjlOuPXnjEersFwx7hTNyCjkH0');
$authorizeURL = 'https://discordapp.com/api/oauth2/authorize';
$tokenURL = 'https://discordapp.com/api/oauth2/token';
$apiURLBase = 'https://discordapp.com/api/users/@me';
session_start();
// Start the login process by sending the user to Discord's authorization page
$actionget = $this->Security(get('action'));
if($actionget == 'login') {
  $params = array(
    'client_id' => OAUTH2_CLIENT_ID,
    'redirect_uri' => 'https://ryzeheberg.fr/login/discord',
    'response_type' => 'code',
    'scope' => 'identify guilds'
  );
  // Redirect the user to Discord's authorization page
  header('Location: https://discordapp.com/api/oauth2/authorize' . '?' . http_build_query($params));
  die();
}
// When Discord redirects the user back here, there will be a "code" and "state" parameter in the query string
if($this->Security(get('code'))) {
  // Exchange the auth code for a token
  $token = apiRequest($tokenURL, array(
    "grant_type" => "authorization_code",
    'client_id' => OAUTH2_CLIENT_ID,
    'client_secret' => OAUTH2_CLIENT_SECRET,
    'redirect_uri' => 'https://ryzeheberg.fr/login/discord',
    'code' => $this->Security(get('code'))
  ));
  $logout_token = $token->access_token;
  $_SESSION['access_token'] = $token->access_token;
  $db = MySQL::Database();
  $user = apiRequest($apiURLBase);
  $RecoveryUsername = $db->prepare('SELECT * FROM rh_users WHERE id_discord = ?');
  $RecoveryUsername->execute(array($user->id));
  $RowCountRecoveryUsername = $RecoveryUsername->rowCount();
  if($RowCountRecoveryUsername != 0) {
    $fetch = $RecoveryUsername->fetch();
    $_SESSION['account'] = array(
      'id' => $fetch['id'],
      'username' => $fetch['username'],
      'sso' => $fetch['sso'],
      'rank' => $fetch['rank'],
      'gold' => $fetch['gold'],
      'avatar' => $fetch['avatar'],
      'registration_date' => $fetch['registration_date'],
      'status' => $fetch['status'],
      'mood' => $fetch['mood']
  );
  header('Location: /dashboard');
  } else {
  header('Location: /login/discord?action=setup');
  }
}
if($actionget == 'setup') {
    if ($_SESSION['access_token']) {
      $db = MySQL::Database();
      $user = apiRequest($apiURLBase);
      $RecoveryUsername = $db->prepare('SELECT * FROM rh_users WHERE id_discord = ?');
      $RecoveryUsername->execute(array($user->id));
      $RowCountRecoveryUsername = $RecoveryUsername->rowCount();
      if($RowCountRecoveryUsername == 0) {
  $user = apiRequest($apiURLBase);
  require_once('/var/www/ryzeheberg/resources/themes/ryzeheberg/auth/discord/setup.php');
    }
    else {
      header("Location: ?action=login");
      die();
  }
} else {
        header("Location: ?action=login");
        die();
    } 
    
} else {
    if (!$this->Security(get('code'))) {
    header("Location: ?action=login");
    die();
    }
}
function apiRequest($url, $post=FALSE, $headers=array()) {
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  $response = curl_exec($ch);
  if($post)
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
  $headers[] = 'Accept: application/json';
  if(session('access_token'))
    $headers[] = 'Authorization: Bearer ' . session('access_token');
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  $response = curl_exec($ch);
  return json_decode($response);
}
function get($key, $default=NULL) {
  return array_key_exists($key, $_GET) ? $_GET[$key] : $default;
}
function session($key, $default=NULL) {
  return array_key_exists($key, $_SESSION) ? $_SESSION[$key] : $default;
}
?>