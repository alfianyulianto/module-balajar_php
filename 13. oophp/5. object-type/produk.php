<?php
class Produk
{
    public $judul,
        $penulis,
        $penerbit,
        $harga;

    public function __construct($judul = "judul", $penulis = 'penulis', $penerbit = 'penerbit', $harga = 0)
    {
        // $this->name_property = $name_parameter
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
    }
}

// Object Type
class CetakInfoProduk
{
    // function cetak menerima parameter berupa "instance dari object Produk"
    // Kemudian jika kita ingin agar parameter cetak ini hanya menerima hanya object dari Produk maka kita tambahkan nama class di depan parameter
    public function cetak(Produk $produk)
    {
        // var_dump($produk);       // akan menghasilkan sebuah object dari produk 1
        // die;
        // {} : digunakan agar kita tidak perlu melakukan contat / penggabungan string
        // jika kita tidak memakai kurung kurawal maka ini kita tidak bisa memanggil method 
        // $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        $str = "$produk->judul | " . $produk->getLabel() . " (Rp. $produk->harga)";
        return $str;
    }
}

$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000);

$produk2 = new Produk("Unchart", "Neil Druckmann", "Sony Computer", 250000);

echo $produk1->getLabel();  // Masashi Kishimoto, Shonen Jump
echo "<hr>";
echo $produk2->getLabel();  // Neil Druckmann, Sony Computer
echo "<hr>";

// object-type
$infoProduk1 = new CetakInfoProduk();
echo $infoProduk1->cetak($produk1);  // Naruto | Masashi Kishimoto, Shonen Jump (Rp. 30000)
echo $infoProduk1->cetak('hahaha');  // error karena class CetakInfoProduk harus bertipe Produk
