<?php
include_once('dbUtils.php');

$user_id = $_REQUEST['user_id'];
$user_id = preg_replace( "/[^0-9]/", "", $user_id);
$user_name = $_REQUEST['user_name'];

$db_connection = null;
$errors = array();

	function getScoresByUserName($user_name){
		global $db_connection;
		global $user_id;
		$user_id = getUserId($user_name);
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

	if ($user_id){
		print_r(JSON_encode(getScoresByUser()));
	}
    if ($user_name){
        print_r(JSON_encode(getUserId($user_name)));
    }
	$db_connection = null;

?>