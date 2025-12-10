<?php
require_once __DIR__ . '/../php/config.php';
session_start();
if (!isset($_SESSION['logado'])) { header('Location: ../login.php'); exit; }
?>
<!doctype html>
<html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Novo Veículo</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= BASE_URL ?>/css/estilo.css">
</head><body class="bg-dark text-light">
<?php include 'menu.php'; ?>
<div class="container page py-3">
  <h2>Novo Veículo</h2>
  <form action="../php/inserir_veiculo.php" method="post">
    <div class="mb-3"><label class="form-label">Placa</label><input class="form-control" name="placa" required></div>
    <div class="mb-3"><label class="form-label">Modelo</label><input class="form-control" name="modelo" required></div>
    <div class="mb-3"><label class="form-label">Marca</label><input class="form-control" name="marca" required></div>
    <div class="mb-3"><label class="form-label">Ano</label><input class="form-control" name="ano" type="number" min="1900" max="2100"></div>
    <div class="mb-3"><label class="form-label">Problema reclamado</label><textarea class="form-control" name="problema_reclamado"></textarea></div>
    <div class="d-grid"><button class="btn btn-success">Salvar veículo</button></div>
  </form>
</div>
</body></html>
