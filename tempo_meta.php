<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Conteúdos Extras</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f0f4f7; margin: 0; padding: 0; }
    .container { max-width: 500px; margin: 30px auto; background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
    h2 { text-align: center; margin-bottom: 20px; }
    ul { padding-left: 20px; }
    li { margin-bottom: 10px; }
    a { color: #007bff; text-decoration: none; }
    a:hover { text-decoration: underline; }
    .voltar { display: block; margin-top: 20px; text-align: center; }
  </style>
</head>
<body>
<div class="container">
  <h2>📚 Conteúdos Extras</h2>
  <ul>
    <li><a href="#">Como montar refeições equilibradas</a></li>
    <li><a href="#">Dicas para manter a dieta fora de casa</a></li>
    <li><a href="#">Alimentos que ajudam na saciedade</a></li>
    <li><a href="#">Exemplo de rotina alimentar</a></li>
  </ul>
  <a class="voltar" href="index.php">← Voltar à Home</a>
</div>
</body>
</html>
