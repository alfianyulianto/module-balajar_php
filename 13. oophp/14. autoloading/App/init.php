<?php
// FILE INIT : biasanya digunakan unut mengisialisasi semua class

// require_once "Produk/InfoProduk.php";
// require_once "Produk/Produk.php";
// require_once "Produk/Komik.php";
// require_once "Produk/Game.php";
// require_once "Produk/CetakInfoProduk.php";


// function __autoload($class)
// {
//     include $class . ".php";
// }

// ini akan memanggil sebuah fungsi ketika class yg ada di dalam folder Produk sudah di load
// fungsinya menerima parameter 
// di dalam fungsi akan memanggil semua klass yang ada di folder Produk;
// function autoload($class)
// {
//     require_once __DIR__ . "/Produk/" . $class . ".php";
// }
// spl_autoload_register(autoload("InfoProduk"));
// spl_autoload_register(autoload("Produk"));
// spl_autoload_register(autoload("Komik"));
// spl_autoload_register(autoload("Game"));
// spl_autoload_register(autoload("CetakInfoProduk"));

spl_autoload_register(function ($class) {       // parameter $class akan memanggil semua kelas yang ada di folder Produk secara otomatis
    // require_once "Produk/" . $class . '.php';
    require_once __DIR__ . "/Produk/" . $class . '.php';
});
