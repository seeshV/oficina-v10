<?php
require_once __DIR__ . '/php/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $senha = $_POST['senha'] ?? '';
    if ($usuario === '' || $senha === '') {
        $msg = 'Preencha todos os campos';
    } else {
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare('INSERT INTO usuarios (usuario, senha_hash) VALUES (?, ?)');
        try {
            $stmt->execute([$usuario, $hash]);
            $success = true;
        } catch (PDOException $e) {
            $msg = 'Erro: usuário já existe ou problema no banco';
        }
    }
}
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Cadastro - Oficina</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/estilo.css">
</head>
<body class="bg-dark text-light">
<div class="container py-5">
  <div class="card mx-auto shadow" style="max-width:560px;">
    <div class="card-body">
      <h3 class="mb-3">Cadastro de usuário</h3>
      <?php if (!empty($msg)): ?><div class="alert alert-warning"><?= htmlspecialchars($msg) ?></div><?php endif; ?>
      <?php if (!empty($success)): ?><div class="alert alert-success">Cadastrado! <a href="login.php">Entrar</a></div><?php else: ?>
      <form method="post">
        <div class="mb-3"><label class="form-label">Usuário</label><input name="usuario" class="form-control" required></div>
        <div class="mb-3"><label class="form-label">Senha</label><input type="password" name="senha" class="form-control" required></div>
        <div class="d-grid"><button class="btn btn-success">Cadastrar</button></div>
      </form>
      <?php endif; ?>
    </div>
  </div>
</div>
</body>
</html>
