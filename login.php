<?php
session_start();
require 'conexao.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    // Buscar usuário na tabela usuarios_novo
    $stmt = $pdo->prepare("SELECT * FROM usuarios_novo WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        header("Location: index.php");
        exit();
    } else {
        $erro = "E-mail ou senha incorretos.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 0; margin: 0;
    }

    .container {
      max-width: 400px;
      margin: 60px auto;
      background: #fff;
      padding: 17px;

    }

    h2 { text-align: center; }

    form {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    input[type="email"],
    input[type="password"] {
      padding: 10px;
      border-radius: 6px;
      border: 1px solid #ccc;
    }

    button {
      padding: 12px;
      background-color: #28a745;
      color: white;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      cursor: pointer;
    }

    .erro {
      color: red;
      text-align: center;
      margin-top: 10px;
    }

    .link {
      text-align: center;
      margin-top: 10px;
    }

    .link a {
      color: #007bff;
      text-decoration: none;
    }

    .link a:hover {
      text-decoration: underline;
    }2
  body,td,th {
	font-size: 12px;
}
  body,td,th {
	font-size: 13px;
}
  </style>
</head>
<body>
<div class="container">
  <h2><img src="img/logo_login.png" width="250" height="164"><br>
    <br>
  🔐Faça login para utilizar o App</h2>
  <form method="POST">
    <input type="email" name="email" placeholder="E-mail" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <button type="submit">Entrar</button>
  </form>

  <?php if (!empty($erro)): ?>
  <p class="erro"><?= $erro ?></p>
  <?php endif; ?>

  <div class="link">
    <p>Esqueceu a senha? <a href="redefinir_senha.php"><strong>Clique aqui</strong></a> <br>
      <br>
    Não tem uma conta? <a href="cadastro.php"><strong>Cadastre-se</strong></a></p>
    <p>❓ <a href="#">Ajuda</a> | 🔒​ <a href="#">LGPD</a></p>
  </div>
</div>
</body>
</html>
