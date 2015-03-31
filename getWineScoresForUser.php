<?php
include_once('login3/config/config.php');

$user_id = $_POST['user_id'];

// $user_id = "3";
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

	function getScoresByUser(){
		global $db_connection;
		global $user_id;
		// if database connection opened
		if (databaseConnection()) {
			// database query, getting all the info of the selected user
			$query_score = $db_connection->prepare('SELECT * FROM scores WHERE user_id = :user_id');
			$query_score->bindValue(':user_id', $user_id, PDO::PARAM_STR);
			$query_score->execute();
			// get result row (as an object)
			return $query_score->fetchAll(PDO::FETCH_ASSOC);
		} else {
			return false;
		}
	}

	print_r(JSON_encode(getScoresByUser()));

	$db_connection = null;

?>