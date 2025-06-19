<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    die("Sessão de usuário não iniciada. Redirecionando para login...");
}

$usuario_id = $_SESSION['usuario_id'];

// Buscar dados da avaliação
try {
    $stmt = $pdo->prepare("SELECT * FROM dados_nutricionais_novo WHERE usuario_id = ?");
    $stmt->execute([$usuario_id]);
    $avaliacao = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro no banco de dados: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Minha Avaliação Nutricional</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: sans-serif;
      margin: 0;
    }
    .container {
      max-width: 400px;
      margin: 30px auto;
      background: #fff;
      padding: 20px;
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    .info {
      margin-bottom: 10px;
    }
    .voltar, .refazer {
      display: block;
      margin-top: 15px;
      background: #6c757d;
      text-align: center;
      padding: 10px;
      border-radius: 8px;
      color: white;
      text-decoration: none;
    }
    .refazer {
      background-color: #17a2b8;
    }
  </style>
</head>
<body>
<div class="container">
  <h2>📋 Avaliação Nutricional</h2>

  <?php if (!$avaliacao): ?>
    <p>Você ainda não realizou sua avaliação nutricional.</p>
    <a class="voltar" href="index.php">⬅ Voltar à home</a>
    <a class="refazer" href="pagina1_dados.php">🔄 Fazer Avaliação</a>
  <?php else: ?>
    <div class="info"><strong>Peso:</strong> <?= $avaliacao['peso'] ?> kg</div>
    <div class="info"><strong>Altura:</strong> <?= $avaliacao['altura'] ?> cm</div>
    <div class="info"><strong>Idade:</strong> <?= $avaliacao['idade'] ?> anos</div>
    <div class="info"><strong>Gênero:</strong> <?= ucfirst($avaliacao['genero']) ?></div>
    <div class="info"><strong>Objetivo:</strong> <?= $avaliacao['objetivo'] ?></div>
	    <div class="info"><strong>Dieta Selecionada :</strong> Low Carb </div>
        <div class="info"><strong>Tempo de Meta:</strong> <?= $avaliacao['tempo_meta'] ?? 'Não definido' ?></div>
    <div class="info"><strong>Consumo Calórico Diário  :</strong> 1781 kcal <br>
	    <div class="info"><strong><br>
        Déficit Diário  :</strong> 400 kcal<br>
    </div>
    <div class="info"><strong>IMC:</strong> <?= $avaliacao['imc'] ?></div>
    <div class="info"><strong>TMB:</strong> <?= $avaliacao['tmb'] ?> kcal</div>
    <div class="info"><strong>Água por dia:</strong> <?= $avaliacao['agua'] ?> ml</div>

    <a class="voltar" href="index.php">⬅ Voltar à home</a>
    <a class="refazer" href="pagina_avaliacao.php">🔄 Refazer Avaliação</a>
  <?php endif; ?>
</div>
</body>
</html>
