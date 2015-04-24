<?php
include_once('../login3/config/config.php');

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

function getWineDataByName($wine_name){
	global $db_connection;
	// if database connection opened
	if (databaseConnection()) {
		$query_wine = $db_connection->prepare('SELECT * FROM wines WHERE wine_name = :wine_name');
		$query_wine->bindValue(':wine_name', $wine_name, PDO::PARAM_STR);
		$query_wine->execute();
		// get result row (as an object)
		return $query_wine->fetchObject();
	} else {
		return false;
	}
}

function getAllWines(){
	global $db_connection;
	// if database connection opened
	if (databaseConnection()) {
		$query = $db_connection->query('SELECT * FROM wines');
		return $query->fetchAll(PDO::FETCH_ASSOC);
	} else {
		return false;
	}
}

print_r(JSON_encode(getAllWines()));

$db_connection = null;

?>