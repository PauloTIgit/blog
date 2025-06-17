<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  print_r(json_encode([
    'status' => 405,
    'success'  => false,
    'msg' => 'Erro no requerimento, metodo esperado = POST',
    'data' => []
  ]));
}

require './autoload.Class.php';

// Captura e decodifica o JSON do corpo da requisição
$input = json_decode(file_get_contents('php://input'), true);

// Acessa os dados
$email = $input['email'] ?? '';
$senha = $input['senha'] ?? '';
$lembrar = $input['lembrar'] ?? '';

// Exemplo de validação simples
if (strlen($senha) < 6) {
  return print_r(json_encode([
    'status' => 400,
    'success' => false,
    'msg' => 'A senha deve conter no mínimo 6 caracteres.'
  ]));
}

if ($email == '' || $senha == '') {
  print_r(json_encode([
    'status' => 400,
    'success' => false,
    'msg' => 'Por favor, preencha todos os campos obrigatórios.'
  ]));
  exit;
}

$UsuarioCLass = new Usuarios();
$result = $UsuarioCLass->LogarUsuario($email, $senha, $lembrar);

print_r(json_encode($result));
