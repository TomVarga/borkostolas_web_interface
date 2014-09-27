<?php
	include 'HITSstart.php';
	include 'calculateGivenAlgorithm.php';

	$str=$_REQUEST["q"];
	$array = json_decode($str);

	$sAlgoritmus = $array[2];

	if ($sAlgoritmus == "hits"){
		calculateHITS($array);
	} else {
		calculateGivenAlgorithm($array);
	}
?>
