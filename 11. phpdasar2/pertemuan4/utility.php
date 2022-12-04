<?php 
// var_dump("alfian");
// print_r("alfian");

$var = "Alfian";
// isset() : digunakan untuk mengecek apakah variabel sudah dibikin atau belum
// akan menghasilkan nilai boolean
// jika belum membuat variabel maka akan menghasilkan false
// tapi jika variabel tersebut sudah dibikin akan menghasilkan true
var_dump(isset($var));

// empty() : digunakan untuk mengecek apakah variabel kosong
// akan menghasilkan nilai boolean
// jika kosong maka bernilai true
var_dump(empty($var1));

// die() : digunakanuntuk memberhentikan program
// ketika ada fungsi die maka program dibawahnya tidak akan dieksekusi

// sleep() : untuk memberhentikan sementara
// sleep(seconds);
var_dump(sleep(0));

// unset() : mengubah variabel menjadi null
unset($var);

$bool = false;
// is_bool() : mengecek apakah nilai variabel bertipe boolean 
var_dump(is_bool($bool));

$arr = [1, 2, 3];
// is_array() : mengecek apakah variabel bertipe data array
var_dump(is_array($arr));

$float = 119.092;
// is_float() : mengecek apakah variabel bertipe data desimal
var_dump(is_float($float));

// is_int() : mengecek apakah variabel bertipe data integer
// is_null() : mengecek apakah variabel menjadi null
// is_string : mengecek apakah variabel bertipe data string

// intval : digunakan untuk mendapatkan nilai integer dari variabel
echo intval("budi santosa");




?>