<?php
include_once(__DIR__.'/../login3/config/config.php');

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

function getUserId($user_name){
    global $db_connection;
    global $user_id;
    // if database connection opened
    if (databaseConnection()) {
        // database query, getting all the info of the selected user
        $query_score = $db_connection->prepare('SELECT user_id FROM users WHERE user_name = :user_name');
        $query_score->bindValue(':user_name', $user_name, PDO::PARAM_STR);
        $query_score->execute();
        // get result row (as an object)
        return $query_score->fetch()["user_id"];
    } else {
        return false;
    }
}

function getUserName($user_id){
    global $db_connection;
    // if database connection opened
    if (databaseConnection()) {
        // database query, getting all the info of the selected user
        $query_score = $db_connection->prepare('SELECT user_name FROM users WHERE user_id = :user_id');
        $query_score->bindValue(':user_id', $user_id, PDO::PARAM_STR);
        $query_score->execute();
        // get result row (as an object)
        return $query_score->fetch()["user_name"];
    } else {
        return false;
    }
}

function getWineCount(){
    global $db_connection;
    // if database connection opened
    if (databaseConnection()) {
        $query = $db_connection->query('SELECT MAX(wine_id) FROM wines');
        return $query->fetch()[0];
    } else {
        return false;
    }
}