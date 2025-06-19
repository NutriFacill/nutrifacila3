<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $peso = floatval($_POST['peso']);
    $altura = floatval($_POST['altura']);
    $idade = intval($_POST['idade']);
    $genero = $_POST['genero'];
    $objetivo = $_POST['objetivo'];

    $imc = $peso / ($altura * $altura);
    if ($genero === 'Masculino') {
        $tmb = 10 * $peso + 6.25 * ($altura * 100) - 5 * $idade + 5;
    } else {
        $tmb = 10 * $peso + 6.25 * ($altura * 100) - 5 * $idade - 161;
    }
    $agua = round($peso * 0.035, 2);

    $stmt = $pdo->prepare("REPLACE INTO dados_nutricionais (usuario_id, peso, altura, idade, genero, objetivo, imc, tmb, agua) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_SESSION['usuario_id'], $peso, $altura, $idade, $genero, $objetivo, round($imc, 2), round($tmb, 2), $agua
    ]);

    header('Location: tempo_meta.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados Pessoais</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f4f7; margin: 0; padding: 0; }
        .container { max-width: 400px; margin: 30px auto; background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; margin-bottom: 20px; }
        input, select { width: 100%; padding: 10px; margin-bottom: 15px; border-radius: 8px; border: 1px solid #ccc; }
        button { width: 100%; padding: 12px; background-color: #28a745; color: white; border: none; border-radius: 8px; font-size: 16px; cursor: pointer; }
        button:hover { background-color: #218838; }
    </style>
</head>
<body>
<div class="container">
    <h2>Informe seus dados</h2>
    <form method="POST">
        <input type="number" name="peso" step="0.01" placeholder="Peso (kg)" required>
        <input type="number" name="altura" step="0.01" placeholder="Altura (m)" required>
        <input type="number" name="idade" placeholder="Idade" required>
        <select name="genero" required>
            <option value="">Selecione o Gênero</option>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
        </select>
        <select name="objetivo" required>
            <option value="">Objetivo</option>
            <option value="Emagrecimento">Emagrecimento</option>
            <option value="Hipertrofia">Hipertrofia</option>
        </select>
        <button type="submit">Salvar e Continuar</button>
    </form>
</div>
</body>
</html>
