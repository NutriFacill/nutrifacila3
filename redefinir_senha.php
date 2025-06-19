<?php
require 'conexao.php';
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios_novo WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // Gerar token simples (em produção, use hash seguro + expiração)
        $token = bin2hex(random_bytes(32));
        $link = "https://diskcartucho.com.br/nova_senha.php?token=$token&email=$email";

        // Simular envio (em produção use mail() ou PHPMailer)
        file_put_contents("tokens/{$email}.txt", $token);

        // Exibe link (ou envie por e-mail)
        $msg = "Link de redefinição: <a href='$link'>$link</a>";
    } else {
        $msg = "E-mail não encontrado.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Redefinir Senha</title>
  <style>
    body { font-family: Arial; background: #f0f4f7; margin: 0; padding: 0; }
    .container { max-width: 400px; margin: 30px auto; background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
    h2 { text-align: center; }
    input, button { width: 100%; padding: 10px; margin: 10px 0; border-radius: 8px; border: 1px solid #ccc; }
    button { background-color: #007bff; color: white; border: none; }
    button:hover { background-color: #0056b3; }
    .msg { margin-top: 10px; font-size: 14px; color: green; }
  </style>
</head>
<body>
<div class="container">
  <h2>Redefinir Senha</h2>
  <form method="POST">
    <input type="email" name="email" placeholder="Digite seu e-mail" required>
    <button type="submit">Enviar link</button>
  </form>
  <div class="msg"><?= $msg ?></div>
</div>
</body>
</html>
