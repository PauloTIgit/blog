<?php
header('Content-Type: application/json');

function request($method)
{
  if ($_SERVER['REQUEST_METHOD'] !== $method) {
    return print_r(json_encode([
      'status' => 405,
      'success'  => false,
      'msg' => 'Erro no requerimento, metodo esperado = POST',
      'data' => []
    ]));
  }
}

function ListarArtigosCliente()
{
  request('GET');

  $ArtigosClass = new Artigos();
  $result = $ArtigosClass->ListarArtigos(1);
  return print_r(json_encode($result));
}


$input = json_decode(file_get_contents('php://input'), true);
$acao = $input['acao'] ?? '';

if ($input['acao']) {
  switch ($acao) {
    case 'listar':
      // Listar Artigos
      $ArtigosClass = new Artigos();
      return $result = $ArtigosClass->ListarArtigos(1);
    default:
      return print_r(json_encode([
        'status' => 405,
        'success'  => false,
        'msg' => 'Acao nao disponivel',
        'data' => [$acao]
      ]));
  }
}

return print_r(json_encode([
  'status' => 500,
  'success' => false,
  'msg' => 'Nem uma ação!',
]));
