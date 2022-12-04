<?php 
function create_time_range( $end = "13 Nov 2021" , $interval = "30 mins", $format = "12"){
	$startTime = strtotime("12 Nov 2021");
	$endTime = strtotime($end);
	$returnTimeFormat = ($format == "12")?"g:i:s A":"G:i:s";
	$current = time();
	$addTime = strtotime("+".$interval, $current); //1632116081 (detik sekarang di tambah dengan 30 menit atau 1800 detik)
	$diff = $addTime - $current;
	$times = array();
	while ($startTime < $endTime){
		$times[] = date($returnTimeFormat, $startTime);
		$startTime += $diff;
	}
	return $times;
}


// var_dump (create_time_range("7:00", "19:00","40 mins"));
var_dump (create_time_range());
?>