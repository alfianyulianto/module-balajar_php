<?php

class Controller
{
    // untuk menampilkna view dari sebuah controller yang ada di folder app/controller
    // ada 2 parameetr pada view
    // parameter pertama folder viewsnya
    // parameter kedua data yang akan dikirimkan 
    public function view($view, $data = [])
    {
        // panggil view yang ada di folder app/views
        require_once "../app/views/{$view}.php";
    }
    public function model($model)
    {
        require_once "../app/models/{$model}.php";
        // karena model berisi kelas maka kita instansiasi biar bisa di pake
        return new $model;
    }
}
