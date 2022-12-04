<?php 
// Pertemuan 2 - PHP Dasar
// Sintak PHP

// Standar Output
// echo, print
// print_r
// var_dump

// echo "Alfian Yulianto";
// print "Alfian Yulianto";
// print_r("Alfian Yulianto");
// var_dump("Alfian Yulianto");

// echo 123;
// echo true;
// echo false;
// echo "Jum'at";

// Penulisan sintaks PHP
// 1. PHP di dalam HTML
// 2. HTML di dalam PHP

// Variabel dan Tipe Data
// Variabel
// tidak boleh diawali dengan angka, tapi boleh mengandung angka
$nama = "Alfian Yulianto";

// Interpolasi
// digunakan untuk mengecek apakah didalam string terdapat variabel atau tidak
echo "Hallo, nama saya $nama";
// echo 'Halo, nama saya $nama';

// Operator
// aritmatika
// + - * / %
// $x = 10;
// $y = 20;
// echo $x * $y;

// Penggabung string / concatenation / concat
// .
// $nama_depan = "Alfian";
// $nama_belakang = "Yulianto";
// echo $nama_depan . " " . $nama_belakang;

// Assignment / operator penegasan
// =, +=, -=. *=, /=, %=, .=
// $x = 1;
// $x += 5;
// echo $x;
// $nama = "Alfian";
// $nama .= " ";
// $nama .= "Yulianto";
// echo $nama;

// Perbandingan
// tidak mengecek tipe datanya
// <, >, <=, >=, ==, !=
// var_dump(1 > 5);
// var_dump(1 == "1");

// Identitas
// untuk mengecek tipe datanya
// ===, !==
// var_dump(1 === "1");


// Logika
// &&, ||, !
// OR jika keduanya false maka hasilnya false, dan jika salah satunya ture maka hasilnya true
// AND jika keduanya false maka hasilnya false, jika salah satunya true maka hasilnya false, dan jika keduanya true maka hasilnya true
// $x = 10;
// var_dump(!($x < 20) || ($x % 2 == 0));

?>
<!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Belajar PHP</title>
</head>
<body>
	<h1>Halo, Selamat Datang <?php echo $nama; ?></h1>
</body>
</html> -->