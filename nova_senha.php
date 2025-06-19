<?php
require 'conexao.php';
$msg = '';

if (isset($_GET['token']) && isset($_GET['email'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];

    // Verifica se token existe no sistema de simulação (em produção, use banco)
    $arquivo_token = "tokens/{$email}.txt";
    if (file_exists($arquivo_token) && file_get_contents($arquivo_token) === $token) {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nova_senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("UPDATE usuarios_novo SET senha = ? WHERE email = ?");
            $stmt->execute([$nova_senha, $email]);

            // Remove o token usado
            unlink($arquivo_token);

            $msg = "Senha alterada com sucesso! <a href='login.php'>Acessar login</a>";
        }

    } else {
        $msg = "Token inválido ou expirado.";
    }

} else {
    $msg = "Requisição inválida.";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nova Senha</title>
  <style>
    body { font-family: Arial; background: #f0f4f7; margin: 0; padding: 0; }
    .container { max-width: 400px; margin: 30px auto; background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
    h2 { text-align: center; }
    input, button { width: 100%; padding: 10px; margin: 10px 0; border-radius: 8px; border: 1px solid #ccc; }
    button { background-color: #28a745; color: white; border: none; }
    button:hover { background-color: #218838; }
    .msg { margin-top: 10px; font-size: 14px; color: green; text-align: center; }
  </style>
</head>
<body>
<div class="container">
  <h2>Defina Sua Nova Senha</h2>
  <?php if (empty($msg) || str_contains($msg, 'Senha alterada') === false): ?>
    <form method="POST">
      <input type="password" name="senha" placeholder="Nova senha" required>
      <button type="submit">Atualizar Senha</button>
    </form>
  <?php endif; ?>
  <div class="msg"><?= $msg ?></div>
</div>
</body>
</html>
