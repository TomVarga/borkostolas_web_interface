<?php
	// include 'mathHelpers.php';
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

	function calculatePrecedence($array){
		$nKostolok = $array[0]; // number of tasters
		$nBorok = $array[1]; // number of wines tasted
		//	array[2] contains the name of the algorithm
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

		$nCounter = 0;
		$tOrderOfTasters = Array();
		foreach($tData as $sTaster => $tDataForTaster){
			$tOrderOfTasters[$nCounter] = $sTaster;
			$nCounter = $nCounter + 1;
		}

		$ertekelesek = $tData;
		print_r($ertekelesek);;

		// $tabla; // ez tarolja a kiindulasi ertekeket, ezt kapja meg a PAGERANK
		// $kostol1;
		// $kostol2;
		// for ( $i = 1; $i <= $nKostolok; $i++ ) {
		// 	for ( $j = $i; $j <= $nKostolok; $j++ ) {
		// 		if ( $i != $j ) {
		// 			$tabla[$i][$j] = 0;

		// 			$egyik;
		// 			$masik;
		// 			for( $k=0;$k<$nBorok;++$k){
		// 				$egyik[$k] = $ertekelesek[$tOrderOfTasters[$i]][$k];
		// 				$masik[$k] = $ertekelesek[$tOrderOfTasters[$j]][$k];
		// 			}

		// 			$tabla[$i][$j] = precedence_sim( $egyik, $masik ); break;
		// 			$tabla[$j][$i] = $tabla[$i][$j];

		// 		} else {
		// 			$tabla[$i][$j] = 0; /// ide jon a delta ertek
		// 		}
		// 	}
		// }

		// $eredmeny = array();
		// for($i = 1; $i <= $nKostolok; ++$i)
		// 	$eredmeny[$i] = 1.0/$nKostolok;

		// //tabla atalakitasa

		// for($i=1;$i<=$nKostolok;++$i){  //soronként
		// 	$sum = 0;
		// 	for($j=1;$j<=$nKostolok;++$j)
		// 		$sum += $tabla[$i][$j];
			
		// 	for($j=1;$j<=$nKostolok;++$j){
		// 		$tabla[$i][$j] *= 0.85/$sum;
		// 		$tabla[$i][$j] += 0.15/$nKostolok;
		// 	}
		// }

		// while(true){
		// 	$orig = array();
		// 	for($i = 1; $i <= $nKostolok; ++$i){
		// 		$orig[$i] = $eredmeny[$i];
		// 		$eredmeny[$i] = 0;
		// 	}
			
		// 	for($i = 1; $i <= $nKostolok; ++$i)
		// 		for($j = 1; $j <= $nKostolok; ++$j)
		// 			$eredmeny[$i] += $orig[$j] * $tabla[$j][$i];
				
		// 		$dif = 0;
		// 		for($i = 1; $i <= $nKostolok; ++$i)
		// 			$dif += ($orig[$i]-$eredmeny[$i]) * ($orig[$i]-$eredmeny[$i]);
		// 		$dif /= $nKostolok;
		// 		if($dif < 0.0001)
		// 			break;
		// }


		// echo print_r($eredmeny);
//----------------------
// ADATBAZISOS

//----------------------
// $db_host='pdb14.awardspace.net:3306' ;
// $db_database='1637366_bor' ;
// $db_username='1637366_bor' ;
// $db_password='^Fc0wfbX6C@nHMF3am%q' ;
// $kapcsolat = mysql_connect($db_host, $db_username, $db_password) ;
// mysql_select_db($db_database);
// $keres="set CHARACTER SET utf8" ;
// mysql_query($keres) ;
// function unescape($s) {
// 	$mit=array('%u0151','%u0171','%u0150','%u0170',chr(246),chr(252),chr(243),chr(250),chr(233),chr(225),chr(237), chr(214),chr(220),chr(211),chr(218),chr(201),chr(193),chr(205)) ;
// 	$mire=array('┼Ĺ','┼▒','┼É','┼░','├Â','├╝','├│','├║','├ę','├í','├ş','├ľ','├ť','├ô','├Ü','├ë','├ü','├Ź') ;
// 	$s=str_replace($mit,$mire,$s) ;
// 	return $s;
// }
// function edecode($s) {
// 	$mit=array('%m','%o','%u','%z','%q','%w','%s','%p','%i','%M','%O','%U','%Z','%Q','%W','%S','%D','%I','%h','%k','%-');
// 	$mire=array('├ę','├Â','├╝','├│','├í','┼Ĺ','├║','┼▒','├ş','├ë','├ľ','├ť','├ô','├ü','┼É','├Ü','┼░','├Ź','&','#','+') ;
// 	$s=str_replace($mit,$mire,$s) ;
// 	return $s;
// }
// $testid = 3;
// $keres = "SELECT * FROM bor WHERE id=3";
// $eredmeny = mysql_query($keres);

// 		// print_r($eredmeny);;
// 	$ertekelesek;
//     for( $i = 1;$i<=$nKostolok;++$i)
//       for( $j = 1;$j<=$nBorok;++$j)
//         // $ertekelesek[$i][$j] = 0;


//     while( $ertek = mysql_fetch_array($eredmeny,MYSQL_NUM)){
//       $ertekelesek[$ertek[1]][$ertek[2]] = $ertek[3];
//       // print_r($ertek[2] . " ");;
//      }

//       // print_r($ertekelesek);


// 		$n_kostolo = 0;
//   	$n_bor = 0;
//   	$keres = "SELECT DISTINCT nidx, pw FROM tester, bor WHERE nidx=nid AND id=3 ORDER BY nidx";

//  	$eredmeny = mysql_query($keres);
//   	$kostolok = array();
//   	$nevek = array();
//   	while ( $kostolo = mysql_fetch_array($eredmeny, MYSQL_NUM) ) {
//     	$kostolok[] = $kostolo[0];
//     	$nevek[] = $kostolo[1];
//     	$n_kostolo++;
// 	}
// 		print_r($kostolok);;

//     $tabla; // ez tarolja a kiindulasi ertekeket, ezt kapja meg a PAGERANK

//     for ( $i = 1; $i <= $n_kostolo; $i++ ) {
//       for ( $j = $i; $j <= $n_kostolo; $j++ ) {
//         if ( $i != $j ) {
//           $tabla[$i][$j] = 0;
         
         
         
//           $egyik;
//           $masik;
          
//           for( $k=0;$k<$nBorok;++$k){
// //            $egyik[$k] = $ertekelesek[$i+$min_nid][$k];
// //            $masik[$k] = $ertekelesek[$j+$min_nid][$k];
//             $egyik[$k] = $ertekelesek[$kostolok[$i]][$k];
//             $masik[$k] = $ertekelesek[$kostolok[$j]][$k];
//           }
//           switch ( 'precedence' ) {
//             case "sajat": $tabla[$i][$j] = kostol_diff( $egyik, $masik, $parlist[3], $parlist[4] ); break;
//             case "hamming": $tabla[$i][$j] = $n_bor - hamming_dist( $egyik, $masik); break;
            
//             case "jaccard": $tabla[$i][$j] = jaccard_sim( $egyik, $masik ); break;
            
//             case "cosine" : $tabla[$i][$j] = cosine_sim( $egyik, $masik ); break;
            
//             case "precedence" : $tabla[$i][$j] = precedence_sim( $egyik, $masik ); break;
            
//             case "adjacency" : $tabla[$i][$j] = adjacency_sim( $egyik, $masik ); break;
            
//             case "positional": $tabla[$i][$j] = positional_sim( $egyik, $masik ); break;
            
//             case "swapping": $tabla[$i][$j] = swapping_sim( $egyik, $masik ); break;
            
//             default: $s.= "hello";
//           }
//           $tabla[$j][$i] = $tabla[$i][$j];
//       }else{
//       	$tabla[$i][$j] = 0;
//       }
//   }
// 		}
// $eredmeny = array();
// for($i = 1; $i <= $n_kostolo; ++$i)
//   $eredmeny[$i] = 1.0/$n_kostolo;
  


// //tabla atalakitasa


// for($i=1;$i<=$n_kostolo;++$i){  //soronként
//   $sum = 0;
//   for($j=1;$j<=$n_kostolo;++$j)
// 	$sum += $tabla[$i][$j];
	
//   for($j=1;$j<=$n_kostolo;++$j){
//     $tabla[$i][$j] *= 0.85/$sum;
// 	$tabla[$i][$j] += 0.15/$n_kostolo;
//   }
// }

// while(true){
//   $orig = array();
//   for($i = 1; $i <= $n_kostolo; ++$i){
//     $orig[$i] = $eredmeny[$i];
// 	$eredmeny[$i] = 0;
//   }
	
  
	
//   for($i = 1; $i <= $n_kostolo; ++$i)
//     for($j = 1; $j <= $n_kostolo; ++$j)
// 	  $eredmeny[$i] += $orig[$j] * $tabla[$j][$i];
		
//   $dif = 0;
//   for($i = 1; $i <= $n_kostolo; ++$i)
//     $dif += ($orig[$i]-$eredmeny[$i]) * ($orig[$i]-$eredmeny[$i]);
//   $dif /= $n_kostolo;
//   if($dif < 0.0001)
//     break;
// }

  	// print_r($eredmeny);


 }




// Array (
// 	[borasz1] => Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [4] => 5 )
// 	[borasz3] => Array ( [0] => 1 [1] => 2 [2] => 4 [3] => 3 [4] => 5 )
// 	[borasz2] => Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 5 [4] => 4 )
// 	[borasz6] => Array ( [0] => 5 [1] => 4 [2] => 3 [3] => 2 [4] => 1 )
// 	[borasz5] => Array ( [0] => 4 [1] => 3 [2] => 2 [3] => 1 [4] => 5 )
// 	[borasz4] => Array ( [0] => 1 [1] => 2 [2] => 4 [3] => 5 [4] => 3 )
// 	[sdfsdfsd] => Array ( [0] => 3 [1] => 23 [2] => 2 [3] => 2 [4] => 2 )

// 	[1] => Array ( [1] => 0 [2] => 0 [3] => 0 [4] => 0 [5] => 0 )
// 	[2] => Array ( [1] => 0 [2] => 0 [3] => 0 [4] => 0 [5] => 0 )
// 	[3] => Array ( [1] => 0 [2] => 0 [3] => 0 [4] => 0 [5] => 0 )
// 	[4] => Array ( [1] => 0 [2] => 0 [3] => 0 [4] => 0 [5] => 0 )
// 	[5] => Array ( [1] => 0 [2] => 0 [3] => 0 [4] => 0 [5] => 0 )
// 	[6] => Array ( [1] => 0 [2] => 0 [3] => 0 [4] => 0 [5] => 0 )
// 	[7] => Array ( [1] => 0 [2] => 0 [3] => 0 [4] => 0 [5] => 0 )
// 	[133] => Array ( [2] => 2 [3] => 3 [4] => 4 [5] => 5 [1] => 1 )
// 	[134] => Array ( [1] => 1 [2] => 2 [3] => 3 [4] => 5 [5] => 4 )
// 	[135] => Array ( [5] => 5 [4] => 3 [3] => 4 [2] => 2 [1] => 1 )
// 	[136] => Array ( [1] => 1 [2] => 2 [3] => 4 [4] => 5 [5] => 3 )
// 	[137] => Array ( [1] => 4 [2] => 3 [3] => 2 [4] => 1 [5] => 5 )
// 	[138] => Array ( [1] => 5 [2] => 4 [3] => 3 [4] => 2 [5] => 1 )
// 	[148] => Array ( [1] => 3 [2] => 23 [3] => 2 [4] => 2 [5] => 2 )
// )


?>