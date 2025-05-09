<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Simples</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f4f4;
            margin: 0;
        }
        .calculator-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        input[type="text"], input[type="number"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        .buttons-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-bottom: 20px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #e9ecef;
            border-radius: 4px;
            border: 1px solid #dee2e6;
            font-size: 18px;
            color: #333;
            text-align: left;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="calculator-container">
        <h2>Calculadora Simples</h2>

        <form method="post" action="">
            <input type="number" name="num1" placeholder="Primeiro número" step="any" required
                   value="<?php echo isset($_POST['num1']) ? htmlspecialchars($_POST['num1']) : ''; ?>">
            <input type="number" name="num2" placeholder="Segundo número" step="any" required
                   value="<?php echo isset($_POST['num2']) ? htmlspecialchars($_POST['num2']) : ''; ?>">

            <div class="buttons-grid">
                <button type="submit" name="operation" value="sum">+</button>
                <button type="submit" name="operation" value="subtract">-</button>
                <button type="submit" name="operation" value="multiply">x</button>
                <button type="submit" name="operation" value="divide">/</button>
            </div>
        </form>

        <?php
        // Bloco PHP para processar o formulário
        $result = null;
        $error = null;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Valida e pega os valores dos inputs
            $num1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
            $num2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
            $operation = filter_input(INPUT_POST, 'operation', FILTER_SANITIZE_STRING);

            if ($num1 === false || $num2 === false) {
                $error = "Por favor, insira números válidos.";
            } else {
                switch ($operation) {
                    case 'sum':
                        $result = $num1 + $num2;
                        break;
                    case 'subtract':
                        $result = $num1 - $num2;
                        break;
                    case 'multiply':
                        $result = $num1 * $num2;
                        break;
                    case 'divide':
                        if ($num2 != 0) {
                            $result = $num1 / $num2;
                        } else {
                            $error = "Divisão por zero não é permitida.";
                        }
                        break;
                    default:
                        $error = "Operação inválida.";
                        break;
                }
            }
        }

        // Exibir o resultado ou erro
        if ($error) {
            echo '<div class="error">' . htmlspecialchars($error) . '</div>';
        } elseif ($result !== null) {
            echo '<div class="result">Resultado: ' . htmlspecialchars($result) . '</div>';
        }
        ?>
    </div>

</body>
</html>