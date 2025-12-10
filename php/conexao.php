<?php
// mysqli compatibility layer for scripts that use $conexao
require_once __DIR__ . '/config.php';

$conexao = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conexao->connect_error) {
    die('Erro MySQLi: ' . $conexao->connect_error);
}
$conexao->set_charset('utf8mb4');
