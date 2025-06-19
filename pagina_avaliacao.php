<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['peso'] = $_POST['peso'];
    $_SESSION['altura'] = $_POST['altura'];
    $_SESSION['idade'] = $_POST['idade'];
    $_SESSION['sexo'] = $_POST['sexo'];
    $_SESSION['objetivo'] = $_POST['objetivo'];
    $_SESSION['tempo_meta'] = $_POST['tempo_meta'];

    header("Location: pagina3_dieta.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Avaliação Nutricional - NutriFácil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            background: #E9F5F5;
            font-family: sans-serif;
        }
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100%;
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }
        .container form {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            width: 100%;
            max-width: 500px;
            box-sizing: border-box;
        }
        h2 {
            color: #000;
            text-align: center;
        }
        label {
            display: block;
            margin-top: 10px;
            font-size: 17px;
            color: #000;
        }
        input, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 17px;
            margin-top: 5px;
            box-sizing: border-box;
        }
        button {
            background: #009688;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 17px;
            width: 100%;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover {
            background: #00796B;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Avaliação Nutricional</h2>
        <form method="post">
            <label>Peso (kg):</label>
            <input type="number" step="0.1" name="peso" required>

            <label>Altura (cm):</label>
            <input type="number" step="0.1" name="altura" required>

            <label>Idade:</label>
            <input type="number" name="idade" required>

            <label>Sexo:</label>
            <select name="sexo" required>
                <option value="">Selecione</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
            </select>

            <label>Objetivo:</label>
            <select name="objetivo" required>
                <option value="">Selecione</option>
                <option value="Emagrecimento">Emagrecimento</option>
                <option value="Hipertrofia">Hipertrofia</option>
            </select>

            <label>Tempo da meta (meses):</label>
            <input type="number" name="tempo_meta" required>

            <button type="submit">Avançar</button>
        </form>
    </div>
</body>
</html>
