<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="hu">
<head>
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
			<a href="kapcsolat.php" class="active">Kapcsolat</a>
		</div>
	</div>
	<div id="contentWrapper">
		<!--SIDE BAR CONTENT-->
		<?php include('sidebar.php'); ?>
		<!--MAIN CONTENT-->
		<div id="content">

			<h2> Kapcsolat &rsaquo;</h2>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
			</p>
		</div>
	</div>

	<!--THE FOOTER-->
	<?php include('footer.php'); ?>
</div>
</body>
</html>
