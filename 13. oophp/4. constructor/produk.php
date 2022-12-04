<?php
class Produk
{
    public $judul,
        $penulis,
        $penerbit,
        $harga;

    // cara membuat constructor function
    // $judul, $penulis, $penerbit, $harga yang digunakan sebagai parameter itu merupakan variabel local dari method cunstruct
    // sehingga parameter tersebut beda dengan property dari class
    // parameter pada contructer method kita bisa memasukan nilai default
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
$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000);

$produk2 = new Produk("Unchart", "Neil Druckmann", "Sony Computer", 250000);

$produk3 = new Produk("Dragon Ball");
var_dump($produk3); // object(Produk)[3]
//   public 'judul' => string 'Dragon Ball' (length=11)
//   public 'penulis' => string 'penulis' (length=7)
//   public 'penerbit' => string 'penerbit' (length=8)
//   public 'harga' => int 0

echo $produk1->getLabel();  // Masashi Kishimoto, Shonen Jump
echo "<hr>";
echo $produk2->getLabel();  // Neil Druckmann, Sony Computer
