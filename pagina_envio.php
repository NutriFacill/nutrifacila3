<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');

if (!isset($_SESSION['usuario_id'])) {
    die("Sessão expirada. Por favor, volte ao início.");
}

if (!isset($_SESSION['dieta_gerada'])) {
    die("Dieta não encontrada. Por favor, gere novamente sua dieta.");
}

$usuarioId = $_SESSION['usuario_id'];
$dieta = $_SESSION['dieta_gerada'];

$host = 'localhost';
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
        die("Usuário não encontrado no banco de dados.");
    }

    $nomeCompleto = $usuario['nome_completo'];

} catch (PDOException $e) {
    die("Erro ao buscar o usuário: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Envio do Plano - NutriFácil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            background: #E9F5F5;
            font-family: sans-serif;
            box-sizing: border-box;
        }
        .container {
            min-height: 100%;
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h2 {
            text-align: center;
        }
        .section {
            background: #ecf0f1;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            width: 100%;
            max-width: 500px;
            box-sizing: border-box;
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
            width: 100%;
            max-width: 500px;
            box-sizing: border-box;
        }
        button:hover {
            background: #2980b9;
        }
        .center {
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
        .footer-buttons {
            margin-top: 30px;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Dieta gerada para: <br>
        <?= htmlspecialchars($nomeCompleto) ?></h2>

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

        <div class="footer-buttons">
            <form method="post" action="index.php">
                <button type="submit">Voltar ao Dashboard</button>
            </form>
        </div>
    </div>
</body>
</html>
