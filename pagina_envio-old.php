<?php
session_start();

if (!isset($_SESSION['nome']) || !isset($_SESSION['sobrenome']) || !isset($_SESSION['dieta_gerada'])) {
    header("Location: pagina_pagamento.php");
    exit();
}

$nome = $_SESSION['nome'];
$sobrenome = $_SESSION['sobrenome'];
$dieta = $_SESSION['dieta_gerada'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Envio do Plano - NutriFácil</title>
    <link rel="stylesheet" href="estilo.css">
    <style>
        .section {
            background: #ecf0f1;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .section h3 {
            color: #3498db;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }
        ul {
            padding-left: 20px;
        }
        button {
            padding: 12px;
            margin: 10px 5px;
            background: #3498db;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background: #2980b9;
        }
        .center {
            text-align: center;
        }
        .footer-buttons {
            margin-top: 30px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Dieta gerada para: <?= htmlspecialchars($nome . ' ' . $sobrenome) ?></h2>

        <?php foreach ($dieta as $refeicao => $itens): ?>
            <div class="section">
                <h3><?= htmlspecialchars($refeicao) ?></h3>
                <ul>
                    <?php foreach ($itens as $item): ?>
                        <li><?= htmlspecialchars($item) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>

        <div class="center">
            <button type="button">Enviar Dieta por e-mail</button>
            <button type="button">Enviar Dieta via WhatsApp</button>
        </div>

        <p class="center" style="margin-top: 20px;">Obrigado por utilizar o <strong>NutriFácil!</strong></p>

        <div class="footer-buttons">
            <form method="post" action="index.php">
                <button type="submit">Voltar à Home</button>
            </form>
        </div>
    </div>
</body>
</html>
