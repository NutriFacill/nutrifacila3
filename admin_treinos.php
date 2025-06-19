<?php
session_start();
require 'conexao.php';

if (!isset($_SESSION['admin_logado'])) {
    header("Location: admin_login.php");
    exit();
}

// Inserir novo treino
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['titulo'], $_POST['descricao'])) {
    $titulo = trim($_POST['titulo']);
    $descricao = trim($_POST['descricao']);

    if ($titulo && $descricao) {
        $stmt = $pdo->prepare("INSERT INTO treinos (titulo, descricao) VALUES (?, ?)");
        $stmt->execute([$titulo, $descricao]);
    }
}

// Excluir treino
if (isset($_GET['excluir'])) {
    $id = intval($_GET['excluir']);
    $pdo->prepare("DELETE FROM treinos WHERE id = ?")->execute([$id]);
}

// Buscar treinos existentes
$stmt = $pdo->query("SELECT * FROM treinos ORDER BY criado_em DESC");
$treinos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Admin - Treinos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      background: #f1f9fa;
      font-family: sans-serif;
      margin: 0;
    }

    .container {
      max-width: 600px;
      margin: 20px auto;
      background: #fff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    form textarea, form input {
      width: 100%;
      margin-bottom: 10px;
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
    }

    button {
      padding: 12px;
      width: 100%;
      background: #007bff;
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
    }

    .card {
      background: #e9f5f5;
      padding: 10px;
      border-radius: 8px;
      margin-top: 15px;
      position: relative;
    }

    .card small {
      display: block;
      color: #777;
    }

    .card a {
      position: absolute;
      top: 10px;
      right: 10px;
      color: red;
      text-decoration: none;
      font-weight: bold;
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
  <h2>🏋️‍♂️ Gerenciar Treinos</h2>

  <form method="POST">
    <input type="text" name="titulo" placeholder="Título do treino" required>
    <textarea name="descricao" placeholder="Descrição ou série de exercícios" required rows="4"></textarea>
    <button type="submit">Salvar Treino</button>
  </form>

  <?php foreach ($treinos as $t): ?>
    <div class="card">
      <strong><?= htmlspecialchars($t['titulo']) ?></strong>
      <p><?= nl2br(htmlspecialchars($t['descricao'])) ?></p>
      <small><?= date('d/m/Y H:i', strtotime($t['criado_em'])) ?></small>
      <a href="?excluir=<?= $t['id'] ?>" onclick="return confirm('Excluir este treino?')">✖</a>
    </div>
  <?php endforeach; ?>

  <a class="voltar" href="admin_dashboard.php">⬅ Voltar ao Painel</a>
</div>
</body>
</html>
