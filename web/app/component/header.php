<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Programação para Iniciantes</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- phosphor ICONS -->
  <script src="https://unpkg.com/phosphor-icons"></script>
  <link rel="stylesheet" href="https://unpkg.com/phosphor-icons@1.4.1/dist/phosphor.min.css" />

  <link rel="stylesheet" href="./src/css/styles.css" />
  <script type="module" src="./src/js/main.js"></script>


  <!-- jQuery  -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Toastr.js  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
    toastr.options = {
      "positionClass": "toast-bottom-right", // Define a posição
      "timeOut": "5000", // Tempo em milissegundos
      "closeButton": false, // Botão de fechar opcional
      "progressBar": true // Exibe uma barra de progresso
    };
  </script>
</head>

<body class="bg-gray-100 text-gray-900">

  <?php component('loding') ?>