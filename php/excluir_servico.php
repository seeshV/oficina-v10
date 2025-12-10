<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/conexao.php';
$id = (int)($_GET['id'] ?? 0);
if ($id <= 0) { header('Location: ../restrito/lista_servicos.php'); exit; }
$stmt = $conexao->prepare('DELETE FROM servicos WHERE id=?'); $stmt->bind_param('i',$id); $stmt->execute();
header('Location: ../restrito/lista_servicos.php');
exit;
