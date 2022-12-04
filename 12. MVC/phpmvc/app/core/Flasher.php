<?php

class Flasher
{

    // $pesan : berisi pesan berhasi ata tidak
    // $aksi : berisi kita mau tambah data, edit data, hapus data
    // $tipe : berisi class bootstrap (misal gagal warna alert akan merah, jika berhasil warna alert akan hijau)
    public static function setFlash($pesan, $aksi, $tipe)
    {
        // set session
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-'
                . $_SESSION['flash']['tipe'] .
                ' alert-dismissible fade show" role="alert">Data Mahasiswa <strong>'
                . $_SESSION['flash']['pesan'] .
                ' </strong>'
                . $_SESSION['flash']['aksi'] .
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';

            unset($_SESSION['flash']);
        }
    }
}
