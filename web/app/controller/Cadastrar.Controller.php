<?php
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  return print_r(json_encode([
    'status' => 405,
    'success'  => false,
    'msg' => 'Erro no requerimento, metodo esperado = POST',
    'data' => []
  ]));
}
require './autoload.class.php';

// Captura e decodifica o JSON do corpo da requisição
$input = json_decode(file_get_contents('php://input'), true);

// Acessa os dados
$nome = $input['nome'] ?? '';
$email = $input['email'] ?? '';
$senha = $input['senha'] ?? '';

// Validacoes
if ($nome == '' || $email == '' || $senha == '') {
  print_r(json_encode([
    'status' => 400,
    'success' => false,
    'msg' => 'Preencha todos os campos, por favor.'
  ]));
  exit;
}

if (strlen($senha) < 6) {
  print_r(json_encode([
    'status' => 400,
    'success' => false,
    'msg' => 'A senha deve conter no mínimo 6 caracteres.'
  ]));
  exit;
}

$dadosUsuario = [
  'nome' => $nome,
  'foto' => 'default',
  'email' => $email,
  'senha' => $senha,
  'nivel' => 'client',
  'status' => '0'
];

// Regras
$UsuarioCLass = new Usuarios();
$result = $UsuarioCLass->CadastrarUsuario($dadosUsuario);

print_r(json_encode($result));
