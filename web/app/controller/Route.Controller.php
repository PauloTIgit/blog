<?php

function view($view)
{
  if (file_exists("./view/$view.php")) {
    component('header');
    if ($view != "login" &&  $view != "registro" && $view != "cadastro" && strpos($view, 'painel') === false):
      component('nav');
    endif;
    include_once "./view/$view.php";
    component('footer');
  } else {
    rouback('404');
  }
  // exit();
}

function controller($controller)
{
  if (file_exists("./app/controller/$controller.Controller.php")) {
    include_once "./app/controller/$controller.Controller.php";
  }
  exit();
}

function router($router)
{
  if (file_exists("./app/route/$router.router.php")) {
    include "./app/route/$router.router.php";
  }
}

function rota($rota, $f)
{
  $_SESSION['dadosRoute'][] = $rota;
  if (substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], '/')) == $rota) {
    $f();
    return;
  }
  rouback('404');
}

function Auth($rota)
{
  if ($rota == '/client') {
    if (!isset($_SESSION['usuario'])) {
      view('negado');
      exit;
    }
    if ($_SESSION['usuario']['painel'] == 'client') {
      view('painel/client/index');
    }
  }

  if ($rota == '/admin') {
    if (!isset($_SESSION['usuario'])) {
      view('negado');
      exit;
    }
    if ($_SESSION['usuario']['painel'] == 'client') {
      view('painel/client/index');
    }
  }

  if ($rota == '/login') {
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['lembrar']) {
      header("Location: ./" . $_SESSION['usuario']['painel']);
    }
  }
}

function rouback($rouback)
{
  if (
    !file_exists("./view" . substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], '/')) . ".php")
    && substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], '/')) != '/'
    && !in_array(substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], '/')), $_SESSION['dadosRoute'])
  ) {
    // echo "Rota Nao encontrada! => " . substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], '/')) . "<br>";
    view($rouback);
    return;
  }
}
