<?php
require_once __DIR__ . '/php/config.php';
session_start();
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Oficina - Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/estilo.css?v=<?= time() ?>">

</head>
<body class="bg-dark text-light">
<div class="container py-5">
  <div class="card mx-auto shadow" style="max-width:480px;">
    <div class="card-body">
      <h3 class="card-title text-center mb-3">Sistema Oficina V10</h3>
      <form action="autentica.php" method="post">
        <div class="mb-3">
          <label class="form-label">Usuário</label>
          <input class="form-control" name="usuario" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Senha</label>
          <input class="form-control" type="password" name="senha" required>
        </div>
        <div class="d-grid">
          <button class="btn btn-primary">Entrar</button>
        </div>
      </form>
      <hr>
      <div class="text-center"><a class="login-extra-link" href="cadastro_usuario.php">Cadastrar novo usuário</a></div>

    </div>
  </div>
</div>
</body>
</html>
