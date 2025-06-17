<?php

// echo "Rota Admin";

rota('/admin', function () {
  Auth('/admin');
  view('painel/admin/index');
});

rota('/admin-artigos', function () {
  view('painel/admin/artigos');
});

rota('/admin-usuarios', function () {
  view('painel/admin/usuarios');
});

rota('/admin-logs', function () {
  view('painel/admin/logs');
});
