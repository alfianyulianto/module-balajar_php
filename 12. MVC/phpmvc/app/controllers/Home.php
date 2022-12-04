<?php

// agar $this->view dan $this->model saat memanggil view dikenali oleh kelas Home ini
// maka jadikan kelas Home ini sebagai "child" dari kelas Controller
class Home extends Controller
{
    public function index()
    {
        // echo "home/index";

        // menampilkan view
        // memanggil method dari kelas kontroler
        // $this->view('home/index') : akan memanggil method view dari class Controller.php yg ada di folder app/core
        // ('home/index') : artinya akan memanggil file yang ada di folder views/home/index.php
        $this->view('tamplates/header', ['judul' => 'Home']);
        // $this->model('User_model') : akan memanggil method model dari class Controller.php yg ada di folder app/core
        // ('User_model') : artinya akan memanggil file yang ada di folder models/User_model.php
        // getUser() : artinya kita akan memanggil method getUser() yang di dalam kelas User_model.php yang ada di folder app/models
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('home/index', $data);
        $this->view('tamplates/footer');
    }
}
