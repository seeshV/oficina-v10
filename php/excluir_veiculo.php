<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/conexao.php';
$id = (int)($_GET['id'] ?? 0);
if ($id <= 0) { header('Location: ../restrito/lista_veiculos.php'); exit; }
// services cascade due to FK ON DELETE CASCADE, but ensure removal
$stmt = $conexao->prepare('DELETE FROM veiculos WHERE id=?'); $stmt->bind_param('i',$id); $stmt->execute();
header('Location: ../restrito/lista_veiculos.php');
exit;
