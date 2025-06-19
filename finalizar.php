<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}
require 'conexao.php';

$usuario_id = $_SESSION['usuario_id'];
$usuario_nome = $_SESSION['usuario_nome'];

// Dados do usuário
$nutri = $pdo->prepare("SELECT * FROM dados_nutricionais WHERE usuario_id = ?");
$nutri->execute([$usuario_id]);
$dados = $nutri->fetch(PDO::FETCH_ASSOC);

// Alimentos selecionados
$stmt = $pdo->prepare("SELECT a.nome, a.calorias FROM usuario_alimentos ua JOIN alimentos a ON ua.alimento_id = a.id WHERE ua.usuario_id = ?");
$stmt->execute([$usuario_id]);
$alimentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$total_calorias = array_sum(array_column($alimentos, 'calorias'));

// Gera link para WhatsApp
$msg = urlencode("Olá, gostaria de receber meu plano alimentar gerado pelo sistema.");
$link_whatsapp = "https://wa.me/?text=$msg";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Plano Finalizado</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f0f4f7; margin: 0; padding: 0; }
    .container { max-width: 450px; margin: 30px auto; background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
    h2 { text-align: center; }
    ul { padding-left: 20px; }
    li { margin-bottom: 5px; }
    .botao { display: block; margin: 15px 0; background: #28a745; color: #fff; padding: 12px; text-align: center; border-radius: 8px; text-decoration: none; }
    .botao:hover { background: #218838; }
  </style>
</head>
<body>
<div class="container">
  <h2>Plano Alimentar Gerado</h2>
  <p><strong>Nome:</strong> <?= $usuario_nome ?></p>
  <p><strong>IMC:</strong> <?= $dados['imc'] ?> | <strong>TMB:</strong> <?= $dados['tmb'] ?> kcal | <strong>Água/dia:</strong> <?= $dados['agua'] ?> litros</p>
  <h3>Alimentos Selecionados:</h3>
  <ul>
    <?php foreach ($alimentos as $item): ?>
      <li><?= htmlspecialchars($item['nome']) ?> - <?= $item['calorias'] ?> kcal</li>
    <?php endforeach; ?>
  </ul>
  <p><strong>Total calórico:</strong> <?= $total_calorias ?> kcal</p>
  <a class="botao" href="gerar_pdf.php" target="_blank">📄 Gerar PDF do Plano</a>
  <a class="botao" href="<?= $link_whatsapp ?>" target="_blank">📲 Enviar via WhatsApp</a>
  <a class="botao" href="index.php">🏠 Voltar à Página Inicial</a>
</div>
</body>
</html>
