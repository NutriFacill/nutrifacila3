<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = trim($_POST['nome_completo']);
    $email = trim($_POST['email']);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO usuarios (nome_completo, email, senha) VALUES (?, ?, ?)");
        $stmt->execute([$nome, $email, $senha]);

        echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='dados_pessoais.php';</script>";
    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1062) {
            echo "<script>alert('E-mail já cadastrado.'); window.location.href='cadastro.php';</script>";
        } else {
            echo "Erro: " . $e->getMessage();
        }
    }
} else {
    header('Location: cadastro.php');
    exit();
}
?>
