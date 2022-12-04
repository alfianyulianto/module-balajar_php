<?php
// require_once "App/Produk/InfoProduk.php";
// require_once "App/Produk/Produk.php";
// require_once "App/Produk/Komik.php";
// require_once "App/Produk/Game.php";
// require_once "App/Produk/CetakInfoProduk.php";


require_once "App/init.php";

$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Unchart", "Neil Druckmann", "Sony Computer", 250000, 50);

// instansiasi class CetakInfoProduk
$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);
echo $cetakProduk->cetak();
