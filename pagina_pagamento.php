<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: pagina_dieta_gerada.php");
    exit();
}

$usuarioId = $_SESSION['usuario_id'];

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
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pagamento - NutriFácil</title>
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
            justify-content: flex-start;
            align-items: center;
        }
        .container form, .container select, .container button, .container .pix-key {
            width: 100%;
            max-width: 500px;
            box-sizing: border-box;
        }
        h2, h3 {
            text-align: center;
        }
        select, input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 5px;
            width: 100%;
            box-sizing: border-box;
        }
        button {
            background: #009688;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 17px;
            cursor: pointer;
            margin-top: 15px;
        }
        button:hover {
            background: #00796B;
        }
        .hidden { display: none; }
        .qrcode {
            max-width: 200px;
            display: block;
            margin: 10px auto;
        }
        .pix-key {
            background: #f0f0f0;
            padding: 5px;
            border-radius: 4px;
            text-align: center;
            font-family: monospace;
            margin-top: 10px;
        }
        .btn-copy {
            display: block;
            margin: 10px auto;
            padding: 8px 12px;
            background: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-copy:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Desbloqueie sua dieta<br>
        Faça um teste por 30 dias <br>
        Por apenas R$19,99 </h2>
        <p>Nome: <strong><?= htmlspecialchars($nomeCompleto) ?></strong></p>

        <label for="forma_pagamento">Selecione a forma de pagamento:</label>
        <select id="forma_pagamento">
            <option value="">Escolha...</option>
            <option value="cartao">Cartão de crédito</option>
            <option value="boleto">Boleto</option>
            <option value="pix">Pix</option>
        </select>

        <div id="cartao_area" class="hidden">
            <h3>Cartão de crédito</h3>
            <label>Número do cartão:</label>
            <input type="text" placeholder="0000 0000 0000 0000">

            <label>Validade (MM/AA):</label>
            <input type="text" placeholder="MM/AA">

            <label>CVV:</label>
            <input type="text" placeholder="123">

            <button type="button">Processar pagamento</button>
        </div>

        <div id="boleto_area" class="hidden">
            <h3>Boleto</h3>
            <button type="button">Gerar boleto</button>
        </div>

        <div id="pix_area" class="hidden">
            <h3>Pix</h3>
            <img src="https://afinz.com.br/wp-content/uploads/2022/04/QR_Code_Afinz.png" alt="QR Code PIX" class="qrcode">
            <p>Escaneie o qrcode para efetuar o pagamento.</p>
            <div class="pix-key" id="pixKey">00020126360014BR.GOV.BCB.PIX0114123456789015204000053039865802BR5920NUTRIFACIL LTDA6009Sao Paulo62070503***6304ABCD</div>
            <button class="btn-copy" onClick="copiarPix()">Copiar chave Pix</button>
        </div>

        <form method="post" action="pagina_envio.php">
            <button type="submit">Já paguei, avançar</button>
        </form>
    </div>

    <script>
        document.getElementById('forma_pagamento').addEventListener('change', function() {
            document.getElementById('cartao_area').classList.add('hidden');
            document.getElementById('boleto_area').classList.add('hidden');
            document.getElementById('pix_area').classList.add('hidden');

            if (this.value === 'cartao') {
                document.getElementById('cartao_area').classList.remove('hidden');
            } else if (this.value === 'boleto') {
                document.getElementById('boleto_area').classList.remove('hidden');
            } else if (this.value === 'pix') {
                document.getElementById('pix_area').classList.remove('hidden');
            }
        });

        function copiarPix() {
            var texto = document.getElementById("pixKey").innerText;
            navigator.clipboard.writeText(texto).then(function() {
                alert("Chave Pix copiada!");
            }, function() {
                alert("Erro ao copiar a chave Pix.");
            });
        }
    </script>
</body>
</html>
