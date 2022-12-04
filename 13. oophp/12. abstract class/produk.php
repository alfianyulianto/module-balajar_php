<?php

// Karena kita tidak intansiasi class Produk maka kita buat class Product menjadi "abstract"
abstract class Produk
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
        $this->harga;
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

    // karena Produk merupakan kelas abstrak maka harus ada 1 method abstrak
    abstract public function getInfoProduk();

    public function getInfo()
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
        // parent::getInfoProduk( : ini akan memanggil method getInfoPeroduk dari class Produk / class parent
        $str = "Komik : " . parent::getInfo() . " - {$this->jmlHalaman} Halaman.";
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

    public function getInfoProduk()
    {
        // parent::getInfoProduk() : ini akan memanggil method getInfoProduk dari class Produk / class parent
        $str = "Game : " . parent::getInfo() . " ~ {$this->waktuMain} Jam.";
        return $str;
    }
}

// Object Type
class CetakInfoProduk
{
    public $daftarProduk = array();

    // masukan Object Type ke dalam array
    public function tambahProduk(Produk $produk)
    {
        $this->daftarProduk[] = $produk;
        // var_dump($this->daftarProduk);
    }
    public function cetak()
    {
        $str = "DAFTAR PRODUK: <br>";
        // Loop array
        // $p : ini berisi tiap-tiap object dari produk sehingga kita bisa memanfaatkan method dari class Komik dan Game
        foreach ($this->daftarProduk as $p) {
            $str .= $p->getInfoProduk() . "<br>";
        }
        return $str;
    }
}
$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Unchart", "Neil Druckmann", "Sony Computer", 250000, 50);

// instansiasi class CetakInfoProduk
$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk($produk1);       // array akan berisi object dari komik
$cetakProduk->tambahProduk($produk2);       // array yg awalnya berisi objectdari komik sekarang ada objek game
echo $cetakProduk->cetak();
