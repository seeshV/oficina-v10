<?php
// php/config.php - central config
error_reporting(E_ALL);
ini_set('display_errors', 0);


session_start();

// MySQL credentials - adjust if necessary
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','oficina');

// Base URL (used for linking css/js). If you place folder 'oficina' inside htdocs, keep '/oficina'
define('BASE_URL','/oficina_a_final');


// PDO connection
try {
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8mb4", DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco: " . $e->getMessage());
}
