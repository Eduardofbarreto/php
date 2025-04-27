<?php
    $hora = date("H"); // Obtém a hora atual no formato 24 horas

    if ($hora < 12) {
      echo "<p>Bom dia!</p>";
    } elseif ($hora < 18) {
      echo "<p>Boa tarde!</p>";
    } else {
      echo "<p>Boa noite!</p>";
    }
  ?>