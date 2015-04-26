<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="hu">
<head>
	<title>Borkóstolás</title>
	<meta http-equiv="content-type" content="application/xhtml; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="../css/androidstyle.css" media="screen, print, projection" />
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript" src="http://numericjs.com/lib/numeric-1.2.6.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="/js/Main.js"></script>
	<script type="text/javascript">
		$(window).on('load', function () {
			getMyScores();
		});
		google.load('visualization', '1.0', {'packages':['corechart']});
	</script>
</head>
<body>
<div id="content">
	<select id='algoritmus' name='Algoritmus' onchange='onSelectChange()' style="width: 100%;">
		<option value='hits'>Co_HITS</option>

		<option value='hamming'>Hamming</option>
		<option value='cosine'>Koszinusz</option>
		<option value='precedence'>Precedencia</option>
		<option value='adjacency'>Összefüggőségi</option>
	</select>
	<div id="user_id" hidden="true">
		<?php
		$user_id = $_REQUEST['user_id'];
		// XXX some debug stuff
		if (!isset($_REQUEST['user_id'])){
			$user_id = 3; // tom
		}
		print_r($user_id);
		?>
	</div>
	<div id="user_name" hidden="true">
		<?
		$user_name = "";
		include_once("dbUtils.php");
		$user_name = getUserName($user_id);
		print_r($user_name);
		?>
	</div>
	<div id="result">
		<div id="textResult" class="textResult"></div>
		<div id="graph" class="graph"></div>
		<div id="textResult2" class="textResult"></div>
		<div id="graph2" class="graph"></div>
	</div>
</div>
</body>
</html>