<?php
include_once('login3/config/config.php');

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
			// database query, getting all the info of the selected user
			$query_user = $db_connection->prepare('SELECT * FROM wines WHERE wine_name = :wine_name');
			$query_user->bindValue(':wine_name', $wine_name, PDO::PARAM_STR);
			$query_user->execute();
			// get result row (as an object)
			return $query_user->fetchObject();
		} else {
			return false;
		}
	}

	function getWinesByYear($wine_year){
		global $db_connection;
		// if database connection opened
		if (databaseConnection()) {
			// database query, getting all the info of the selected user
			$query_user = $db_connection->prepare('SELECT wine_id FROM wines WHERE wine_year = :wine_year');
			$query_user->bindValue(':wine_year', $wine_year, PDO::PARAM_STR);
			$query_user->execute();
			// get result row (as an object)
			return $query_user->fetchObject();
		} else {
			return false;
		}
	}

	databaseConnection();
	// $sth = $db_connection->prepare("SELECT * FROM wines where wine_id < 100");
	// $sth->execute();
 
	// while($result = $sth->fetch(PDO::FETCH_ASSOC)){
	// 	print $result['wine_id'].'<br>';
	// 	print $result['wine_name'].'<br>';
	// }

	$results = Array();
	for ($j=6; $j < 13; $j++){
		$sth = $db_connection->prepare("SELECT wine_id, score FROM scores where user_id = $j");
		$sth->execute();

	 	$results[$j] = Array();
	 	$result = $sth->fetchAll();
	 	if (count($result)>0){
	 		for ($i=0; $i < count($result); $i++) {
	 			$results[$j][$result[$i]['wine_id']] = $result[$i]['score']+0;
	 		}
	 	}else{
	 		print "no results found";
	 	}
	 	
 	}
 	// print_r($results);

	// $sth = $db_connection->prepare("SELECT score FROM scores where wine_id = 2 and user_id = 3");
	// $sth->execute();
	// $result = $sth->fetch();
	// print_r($result);
	// print_r(count($result));


	$db_connection = null;


	echo (JSON_encode($results));


?>