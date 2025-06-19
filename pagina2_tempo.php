<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
require 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tempo_meta = $_POST['tempo_meta'] ?? '';

    if ($tempo_meta) {
        $stmt = $pdo->prepare("UPDATE dados_nutricionais_novo SET tempo_meta = ? WHERE usuario_id = ?");
        $stmt->execute([$tempo_meta, $usuario_id]);

        header("Location: pagina3_dieta.php");
        exit();
    } else {
        $erro = "Por favor, selecione uma opção.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Tempo de Meta</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body { font-family: Arial; margin: 0; }
    .container {
      max-width: 400px;
      margin: 30px auto;
      background: white;
      padding: 20px;
    }
    h2 { text-align: center; }
    form { display: flex; flex-direction: column; gap: 10px; }
    label { display: flex; align-items: center; gap: 10px; }
    button {
      padding: 10px; background: #28a745; color: white;
      border: none; border-radius: 5px; font-size: 16px;
    }
    .erro { color: red; }
  </style>
</head>
<body>
<div class="container">
  <h2>⏳ Tempo para Alcançar sua Meta</h2>
  <?php if (!empty($erro)): ?>
    <p class="erro"><?= $erro ?></p>
  <?php endif; ?>
  <form method="POST">
    <label><input type="radio" name="tempo_meta" value="1 mês">1 mês</label>
    <label><input type="radio" name="tempo_meta" value="3 meses">3 meses</label>
    <label><input type="radio" name="tempo_meta" value="6 meses">6 meses</label>
    <label><input type="radio" name="tempo_meta" value="12 meses">12 meses</label>

    <button type="submit">Avançar</button>
  </form>
</div>
</body>
</html>
