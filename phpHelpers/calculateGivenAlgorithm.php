<?php
function kostol_diff( $arr_kostol1, $arr_kostol2, $alpha, $epsz ) {
	$count = count($arr_kostol1);
	$sum = 0;
	for ( $i=0; $i<$count; $i++ ) {
		$sum += pow(abs($arr_kostol1[$i] - $arr_kostol2[$i]), $alpha);
	}
	return (1 / ($epsz + $sum));
}
function hamming_dist( $arr_kostol1, $arr_kostol2) {
	$count = count($arr_kostol1);
	$d = 0;
	for ( $i = 0; $i < $count; ++$i ) {
		if ( $arr_kostol1[$i] != $arr_kostol2[$i] ) $d++;
	}

	return ($d);
}

function jaccard_sim( $arr_kostol1, $arr_kostol2 ) {
	$count = count($arr_kostol1);
	$dot = 0;
	$norma1 = 0;
	$norma2 = 0;
	for ( $i = 0; $i < $count; $i++ ) {
		$dot += $arr_kostol1[$i] * $arr_kostol2[$i];
		$norma1 += $arr_kostol1[$i] * $arr_kostol1[$i];
		$norma2 += $arr_kostol2[$i] * $arr_kostol2[$i];
	}
	$norma1 = sqrt( $norma1 );
	$norma2 = sqrt( $norma2 );


	return $dot / ( $norma1 * $norma2 - $dot );
}


function cosine_sim( $arr_kostol1, $arr_kostol2 ) {
	$count = count($arr_kostol1);
	$dot = 0;
	$norma1 = 0;
	$norma2 = 0;
	for ( $i = 0; $i < $count; $i++ ) {
		$dot += $arr_kostol1[$i] * $arr_kostol2[$i];
		$norma1 += $arr_kostol1[$i] * $arr_kostol1[$i];
		$norma2 += $arr_kostol2[$i] * $arr_kostol2[$i];
	}
	$norma1 = sqrt( $norma1 );
	$norma2 = sqrt( $norma2 );

	return $dot / ( $norma1 * $norma2 );

}

function precedence_sim( $arr_kostol1, $arr_kostol2 ) {
	$count = count( $arr_kostol1 );

	$precMatrix1;
	$precMatrix2;

	for ( $i = 0; $i < $count; $i++ ) {
		for ( $j = 0; $j < $count; $j++ ) {
			$precMatrix1[$i][$j] = 0;
			$precMatrix2[$i][$j] = 0;
		}
	}

	for ( $i = 0; $i < $count-1; $i++ ) {
		for ( $j = $i+1; $j < $count; $j++ ) {
			$precMatrix1[$arr_kostol1[$i]][$arr_kostol1[$j]] = 1;
			$precMatrix2[$arr_kostol2[$i]][$arr_kostol2[$j]] = 1;
		}
	}

	$nprec = 0;

	for ( $i = 0; $i < $count; $i++ ) {
		for ( $j = 0; $j < $count; $j++ ) {
			if ( $i != $j ) {
				if ( $precMatrix1[$i][$j] == 1 && $precMatrix2[$i][$j] == 1 ) {
					$nprec = $nprec + 1;
				}
			}
		}
	}

	return $nprec;	// ez most jóság, és nem távolság
}

function adjacency_sim( $arr_kostol1, $arr_kostol2 ) {
	$count = count( $arr_kostol1 );

	$adjMatrix1;
	$adjMatrix2;

	for ( $i = 0; $i < $count; $i++ ) {
		for ( $j = 0; $j < $count; $j++ ) {
			$adjMatrix1[$i][$j] = 0;
			$adjMatrix2[$i][$j] = 0;
		}
	}

	for ( $i = 0; $i < $count-1; $i++ ) {
		$adjMatrix1[$arr_kostol1[$i]-1][$arr_kostol1[$i+1]-1] = 1;
		$adjMatrix2[$arr_kostol2[$i]-1][$arr_kostol2[$i+1]-1] = 1;
	}

	$nadj = 0;

	for ( $i = 0; $i < $count; $i++ ) {
		for ( $j = 0; $j < $count; $j++ ) {
			if ( $i != $j ) {
				if ( $adjMatrix1[$i][$j] == 1 && $adjMatrix2[$i][$j] == 1 ) {
					$nadj = $nadj + 1;
				}
			}
		}
	}

	return $nadj;	// ez most jóság, és nem távolság
}

function positional_sim( $arr_kostol1, $arr_kostol2 ) {
	$count = count( $arr_kostol1 );

	$inv1;
	$inv2;
	// calculate the inverse array

	for ( $i = 0; $i < $count; $i++ ) {
		$j1 = $arr_kostol1[$i];
		$j2 = $arr_kostol2[$i];
		$inv1[$j1-1] = $i;
		$inv2[$j2-1] = $i;
	}

	$d = 0;
	for ( $i = 0; $i < $count; $i++ ) {
		$d = $d + abs( $inv1[$i] - $inv2[$i] );
	}

	return $count - $d +1;
}

function swapping_sim( $arr_kostol1, $arr_kostol2 ) {
	$count = count( $arr_kostol1 );

	$map = $arr_kostol2; // map[index] (=kostol2') ---> index (= sigma')

	for ( $i = 0; $i < $count; $i++ ) {
		for ( $j = 0; $j < $count; $j++ ) {
			if ( $arr_kostol1[$i] == $map[$j] ) {
				$sigma[$i] = $j;
			}
		}
	}
	$d = 0;
	for ( $j = 0; $j < $count; $j++ ) {
		$i_pi;
		$i_sigma;
		for ( $k = 0; $k < $count; $k++ ) {
			if ( $j == $arr_kostol1[$k] ) {
				$i_pi = $k;
				break;
			}
		}

		for ( $k = 0; $k < $count; $k++ ) {
			if ( $j == $sigma[$k] ) {
				$i_sigma = $k;
				break;
			}
		}

		if ( $i_sigma != $i_pi ) {
			do {
				$t = $arr_kostol1[$i_pi];
				if ( $i_pi == 0 ) {
					for ( $r = 1; $r < $count; $r++ ) {
						$arr_kostol1[$r-1] = $arr_kostol1[$r];
					}
					$arr_kostol1[$count-1] = $t;
					$i_pi = $count-1;
				} else {
					$arr_kostol1[$i_pi] = $arr_kostol1[$i_pi-1];
					$arr_kostol1[$i_pi-1] = $t;
				}
				$i_pi--;
				$d++;
			} while( $i_sigma != $i_pi );
		} // END if




	} // END FOR j


	return ($count-1)*($count-1) - $d;

}

// --- Eddíg kapott ez kapott kód credit: tnemeth

function calculateGivenAlgorithm($array){
	$nKostolok = $array[0]; // number of tasters
	$nBorok = $array[1]; // number of wines tasted
	$sAlgoritmus = $array[2]; //contains the name of the algorithm
	// after array[2] rest are the data in continous indexed array ( sorfolytonoan ) so it needs to be parsed
	$tData = Array();
	$bRowDone = true;
	$sKostolo = "";
	$nBor = 0;
	$nKostolo = 0;
	$tOrderOfTasters = Array();
	for ($i=3; $i < sizeof($array); $i++) {
		if ($bRowDone) {
			$sKostolo = $array[$i];
			$nBor = 0;
			$tData[$sKostolo] = Array();
			$bRowDone = false;
			$tOrderOfTasters[$nKostolo] = $sKostolo;
			$nKostolo = $nKostolo + 1;
		} else {
			$tData[$sKostolo][$nBor] = $array[$i];
			$nBor = $nBor + 1;
			if ($nBor == $nBorok){
				$bRowDone = true;
			}
		}
	}

	$ertekelesek;
	foreach($tData as $sTaster => $tDataForTaster){
		for ( $i = 0; $i < $nBorok; $i++ ){
			$ertekelesek[$sTaster][$i+1] = $tDataForTaster[$i];
		}
		// for ($i = 0, )
	}


	// $ertekelesek = $tData;
	// print_r($tOrderOfTasters);

	// --- Innentől kapott ez kapott kód, minimális módosítással credit: tnemeth
	$tabla; // ez tarolja a kiindulasi ertekeket, ezt kapja meg a PAGERANK

	for ( $i = 1; $i <= $nKostolok; $i++ ) {
		for ( $j = $i; $j <= $nKostolok; $j++ ) {
			if ( $i != $j ) {
				$tabla[$i][$j] = 0;

				$egyik;
				$masik;
				for( $k=0;$k<$nBorok;++$k){
					$egyik[$k] = $ertekelesek[$tOrderOfTasters[$i-1]][$k];
					$masik[$k] = $ertekelesek[$tOrderOfTasters[$j-1]][$k];
				}
				// print_r($egyik);
				switch ( $sAlgoritmus ) {
					case "sajat": $tabla[$i][$j] = kostol_diff( $egyik, $masik, $parlist[3], $parlist[4] ); break;
					case "hamming": $tabla[$i][$j] = $nBorok - hamming_dist( $egyik, $masik); break;

					case "jaccard": $tabla[$i][$j] = jaccard_sim( $egyik, $masik ); break;

					case "cosine" : $tabla[$i][$j] = cosine_sim( $egyik, $masik ); break;

					case "precedence" : $tabla[$i][$j] = precedence_sim( $egyik, $masik ); break;

					case "adjacency" : $tabla[$i][$j] = adjacency_sim( $egyik, $masik ); break;

					case "positional": $tabla[$i][$j] = positional_sim( $egyik, $masik ); break;

					case "swapping": $tabla[$i][$j] = swapping_sim( $egyik, $masik ); break;

					default: $s.= "hello";
				}
				$tabla[$j][$i] = $tabla[$i][$j];

			} else {
				$tabla[$i][$j] = 0; /// ide jon a delta ertek
			}
		}
	}
	// print_r($tabla);
	$eredmeny = array();
	for($i = 1; $i <= $nKostolok; ++$i)
		$eredmeny[$i] = 1.0/$nKostolok;

	//tabla atalakitasa

	for($i=1;$i<=$nKostolok;++$i){	//soronként
		$sum = 0;
		for($j=1;$j<=$nKostolok;++$j)
			$sum += $tabla[$i][$j];

		for($j=1;$j<=$nKostolok;++$j){
			// XXX division by 0 hack
			if ($sum == 0){
				$tabla[$i][$j] = 0;
			}else{
				$tabla[$i][$j] *= 0.85/$sum;
			}
			$tabla[$i][$j] += 0.15/$nKostolok;
		}
	}

	while(true){
		$orig = array();
		for($i = 1; $i <= $nKostolok; ++$i){
			$orig[$i] = $eredmeny[$i];
			$eredmeny[$i] = 0;
		}

		for($i = 1; $i <= $nKostolok; ++$i)
			for($j = 1; $j <= $nKostolok; ++$j)
				$eredmeny[$i] += $orig[$j] * $tabla[$j][$i];

		$dif = 0;
		for($i = 1; $i <= $nKostolok; ++$i)
			$dif += ($orig[$i]-$eredmeny[$i]) * ($orig[$i]-$eredmeny[$i]);
		$dif /= $nKostolok;
		if($dif < 0.0001)
			break;
	}

	$tReturnArray = Array();
	for ( $i = 1; $i <= $nKostolok; $i++ ){
		$tReturnArray[$tOrderOfTasters[$i-1]] = $eredmeny[$i];
	}

	echo json_encode($tReturnArray);

}

?>