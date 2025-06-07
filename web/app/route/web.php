<?php


rota('/', function () {
  view('home');
});

rota('/logica', function () {
  view('logica');
});

rota('/javascript', function () {
  view('javascript');
});

rota('/html-css', function () {
  view('html_css');
});

rota('/projetos', function () {
  view('projetos');
});

rota('/sobre', function () {
  view('sobre');
});

rota('/login', function () {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    controller('Login');
  } else {
    Auth('/login');
    view('login');
  }
});

rota('/cadastro', function () {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    controller('Cadastrar');
  } else {
    view('registro');
  }
});

rota('/valid', function () {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    controller('Valid');
  } else {
    view('valid');
  }
});

rota('/client', function () {
  Auth('/client');

  if (isset($_SESSION['usuario']) && $_SESSION['usuario']['painel'] == 'admin') {
    view('painel/admin');
  }
  view('painel/client/index');
});

rota('/admin', function () {
  Auth('/admin');
  if ($_SESSION['usuario']['painel'] == 'client') {
    view('painel/client');
  }
  view('painel/admin');
});

rota('/404', function () {
  view('404');
});

rota('/send-mail', function () {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    controller('Email');
    $nome = trim(strip_tags(filter_input(INPUT_POST, 'name', FILTER_DEFAULT)));
    $email = trim(strip_tags(filter_input(INPUT_POST, 'email', FILTER_DEFAULT)));
    $celular = trim(strip_tags(filter_input(INPUT_POST, 'phone', FILTER_DEFAULT)));
    $assunto = trim(strip_tags(filter_input(INPUT_POST, 'subject', FILTER_DEFAULT)));
    $headerEmail = trim(strip_tags(filter_input(INPUT_POST, 'message', FILTER_DEFAULT)));
    $message = creatMessage($nome, $email, $celular, $assunto, $headerEmail);
  }
});

rota('/sair', function () {
  session_destroy();
  header("Location: ./login");
});

router('artigo');
