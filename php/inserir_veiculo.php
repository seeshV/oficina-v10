<?php
require_once __DIR__ . '/config.php';
// accept from restrito form (POST)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: ../restrito/lista_veiculos.php'); exit; }
$placa = $_POST['placa'] ?? '';
$modelo = $_POST['modelo'] ?? '';
$marca = $_POST['marca'] ?? '';
$ano = (int)($_POST['ano'] ?? 0);
$problema = $_POST['problema_reclamado'] ?? '';
$stmt = $pdo->prepare('INSERT INTO veiculos (placa, modelo, marca, ano, problema_reclamado) VALUES (?,?,?,?,?)');
$stmt->execute([$placa, $modelo, $marca, $ano ?: null, $problema]);
header('Location: ../restrito/lista_veiculos.php');
exit;
