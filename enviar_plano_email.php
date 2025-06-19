<?php
session_start();
require 'conexao.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['usuario_id'])) {
    echo "Usuário não autenticado.";
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

// Buscar e-mail do usuário
$stmt = $pdo->prepare("SELECT email FROM usuarios_novo WHERE id = ?");
$stmt->execute([$usuario_id]);
$usuario = $stmt->fetch();

if (!$usuario || empty($usuario['email'])) {
    echo "E-mail do usuário não encontrado.";
    exit();
}

$destinatario = $usuario['email'];

// Verifica se os dados do plano foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['conteudo_plano'])) {
    $assunto = "Seu Plano Alimentar Personalizado";
    $mensagem = nl2br(htmlspecialchars($_POST['conteudo_plano']));
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: rafaozster@gmail.com\r\n";

    if (mail($destinatario, $assunto, $mensagem, $headers)) {
        echo "✅ Plano alimentar enviado com sucesso para: $destinatario";
    } else {
        echo "❌ Falha ao enviar e-mail. Verifique o servidor.";
    }
} else {
    echo "❌ Nenhum conteúdo recebido para envio.";
}
?>
