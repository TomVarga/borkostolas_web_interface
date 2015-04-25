<?php
	require_once('login3/config/config.php');
	require_once('login3/translations/hu.php');
	require_once('login3/libraries/PHPMailer.php');
	@require_once('login3/classes/Login.php');
	$login = new Login();
	if ($login->isUserLoggedIn() == true) {
	// the user is logged in. you can do whatever you want here.
	// for demonstration purposes, we simply show the "you are logged in" view.
		echo '<h3>' . $_SESSION['user_name'] . '&rsaquo;</h3>';
		include("login3/views/logged_in.php");
		if ($login->getPermission() > 0){
			include("login3/views/logged_in_as_admin.php");
		};
	} else {
	// the user is not logged in. you can do whatever you want here.
	// for demonstration purposes, we simply show the "you are not logged in" view.
		echo '<h3>Bejelentkezés &rsaquo;</h3>';
		include("login3/views/not_logged_in.php");
	}
?>