<?php 

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
