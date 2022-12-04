<?php

class Controller
{
  public function view($view, $data = [])
  {
    // memanggil isi dari folder view
    require_once "../app/views/" . $view . ".php";
  }

  public function model($model)
  {
    // memanggil isi dari folder model
    require_once "../app/models/" . $model . ".php";
    // melakukan instansiasi 
    return new $model;
  }
}
