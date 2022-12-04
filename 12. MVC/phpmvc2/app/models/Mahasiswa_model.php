<?php

class Mahasiswa_model
{

  // private $mhs = [
  //   [
  //     "nama" => "Alfian Yulianto",
  //     "nim" => "L200180121",
  //     "email" => "l200180121@student.ums.ac.id",
  //     "jurusan" => "Teknik Informatika"
  //   ],
  //   [
  //     "nama" => "Nur Fadilah Aziz",
  //     "nim" => "L200180113",
  //     "email" => "l200180113@student.ums.ac.id",
  //     "jurusan" => "Teknik Informatika"
  //   ],
  //   [
  //     "nama" => "Ilyas Raihan Nadif",
  //     "nim" => "L200180119",
  //     "email" => "l200180119@student.ums.ac.id",
  //     "jurusan" => "Teknik Informatika"
  //   ]
  // ];


  // Driver PDO
  // // mengambil data dengan drive PDO (PHP Data Object)
  // private $dbh,   // database hendler
  //   $stmt;    // statemenet(menyimpan query)

  // // koneksi database kedalam method cunstruct agar saat class ini di instansiasi yg pertama dilakuakn yaitu koneksi ke database
  // public function __construct()
  // {
  //   // data source name
  //   $dsn = 'mysql:host=localhost; dbname=phpmvc';

  //   // cek koneksi berhasil atau tidak
  //   try {
  //     $this->dbh = new PDO($dsn, 'root', '');   // instansiasi PDO dengan parameter dsn, username, password
  //   } catch (PDOException $err) {   // tangkap Exception
  //     die($err->getMessage());   // hentikan program dan beri pesan error
  //   }
  // }

  // public function getAllMahasiswa()
  // {
  //   $this->stmt = $this->dbh->prepare("SELECT * FROM mahasiswa");   // perpare
  //   $this->stmt->execute();   // jalanakan query
  //   return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  // }


  // Database Wrapper
  private $table = 'mahasiswa',
    $db;

  public function __construct()
  {
    $this->db = new Database();   // instansiasi class Database saat class Mahasiswa_model di panggil
  }

  public function getAllMahasiswa()
  {
    $this->db->query('SELECT * FROM ' . $this->table);
    return $this->db->resultSet();    // ambil semua data 
  }

  public function getMahasiswaById($id)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
    $this->db->bind('id', $id);
    return $this->db->single();
  }

  public function tambahDataMahasiswa($data)
  {
    $query = "INSERT INTO " . $this->table . " VALUES 
    ('', :nama, :nim, :email, :jurusan)";

    $this->db->query($query);
    $this->db->bind('nama', $data['nama']);
    $this->db->bind('nim', $data['nim']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('jurusan', $data['jurusan']);

    $this->db->execute();
    return $this->db->rowCount();
  }

  public function hapusDataMahasiswa($id)
  {
    $query = "DELETE FROM " . $this->table . " WHERE id =:id";
    $this->db->query($query);
    $this->db->bind('id', $id);

    $this->db->execute();
    return $this->db->rowCount();
  }

  public function ubahDataMahasiswa($data)
  {
    $query = "UPDATE " . $this->table . " SET 
        nama = :nama,
        nim = :nim,
        email = :email,
        jurusan = :jurusan
          WHERE id =:id";

    $this->db->query($query);
    $this->db->bind('nama', $data['nama']);
    $this->db->bind('nim', $data['nim']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('jurusan', $data['jurusan']);
    $this->db->bind('id', $data['id']);

    $this->db->execute();
    return $this->db->rowCount();
  }

  public function cariDataMahasiswa()
  {
    $keyword = $_POST['keyword'];
    $query = "SELECT * FROM mahasiswa WHERE 
    nama LIKE :keyword OR
    nim LIKE :keyword OR
    email LIKE :keyword OR
    jurusan LIKE :keyword";

    $this->db->query($query);
    $this->db->bind('keyword', "%$keyword%");
    $this->db->bind('keyword', "%$keyword%");
    $this->db->bind('keyword', "%$keyword%");
    $this->db->bind('keyword', "%$keyword%");

    return $this->db->resultSet();
  }
}
