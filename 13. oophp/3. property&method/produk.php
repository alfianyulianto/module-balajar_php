<?php

// Jualan Produk
// Komik
// Game
class Produk
{
    // membuat properti default
    public $judul = "judul",
        $penulis = "penulis",
        $penerbit = "penerbit",
        $harga = 0;

    // membuat method
    public function sayHello()
    {
        return "Hello World";
    }
    public function getLabel()
    {
        // didalam php terdapat scope function 
        // yang mana jika ada variabel di dalam function php maka variabel tersebut hanya bisa memanggil deklarasi variabel di dalam function itu saja, artinya variabel tidak mengambil deklarasi variabel dari luar
        // $this : digunakan untuk mengambil isi properti dari class yang bersangkutan ketika dibuat instance-nya(object) 
        return "$this->penulis, $this->penerbit";
    }
}

// instance
$produk1 = new Produk();
// membuat properti
// cara menimpa properti yang ada di dalam class 
$produk1->judul = 'naruto';
var_dump($produk1);

// instance
$produk2 = new Produk();
var_dump($produk2->judul);  // 'judul'
// membuat properti
// cara menimpa properti yang ada di dalam class
$produk2->judul = 'Uncharted';
var_dump($produk2->judul);  // 'Uncharted'
// menambah properti baru setelah object di instansiasi
$produk2->tambahProperty = 'hahaha';    // karena di object tidak ada properti 'tambahProperty' maka akan dibuat properti baru yg isinya hahaha
var_dump($produk2);

// instance
$produk3 = new Produk();
// membuat properti
// cara menimpa properti yang ada di dalam class
$produk3->judul = 'Naruto';
$produk3->penulis = 'Alfian Yulianto';
$produk3->penerbit = 'Gramedia';
$produk3->harga = 30000;
echo $produk3->judul;     // 'Naruto'
var_dump($produk3);

echo "Komik : $produk3->penulis, $produk3->penerbit";   // Komik : Alfian Yulianto, Gramedia
echo "<br>";
// cara untuk memanggil method
echo $produk3->sayHello();  // Hello World
echo "<br>";
echo $produk3->getLabel();  // Alfian Yulianto, Gramedia

echo "<hr>";

// instance
$produk4 = new Produk();
$produk4->judul = "Unsorted";
$produk4->penulis = "Erik";
$produk4->penerbit = "Tiga Serangkai";
$produk4->harga = 250000;
echo "Game : " . $produk4->getLabel();  // Game : Erik, Tiga Serangkai
