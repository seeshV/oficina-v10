<?php
require_once __DIR__ . '/../php/config.php';
session_start();
if (!isset($_SESSION['logado'])) { header('Location: ../login.php'); exit; }

require_once __DIR__ . '/../php/conexao.php';

$id = (int)($_GET['id'] ?? 0);
if (!$id) header('Location: lista_veiculos.php');

$stmt = $conexao->prepare('SELECT * FROM veiculos WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$ve = $stmt->get_result()->fetch_assoc();

if (!$ve) { echo "Veículo não encontrado"; exit; }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Editar Veículo</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= BASE_URL ?>/css/estilo.css?v=<?= time() ?>">
</head>

<body class="bg-dark">

<?php include 'menu.php'; ?>

<div class="container page py-3 text-light">
  <h2>Editar Veículo</h2>

  <form action="../php/atualizar_veiculo.php" method="post">

    <input type="hidden" name="id" value="<?= $ve['id'] ?>">

    <div class="mb-3">
      <label class="form-label">Placa</label>
      <input class="form-control" name="placa" value="<?= htmlspecialchars($ve['placa']) ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Modelo</label>
      <input class="form-control" name="modelo" value="<?= htmlspecialchars($ve['modelo']) ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Marca</label>
      <input class="form-control" name="marca" value="<?= htmlspecialchars($ve['marca']) ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Ano</label>
      <input class="form-control" type="number" name="ano" value="<?= htmlspecialchars($ve['ano']) ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Problema reclamado</label>
      <textarea class="form-control" name="problema_reclamado"><?= htmlspecialchars($ve['problema_reclamado']) ?></textarea>
    </div>

    <div class="d-grid">
      <button class="btn btn-primary">Atualizar</button>
    </div>

  </form>
</div>

</body>
</html>
