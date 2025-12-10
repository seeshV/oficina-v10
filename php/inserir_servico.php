<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../restrito/lista_servicos.php');
    exit;
}

$id_veiculo = (int)($_POST['id_veiculo'] ?? 0);
$descricao = $_POST['descricao_servico'] ?? '';
$valor = $_POST['valor'] ?? null;
$data_servico = $_POST['data_servico'] ?? null;

// Garantir que o valor seja numérico
if ($valor === '' || $valor === null) {
    $valor = null;
} else {
    $valor = str_replace(',', '.', $valor); // caso venha 350,00
    $valor = floatval($valor);
}

$stmt = $conexao->prepare("
    INSERT INTO servicos (id_veiculo, descricao_servico, valor, data_servico)
    VALUES (?, ?, ?, ?)
");

$stmt->bind_param(
    "isds",
    $id_veiculo,
    $descricao,
    $valor,
    $data_servico
);

if ($stmt->execute()) {
    header("Location: ../restrito/lista_servicos.php?id_veiculo=" . $id_veiculo);
    exit;
} else {
    echo "Erro ao inserir serviço: " . $stmt->error;
}
