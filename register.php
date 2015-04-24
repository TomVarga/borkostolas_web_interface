<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="hu">
<head>
	<link href="favicon.ico" rel="icon" type="image/x-icon" />
	<title>Borkóstolás</title>
	<meta http-equiv="content-type" content="application/xhtml; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen, print, projection" />
</head>


<body>
<div id="wrapper">
	<!--HEADER/LOGO-->
	<div id="header">
		<div id="logo">
			<img src="resources/images/header_image.jpg" alt="Fejléc kép" class="headerImage" />
			<h1>Borkóstolás</h1>
		</div>

		<!--TAB NAVIGATION-->
		<div id="topnav">
			<a href="index.php">Főoldal</a>
			<a href="borkostolasEredmenyek.php">Eredmények</a>
			<a href="demo.php">Demó</a>
			<a href="modszerek.php">Módszerek</a>
			<a href="kapcsolat.php">Kapcsolat</a>
		</div>
	</div>

	<div id="contentWrapper">
		<!--SIDE BAR CONTENT-->
		<?php include('sidebar.php'); ?>

		<!--MAIN CONTENT-->
		<div id="content">
			<h2>Regisztráció &rsaquo;</h2>
			<?php
			require_once('login3/config/config.php');
			require_once('login3/translations/hu.php');
			require_once('login3/libraries/PHPMailer.php');
			@require_once('login3/classes/Registration.php');
			$registration = new Registration();
			include('login3/views/register.php');
			?>
		</div>
	</div>

	<!--THE FOOTER-->
	<?php include('footer.php'); ?>
</div>
</body>
</html>
