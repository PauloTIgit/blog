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
    view('login');
  }
});

rota('/cadastro', function () {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    return 'sucesso';
    // controller('cadastro');
  } else {
    view('cadastro');
  }
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
