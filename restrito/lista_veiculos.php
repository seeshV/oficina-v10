<?php
require_once __DIR__ . '/../php/config.php';
session_start();
if (!isset($_SESSION['logado'])) { header('Location: ../login.php'); exit; }
require_once __DIR__ . '/../php/conexao.php';

$veiculos = $conexao->query('SELECT * FROM veiculos ORDER BY id DESC');
?>
<!doctype html>
<html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Veículos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= BASE_URL ?>/css/estilo.css">
</head><body class="bg-dark text-light">
<?php include 'menu.php'; ?>
<div class="container py-3 page">
  <h2>Veículos</h2>
  <a class="btn btn-success mb-2" href="inserir_veiculo.php">+ Novo veículo</a>
  <table class="table table-striped table-dark">
    <thead><tr><th>ID</th><th>Placa</th><th>Modelo</th><th>Marca</th><th>Ano</th><th>Ações</th></tr></thead>
    <tbody>
    <?php while($v = $veiculos->fetch_assoc()): ?>
      <tr>
        <td><?= $v['id'] ?></td>
        <td><?= htmlspecialchars($v['placa']) ?></td>
        <td><?= htmlspecialchars($v['modelo']) ?></td>
        <td><?= htmlspecialchars($v['marca']) ?></td>
        <td><?= htmlspecialchars($v['ano']) ?></td>
        <td>
          <a class="btn btn-sm btn-primary" href="editar_veiculo.php?id=<?= $v['id'] ?>">Editar</a>
          <a class="btn btn-sm btn-danger" href="../php/excluir_veiculo.php?id=<?= $v['id'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
          <a class="btn btn-sm btn-info text-dark" href="lista_servicos.php?id_veiculo=<?= $v['id'] ?>">Serviços</a>
        </td>
      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>
</div>
</body></html>
