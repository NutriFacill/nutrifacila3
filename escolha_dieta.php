<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}
require 'conexao.php';

// Processa escolha de alimentos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dieta_id'])) {
    $usuario_id = $_SESSION['usuario_id'];
    $alimentos = $_POST['alimentos'] ?? [];

    // Remove alimentos anteriores
    $pdo->prepare("DELETE FROM usuario_alimentos WHERE usuario_id = ?")->execute([$usuario_id]);

    // Insere novos
    $stmt = $pdo->prepare("INSERT INTO usuario_alimentos (usuario_id, alimento_id) VALUES (?, ?)");
    foreach ($alimentos as $alimento_id) {
        $stmt->execute([$usuario_id, $alimento_id]);
    }

    header('Location: finalizar.php');
    exit();
}

// Carrega dietas
$dietas = $pdo->query("SELECT * FROM dietas")->fetchAll(PDO::FETCH_ASSOC);

// Se dieta for selecionada, exibe alimentos
$alimentos = [];
if (isset($_GET['dieta'])) {
    $dieta_id = (int)$_GET['dieta'];
    $stmt = $pdo->prepare("SELECT * FROM alimentos WHERE dieta_id = ? ORDER BY nome ASC");
    $stmt->execute([$dieta_id]);
    $alimentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Escolha sua Dieta</title>
  <style>
    body { font-family: Arial; background: #f0f4f7; margin: 0; padding: 0; }
    .container { max-width: 450px; margin: 30px auto; background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
    h2 { text-align: center; }
    form { display: flex; flex-direction: column; gap: 12px; }
    select, button { padding: 10px; border-radius: 8px; border: 1px solid #ccc; }
    .lista { max-height: 300px; overflow-y: auto; background: #f8f8f8; padding: 10px; border-radius: 8px; margin-top: 10px; }
    label { display: block; margin-bottom: 8px; }
    .resumo { font-weight: bold; margin-top: 15px; }
  </style>
  <script>
    function calcularCalorias() {
      const checks = document.querySelectorAll('input[name="alimentos[]"]:checked');
      let total = 0;
      checks.forEach(chk => total += parseInt(chk.dataset.calorias));
      document.getElementById('totalCalorias').textContent = total + ' kcal';
    }
  </script>
</head>
<body>
<div class="container">
  <h2>Escolha sua Dieta</h2>
  <form method="get">
    <select name="dieta" onchange="this.form.submit()">
      <option value="">Selecione a dieta</option>
      <?php foreach ($dietas as $dieta): ?>
        <option value="<?= $dieta['id'] ?>" <?= isset($dieta_id) && $dieta_id == $dieta['id'] ? 'selected' : '' ?>>
          <?= htmlspecialchars($dieta['nome']) ?>
        </option>
      <?php endforeach; ?>
    </select>
  </form>

  <?php if (!empty($alimentos)): ?>
    <form method="post">
      <input type="hidden" name="dieta_id" value="<?= $dieta_id ?>">
      <div class="lista">
        <?php foreach ($alimentos as $alimento): ?>
          <label>
            <input type="checkbox" name="alimentos[]" value="<?= $alimento['id'] ?>" data-calorias="<?= $alimento['calorias'] ?>" onchange="calcularCalorias()">
            <?= htmlspecialchars($alimento['nome']) ?> - <?= $alimento['calorias'] ?> kcal
          </label>
        <?php endforeach; ?>
      </div>
      <p class="resumo">Total calórico: <span id="totalCalorias">0 kcal</span></p>
      <button type="submit">Salvar Dieta e Continuar</button>
    </form>
  <?php endif; ?>
</div>
</body>
</html>
