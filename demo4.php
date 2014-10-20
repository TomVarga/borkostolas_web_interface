<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="hu">
<head>
	<title>Borkóstolás</title>
	<meta http-equiv="content-type" content="application/xhtml; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="style.css" media="screen, print, projection" />
		<!-- <script type="text/javascript" src="https://www.google.com/jsapi"></script> -->
		<script type="text/javascript" src="Chart.min.js"></script>
		<script type="text/javascript" src="Legend.js"></script>
		<script type="text/javascript" src="http://numericjs.com/lib/numeric-1.2.6.min.js"></script>
</head>


<body>
	<div id="wrapper">
		<!--HEADER/LOGO-->
		<div id="header">
			<div id="logo">
				<img src="header_image.jpg" alt="Fejléc kép" class="headerImage" />
				<h1>Borkóstolás</h1>
			</div>

			<!--TAB NAVIGATION-->
			<div id="topnav">
				<a href="index.html">Főoldal</a>
				<a href="borkostolasEredmenyek.html">Eredmények</a>
				<a href="demo.html" class="active">Demó</a>
				<a href="modszerek.html">Módszerek</a>
				<a href="kapcsolat.html">Kapcsolat</a>
			</div>
		</div>

		<div id="contentWrapper">
			<!--SIDE BAR CONTENT-->
			<div id="sidebar">
				<div id="container2">
					<div class="blocklinks">
						<h3>Bejelentkezés &rsaquo;</h3>
						<?php
						require_once('login3/config/config.php');
						require_once('login3/translations/hu.php');
						require_once('login3/libraries/PHPMailer.php');
						require_once('login3/classes/Login.php');
						$login = new Login();
						if ($login->isUserLoggedIn() == true) {
							// the user is logged in. you can do whatever you want here.
							// for demonstration purposes, we simply show the "you are logged in" view.
							include("login3/views/logged_in.php");

						} else {
							// the user is not logged in. you can do whatever you want here.
							// for demonstration purposes, we simply show the "you are not logged in" view.
							include("login3/views/not_logged_in.php");
						}


						?>
						<br />
						<h3>Legfrisseb információk &rsaquo;</h3>
						<a href="#" class="link">Az még nincs</a>
						<a href="#" class="link">sajnos.</a>
						<br />
						<h3>Linkek &rsaquo;</h3>
						<a href="http://www.inf.u-szeged.hu/~london/" class="link">London András honlapja</a>
						<a href="http://www.inf.u-szeged.hu/~csendes/" class="link">Csendes Tibor honlapja</a>
					</div>
				</div>
			</div>
			<!--MAIN CONTENT-->
			<div id="content">
				<h2> Demó &rsaquo;</h2>
				<p>
					<a href="#" id="test" onclick="test()">Teszt adatok használata</a><br />
					<a href="#" id="probaketto" onclick="probaketto()">Teszt proba 2</a><br />
					<a href="#" id="probaharom" onclick="probaharom()">Teszt proba 3</a><br />
					<br />
					Kóstolók száma:
					<input type="text" id="kostolok" name="Kóstolók száma" class="headerInput" value=""><br />
					Borok száma:
					<input type="text" id="borok" name="Borok száma" class="headerInput" value=""><br />
					Algoritmus:
					<select id="algoritmus" name="Algoritmus">
						<option value="hits">Co_HITS</option>

						<option value="hamming">Hamming</option>
						<option value="cosine">Koszinusz</option>
						<option value="precedence">Precedencia</option>
						<option value="adjacency">Összefüggőségi</option>
						<option value="positional">Pozíció szerint</option>
						<option value="sajat">Saját</option>
					</select>
					<br />
					<a href="#" id="matrixGenerator" onclick="addMatrix()">Beviteli mezők generálása</a><br />
					<br />
				</p>
				<div id="inputMatrix"></div>
				<div id="submitMatrix"></div>
				<div id="result">
					<div id="textResult" class="textResult"></div>
					<div id="graph" class="graph"></div>
				</div>
			</div>
		</div>

		<!--THE FOOTER-->
		<div id="footer">
			<div id="footerText">
				<p>Készítette - 2014 Varga Tamás</p>
				&nbsp;
			</div>
		</div>
	</div>
</body>
</html>

