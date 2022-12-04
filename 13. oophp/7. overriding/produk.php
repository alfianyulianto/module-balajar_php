<?php
class Produk
{
    public $judul,
        $penulis,
        $penerbit,
        $harga;

    public function __construct($judul = "judul", $penulis = 'penulis', $penerbit = 'penerbit', $harga = 0)
    {
        // $this->name_property => name_parameter
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
    }

    public function getInfoProduk()
    {
        // tipe : judul | penulis, penerbit (Rp. harga)
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }
}

class Komik extends Produk
{
    public $jmlHalaman;

    // overriding
    public function __construct($judul = "judul", $penulis = 'penulis', $penerbit = 'penerbit', $harga = 0, $jmlHalaman = 0)
    {
        // keyword "parent" : digunakan untuk memanggil method atau property dari kelas parent
        // keyword "::" : digunakan untuk menaggil method static
        // parent::__construct() : ini akan memanggil method cunstruct dari class Produk / class parent
        parent::__construct($judul, $penulis, $penerbit, $harga,);      // karena di dalam construct sudah ada deklarasi dari tiap-tiap parameter maka kita penggi method-nya untuk kita gunakan
        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfoProduk()
    {
        // keyword "parent" : digunakan untuk memanggil method atau property dari kelas parent
        // keyword "::" : digunakan untuk menaggil method static
        // parent::getInfoProduk() : ini akan memanggil method getInfoPeroduk dari class Produk / class parent
        $str = "Komik : " . parent::getInfoProduk() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    }

    // public function getInfoProduk()
    // {
    //     $str = "Komik : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) - {$this->jmlHalaman} Halaman.";
    //     return $str;
    // }
}

class Game extends Produk
{
    public $waktuMain;

    // overridng
    public function __construct($judul = 'judul', $penulis = 'penulis', $penerbit = 'penerbit', $harga = 0, $waktuMain = 0)
    {
        // keyword "parent" : digunakan untuk memanggil method atau property dari kelas parent
        // keyword "::" : digunakan untuk menaggil method static
        // parent::__construct() : ini akan memanggil method construct dari class Produk / class parent
        parent::__construct($judul, $penulis, $penerbit, $harga);       // karena di dalam construct sudah ada deklarasi dari tiap-tiap parameter maka kita penggi method-nya untuk kita gunakan
        $this->waktuMain = $waktuMain;
    }

    public function getInfoProduk()
    {
        // keyword "parent" : digunakan untuk memanggil method atau property dari kelas parent
        // keyword "::" : digunakan untuk menaggil method static
        // parent::getInfoProduk() : ini akan memanggil method getInfoProduk dari class Produk / class parent
        $str = "Game : " . parent::getInfoProduk() . " ~ {$this->waktuMain} Jam.";
        return $str;
    }

    // public function getInfoProduk()
    // {
    //     $str = "Game : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) - {$this->waktuMain} Jam.";
    //     return $str;
    // }
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



// Jika instance objectnya komik maka dia tidak ada prameter waktuMain
$produk1 = new Komik();
// Jika instance objectnya game maka dia tidak ada parameter jmlHalaman
$produk2 = new Game("Unchart", "Neil Druckmann", "Sony Computer", 250000, 50);

// // object-type
// $infoProduk1 = new CetakInfoProduk();
// echo $infoProduk1->cetak($produk1);  // Naruto | Masashi Kishimoto, Shonen Jump (Rp. 30000)
// echo $infoProduk1->cetak('hahaha');  // error karena class CetakInfoProduk harus bertipe Produk

echo $produk1->getInfoProduk();  // Komik : Naruto | Masashi Kishimoto, Shonen Jump (Rp. 30000) - 100 Halaman.
echo "<br>";
echo $produk2->getInfoProduk();  // Game : Unchart | Neil Druckmann, Sony Computer (Rp. 2500000) ~ 50 Jam.
