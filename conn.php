<?php

$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$idade = $_POST["idade"];
$email = $_POST["email"];

echo "O nome digitado foi: " . htmlspecialchars($nome) . " " . htmlspecialchars($sobrenome) . ".";
echo "<br> A idade é de: " . htmlspecialchars($idade);
echo "<br>Seu e-mail é: " . htmlspecialchars($email);

$myfile = fopen("newfile.txt", "w") or die("Unable to open file");

// Escreve o nome seguido de uma quebra de linha
fwrite($myfile, $nome . "\n");

// Escreve o sobrenome seguido de uma quebra de linha
fwrite($myfile, $sobrenome . "\n");

// Escreve a idade seguida de uma quebra de linha
fwrite($myfile, $idade . "\n");

// Você não utilizou o $email para salvar no arquivo, se desejar, adicione:
// fwrite($myfile, $email . "\n");

fclose($myfile);

echo "<br>Os dados foram salvos no arquivo newfile.txt";

?>