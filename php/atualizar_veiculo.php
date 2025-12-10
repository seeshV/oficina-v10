<?php
require_once __DIR__ . '/config.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: ../restrito/lista_veiculos.php'); exit; }
$id = (int)($_POST['id'] ?? 0);
$placa = $_POST['placa'] ?? ''; $modelo = $_POST['modelo'] ?? ''; $marca = $_POST['marca'] ?? ''; $ano = (int)($_POST['ano'] ?? 0); $problema = $_POST['problema_reclamado'] ?? '';
$stmt = $pdo->prepare('UPDATE veiculos SET placa=?, modelo=?, marca=?, ano=?, problema_reclamado=? WHERE id=?');
$stmt->execute([$placa,$modelo,$marca,$ano ?: null,$problema,$id]);
header('Location: ../restrito/lista_veiculos.php');
exit;
