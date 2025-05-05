<?php

  $nome = $_POST["nome"];
  $idade = $_POST["idade"];

  echo "O nome digitado foi: " . htmlspecialchars($nome);
  echo "<br> A idade é de: " . htmlspecialchars($idade);
?>