<?php

// melakukan extend ke class Controller
class Mahasiswa extends Controller
{
  public function index()
  {
    $data['judul'] = 'Daftar Mahasiswa';
    $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
    $this->view("tamplates/header", $data);
    $this->view("mahasiswa/index", $data);
    $this->view("tamplates/footer");
  }
  public function detail($id)
  {
    $data['judul'] = 'Detail Mahasiswa';
    $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
    $this->view("tamplates/header", $data);
    $this->view("mahasiswa/detail", $data);
    $this->view("tamplates/footer");
  }
  public function tambah()
  {
    // var_dump($_POST);
    if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {   // artinya jika ada baris baru yg ditambahkan
      // setFlasher
      Flasher::setFlash('berhasil', 'ditambahkan', 'success');

      header('Location:' . BASEURL  . '/mahasiswa');
    } else {
      Flasher::setFlash('gagal', 'ditambahkan', 'danger');

      header('Location:' . BASEURL  . '/mahasiswa');
    }
  }
  public function hapus($id)
  {
    // var_dump($_POST);
    if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {   // artinya jika ada baris baru yg ditambahkan
      // setFlasher
      Flasher::setFlash('berhasil', 'dihapus', 'success');

      header('Location:' . BASEURL  . '/mahasiswa');
    } else {
      Flasher::setFlash('gagal', 'dihapus', 'danger');

      header('Location:' . BASEURL  . '/mahasiswa');
    }
  }

  public function getUbah()
  {
    echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
  }

  public function ubah()
  {
    // var_dump($_POST);
    if ($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0) {   // artinya jika ada baris baru yg ditambahkan
      // setFlasher
      Flasher::setFlash('berhasil', 'diubah', 'success');

      header('Location:' . BASEURL  . '/mahasiswa');
    } else {
      Flasher::setFlash('gagal', 'diubah', 'danger');

      header('Location:' . BASEURL  . '/mahasiswa');
    }
  }

  public function cari()
  {
    $data['judul'] = 'Daftar Mahasiswa';
    $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
    $this->view("tamplates/header", $data);
    $this->view("mahasiswa/index", $data);
    $this->view("tamplates/footer");
  }
}
