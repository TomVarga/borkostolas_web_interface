<?php
	include 'HITSstart.php';
	include 'HammingStart.php';
	include 'precedenceStart.php';

	$str=$_REQUEST["q"];
	$array = json_decode($str);

	$sAlgoritmus = $array[2];

	if ($sAlgoritmus == "hits"){
		calculateHITS($array);
	} else if ($sAlgoritmus == 'valami'){
		calculatePrecedence($array);
	}
?>
