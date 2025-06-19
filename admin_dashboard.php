<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

if (!isset($_SESSION['admin_logado'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Painel do Administrador</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      background: #f1f9fa;
      font-family: sans-serif;
      margin: 0;
    }

    .container {
      max-width: 500px;
      margin: 40px auto;
      padding: 20px;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      text-align: center;
    }

    h2 {
      margin-bottom: 30px;
    }

    a.button {
      display: block;
      margin: 12px auto;
      padding: 14px;
      background: #007bff;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-weight: bold;
      width: 80%;
    }

    .logout {
      margin-top: 20px;
      background: #dc3545;
    }
  </style>
</head>
<body>
<div class="container">
  <h2>Bem-vindo, <?= htmlspecialchars($_SESSION['admin_email']) ?></h2>

  <a class="button" href="admin_conteudos.php">📚 Gerenciar Conteúdos Extras</a>
  <a class="button" href="admin_receitas.php">🍽️ Gerenciar Receitas</a>
  <a class="button" href="admin_treinos.php">🏋️‍♂️ Gerenciar Treinos</a>
  <a class="button logout" href="admin_logout.php">🚪 Sair</a>
</div>
</body>
</html>
