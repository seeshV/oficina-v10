<?php
require_once __DIR__ . '/../php/config.php';
if (!isset($_SESSION['logado'])) { header('Location: ../login.php'); exit; }
require_once __DIR__ . '/../php/conexao.php';
$id = (int)($_GET['id'] ?? 0);
if (!$id) header('Location: lista_servicos.php');
$stmt = $conexao->prepare('SELECT * FROM servicos WHERE id=?'); $stmt->bind_param('i',$id); $stmt->execute(); $serv = $stmt->get_result()->fetch_assoc();
if (!$serv) { echo 'Serviço não encontrado'; exit; }
$veiculos = $conexao->query('SELECT id, placa, modelo FROM veiculos ORDER BY placa');
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Editar Serviço</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"><link rel="stylesheet" href="<?= BASE_URL ?>/css/estilo.css"></head><body class="bg-dark text-light">
<?php include 'menu.php'; ?>
<div class="container page py-3">
  <h2>Editar Serviço</h2>
  <form action="../php/atualizar_servico.php" method="post">
    <input type="hidden" name="id" value="<?= $serv['id'] ?>">
    <div class="mb-3"><label class="form-label">Veículo</label><select name="id_veiculo" class="form-select" required><?php while($v=$veiculos->fetch_assoc()): ?><option value="<?= $v['id'] ?>" <?= ($v['id']==$serv['id_veiculo'])? 'selected':'' ?>><?= htmlspecialchars($v['placa']) ?> - <?= htmlspecialchars($v['modelo']) ?></option><?php endwhile; ?></select></div>
    <div class="mb-3"><label class="form-label">Descrição</label><textarea class="form-control" name="descricao_servico" required><?= htmlspecialchars($serv['descricao_servico']) ?></textarea></div>
    <div class="mb-3"><label class="form-label">Valor</label><input class="form-control" name="valor" value="<?= htmlspecialchars($serv['valor']) ?>"></div>
    <div class="mb-3"><label class="form-label">Data</label><input class="form-control" type="date" name="data_servico" value="<?= htmlspecialchars($serv['data_servico']) ?>"></div>
    <div class="d-grid"><button class="btn btn-primary">Atualizar</button></div>
  </form>
</div>
</body></html>
