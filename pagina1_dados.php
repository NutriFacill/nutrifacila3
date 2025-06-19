<?php
session_start();
require 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];
    $idade = $_POST['idade'];
    $genero = $_POST['genero'];
    $objetivo = $_POST['objetivo'];
    $usuario_id = $_SESSION['usuario_id'];

    $altura_m = $altura / 100;
    $imc = $peso / ($altura_m * $altura_m);
    $imc = number_format($imc, 2, '.', '');

    if ($genero == "masculino") {
        $tmb = 10 * $peso + 6.25 * $altura - 5 * $idade + 5;
    } else {
        $tmb = 10 * $peso + 6.25 * $altura - 5 * $idade - 161;
    }
    $tmb = number_format($tmb, 2, '.', '');
    $agua = $peso * 35;

    $stmt = $pdo->prepare("SELECT id FROM dados_nutricionais_novo WHERE usuario_id = ?");
    $stmt->execute([$usuario_id]);
    $existe = $stmt->fetch();

    if ($existe) {
        $sql = "UPDATE dados_nutricionais_novo SET peso=?, altura=?, idade=?, genero=?, objetivo=?, imc=?, tmb=?, agua=? WHERE usuario_id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$peso, $altura, $idade, $genero, $objetivo, $imc, $tmb, $agua, $usuario_id]);
    } else {
        $sql = "INSERT INTO dados_nutricionais_novo (usuario_id, peso, altura, idade, genero, objetivo, imc, tmb, agua) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$usuario_id, $peso, $altura, $idade, $genero, $objetivo, $imc, $tmb, $agua]);
    }

    header("Location: pagina2_tempo.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Informe seus Dados</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: sans-serif;
      font-size: 17px;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 400px;
      margin: 40px auto;
      background-color: #ffffff;
      padding: 20px;
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #000000;
    }
    form {
      display: flex;
      flex-direction: column;
    }
    label {
      margin-top: 15px;
      font-weight: bold;
    }
    input, select {
      padding: 10px;
      font-size: 17px;
      border: 1px solid #ccc;
      border-radius: 6px;
      margin-top: 5px;
    }
    button {
      margin-top: 25px;
      padding: 12px;
      background-color: #28a745;
      color: white;
      font-size: 17px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }
    button:hover {
      background-color: #218838;
    }
    .voltar {
      display: block;
      text-align: center;
      margin-top: 20px;
      background-color: #6c757d;
      padding: 12px;
      color: white;
      border-radius: 8px;
      text-decoration: none;
      font-size: 17px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Informe seus Dados</h2>
    <form method="POST">
      <label for="peso">Peso (kg):</label>
      <input type="number" step="0.1" name="peso" required>

      <label for="altura">Altura (cm):</label>
      <input type="number" name="altura" required>

      <label for="idade">Idade:</label>
      <input type="number" name="idade" required>

      <label for="genero">Gênero:</label>
      <select name="genero" required>
        <option value="">Selecione</option>
        <option value="masculino">Masculino</option>
        <option value="feminino">Feminino</option>
      </select>

      <label for="objetivo">Objetivo:</label>
      <select name="objetivo" required>
        <option value="">Selecione</option>
        <option value="emagrecimento">Emagrecimento</option>
        <option value="hipertrofia">Hipertrofia</option>
      </select>

      <button type="submit">Avançar</button>
    </form>

    <a class="voltar" href="index.php">⬅ Voltar à home</a>
  </div>
</body>
</html>
