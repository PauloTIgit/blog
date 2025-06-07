<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

  // Regras
  $UsuarioCLass = new Usuarios();
  $UsuarioCLass->setUsuario($nome, 'default', $email, $senha, 'client', '0');

  $validEmail = $UsuarioCLass->validEmail($email);

  if ($validEmail == 404 || $validEmail == 500) {
    print_r(json_encode([
      'status' => 400,
      'success' => false,
      'msg' => 'Erro ao interno. Contate o suporte!',
      'data' => []
    ]));
    exit;
  }

  if ($validEmail != []) {
    print_r(json_encode([
      'status' => 200,
      'success' => false,
      'msg' => 'Email já cadastrado!',
      'data' => [
        'email' => $email,
      ]
    ]));
    exit;
  }



  if ($UsuarioCLass->salvar()) {
    print_r(json_encode([
      'status' => 200,
      'success' => true,
      'msg' => 'Cadastro realizado com sucesso!',
      'data' => [
        'nome' => $nome,
        'email' => $email,
        'url' => "./valid"
      ]
    ]));
    exit;
  }

  print_r(json_encode([
    'status' => 400,
    'success' => false,
    'msg' => 'Erro desconhecido. Contate o suporte!',
    'data' => [
      'nome' => $nome,
      'email' => $email,
    ]
  ]));
} else {
  print_r(json_encode([
    'status' => 405,
    'success'  => false,
    'msg' => 'Erro no requerimento, metodo esperado = POST',
    'data' => []
  ]));
  exit;
}
