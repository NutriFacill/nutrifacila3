<?php
session_start();
require 'conexao.php';

if (!isset($_SESSION['admin_logado'])) {
    header("Location: admin_login.php");
    exit();
}

// Inserção
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['titulo'], $_POST['descricao'])) {
    $titulo = trim($_POST['titulo']);
    $descricao = trim($_POST['descricao']);
    if ($titulo && $descricao) {
        $stmt = $pdo->prepare("INSERT INTO conteudos_extras (titulo, descricao) VALUES (?, ?)");
        $stmt->execute([$titulo, $descricao]);
    }
}

// Exclusão
if (isset($_GET['excluir'])) {
    $id = intval($_GET['excluir']);
    $pdo->prepare("DELETE FROM conteudos_extras WHERE id = ?")->execute([$id]);
}

// Consulta
$stmt = $pdo->query("SELECT * FROM conteudos_extras ORDER BY criado_em DESC");
$conteudos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Gerenciar Conteúdos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    <?php include 'admin_style.css'; ?>
  </style>
</head>
<body>
<div class="container">
  <h2>📚 Conteúdos Extras</h2>
  <form method="POST">
    <input type="text" name="titulo" placeholder="Título" required>
    <textarea name="descricao" placeholder="Descrição" required></textarea>
    <button type="submit">Salvar</button>
  </form>
  <?php foreach ($conteudos as $c): ?>
    <div class="card">
      <strong><?= htmlspecialchars($c['titulo']) ?></strong>
      <p><?= nl2br(htmlspecialchars($c['descricao'])) ?></p>
      <small><?= date('d/m/Y H:i', strtotime($c['criado_em'])) ?></small>
      <a href="?excluir=<?= $c['id'] ?>" onclick="return confirm('Excluir?')">✖</a>
    </div>
  <?php endforeach; ?>
  <a class="voltar" href="admin_dashboard.php">⬅ Voltar</a>
</div>
</body>
</html>
