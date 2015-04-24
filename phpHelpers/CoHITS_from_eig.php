<?php
function flipDiagonally($arr) {
	$out = array();
	foreach ($arr as $key => $subarr) {
		foreach ($subarr as $subkey => $subvalue) {
			$out[$subkey][$key] = $subvalue;
		}
	}
	return $out;
}

function getLastIndexOfLargestInArray($A){
	$Asorted = $A;
	sort($Asorted);
	$nMaxIndex = (sizeof($A)-1);
	$nMax = $Asorted[$nMaxIndex];

	for ($i = $nMaxIndex; $i >= 0; $i--){
		if ($nMax == $A[$i]){
			return $i;
		}
	}
}

function getArrayColumnByIndex($A, $nCol){
	$tTemp = Array();
	for ($i=0; $i < sizeof($A); $i++){
		$tTemp[$i] = $A[$i][$nCol];
	}
	return $tTemp;
}

$str=$_REQUEST["q"];
$array = json_decode($str);

$V = $array->{"E"}->{"x"};
$D = $array->{"lambda"}->{"x"};


$tp = getLastIndexOfLargestInArray($D);

$tLastColWithMaxValueInIt = getArrayColumnByIndex($V, $tp);
$nSumOFtLastColWithMaxValueInIt = array_sum($tLastColWithMaxValueInIt);
$PI = Array();
foreach ($tLastColWithMaxValueInIt as $key => $value) {
	$PI[$key] = $value/$nSumOFtLastColWithMaxValueInIt;
}
echo json_encode($PI);
?>
