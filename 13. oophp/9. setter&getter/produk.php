<?php
class Produk
{
    private $judul,
        $penulis,
        $penerbit,
        $harga,
        $diskon = 0;

    public function __construct($judul = "judul", $penulis = 'penulis', $penerbit = 'penerbit', $harga = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    // Setter : kegunaannya untuk merubah isi parameter
    public function setJudul($judul)
    {
        // kegunaan setter untuk validasi
        // if( !is_string ) {
        //     throw new Exception("Judul Harus String Bos!")
        // }
        $this->judul = $judul;
    }
    public function setPenulis($penulis)
    {
        $this->penulis = $penulis;
    }
    public function setPenerbit($penerbit)
    {
        $this->penerbit = $penerbit;
    }
    public function setHarga($harga)
    {
        $this->harga = $harga;
    }
    public function setDiskon($diskon)
    {
        $this->diskon = $diskon;
    }
    // Getter : mengambil properti 
    public function getJudul()
    {
        return $this->judul;
    }
    public function getPenulis()
    {
        return $this->penulis;
    }
    public function getPenerbit()
    {
        return $this->penerbit;
    }
    public function getHarga()
    {
        return $this->harga - ($this->harga * $this->diskon) / 100;
    }
    public function getDiskon()
    {
        return $this->diskon;
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

// Setter&Getter
// $produk1->judul;        // error karena kita memberikan parameter sebuah access modifier private
// $produk4 = new Produk("JudulBaru");
// echo $produk4->judul;       // error karena kita memberikan parameter sebuah access modifier private
// $produk1->setJudul(123);        // error Exception("Judul Harus String Bos!")
$produk1->setJudul("JudulBaru");
echo $produk1->getJudul();      // naruto
echo "<br>";
echo "Penulis game : " .  $produk2->getPenulis();       // Neil Druckmann
echo "<br>";
echo "Penerbit game : " . $produk2->getPenerbit();       // Sony Computer

echo "<hr>";
echo "Harga Komik : {$produk1->getHarga()}";
echo "<br>";
echo $produk1->setHarga(45000);
echo "Harga Komik setelah di set: {$produk1->getHarga()}";
