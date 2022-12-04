<?php 
// Date 
// untuk menampilkan tanggal dengan format tertentu
// echo date("l"); // nama hari
// echo date("d"); // tanggal
// echo date("M"); // nama bulan
// echo date("m"); // bulan tapi dalam bentuk angka
// echo date("Y"); // tahun lengkap misal 2021
// echo date("y"); // tahun singkat miasl 21
// echo date("l, d-M-Y"); 
// echo "<br>";

// Time : hanya bisa digunakan relatif untuk menghitung detik saat ini (digunakan untuk menghitung maju atau mundur)
// UNIX Timestamp / EPOCH time
// detik yang sudah berlalu sejak 1 Januari 1970
// echo time();
// echo date("l", time());
// echo date("l", time() + 172800); // tampilkan hari ke 2 setelah hari ini
// echo date("l", time() + 60*60*24*100); // tampilkan hari ke 100 setelah hari ini

// mktime : digunakan untuk menghitung dari 1 Januari 1970 sampai tanggal yang diinginkan
// untuk membuat detik
// mktime(0,0,0,0,0,0)
// jam, menit, detik, bulan, tanggal, tahun
// echo mktime(0, 0, 0, 7, 1, 2000);
// echo date("l", mktime(0, 0, 0, 7, 1, 2000));
// echo date("l", mktime(0,0,0,1, 1, 1970));
// echo mktime(0,0,0,7,1,2000);
// echo "<br>";

// strtotime : digunakan untuk memasukan format tanggal dan outputnya detik
// echo strtotime("1 Jul 2000");
echo "<br>";
echo strtotime("7:00"); 
echo "<br>";
echo strtotime("19:00");
echo "<br>";
// echo date("l", strtotime("1 Jul 2000"));
// echo strtotime("now");
// echo date("d-m-Y", strtotime("+1day"))."<br>"; // tanggal setelah tanggal ini
// echo strtotime('+30 mins', time()) . "<br>";
// echo time() . "<br>";
// $add = strtotime('+30 mins', time());
// echo  $add. "<br>";
// echo date("G");



?>