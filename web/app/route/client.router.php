<?php
// echo "Rota Cliente";


rota('/client', function () {
  Auth('/client');

  if (isset($_SESSION['usuario']) && $_SESSION['usuario']['painel'] == 'admin') {
    view('painel/admin');
  }
  view('painel/client/index');
});
