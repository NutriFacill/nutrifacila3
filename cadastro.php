<?php
session_start();
require 'conexao.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome_completo']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    if (empty($nome) || empty($email) || empty($senha)) {
        $erro = "Preencha todos os campos.";
    } else {
        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

        // Verifica se o e-mail já está cadastrado
        $stmt = $pdo->prepare("SELECT id FROM usuarios_novo WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            $erro = "E-mail já cadastrado.";
        } else {
            // Insere novo usuário
            $insert = $pdo->prepare("INSERT INTO usuarios_novo (nome_completo, email, senha) VALUES (?, ?, ?)");
            if ($insert->execute([$nome, $email, $senhaCriptografada])) {
                $_SESSION['usuario_id'] = $pdo->lastInsertId();
                header("Location: pagina_avaliacao.php");
                exit();
            } else {
                $erro = "Erro ao cadastrar. Tente novamente.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastro</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      background: #e7f3f3;
      font-family: Arial, sans-serif;
      margin: 0; padding: 0;
    }

    .container {
      max-width: 400px;
      margin: 60px auto;
      background: #fff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    h2 { text-align: center; }

    form {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    input {
      padding: 10px;
      border-radius: 6px;
      border: 1px solid #ccc;
    }

    button {
      padding: 12px;
      background-color: #007bff;
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
    }
  </style>
</head>
<body>
<div class="container">
  <h2>📝 Cadastro</h2>
  <form method="POST">
    <input type="text" name="nome_completo" placeholder="Nome completo" required>
    <input type="email" name="email" placeholder="E-mail" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <button type="submit">Cadastrar</button>
  </form>

  <?php if (!empty($erro)): ?>
    <p class="erro"><?= $erro ?></p>
  <?php endif; ?>

  <div class="link">
    <p>Já tem uma conta? <a href="login.php">Faça login</a></p>
  </div>
</div>
</body>
</html>
