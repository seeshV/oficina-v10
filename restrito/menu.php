<?php
require_once __DIR__ . '/../php/config.php';
if (!isset($_SESSION['logado'])) { header('Location: ../login.php'); exit; }
?>
<!doctype html>
<html lang="pt-BR">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Menu - Oficina</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= BASE_URL ?>/css/estilo.css">
</head>
<body class="bg-dark text-light">
<nav class="navbar navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Oficina V10</a>
    <div>
      <span class="me-3">Usuário: <?= htmlspecialchars($_SESSION['usuario']) ?></span>
      <a class="btn btn-outline-light btn-sm" href="../logout.php">Sair</a>
    </div>
  </div>
</nav>
<div class="container py-4">
  <div class="row g-3">
    <div class="col-md-4"><a class="card h-100 text-decoration-none text-dark" href="lista_veiculos.php"><div class="card-body"><h5 class="card-title">Veículos</h5><p class="card-text">Gerencie veículos</p></div></a></div>
    <div class="col-md-4"><a class="card h-100 text-decoration-none text-dark" href="lista_servicos.php"><div class="card-body"><h5 class="card-title">Serviços</h5><p class="card-text">Gerencie serviços</p></div></a></div>
  </div>
</div>
</body>
</html>
