<?php

// agar $this->model (saat memanggil view) dikenali oleh kelas Mahasiswa ini
// maka jadikan kelas Mahasiswa ini sebagai "child" dari kelas Controller
class Mahasiswa extends Controller
{
    public function index()
    {
        // meanmpilkan view
        // memanggil method dari kelas kontroler
        // $this->view('mahasiswa/index') : akan memanggil method view dari class Controller.php yg ada di folder app/core
        // ('mahasiswa/index') : artinya akan memanggil file yang ada di folder views/mahasiswa/index.php

        // $this->model('Mahasiswa_model') : akan memanggil method model dari class Controller.php yg ada di folder app/core
        // ('User_model') : artinya akan memanggil file yang ada di folder models/Mahasiswa_model.php
        // geALlMahasiswa() : artinya kita akan memanggil method getAllMahasiswa() yang di dalam kelas Mahasiswa_model.php yang ada di folder app/models
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('/tamplates/header', ['judul' => 'Daftar Mahasiswa']);
        $this->view('/mahasiswa/index', $data);
        $this->view('/tamplates/footer');
    }

    public function detail($id)
    {
        // meanmpilkan view
        // memanggil method dari kelas kontroler
        // $this->view('mahasiswa/index') : akan memanggil method view dari class Controller.php yg ada di folder app/core
        // ('mahasiswa/index') : artinya akan memanggil file yang ada di folder views/mahasiswa/index.php

        // $this->model('Mahasiswa_model') : akan memanggil method model dari class Controller.php yg ada di folder app/core
        // ('User_model') : artinya akan memanggil file yang ada di folder models/Mahasiswa_model.php
        // geMahasiswaById($id) : artinya kita akan memanggil method getMahasiswaById() yang di dalam kelas Mahasiswa_model.php yang ada di folder app/models
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('/tamplates/header', ['judul' => 'Detail Mahasiswa']);
        $this->view('/mahasiswa/detail', $data);
        $this->view('/tamplates/footer');
    }
    public function tambah()
    {
        if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location:' . BASE_URL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location:' . BASE_URL . '/mahasiswa');
            exit;
        }
    }
    public function hapus($id)
    {
        if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location:' . BASE_URL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location:' . BASE_URL . '/mahasiswa');
            exit;
        }
    }
    public function getubah()
    {
        // echo $_POST['id'];

        // karena ajax yang digunakan hanya menerima dataType nya json, maka kita harus mengubah data yang dikirimkan ke dalam bentuk json
        // json_encode : digunakan merubah data array assoiatife ke menjadi json
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }
    public function ubah()
    {
        if ($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ubah', 'success');
            header('Location:' . BASE_URL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ubah', 'danger');
            header('Location:' . BASE_URL . '/mahasiswa');
            exit;
        }
    }

    public function cari()
    {
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
        $this->view('/tamplates/header', ['judul' => 'Daftar Mahasiswa']);
        $this->view('/mahasiswa/index', $data);
        $this->view('/tamplates/footer');
    }
}
