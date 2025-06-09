<?php

function component($component)
{
  if (file_exists("./app/component/$component.php")) {
    include_once "./app/component/$component.php";
  } else {
    echo "<p>Erro no componente <span style='color:red'> $component </span> <p>";
  }
}
