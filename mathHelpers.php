<?php
	function stdev(array $a) {
		// algorithm used: http://office.microsoft.com/hu-hu/excel-help/szoras-fuggveny-HP010335660.aspx
		$nSum = array_sum($a);
		$nAvg = $nSum / count($a);
		$nSumOfDeviationFromAvg = 0;
		foreach($a as $key => $value){
			$nSumOfDeviationFromAvg = $nSumOfDeviationFromAvg + pow(($nAvg - $value),2);
		}
		return sqrt($nSumOfDeviationFromAvg/(count($a)-1));
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
		return $nDivident/sqrt($nTasterPartSquared*$nAvgPartSquared);
	}
?>
