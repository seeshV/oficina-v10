<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../restrito/lista_servicos.php');
    exit;
}

$id = (int)($_POST['id'] ?? 0);
$id_veiculo = (int)($_POST['id_veiculo'] ?? 0);
$descricao = $_POST['descricao_servico'] ?? '';
$valor = $_POST['valor'] ?? null;
$data_servico = $_POST['data_servico'] ?? null;

// ---- Tratamento correto do valor ----
if ($valor === '' || $valor === null) {
    $valor = null;
} else {
    $valor = str_replace(',', '.', $valor); // caso venha "350,00"
    $valor = floatval($valor);
}

$stmt = $conexao->prepare("
    UPDATE servicos 
    SET id_veiculo=?, descricao_servico=?, valor=?, data_servico=? 
    WHERE id=?
");

$stmt->bind_param(
    "isdsi",
    $id_veiculo,
    $descricao,
    $valor,
    $data_servico,
    $id
);

$stmt->execute();

header('Location: ../restrito/lista_servicos.php?id_veiculo=' . $id_veiculo);
exit;
