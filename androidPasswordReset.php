<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="hu">
<head>
	<link href="favicon.ico" rel="icon" type="image/x-icon" />
	<title>Borkóstolás</title>
	<meta http-equiv="content-type" content="application/xhtml; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="css/androidstyle.css" media="screen, print, projection" />
</head>


<body>

<!--MAIN CONTENT-->
<div id="content">
	<h2>Elfelejtett jelszó &rsaquo;</h2>
	<?php
	require_once('login3/config/config.php');
	require_once('login3/translations/hu.php');
	require_once('login3/libraries/PHPMailer.php');

	@require_once('login3/classes/Login.php');
	$login = new Login();
	if ($login->passwordResetWasSuccessful() == true && $login->passwordResetLinkIsValid() != true) {
		include("login3/views/not_logged_in.php");

	} else {
		// show the request-a-password-reset or type-your-new-password form
		include("login3/views/password_reset.php");
	}
	?>
</div>

</body>
</html>
