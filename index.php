<?php
session_start();
require 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

$stmt = $pdo->prepare("SELECT nome_completo FROM usuarios_novo WHERE id = ?");
$stmt->execute([$usuario_id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT * FROM dados_nutricionais_novo WHERE usuario_id = ?");
$stmt->execute([$usuario_id]);
$dados = $stmt->fetch(PDO::FETCH_ASSOC);

$mensagemSaudacao = "<h3>Olá, " . htmlspecialchars($usuario['nome_completo']) . "!</h3>";
$resultadoIMC = $dados ? "<p><strong>IMC:</strong> " . number_format($dados['imc'], 2) . "</p>" : '';
$resultadoTMB = $dados ? "<p><strong>TMB:</strong> " . number_format($dados['tmb'], 2) . " kcal</p>" : '';
$resultadoAgua = $dados ? "<p><strong>Água por dia:</strong> " . number_format($dados['agua'], 2) . " litros</p>" : '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Área do Usuário</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
    .container { max-width: 350px; margin: auto; padding: 20px; }
    h2, h3 { text-align: center; }
    p { text-align: center; margin: 8px 0; }
    .button {
      display: block;
      width: 95%;
      text-align: center;
      background-color: #007bff;
      color: white;
      padding: 14px;
      margin: 10px 0;
      border: none;
      border-radius: 10px;
      text-decoration: none;
      font-weight: bold;
    }
    .button.red { background-color: #dc3545; }
	 .button.blue { background-color: #28A745; }
  </style>
</head>
<body>
  <div class="container">
    <h2><img src="img/logo.png" width="149" height="28"></h2>
    <?= $mensagemSaudacao ?>
    <?= $resultadoIMC ?>
    <?= $resultadoTMB ?>
    <?= $resultadoAgua ?>

    <!-- Botão adicional para iniciar avaliação nutricional -->
    <a href="pagina_avaliacao.php" class="button">📝 Fazer Avaliação Nutricional</a>

    <a href="ver_dieta.php" class="button">📊 Resumo da Avaliação</a>
    <a href="receitas.php" class="button">🥗 Receitas</a>
    <a href="treinos.php" class="button">🏋️ Treinos</a>
    <a href="conteudos_extras.php" class="button">📚 Conteúdos Extras</a>
    <a href="https://wa.me/5531971857474" class="button blue">💬​ Suporte via WhatsApp</a>
    <a href="logout.php" class="button red">🚪 Sair</a></div>
</body>
</html>
