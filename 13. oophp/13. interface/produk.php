<?php
interface InfoProduk
{
    public function getInfoProduk();
}

// Rencana kita tidak ingin class Produk di instansian
// Biarkan class extendnya saja yang di instansiasi
abstract class Produk
{
    protected $judul,
        $penulis,
        $penerbit,
        $harga;

    protected $diskon = 0;

    public function __construct($judul = "judul", $penulis = 'penulis', $penerbit = 'penerbit', $harga = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    // protected $harga;
    // private $harga;
    // Ketika harga memiliki kases modifier private
    // public function getHarga()
    // {
    //     return $this->harga - ($this->harga * $this->diskon) / 100;
    // }

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

    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
    }

    abstract public function getInfo();
}

class Komik extends Produk implements InfoProduk
{
    public $jmlHalaman;

    // overriding
    public function __construct($judul = "judul", $penulis = 'penulis', $penerbit = 'penerbit', $harga = 0, $jmlHalaman)
    {
        // parent::__construct() : ini akan memanggil method cunstruct dari class Produk / class parent
        parent::__construct($judul, $penulis, $penerbit, $harga,);      // karena di dalam construct sudah ada deklarasi dari tiap-tiap parameter maka kita penggil method-nya untuk kita gunakan
        $this->jmlHalaman = $jmlHalaman;
    }

    // implementasi method getInfo() dari class abstrak
    public function getInfo()
    {
        // tipe : judul | penulis, penerbit (Rp. harga)
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }

    // implementasi dari method getInfoProduk() pada interface InfoProduk
    public function getInfoProduk()
    {
        // parent::getInfoProdk( : ini akan memanggil method getInfoPeroduk dari class Produk / class parent
        $str = "Komik : " . $this->getInfo() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}

class Game extends Produk implements InfoProduk
{
    public $waktuMain;

    // overriding
    public function __construct($judul = 'judul', $penulis = 'penulis', $penerbit = 'penerbit', $harga = 0, $waktuMain)
    {
        // parent::__construct() : ini akan memanggil method construct dari class Produk / class parent
        parent::__construct($judul, $penulis, $penerbit, $harga);       // karena di dalam construct sudah ada deklarasi dari tiap-tiap parameter maka kita penggil method-nya untuk kita gunakan
        $this->waktuMain = $waktuMain;
    }

    // Ketika harga memiliki akses modifier protected
    // public function getHarga()
    // {
    //     return $this->harga;
    // }

    public function setDiskon($diskon)
    {
        $this->diskon = $diskon;
    }

    // implementasi method getInfo() dari class abstrak
    public function getInfo()
    {
        // tipe : judul | penulis, penerbit (Rp. harga)
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }

    // implementasi dari method getInfoProduk() pada interface InfoProduk
    public function getInfoProduk()
    {
        // parent::getInfoProduk() : ini akan memanggil method getInfoProduk dari class Produk / class parent
        $str = "Game : " . $this->getInfo() . " ~ {$this->waktuMain} Jam.";
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
    }
    public function cetak()
    {
        $str = "DAFTAR PRODUK: <br>";
        // Loop array
        // $p : ini berisi tiap-tiap object dari produk sehingga kita bisa memanfaatkan method dari class Komin dan Game
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
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);
echo $cetakProduk->cetak();
