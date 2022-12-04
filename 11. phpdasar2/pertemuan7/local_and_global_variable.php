<?php 
// variabel scope / lingkup variabel
// variabel lokal dan variabel global
$x = 10; //variabel lokal untuk halaman ini
$y = "Variabel lokal";

function tampilX(){
	global $y;
	$x = 20; // variabel lokal untuk function ini saja
	echo $x." ";
	echo $y;
}

tampilX();
echo "<br>";
echo $x;


?>