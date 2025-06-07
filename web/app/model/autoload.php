<?php
date_default_timezone_set('America/Sao_Paulo');

$autoload = spl_autoload_register(function ($classes) {
  require "$classes.class.php";
});
