<?php
	// include 'mathHelpers.php';

	function calculateHAMMING($array){
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

		echo print_r($tData);
	}
?>
