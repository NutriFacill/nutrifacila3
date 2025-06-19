<?php
require 'conexao.php';

$stmt = $pdo->query("SELECT * FROM treinos ORDER BY criado_em DESC");
$treinos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Treinos Fitness</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: sans-serif;
      margin: 0;
    }
    .container {
      max-width: 600px;
      margin: 30px auto;
      background: #fff;
      padding: 20px;
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    .card {
      background: #e9f5f5;
      padding: 10px;
      border-radius: 8px;
      margin-top: 15px;
    }
    .card small {
      display: block;
      color: #777;
    }
    .voltar {
      display: block;
      margin-top: 20px;
      background: #6c757d;
      text-align: center;
      padding: 10px;
      border-radius: 8px;
      color: white;
      text-decoration: none;
    }
  </style>
</head>
<body>
<div class="container">
  <h2>🏋️‍♂️ Treinos Fitness</h2>

  <?php if (empty($treinos)): ?>
    <p>Nenhum treino disponível.</p>
  <?php else: ?>
    <?php foreach ($treinos as $t): ?>
      <div class="card">
        <strong><?= htmlspecialchars($t['titulo']) ?></strong>
        <p><?= nl2br(htmlspecialchars($t['descricao'])) ?></p>
        <small><?= date('d/m/Y H:i', strtotime($t['criado_em'])) ?></small>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>

  <a class="voltar" href="index.php">⬅ Voltar à home</a>
</div>
</body>
</html>
