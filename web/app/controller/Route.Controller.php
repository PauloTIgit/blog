<?php

function view($view)
{
  if (file_exists("./view/$view.php")) {
    component('header');
    if ($view != "login" &&  $view != "registro" && $view != "cadastro" && strpos($view, 'painel') === false):
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

function router($router)
{
  if (file_exists("./app/route/$router.router.php")) {
    include "./app/route/$router.router.php";
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
  rouback('404');
}

function Auth($rota)
{
  if ($rota == '/cliet' || $rota == '/admin') {
    if (!isset($_SESSION['usuario'])) {
      view('negado');
    }
    exit;
  }

  if ($rota == '/login') {
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['lembrar']) {
      header("Location: ./" . $_SESSION['usuario']['painel']);
    }
  }
}

function rouback($rouback)
{
  view($rouback);
}
