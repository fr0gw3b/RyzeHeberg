<?php

require_once '../config/applications.php';

class MySQL extends Applications {

	public static function Database() {
		try {
			$host = $_ENV['DB_HOST'];
			$dbname = $_ENV['DB_DATABASE'];
			$user = $_ENV['DB_USERNAME'];
			$pass = $_ENV['DB_PASSWORD'];
			$port = $_ENV['DB_PORT'];
			
			$db = new PDO('mysql:host=' . $host . ';port=' . $port . ';dbname=' . $dbname . ';charset=utf8', $user, $pass);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$db->exec("SET CHARACTER SET utf8mb4");
			return $db;
		}

		catch(PDOException $e) {
			$theme = $_ENV['APP_THEME'];
			define("THEME01", __DIR__ ."/../resources/themes/$theme/");
			require_once (THEME01 .'errors/500.php');
		}
	}
}