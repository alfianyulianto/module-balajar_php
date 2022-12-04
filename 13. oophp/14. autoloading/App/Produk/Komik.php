<?php 

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
