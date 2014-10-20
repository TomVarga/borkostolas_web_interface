<?php
	function stdev(array $a) {
		// algorithm used: http://office.microsoft.com/hu-hu/excel-help/szoras-fuggveny-HP010335660.aspx
		$nSum = array_sum($a);
		$nAvg = $nSum / count($a);
		$nSumOfDeviationFromAvg = 0;
		foreach($a as $key => $value){
			$nSumOfDeviationFromAvg = $nSumOfDeviationFromAvg + pow(($nAvg - $value),2);
		}
		$divisor = 1;
		if ((count($a)-1) != 0){
			$divisor = count($a)-1;
		}
		return sqrt($nSumOfDeviationFromAvg/$divisor);
	}
	function korrelByTaster($sTaster, $tData, $tTasterAvgScore, $tItemAvg){
		// algorithm used: http://office.microsoft.com/hu-hu/excel-help/korrel-fuggveny-HP010342332.aspx
		// build avg table for taster from  $tItemAvg excluding items that taster didn't taste
		$tTasterSpecificItemAvg = Array();
		foreach ($tItemAvg as $sItem => $nItemAvg) {
			if (empty($tData[$sTaster][$sItem]) == false){
				$tTasterSpecificItemAvg[$sItem] = $nItemAvg;
			}
		}
		
		$nTasterAvg = $tTasterAvgScore[$sTaster];
		$nAvgAvg = array_sum($tTasterSpecificItemAvg) / count($tTasterSpecificItemAvg);
		$nDivident = 0;
		$nTasterPartSquared = 0;
		$nAvgPartSquared = 0;
		foreach($tData as $sTasterName => $tScores){
			if ($sTasterName == $sTaster) {
				foreach ($tScores as $sItem => $nScore) {
					if (empty($nScore) == false) {
						$nDivident = $nDivident + ($nScore-$nTasterAvg)*($tTasterSpecificItemAvg[$sItem]-$nAvgAvg);
						$nTasterPartSquared = $nTasterPartSquared + pow($nScore-$nTasterAvg,2);
						$nAvgPartSquared = $nAvgPartSquared + pow($tTasterSpecificItemAvg[$sItem]-$nAvgAvg,2);
					}
				}
				
			}
		}
		$nReturn = 0;
		if (!($nTasterPartSquared == 0 || $nAvgPartSquared == 0)){
			$nReturn = $nDivident/sqrt($nTasterPartSquared*$nAvgPartSquared);
		}
		return $nReturn;
	}

	function calculateHITS($array){
		$nKostolok = $array[0]; // number of tasters
		$nBorok = $array[1]; // number of wines tasted
		//  array[2] contains the name of the algorithm
		// after array[2] rest are the data in continous indexed array ( sorfolytonoan ) so it needs to be parsed
		$tData = Array();
		$bRowDone = true;
		$sKostolo = "";
		$nBor = 0;
		for ($i=3; $i < sizeof($array); $i++) {
			if ($bRowDone) {
				$sKostolo = $array[$i];
				$nBor = 0;
				$tData[$sKostolo] = Array();
				$bRowDone = false;
			} else {
				$tData[$sKostolo][$nBor] = $array[$i];
				$nBor = $nBor + 1;
				if ($nBor == $nBorok){
					$bRowDone = true;
				}
			}
		}

		$tSumByTaster = Array();
		foreach($tData as $sTaster => $tScores){
			$tSumByTaster[$sTaster] = array_sum($tScores);
		}

		$tItemScores = Array();
		foreach($tData as $sTaster => $tScores){
			if (empty($sTaster) == false){
				foreach($tScores as $sItem => $sScore){
					if (empty($tItemScores[$sItem])){
						$tItemScores[$sItem] = Array();
					}
					if (empty($sScore) == false){
						array_push($tItemScores[$sItem], $sScore);
					}
				}
			}
		}

		$tItemAvg = Array();
		foreach($tItemScores as $sItem => $tScores){
			$tItemAvg[$sItem] = array_sum($tScores)/count($tScores);
		}

		$tTasterAvgScore = Array();
		foreach($tData as $sTaster => $tScores){
			if (empty($sTaster) == false){
				$nScoredItems = 0;
				if (empty($tTasterAvgScore[$sTaster])){
					$tTasterAvgScore[$sTaster] = 0;
				}
				foreach($tScores as $sItem => $sScore){
					if (empty($sScore) == false) {
						$nScoredItems++;
						$tTasterAvgScore[$sTaster] = $tTasterAvgScore[$sTaster] + $sScore;
					}
				}
				$tTasterAvgScore[$sTaster] = $tTasterAvgScore[$sTaster] / $nScoredItems;
			}
		}

		$tItemDeviation = Array();
		foreach($tItemScores as $sItem => $tScores){
			if (empty($sItem) == false){
				$tItemDeviation[$sItem] = stdev($tScores);
			}
		}

		$tWRight = Array();
		foreach ($tData as $sTaster => $tScores) {
			if (empty($sTaster) == false){
				if (empty($tWRight[$sTaster])){
					$tWRight[$sTaster] = Array();
				}
				foreach ($tScores as $sItem => $nScore) {
					if (empty($nScore) ){
						$tWRight[$sTaster][$sItem] = 0;
					}else{
						$tWRight[$sTaster][$sItem] = $nScore/$tSumByTaster[$sTaster];
					}
				}
			}
		}

		$tDiffFromAvg = Array();
		foreach ($tData as $sTaster => $tScores) {
			if (empty($sTaster) == false){
				if (empty($tDiffFromAvg[$sTaster])){
					$tDiffFromAvg[$sTaster] = Array();
				}
				foreach ($tScores as $sItem => $nScore) {
					if (empty($nScore) ){
						$tDiffFromAvg[$sTaster][$sItem] = 0;
					}else{
						$tDiffFromAvg[$sTaster][$sItem] = abs($tItemAvg[$sItem]-$nScore);
					}
				}
			}
		}

		$tDiffFromAvgByItem = Array();
		foreach($tDiffFromAvg as $sTaster => $tScores){
			if (empty($sTaster) == false){
				foreach($tScores as $sItem => $sScore){
					if (empty($tDiffFromAvgByItem[$sItem])){
						$tDiffFromAvgByItem[$sItem] = Array();
					}
					if (empty($sScore) == false){
						array_push($tDiffFromAvgByItem[$sItem], $sScore);
					}
				}
			}
		}

		$tWLeft = Array();
		foreach ($tDiffFromAvg as $sTaster => $tScores) {
			if (empty($sTaster) == false){
				if (empty($tWLeft[$sTaster])){
					$tWLeft[$sTaster] = Array();
				}
				foreach ($tScores as $sItem => $nScore) {
					if (empty($nScore) ){
						$tWLeft[$sTaster][$sItem] = 0;
					}else{
						$tWLeft[$sTaster][$sItem] = (array_sum($tDiffFromAvgByItem[$sItem])-$nScore)/((count($tItemScores[$sItem])-1)*array_sum($tDiffFromAvgByItem[$sItem]));
					}
				}
			}
		}

		$tSumOfDiffFromAvg = Array();
		foreach($tDiffFromAvg as $sTaster => $tScores){
			$tSumOfDiffFromAvg[$sTaster] = array_sum($tScores);
		}

		// $transposed_array = Array();
		// if ($array) {
		// 	foreach ($array as $row_key => $row) {
		// 		if (is_array($row) && !empty($row)) { //check to see if there is a second dimension
		// 			foreach ($row as $column_key => $element) {
		// 				$transposed_array[$column_key][$row_key] = $element;
		// 			}
		// 		}else {
		// 			$transposed_array[0][$row_key] = $row;
		// 		}
		// 	}
		// 	return $transposed_array;
		// }

		// $b = transpose($);;

		$tCorrelation = Array();
		foreach ($tData as $sTaster => $tDataForTaster) {
			$tCorrelation[$sTaster] = korrelByTaster($sTaster, $tData, $tTasterAvgScore, $tItemAvg);
		}

		$tSumOfDiff = Array();
		$nMinOfSumOffDiffFromAvg = min($tSumOfDiffFromAvg);
		foreach ($tSumOfDiffFromAvg as $sTaster => $value) {
			if ($value == 0){ // XXX division by zero hack
				$tSumOfDiff[$sTaster] = 0;
			}else{
				$tSumOfDiff[$sTaster] = ($nMinOfSumOffDiffFromAvg/$value);
			}
		}

		$nCounter = 0;
		$tOrderOfTasters = Array();
		foreach($tData as $sTaster => $tDataForTaster){
			$tOrderOfTasters[$nCounter] = $sTaster;
			$nCounter = $nCounter + 1;
		}

		$nCounter = 0;
		$tWRightData = Array();
		foreach($tWRight as $sTaster => $tData){
			$tWRightData[$nCounter] = $tData;
			$nCounter = $nCounter + 1;
		}

		$nCounter = 0;
		$tWLeftData = Array();
		foreach($tWLeft as $sTaster => $tData){
			$tWLeftData[$nCounter] = $tData;
			$nCounter = $nCounter + 1;
		}

		function transpose($array) {
			array_unshift($array, null);
			return call_user_func_array('array_map', $array);
		}

		function flipDiagonally($arr) {
			$out = array();
			foreach ($arr as $key => $subarr) {
				foreach ($subarr as $subkey => $subvalue) {
					$out[$subkey][$key] = $subvalue;
				}
			}
			return $out;
		}

		$tWLeftTransposed = flipDiagonally($tWLeftData);

		function matrixmult($m1,$m2){
			$r=count($m1);
			$c=count($m2[0]);
			$p=count($m2);
			if(count($m1[0])!=$p){throw new Exception('Incompatible matrixes');}
			$m3=array();
			for ($i=0;$i< $r;$i++){
				for($j=0;$j<$c;$j++){
					$m3[$i][$j]=0;
					for($k=0;$k<$p;$k++){
						$m3[$i][$j]+=$m1[$i][$k]*$m2[$k][$j];
					}
				}
			}
			return($m3);
		}

		$tWRightMultipliedBytWLeftTransposed = matrixmult($tWRightData, $tWLeftTransposed);

		// function stationary($A){
		// 	$M = sizeof($A);
		// 	$N = sizeof($A[0]);
		// 	if ($M != $N){throw new Exception('Matrix A not square');}

		// }

		// echo stationary($tWRightMultipliedBytWLeftTransposed);
		// echo print_r($tWRightMultipliedBytWLeftTransposed);

		// echo "
		// <script>
		// 	eig($tWRightMultipliedBytWLeftTransposed);
		// </script>
		// ";
		// return with this so eigs can be calculated with javascript then another php file will continue the other calculations
		$tTemp = Array();;
		$tTemp["matrix"] = $tWRightMultipliedBytWLeftTransposed;
		$nCounter = 0;
		$tCorrelationIndexed = Array();;
		foreach ($tCorrelation as $sTaster => $value) {
			$tCorrelationIndexed[$nCounter] = $value;
			$nCounter = $nCounter + 1;
		}
		$tTemp["tCorrelation"] = $tCorrelationIndexed;
		$nCounter = 0;
		$tSumOfDiffIndexed = Array();;
		foreach ($tSumOfDiff as $sTaster => $value) {
			$tSumOfDiffIndexed[$nCounter] = $value;
			$nCounter = $nCounter + 1;
		}
		$tTemp["tSumOfDiff"] = $tSumOfDiffIndexed;
		$tTemp["tOrderOfTasters"] = $tOrderOfTasters;

		echo json_encode($tTemp);

		// do an AJAX call here and use javascript to calculate the eigenvalues and vector so we don't strain the server

	}
?>
