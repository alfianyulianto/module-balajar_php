<?php

class ContohStatic
{
    public static $angka = 1;

    public static function halo()
    {
        // cara untuk memanggil propert static
        // untuk memanggil property dari sebuah class dimana kita tidak melakukan instansiansi maka kita gunakan keyword "self"
        // kita tidak bisa melakukannya dengan "$this" karena ini digunakan untuk sebuah objeck yang sudah di instansiasi
        return "halo. " . self::$angka++ . " kali";
    }
}

// Cara mengakses property dan method tanpa melakukan isntansiasi object
echo ContohStatic::$angka;      // 1
echo "<br>";
echo ContohStatic::halo();      // halo. 1 kali
echo "<br>";
echo ContohStatic::halo();      // halo. 2 kali


// class Contoh
// {
//     // tanpa static
//     // public $angka = 1;

//     // public function halo()
//     // {
//     //     return "Halo " . $this->angka++ . " kali. <br>";
//     // }


//     // dengan static keyword
//     public static $angka = 1;

//     public function halo()
//     {
//         return "Halo " . self::$angka++ .  " kali. <br>";
//     }
// }
// tanpa static
// $obj1 = new Contoh;
// echo $obj1->halo();         // 1
// echo $obj1->halo();         // 2
// echo $obj1->halo();         // 3
// echo "<hr>";

// $obj2 = new Contoh;
// echo $obj2->halo();         // 1
// echo $obj2->halo();         // 2
// echo $obj2->halo();         // 3

// dengan static keyword : maka nilainya akan tetap(tidak direset kembali ketika kita instansiasi object) $obj1 = new Contoh;
// $obj1 = new Contoh;
// echo $obj1->halo();         // 1
// echo $obj1->halo();         // 2
// echo $obj1->halo();         // 3
// echo "<hr>";

// $obj2 = new Contoh;
// echo $obj2->halo();         // 4
// echo $obj2->halo();         // 5
// echo $obj2->halo();         // 6