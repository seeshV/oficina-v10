<?php
require_once __DIR__ . '/php/config.php';

$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';

if (!$usuario || !$senha) {
    header('Location: login.php?error=1');
    exit;
}

$stmt = $pdo->prepare('SELECT id, usuario, senha_hash FROM usuarios WHERE usuario = ? LIMIT 1');
$stmt->execute([$usuario]);
$user = $stmt->fetch();

if ($user && password_verify($senha, $user['senha_hash'])) {
    $_SESSION['logado'] = true;
    $_SESSION['usuario_id'] = $user['id'];
    $_SESSION['usuario'] = $user['usuario'];
    header('Location: restrito/menu.php');
    exit;
} else {
    header('Location: login.php?error=1');
    exit;
}
