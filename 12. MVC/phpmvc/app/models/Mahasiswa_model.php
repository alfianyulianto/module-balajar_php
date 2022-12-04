<?php

class Mahasiswa_model
{
    // TANPA DB
    // private $mhs = [
    //     [
    //         "nama" => "Alfian Yulianto", 
    //         "nim" => "L200180121", 
    //         "email" => "alfianyulianto36@gmail.com",
    //         "jurusan" => "Teknik Informatika"
    //     ],
    //     [
    //         "nama" => "Budi Santosa", 
    //         "nim" => "B200180001", 
    //         "email" => "budi@gmail.com", 
    //         "jurusan" => "Akutansi"
    //     ],
    //     [
    //         "nama" => "Vincent David", 
    //         "nim" => "B100180002", 
    //         "email" => "david@gmail.com", 
    //         "jurusan" => "Teknik Sipil"
    //     ],
    //     [
    //         "nama" => "Diah Ramadhani", 
    //         "nim" => "D210180180", 
    //         "email" => "diah@gmail.com", 
    //         "jurusan" => "Teknik Informatika"
    //     ],
    // ];

    // DENGAN DB (konseksi dengan ke DB dengan driver PDO/PHP Data Object)
    // private $dbh;        // $pdh(database handler)
    // private $stmt;       // $stmt(statement)

    // lakukan koneksi ke DB pada method construct agar saat di instansiasi  pertama yg dilakukan ialah konseksi ke DB
    // public function __construct() {
    //     // data source name
    //     $dsn = 'mysql:host=localhost;dbname=phpmvc';

    //     // block try catch digunakan untuk mengecek apakah konseksi berhasil atau tidak
    // try {
    //     //$dsn, unsername, root
    //     $this->dbh = new PDO($dsn, 'root', '');      // konseksi ke PDO
    // } catch(PDOException $e) {       // tangkap exception dan kasih namanya $e
    //     die($e->getMessage());          // jika error panggil pesan errornya dengan $e->getMessage()
    // }
    // }

    // WRAPPER DB : digunakan untuk mengelola DB untuk data di model manapun
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        // instansiasi kelas Database di dalam folder app/core/Database.php
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        // TANPA DB
        // return $this->mhs;


        // DENGAN DB
        // $stmt di isi dengan database hendler(konseksi ke DB), lalu prepare diisi dengan 'Query'
        // $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
        // $this->stmt->execute();      // eksekusi $stmt
        // return $this->stmt->fetchAll(PDO::FETCH_ASSOC);      // ambil semua data dengan fetchAll(), kemudian parameternya disi mau seperti apa data dikembalikan dalam hal ini dalam bentuk array associatife

        // WRAPPER DB : digunakan untuk mengelola DB untuk data di model manapun model apapun
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resulSet();
    }

    public function getMahasiswaById($id)
    {
        // WHERE id=:id digunakan unutk menyimpan data yg akan kita binding
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');

        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa
            VALUES('', :nama, :nim, :email, :jurusan)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->execute();

        return $this->db->rowCount();

        // mencoba jika gagal
        // return 0;
    }

    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM mahasiswa WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();

        // mencoba jika gagal
        // return 0;
    }

    public function ubahDataMahasiswa($data)
    {
        $query = "UPDATE mahasiswa SET 
                nama = :nama,
                nim = :nim,
                email = :email,
                jurusan = :jurusan
            WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();

        return $this->db->rowCount();

        // mencoba jika gagal
        // return 0;
    }
    public function cariDataMahasiswa()
    {
        $keyword =  $_POST['keyword'];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resulSet();
    }
}
