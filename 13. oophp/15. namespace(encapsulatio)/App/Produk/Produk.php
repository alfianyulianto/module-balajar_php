<?php

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
