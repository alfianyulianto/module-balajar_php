<?php

// define();
// dengan menggunakan define() kita tidak bisa memasukan nya kedalam sebuah class
define('NAMA', 'Alfian Yulianto');
// untuk mengakses tulis nama contantnya apa tanpa keyword $
echo NAMA;      // Alfian Yulianto

echo "<br>";
// const
// dengan menggunakan const kita bisa memasukan nya kedalam sebah class
const UMUR = 21;
// untuk mengakses tulis nama contantnya apa tanpa keyword $
echo UMUR;      // 21


// class Coba
// {
//     const  NAMA = 'Alfian';
// }

// // cara mengakses constanta yang ada di dalam class
// echo Coba::NAMA;        // Alfian



echo __LINE__;      // menampilkan baris constant ini ditulis
echo "<br>";
echo __FILE__;      // menampilkan alamat dari file yang bersangkutan
echo "<br>";
echo __DIR__;       // menampilkan direktori tempat file disimpan
echo "<br>";
function coba()
{
    return __FUNCTION__;      // menentukan kita beradadi function apa
}
echo coba();
echo "<br>";
class cobaClass
{
    public static $kelas = __CLASS__;      // menentukan kita berada diclass apa

    public static function cobaMethod()
    {
        return __METHOD__;      // menentukan kita berada diclass dan method apa
    }
}
echo cobaClass::$kelas;
echo "<br>";
echo cobaClass::cobaMethod();
