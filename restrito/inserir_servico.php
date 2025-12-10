<?php
require_once __DIR__ . '/../php/config.php';
session_start();
if (!isset($_SESSION['logado'])) { header('Location: ../login.php'); exit; }
require_once __DIR__ . '/../php/conexao.php';
$id_veiculo = isset($_GET['id_veiculo']) ? (int)$_GET['id_veiculo'] : 0;
$veiculos = $conexao->query('SELECT id, placa, modelo FROM veiculos ORDER BY placa');
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Novo Serviço</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"><link rel="stylesheet" href="<?= BASE_URL ?>/css/estilo.css"></head><body class="bg-dark text-light">
<?php include 'menu.php'; ?>
<div class="container page py-3">
  <h2>Novo Serviço</h2>
  <form action="../php/inserir_servico.php" method="post">
    <div class="mb-3"><label class="form-label">Veículo</label><select name="id_veiculo" class="form-select" required><option value="">-- selecione --</option><?php while($v=$veiculos->fetch_assoc()): ?><option value="<?= $v['id'] ?>" <?= ($id_veiculo && $id_veiculo==$v['id'])? 'selected':'' ?>><?= htmlspecialchars($v['placa']) ?> - <?= htmlspecialchars($v['modelo']) ?></option><?php endwhile; ?></select></div>
    <div class="mb-3"><label class="form-label">Descrição</label><textarea class="form-control" name="descricao_servico" required></textarea></div>
    <div class="mb-3"><label class="form-label">Valor</label><input class="form-control" name="valor"></div>
    <div class="mb-3"><label class="form-label">Data</label><input class="form-control" type="date" name="data_servico"></div>
    <div class="d-grid"><button class="btn btn-success">Salvar serviço</button></div>
  </form>
</div>
</body></html>
