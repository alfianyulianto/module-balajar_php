<?php

class Database
{
  // variable konfigurasi
  private $host = DB_HOST,
    $user = DB_USER,
    $pass = DB_PASS,
    $db_name = DB_NAME;

  // variabel koneksi
  private $dbh,
    $stmt;

  // koneksi database kedalam method cunstruct agar saat class ini di instansiasi yg pertama dilakuakn yaitu koneksi ke database
  public function __construct()
  {
    // data source name
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

    // optimasi ke database
    $option = [
      PDO::ATTR_PERSISTENT => true,   // untuk menjaga koneksi ke databae
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION   // untuk memasukan mode error ke exception
    ];

    // cek koneksi berhasil atau tidak
    try {
      $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);   // instansiasi PDO dengan parameter dsn, username, password, option
    } catch (Exception $err) {
      die($err->getMessage());
    }
  }

  // membuat query mejadi general sehingga bisa digunakan untuk apapun(insert, update, delete)
  public function query($query)
  {
    $this->stmt = $this->dbh->prepare($query);
  }

  public function bind($param, $value, $type = null)
  {
    if (is_null($type)) {
      switch (true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
      }
    }

    $this->stmt->bindValue($param, $value, $type);    // untuk melakukan binding agar kita bisa menambahkan where
  }

  // eksekusi
  public function execute()
  {
    $this->stmt->execute();
  }

  // untuk hasil data yang banyak
  public function resultSet()
  {
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // untuk hasil data yang single
  public function single()
  {
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_ASSOC);
  }

  // untuk mengithung berapa baris yang berubah jika berhasil
  public function rowCount()
  {
    return $this->stmt->rowCount();
  }
}
