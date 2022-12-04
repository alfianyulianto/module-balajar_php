<?php
class Produk
{
    public $judul,
        $penulis,
        $penerbit;

    protected $diskon = 0;
    // protected $harga;

    private $harga;
    // private $diskon = 0;
    // // Ketika diskon memiliki access modifier private
    // public function setDiskon($diskon)
    // {
    //     $this->diskon = $diskon;
    // }
    // Ketika harga memiliki access modifier private
    public function getHarga()
    {
        return $this->harga - ($this->harga * $this->diskon) / 100;
    }

    public function __construct($judul = "judul", $penulis = 'penulis', $penerbit = 'penerbit', $harga = 0)
    {
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
    public function __construct($judul = "judul", $penulis = 'penulis', $penerbit = 'penerbit', $harga = 0, $jmlHalaman)
    {
        // parent::__construct() : ini akan memanggil method cunstruct dari class Produk / class parent
        parent::__construct($judul, $penulis, $penerbit, $harga,);      // karena di dalam construct sudah ada deklarasi dari tiap-tiap parameter maka kita penggi method-nya untuk kita gunakan
        $this->jmlHalaman = $jmlHalaman;
    }
    public function getInfoProduk()
    {
        // parent::getInfoProdk( : ini akan memanggil method getInfoPeroduk dari class Produk / class parent
        $str = "Komik : " . parent::getInfoProduk() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}

class Game extends Produk
{
    public $waktuMain;

    // overriding
    public function __construct($judul = 'judul', $penulis = 'penulis', $penerbit = 'penerbit', $harga = 0, $waktuMain)
    {
        // parent::__construct() : ini akan memanggil method construct dari class Produk / class parent
        parent::__construct($judul, $penulis, $penerbit, $harga);       // karena di dalam construct sudah ada deklarasi dari tiap-tiap parameter maka kita penggi method-nya untuk kita gunakan
        $this->waktuMain = $waktuMain;
    }

    // Ketika harga memiliki access modifier protected
    // public function getHarga()
    // {
    //     return $this->harga - ($this->harga * $this->diskon) / 100;
    // }

    // Ketika diskon memiliki access modifier protected
    public function setDiskon($diskon)
    {
        $this->diskon = $diskon;
    }

    public function getInfoProduk()
    {
        // parent::getInfoProduk() : ini akan memanggil method getInfoProduk dari class Produk / class parent
        $str = "Game : " . parent::getInfoProduk() . " ~ {$this->waktuMain} Jam.";
        return $str;
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


// Jika instance objectnya komik maka dia tidak ada prameter waktuMain
$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
// Jika instance objectnya game maka dia tidak ada parameter jmlHalaman
$produk2 = new Game("Unchart", "Neil Druckmann", "Sony Computer", 250000, 50);

// // object-type
// $infoProduk1 = new CetakInfoProduk();
// echo $infoProduk1->cetak($produk1);  // Naruto | Masashi Kishimoto, Shonen Jump (Rp. 30000)
// echo $infoProduk1->cetak('hahaha');  // error karena class CetakInfoProduk harus bertipe Produk

echo $produk1->getInfoProduk();  // Komik : Naruto | Masashi Kishimoto, Shonen Jump (Rp. 30000) - 100 Halaman.
echo "<br>";
echo $produk2->getInfoProduk();  // Game : Unchart | Neil Druckmann, Sony Computer (Rp. 2500000) ~ 50 Jam.
echo "<hr>";

// Protected
// $produk2->harga = 5000;     // error karena kita memberikan parameter sebuah access modifier protected
// echo $produk2->harga;       //error :  kita memberikan protected maka kita tidak juga tidak bisa akses harganya
echo "Harga Game : {$produk2->getharga()}";       // 250000
echo "<br>";
$produk2->setDiskon(35);
echo "Harga Game setelah Diskon : {$produk2->getHarga()}";      // 162500

// Private
// $produk2->harga;        // error karena kita memberikan parameter sebuah access modifier private
// echo "Harga Game : {$produk2->getHarga()}";      // 250000
// echo "<br>";
// $produk2->setDiskon(50);
// echo "Harga Game setelah Diskon : {$produk2->getHarga()}";      // 125000
