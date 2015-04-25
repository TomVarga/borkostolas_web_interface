<?php
require_once('../login3/config/config.php');
require_once('../login3/translations/hu.php');
require_once('../login3/libraries/PHPMailer.php');
@require_once('../login3/classes/Login.php');
$login = new Login();
if ($login->isUserLoggedIn() == true) {
	if ($login->getPermission() > 0){ // admin
		$wine_id =          $_REQUEST["wine_id"];
		$wine_name =        json_decode($_REQUEST["wine_name"]);
		$wine_winery =      json_decode($_REQUEST["wine_winery"]);
		$wine_location =    json_decode($_REQUEST["wine_location"]);
		$wine_year =        $_REQUEST["wine_year"];
		$wine_composition = json_decode($_REQUEST["wine_composition"]);
		$wine_price =       $_REQUEST["wine_price"];

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
//		print_r($wine_name);
		$sth = $db_connection->prepare('INSERT INTO wines VALUES (null, :wine_name, :wine_winery, :wine_location, :wine_year, :wine_composition, :wine_price)');
		$sth->bindValue(':wine_name', $wine_name, PDO::PARAM_STR);
		$sth->bindValue(':wine_winery', $wine_winery, PDO::PARAM_STR);
		$sth->bindValue(':wine_location', $wine_location, PDO::PARAM_STR);
		$sth->bindValue(':wine_year', $wine_year, PDO::PARAM_STR);
		$sth->bindValue(':wine_composition', $wine_composition, PDO::PARAM_STR);
		$sth->bindValue(':wine_price', $wine_price, PDO::PARAM_STR);
		$sth->execute();

		$db_connection = null;
	};
}
