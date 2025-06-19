<?php
session_start();
require 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$erro = '';
$sucesso = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dieta_id']) && isset($_POST['alimentos'])) {
    $dieta_id = intval($_POST['dieta_id']);
    $alimentos = $_POST['alimentos'];

    // Limpar escolhas anteriores
    $pdo->prepare("DELETE FROM alimentos_selecionados_novo WHERE usuario_id = ?")->execute([$usuario_id]);

    // Inserir novos alimentos
    $insert = $pdo->prepare("INSERT INTO alimentos_selecionados_novo (usuario_id, alimento_id) VALUES (?, ?)");
    foreach ($alimentos as $alimento_id) {
        $insert->execute([$usuario_id, intval($alimento_id)]);
    }

    $_SESSION['dieta_id'] = $dieta_id;

    header("Location: pagina4_finalizar.php");
    exit();
}

// Carrega as dietas
$dietas = $pdo->query("SELECT * FROM dietas_novo ORDER BY nome")->fetchAll(PDO::FETCH_ASSOC);

// Se já selecionou uma dieta, busca os alimentos dela
$alimentos = [];
if (isset($_GET['dieta'])) {
    $dieta_id = intval($_GET['dieta']);
    $stmt = $pdo->prepare("SELECT * FROM alimentos_novo WHERE dieta_id = ? ORDER BY nome");
    $stmt->execute([$dieta_id]);
    $alimentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Escolha sua Dieta</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 400px;
      margin: 20px auto;
      background: #fff;
      padding: 20px;

    }

    h2 {
      text-align: center;
    }

    select, button {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
    }

    .alimento {
      display: flex;
      justify-content: space-between;
      margin: 8px 0;
      background: #f9f9f9;
      padding: 10px;
      border-radius: 6px;
    }

    .total {
      text-align: center;
      margin-top: 15px;
      font-weight: bold;
      color: green;
    }

    label input {
      margin-right: 10px;
    }

    .erro {
      color: red;
      text-align: center;
    }

    .btn {
      background-color: #28a745;
      color: white;
      border: none;
      font-weight: bold;
      margin-top: 15px;
    }

    .btn:hover {
      background-color: #218838;
    }

    .btn-voltar {
      margin-top: 10px;
      background-color: #6c757d;
    }

    .btn-voltar:hover {
      background-color: #5a6268;
    }
  </style>
</head>
<body>
<div class="container">
  <h2>🍽️ Escolha sua Dieta</h2>

  <form method="GET" action="">
    <label for="dieta_id">Tipo de dieta:</label>
    <select name="dieta" id="dieta_id" onchange="this.form.submit()" required>
      <option value="">Selecione</option>
      <?php foreach ($dietas as $d): ?>
        <option value="<?= $d['id'] ?>" <?= isset($dieta_id) && $dieta_id == $d['id'] ? 'selected' : '' ?>>
          <?= htmlspecialchars($d['nome']) ?>
        </option>
      <?php endforeach; ?>
    </select>
  </form>

  <?php if (!empty($alimentos)): ?>
    <form method="POST">
      <input type="hidden" name="dieta_id" value="<?= $dieta_id ?>">
      <?php foreach ($alimentos as $a): ?>
        <div class="alimento">
          <label>
            <input type="checkbox" name="alimentos[]" value="<?= $a['id'] ?>" data-calorias="<?= $a['calorias'] ?>" onchange="somarCalorias()">
            <?= htmlspecialchars($a['nome']) ?>
          </label>
          <span><?= $a['calorias'] ?> kcal</span>
        </div>
      <?php endforeach; ?>

      <p class="total">Total de calorias: <span id="soma">0</span> kcal</p>

      <button type="submit" class="btn">Avançar</button>
    </form>
  <?php elseif (isset($_GET['dieta'])): ?>
    <p class="erro">Nenhum alimento encontrado para esta dieta.</p>
  <?php endif; ?>

  <a href="pagina2_tempo.php"><button class="btn btn-voltar">Voltar</button></a>
</div>

<script>
  function somarCalorias() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"][data-calorias]');
    let total = 0;
    checkboxes.forEach(cb => {
      if (cb.checked) {
        total += parseFloat(cb.dataset.calorias);
      }
    });
    document.getElementById('soma').innerText = total.toFixed(2);
  }
</script>
</body>
</html>
