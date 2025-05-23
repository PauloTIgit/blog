<?php

function view($view)
{ 
  if (file_exists("./view/$view.php")) {
    component('header');
    if ($view != "login" && $view != "cadastro"):
      component('nav');
    endif;
    include "./view/$view.php";
    component('footer');
  } else {
    header('Location: ./404');
  }
  exit();
}

function controller($controller)
{
  if (file_exists("./app/controller/$controller.Controller.php")) {
    include "./app/controller/$controller.Controller.php";
  }
  exit();
}

function rota($rota, $f)
{
  $_SESSION['dadosRoute'][] = $rota;
  if (substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], '/')) == $rota) {
    $f();
    exit();
  }
}

function rouback($rouback)
{
  view($rouback);
}
