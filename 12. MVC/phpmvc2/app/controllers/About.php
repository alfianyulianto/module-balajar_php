<?php

// melakukan extend ke class Controller
class About extends Controller
{
  public function index($nama = "Alfian", $pekerjaan = "Mahasiswa", $umur = 22)
  {
    $data['nama'] = $nama;
    $data['pekerjaan'] = $pekerjaan;
    $data['umur'] = $umur;
    $data['judul'] = 'About';
    $this->view("tamplates/header", $data);
    $this->view("about/index", $data);
    $this->view("tamplates/footer");
  }
  public function page()
  {
    $data['judul'] = 'Page';
    $this->view("tamplates/header", $data);
    $this->view("about/page");
    $this->view("tamplates/footer");
  }
}
