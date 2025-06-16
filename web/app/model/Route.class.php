<?php

class Route
{
  public function __construct()
  {
    include './app/controller/Route.Controller.php';
    include './app/controller/Component.Controller.php';
    include './app/route/web.php';


    for ($i = 0; $i < count($_SESSION['dadosRoute']); $i++) {
      $resultado = (substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], '/')) == $_SESSION['dadosRoute'][$i]) ? 1 : 0;
    }

    $resultado == 1 ?? rouback("404");
  }
}
