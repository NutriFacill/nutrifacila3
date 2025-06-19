<?php
session_start();
require 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

// Busca dados nutricionais
$stmt = $pdo->prepare("SELECT * FROM dados_nutricionais_novo WHERE usuario_id = ?");
$stmt->execute([$usuario_id]);
$dados = $stmt->fetch();

// Busca alimentos
$stmt2 = $pdo->prepare("
    SELECT a.nome, a.calorias 
    FROM alimentos_selecionados_novo s
    JOIN alimentos_novo a ON a.id = s.alimento_id
    WHERE s.usuario_id = ?
");
$stmt2->execute([$usuario_id]);
$alimentos = $stmt2->fetchAll(PDO::FETCH_ASSOC);

$total_calorias = array_sum(array_column($alimentos, 'calorias'));

// Monta mensagem do plano para envio
$mensagem = "Seu Plano Alimentar:\n";
$mensagem .= "Peso: {$dados['peso']} kg\n";
$mensagem .= "Altura: {$dados['altura']} m\n";
$mensagem .= "Idade: {$dados['idade']} anos\n";
$mensagem .= "IMC: " . round($dados['imc'], 2) . "\n";
$mensagem .= "TMB: " . round($dados['tmb'], 2) . " kcal\n";
$mensagem .= "Água por dia: " . round($dados['agua'], 2) . " L\n\n";
$mensagem .= "Alimentos Selecionados:\n";

foreach ($alimentos as $a) {
    $mensagem .= "- {$a['nome']} ({$a['calorias']} kcal)\n";
}
$mensagem .= "\nTotal calórico: " . round($total_calorias, 2) . " kcal";

// Link do WhatsApp
$link_whatsapp = 'https://wa.me/?text=' . urlencode($mensagem);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Plano Alimentar</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
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

    pre {
      background: #eaf6f9;
      padding: 12px;
      border-radius: 8px;
      white-space: pre-wrap;
      word-break: break-word;
    }

    a.button {
      display: block;
      background-color: #28a745;
      color: white;
      text-align: center;
      padding: 12px;
      margin-top: 15px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
    }

    a.button:hover {
      background-color: #218838;
    }

    .email-form {
      margin-top: 17px;
    }

    input[type="email"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 6px;
      border: 1px solid #ccc;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: bold;
    }

    button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
<div class="container">
  <h2>✅ Seu Plano Alimentar</h2>
  <pre><br><?= htmlspecialchars($mensagem) ?><br><br><strong>*Calorias por 100g de Alimento.</strong>
  </pre>

  <a href="<?= $link_whatsapp ?>" class="button" target="_blank">📲 Enviar pelo WhatsApp</a>

  <div class="email-form">
    <form method="post" action="enviar_plano_email.php">
      <input type="hidden" name="mensagem" value="<?= htmlspecialchars($mensagem) ?>">
      <input type="email" name="email" placeholder="Seu e-mail" required>
      <button type="submit">📧 Enviar por E-mail</button>
    </form>
  <div>
     <a class="button" href="index.php">⬅ Voltar à Home</a>
</div>
  </div>
</div>
</body>
</html>
