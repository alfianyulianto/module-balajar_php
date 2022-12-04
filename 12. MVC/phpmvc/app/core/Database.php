<?php

class Database
{
    // tulis data dari DB yg sudah ada di folder app/config/config.php
    private $host = DB_HOST,
        $user = DB_USER,
        $pass = DB_PASS,
        $db_name = DB_NAME;

    // DENGAN DB (konseksi dengan ke DB dengan driver PDO/PHP Data Object)
    private $dbh, $stmt;

    public function __construct()
    {
        // data source name
        $dsn = "mysql:host={$this->host};dbname={$this->db_name}";

        // Option digunakan untuk optimasi konseksi ke DB
        // Option berbentuk array yang ini berisi parameter dari konfigurasi DB
        $option = [
            PDO::ATTR_PERSISTENT => true,                       // untuk membuat koneksi ke DB terjaga terus
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,         // mode erronya berbentuk exception
        ];

        // block try catch digunakan untuk mengecek apakah konseksi berhasil atau tidak
        try {
            //$dsn, unsername, root
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);      // konseksi ke PDO
        } catch (PDOException $e) {       // tangkap exception dan kasih namanya $e
            die($e->getMessage());          // jika error panggil pesan errornya dengan $e->getMessage()
        }
    }

    // membuat query menjadi generic (agar bisa insert, update, delete)
    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    // membuat binding (di dalam query ada where, insert into, setdata pada update)
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
        $this->stmt->bindValue($param, $value, $type);
    }

    // eksekusi
    public function execute()
    {
        $this->stmt->execute();
    }

    // setelah di eksekusi tentukan hasil datanya mau banyak atau cuma satu

    // hasil data banyak
    public function resulSet()
    {
        // panggil method execte()
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // hasil data cuma satu
    public function single()
    {
        // panggil method execte()
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}
