<?php
session_start();

if (!isset($_SESSION['usuario_id']) || !isset($_SESSION['dieta'])) {
    header("Location: pagina3_dieta.php");
    exit();
}

$usuarioId = $_SESSION['usuario_id'];
$dietaSelecionada = $_SESSION['dieta'];
$objetivo = $_SESSION['objetivo'];
$tempo_meta = $_SESSION['tempo_meta'];


$host = 'sistema.techshop.com.br';
$user = 'sistema_user';
$pass = 'ahCee7hieL';
$dbname = 'sistema';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT nome_completo FROM usuarios_novo WHERE id = ?");
    $stmt->execute([$usuarioId]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        die("Usuário não encontrado.");
    }

    $nomeCompleto = $usuario['nome_completo'];

} catch (PDOException $e) {
    die("Erro ao buscar o usuário: " . $e->getMessage());
}

$refeicoes = [
    "Café da Manhã" => [
        'Pão integral 50g',
        'Ovos (galinha) 100g',
        'Nozes 30g',
        'Morango 50g'
    ],
    "Almoço" => [
        'Salmão 150g',
        'Arroz integral 100g',
        'Alface 20g',
        'Tomate 30g',
        'Pepino 20g'
    ],
    "Lanche da Tarde" => [
        'Maçã 100g',
        'Laranja 100g',
        'Castanha-do-Pará 40g'
    ],
    "Jantar" => [
        'Peito de frango grelhado 120g',
        'Abobrinha 80g',
        'Beringela 60g',
        'Quinoa 50g'
    ]
];

// Salva a dieta completa sem máscara
$_SESSION['dieta_gerada'] = $refeicoes;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Plano Alimentar - NutriFácil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            background: #E9F5F5;
            font-family: sans-serif;
        }
        .container {
            min-height: 100%;
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
        }
        .container h2 {
            text-align: center;
        }
        .section {
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            width: 100%;
            max-width: 500px;
            box-sizing: border-box;
        }
        .section h3 {
            margin-top: 0;
            color: #3498db;
        }
        ul {
            padding-left: 20px;
        }
        button {
            background: #009688;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 17px;
            width: 100%;
            max-width: 500px;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover {
            background: #00796B;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Plano Alimentar Personalizado para<br>
          <strong>
          <?= htmlspecialchars($nomeCompleto) ?>
      </strong></h2>
        <p>Objetivo: <strong><?= htmlspecialchars($objetivo) ?>
          <br>
        </strong>Tempo da Meta: <strong>
        <?= htmlspecialchars($tempo_meta) ?> 
        meses<br>
        </strong>Dieta Selecionada: <strong>
        <?= htmlspecialchars($dietaSelecionada) ?>
        <br>
        </strong>
        <?php foreach ($refeicoes as $refeicao => $itens): ?>
        </p>
        <div class="section">
                <h3><?= htmlspecialchars($refeicao) ?></h3>
                <ul>
                    <?php foreach ($itens as $item): ?>
                        <?php
                        $itemExibido = $item;
                        if ($refeicao === 'Café da Manhã') {
                            $itemExibido = str_ireplace(['Pão integral', 'Ovos (galinha)', 'Nozes'], '*************', $itemExibido);
                        } elseif ($refeicao === 'Almoço') {
                            $itemExibido = str_ireplace(['Salmão', 'Arroz integral', 'Alface'], '*************', $itemExibido);
                        } elseif ($refeicao === 'Lanche da Tarde') {
                            $itemExibido = str_ireplace(['Maçã', 'Laranja', 'Castanha-do-Pará'], '*************', $itemExibido);
                        } elseif ($refeicao === 'Jantar') {
                            $itemExibido = str_ireplace(['Peito de frango grelhado', 'Abobrinha', 'Beringela'], '*************', $itemExibido);
                        }
                        ?>
                        <li><?= htmlspecialchars($itemExibido) ?></li>
                    <?php endforeach; ?>
                </ul>
      </div>
        <?php endforeach; ?>

        <form method="post" action="pagina_pagamento.php">
            <button type="submit">Ir para pagamento</button>
        </form>
</div>
</body>
</html>
