<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['dieta'] = $_POST['dieta'];
    $_SESSION['proteinas'] = $_POST['proteinas'];
    $_SESSION['carboidratos'] = $_POST['carboidratos'];
    $_SESSION['legumes'] = $_POST['legumes'];
    $_SESSION['verduras'] = $_POST['verduras'];
    $_SESSION['frutas'] = $_POST['frutas'];
    $_SESSION['alergias'] = isset($_POST['alergias']) ? implode(', ', $_POST['alergias']) : 'Nenhuma';

    header("Location: pagina_dieta_gerada.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Escolha sua Dieta - NutriFácil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="estilo.css">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            background: #fff;
            max-width: 600px;
            margin: auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-top: 10px;
            color: #555;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }
        select[multiple] {
            height: auto;
        }
        button {
            margin-top: 20px;
            padding: 12px;
            width: 100%;
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Escolha sua Dieta</h2>
        <form method="post">

            <label>Dieta:</label>
            <select name="dieta" required>
                <option value="">Selecione</option>
                <option value="Mediterrânea">Mediterrânea: azeite de oliva, peixes, grãos integrais, legumes e frutas.</option>
                <option value="Low Carb">Low Carb: redução de carboidratos, aumento de proteínas e gorduras boas.</option>
                <option value="Cetogênica">Cetogênica: muito baixa em carboidratos e alta em gorduras.</option>
                <option value="Vegetariana">Vegetariana: sem carnes, inclui ovos, laticínios e leguminosas.</option>
            </select>

            <label>Proteínas (separadas por vírgula):</label>
            <input type="text" name="proteinas" placeholder="Ex: frango, ovo, peixe">

            <label>Carboidratos (separadas por vírgula):</label>
            <input type="text" name="carboidratos" placeholder="Ex: arroz integral, batata doce, quinoa">

            <label>Legumes (separadas por vírgula):</label>
            <input type="text" name="legumes" placeholder="Ex: abobrinha, berinjela, cenoura">

            <label>Verduras (separadas por vírgula):</label>
            <input type="text" name="verduras" placeholder="Ex: alface, rúcula, espinafre">

            <label>Frutas (separadas por vírgula):</label>
            <input type="text" name="frutas" placeholder="Ex: maçã, banana, morango">

            <label>Alergias/Intolerâncias:</label>
            <select name="alergias[]" multiple size="5">
                <option value="Lactose">Lactose</option>
                <option value="Glúten">Glúten</option>
                <option value="Ovo">Ovo</option>
                <option value="Frutos do mar">Frutos do mar</option>
                <option value="Nenhuma">Nenhuma</option>
            </select>

            <button type="submit">Gerar Dieta</button>
        </form>
    </div>
</body>
</html>
