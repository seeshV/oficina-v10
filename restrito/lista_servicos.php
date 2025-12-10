<?php
require_once __DIR__ . '/../php/config.php';
session_start();
if (!isset($_SESSION['logado'])) { header('Location: ../login.php'); exit; }
require_once __DIR__ . '/../php/conexao.php';

$id_veiculo = isset($_GET['id_veiculo']) ? (int)$_GET['id_veiculo'] : 0;
if ($id_veiculo) {
    $stmt = $conexao->prepare('SELECT * FROM veiculos WHERE id=?'); $stmt->bind_param('i',$id_veiculo); $stmt->execute(); $ve = $stmt->get_result()->fetch_assoc();
    $stmt2 = $conexao->prepare('SELECT s.*, v.placa, v.modelo FROM servicos s JOIN veiculos v ON s.id_veiculo=v.id WHERE s.id_veiculo=? ORDER BY s.id DESC'); $stmt2->bind_param('i',$id_veiculo); $stmt2->execute(); $servicos = $stmt2->get_result();
} else {
    $servicos = $conexao->query('SELECT s.*, v.placa, v.modelo FROM servicos s JOIN veiculos v ON s.id_veiculo=v.id ORDER BY s.id DESC');
}
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Serviços</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"><link rel="stylesheet" href="<?= BASE_URL ?>/css/estilo.css"></head><body class="bg-dark text-light">
<?php include 'menu.php'; ?>
<div class="container page py-3">
  <h2>Serviços <?= $id_veiculo ? 'do veículo '.htmlspecialchars($ve['placa']) : '' ?></h2>
  <?php if ($id_veiculo): ?>
    <a class="btn btn-success mb-2" href="inserir_servico.php?id_veiculo=<?= $id_veiculo ?>">+ Novo serviço</a>
    <a class="btn btn-secondary mb-2" href="lista_veiculos.php">← Voltar</a>
  <?php else: ?>
    <a class="btn btn-success mb-2" href="inserir_servico.php">+ Novo serviço</a>
  <?php endif; ?>
  <table class="table table-striped table-dark">
    <thead><tr><th>ID</th><th>Veículo</th><th>Descrição</th><th>Valor</th><th>Data</th><th>Ações</th></tr></thead><tbody>
    <?php while($s = $servicos->fetch_assoc()): ?>
      <tr>
        <td><?= $s['id'] ?></td>
        <td><?= htmlspecialchars($s['placa']).' / '.htmlspecialchars($s['modelo']) ?></td>
        <td><?= htmlspecialchars($s['descricao_servico']) ?></td>
        <td><?= htmlspecialchars($s['valor']) ?></td>
        <td><?= htmlspecialchars($s['data_servico']) ?></td>
        <td>
          <a class="btn btn-sm btn-primary" href="editar_servico.php?id=<?= $s['id'] ?>">Editar</a>
          <a class="btn btn-sm btn-danger" href="../php/excluir_servico.php?id=<?= $s['id'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
        </td>
      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>
</div>
</body></html>
