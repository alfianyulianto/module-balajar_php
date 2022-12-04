<?php

class App
{
    // buat properti default untuk jaga-jaga jika user tidak memasukan url dengan benar
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();
        // jika tidak ada data yg dikirim berarti $url akan berisi null
        // var_dump($url);       // null

        // controller
        // file_exists : untuk mengecek apakah ada sebuah file di dalam folder tertentu

        // karena $url hasilnya null maka cek dulukondisi dan masukan di dalam array $url nilai default dari parameter controller
        if ($url == null) {
            $url = [$this->controller];
        }
        // var_dump($url[0]);

        // jika controllernya ada maka akan di cek
        // jika controllernya tidak ada maka controller yang digunakan adalah controller default(home)
        if (file_exists("../app/controllers/{$url[0]}.php")) {  // karena class ini di akses dari file index yg ada di public maka kita gunakan ../ untuk keluar dari folder public baru menuju ke folder app
            // timpa parameter controller default dengan controller baru
            $this->controller = $url[0];

            // unset : meghilangkan element pada sebuah array
            // menghilangkan element digunakn supaaya kita bisa mengambil parameternya
            unset($url[0]);
        }

        // panggil kontrollernya
        require_once "../app/controllers/{$this->controller}.php";
        // instansiasi kelas supaya kita bisa panggil methodnya
        $this->controller = new $this->controller;

        // method
        // jika methodnya ada maka akan dicek
        // jika methodnya tidak ada maka method yang digunakan adalah methid default(index)
        // kenapa kita gunakan untuk $url[1], karena bisa saja jika kita tuliskan urlnya kita tidak menuliskan methodnya(hanya menuliskan controller)
        // sehingga jika methodnya kosong maka kita bisa menggunakan method default(index)
        if (isset($url[1])) {
            // method_axists : digunakan untuk mengecek apakah ada sebuah method di dalam class 
            // ada 2 parameter
            // parameter pertama instance dari object
            // parameter kedua nama method yg ingin di cek
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                // unset : meghilangkan element pada sebuah array
                // menghilangkan element digunakn supaya kita bisa mengambil parameternya
                unset($url[1]);
            }
        }

        // params
        if (!empty($url)) {
            // array_values : untuk mengambil tiap-tiap nilai dari array
            // masukan kedalam parameter params
            $this->params = array_values($url);
        }

        // jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {      // name 'url' diambil dari yg ada di file .htaccess
            // rtrim : digunakna untuk menghilangkan karakter diakhir string
            $url = rtrim($_GET['url'], '/');        // untu menghilangkan karakter / di belakang string
            $url = filter_var($url, FILTER_SANITIZE_URL);   // untuk membersihkan string dari karakter-karakter
            $url = explode('/', $url);
            return $url;
        }
    }
}
