<?php 

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
