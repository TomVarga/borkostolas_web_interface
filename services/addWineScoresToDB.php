<?php
$str=$_REQUEST["q"];
$array = json_decode($str);

require_once('../login3/config/config.php');
require_once('../login3/translations/hu.php');
require_once('../login3/libraries/PHPMailer.php');
@require_once('../login3/classes/Login.php');
$login = new Login();
if ($login->isUserLoggedIn() == true) {

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

	$user_name = $array[0];

	$sth = $db_connection->prepare('SELECT user_id FROM users WHERE user_name = :user_name');
	$sth->bindValue(':user_name', $user_name, PDO::PARAM_STR);
	$sth->execute();
	$result = $sth->fetch();
	if (count($result) > 1){
		$user_id = $result['user_id'];
		// print_r($user_id);
		for ($i = 1; $i < count($array); $i++){
			$wine_id = $i;
			$score = $array[$i];
			$sth = $db_connection->prepare('SELECT score FROM scores WHERE user_id = :user_id and wine_id = :wine_id');
			$sth->bindValue(':user_id', $user_id, PDO::PARAM_STR);
			$sth->bindValue(':wine_id', $wine_id, PDO::PARAM_STR);
			$sth->execute();
			$result = $sth->fetch();
			if (count($result) > 1){ // data was found need to update
				if (is_numeric($score)){
					$sth = $db_connection->prepare('UPDATE scores SET score = :score WHERE user_id = :user_id and wine_id = :wine_id');
					$sth->bindValue(':user_id', $user_id, PDO::PARAM_STR);
					$sth->bindValue(':wine_id', $wine_id, PDO::PARAM_STR);
					$sth->bindValue(':score', $score, PDO::PARAM_STR);
					$sth->execute();
				}else{
					$sth = $db_connection->prepare('UPDATE scores SET score = null WHERE user_id = :user_id and wine_id = :wine_id');
					$sth->bindValue(':user_id', $user_id, PDO::PARAM_STR);
					$sth->bindValue(':wine_id', $wine_id, PDO::PARAM_STR);

					$sth->execute();
				}
			} else { // no data found just insert
				if (is_numeric($score)){
					$sth = $db_connection->prepare('INSERT INTO scores VALUES (:user_id, :wine_id, :score, null)');
					$sth->bindValue(':user_id', $user_id, PDO::PARAM_STR);
					$sth->bindValue(':wine_id', $wine_id, PDO::PARAM_STR);
					$sth->bindValue(':score', $score, PDO::PARAM_STR);
					$sth->execute();
				}
			}
		}

		// echo "Adatbázis sikeresen frissítve.";
	}
	$db_connection = null;

	print_r("Success");
}else{
	print_r("not logged in");
}
?>