<?php

  $nome = $_POST["nome"];
  $sobrenome = $_POST["sobrenome"];
  $idade = $_POST["idade"];
  $email = $_POST["email"];

  echo "O nome digitado foi: " . htmlspecialchars($nome) . " " . htmlspecialchars($sobrenome) .".";
  echo "<br> A idade é de: " . htmlspecialchars($idade);
  echo "<br>Seu e-mail é: " . htmlspecialchars($email);
?>