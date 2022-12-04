<?php

require_once "App/init.php";

$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Unchart", "Neil Druckmann", "Sony Computer", 250000, 50);

// // instansiasi class CetakInfoProduk
// $cetakProduk = new CetakInfoProduk();
// $cetakProduk->tambahProduk($produk1);
// $cetakProduk->tambahProduk($produk2);
// echo $cetakProduk->cetak();


// sebelum ada namespace
// new User();		// ini akan error karena php akan bingung maksudnya class "User" yg mana

// namespace
// new App\Service\User();     // ini akan mengambil kelas user dari package Service
// echo "<hr>";
// new \App\Produk\User();     // ini akan mengambil kelas user dari package Produk

// Alias dari namespace (digunkaan ketika nama namespacenya panjang)
// use App\Produk\User;
// new User();    // ini akan mengambil kelas user yang ada di package Produk

// new App\Service\User();    // ini aka mengambil kelas user yang ada di package Service

// -----------------------------------------------------------------
use App\Produk\User as ProdukUser;    // untuk membuat alias dari kelas user yang ada di package Produk
new ProdukUser();
echo "<br>";

use App\Service\User as ServiceUser;    // untuk membuat alias dari kelas user yang ada di package Service
new ServiceUser();
