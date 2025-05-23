<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  require './autoload.Class.php';

  
} else {
  $result = [
    'status' => 'erro',
    'sucesso'  => false,
    'title' => 'Erro',
    'message' => 'Erro no requerimento, metodo esperado = POST',
  ];
}

print_r(json_encode($result));
