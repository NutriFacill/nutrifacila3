<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
require 'conexao.php';

$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (!empty($email) && !empty($senha)) {
        $stmt = $pdo->prepare("SELECT * FROM admin_login WHERE email = ?");
        $stmt->execute([$email]);
        $admin = $stmt->fetch();

        if ($admin && hash('sha256', $senha) === $admin['senha']) {
            $_SESSION['admin_logado'] = true;
            $_SESSION['admin_email'] = $email;
            header("Location: admin_dashboard.php");
            exit();
        } else {
            $erro = "E-mail ou senha inválidos.";
        }
    } else {
        $erro = "Preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body { background: #f1f9fa; font-family: sans-serif; margin: 0; }
    .container { max-width: 400px; margin: 80px auto; background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    h2 { text-align: center; margin-bottom: 20px; }
    input[type="email"], input[type="password"] {
      width: 100%; padding: 12px; margin: 8px 0;
      border-radius: 8px; border: 1px solid #ccc;
    }
    button {
      width: 100%; background: #007bff; color: white;
      padding: 12px; border: none; border-radius: 8px;
      margin-top: 10px; font-weight: bold;
    }
    .erro { color: red; text-align: center; margin-bottom: 10px; }
  </style>
</head>
<body>
<div class="container">
  <h2>Login do Administrador</h2>
  <?php if ($erro): ?>
    <div class="erro"><?= htmlspecialchars($erro) ?></div>
  <?php endif; ?>
  <form method="POST">
    <input type="email" name="email" placeholder="E-mail do admin" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <button type="submit">Entrar</button>
  </form>
</div>
</body>
</html>
