<?php
require 'conexao.php';

$stmt = $pdo->query("SELECT titulo, descricao FROM conteudos_extras ORDER BY id DESC");
$conteudos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Conteúdos Extras</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 17px;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 400px;
      margin: 30px auto;
      background: #ffffff;
      padding: 20px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #000000;
      font-size: 22px;
    }

    .item {
      background-color: #E9F5F5;
      border-radius: 8px;
      padding: 15px;
      margin-bottom: 15px;
    }

    .item h3 {
      margin: 0 0 10px;
      color: #000000;
      font-size: 18px;
    }

    .item p {
      margin: 0;
      font-size: 17px;
      color: #333;
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
    <h2>📚 Conteúdos Extras</h2>

    <?php if (empty($conteudos)): ?>
      <p>Nenhum conteúdo disponível no momento.</p>
    <?php else: ?>
      <?php foreach ($conteudos as $c): ?>
        <div class="item">
          <h3><?= htmlspecialchars($c['titulo']) ?></h3>
          <p><?= nl2br(htmlspecialchars($c['descricao'])) ?></p>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>

    <a class="voltar" href="index.php">⬅ Voltar à home</a>
  </div>
</body>
</html>
