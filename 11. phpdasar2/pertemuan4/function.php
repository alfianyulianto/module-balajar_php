<?php 
// variabel yang dibuat di dalam function hanya berlaku di dalam function itu saja
function salam($waktu = "Datang", $nama = "Admin"){
	return "Selamat $waktu, $nama!";
}

function create_time_range($start, $end, $interval = "30 mins", $format = "12"){
	$startTime = strtotime($start);
	$endTime = strtotime($end);
	$returnTimeFormat = ($format == "12")?"g:i:s A":"G:i:s";
	$current = time();
	$addTime = strtotime("+".$interval, $current); //1632116081 
	$diff = $addTime - $current;
	$times = array();
	while ($startTime < $endTime){
		$times[] = date($returnTimeFormat, $startTime);
		$startTime += $diff;
	}
	return $times;
}
var_dump (create_time_range("7:00", "19:00","30 mins"));


?>
<!DOCTYPE html>
<html>
<head>
	<title>Latihan Function</title>
</head>
<body>
	<h1><?= salam("Pagi"); ?></h1>
</body>
</html>