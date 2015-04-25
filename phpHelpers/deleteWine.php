<?php
require_once('../login3/config/config.php');
require_once('../login3/translations/hu.php');
require_once('../login3/libraries/PHPMailer.php');
@require_once('../login3/classes/Login.php');
$login = new Login();
if ($login->isUserLoggedIn() == true) {
	if ($login->getPermission() > 0){ // admin
		$wine_id = $_REQUEST["wine_id"];

		$db_connection = null;
		$errors = array();

		function databaseConnection(){
			global $db_connection;
			// if connection already exists
			if ($db_connection != null) {
				return true;
			} else {
				try {
					$db_connection = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
					return true;
				} catch (PDOException $e) {
					$errors[] = MESSAGE_DATABASE_ERROR . $e->getMessage();
				}
			}
			return false;
		}

		databaseConnection();

		$sth = $db_connection->prepare('DELETE FROM wines WHERE wine_id = :wine_id)');
		$sth->bindValue(':wine_id', $wine_id, PDO::PARAM_STR);
		$sth->execute();

		$db_connection = null;
	};
}
