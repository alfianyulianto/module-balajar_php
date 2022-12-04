<?php

// require_once "Produk/InfoProduk.php";
// require_once "Produk/Produk.php";
// require_once "Produk/Komik.php";
// require_once "Produk/Game.php";
// require_once "Produk/CetakInfoProduk.php";
// require_once "Produk/User.php";

// require_once "Service/User.php";

// ini akan memanggil sebuah funsi ketika class yg ada di dalam folder Produk sudah di load
// fungsinya menerim parameter 
// di dalam fungsi akan memanggil semua klass yang ada di folder Produk;
// spl_autoload_register(function ($class) {
//   require_once "Produk/" . $class . ".php";     // error karena sekarang ada nama name space App\Produk\User.php. Untuk mengatasi itu parameter $clas harus kita pecah dulu dg explode dan ambil array terakhir
// });

spl_autoload_register(function ($class) {       // parameter $class akan memanggil semua kelas yang ada di folder Produk secara otomatis
  // $class berisi namespace App\Produk\User 
  $class = explode('\\', $class);     // ["App", "Produk", "User"]
  $class = end($class);       // User
  require_once __DIR__ . "/Produk/" . $class . '.php';
});
spl_autoload_register(function ($class) {       // parameter $class akan memanggil semua kelas yang ada di folder Service secara otomatis
  // $class berisi namespace App\Service\User 
  $class = explode('\\', $class);     // ["App", "Service", "User"]
  $class = end($class);       // User
  require_once __DIR__ . "/Service/" . $class . '.php';
});
