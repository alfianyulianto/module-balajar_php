<?php

// agar $this->view (saat memanggil view) dikenali oleh kelas About ini
// maka jadikan kelas About ini sebagai "child" dari kelas Controller
class About extends Controller
{

    // untuk mengambil property params yang dikirim lewat url
    public function index($nama = "default", $pekerjaan = "Mahasiswa", $umur = 21)
    {
        // echo "Halo, nama saya $nama saya seorang $pekerjaan. Saya berumur $umur tahun.";

        // menampilkan view
        // memanggil method dari kelas kontroler
        // $this->view('about/index') : akan memanggil method view dari class Controller.php yg ada di folder app/core
        // ('about/index') : artinya akan memanggil file yang ada di folder views/about/index.php
        $data = ['nama' => $nama, 'pekerjaan' => $pekerjaan, 'umur' => $umur];
        $this->view('tamplates/header', ['judul' => 'About']);
        $this->view('about/index', $data);
        $this->view('tamplates/footer');
    }
    public function page()
    {
        // echo "about/page";

        // menampilkna view
        // memanggil method dari kelas kontroler
        // $this->view('about/index') : akan memanggil method view dari class Controller.php yg ada di folder app/core
        // ('about/page') : artinya akan memanggil file yang ada di folder views/about/page.php
        $data['judul'] = 'Page';
        $this->view('tamplates/header', $data);
        $this->view('about/page');
        $this->view('tamplates/footer');
    }
}
