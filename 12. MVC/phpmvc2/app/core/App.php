<?php

class App
{
  protected $controller = 'Home',
    $method = 'index',
    $params = [];
  public function __construct()
  {
    // echo "OK!";
    // var_dump($this->parseURL());
    $url = $this->parseURL();

    // var_dump($url);
    if ($url == null) {
      $url[] = $this->controller;
    }
    // controller
    if (file_exists("../app/controllers/" . $url[0] . ".php")) {
      $this->controller = $url[0];
      unset($url[0]);
    }
    require_once "../app/controllers/" . $this->controller . ".php";
    $controller = new $this->controller;

    if (isset($url[1])) {
      if (method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
      }
    }

    if (!empty($url)) {
      $this->params = array_values($url);
    }

    call_user_func_array([$controller, $this->method], $this->params);
  }
  public function parseURL()
  {
    if (isset($_GET['url'])) {
      $url = $_GET['url'];
      $url = rtrim($url, '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }
}
