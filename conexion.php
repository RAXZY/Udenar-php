<?php
// conexion.php

$host = '127.0.0.1';
$db   = 'udenar_db';
$user = 'alci'; 
$pass = '12345';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    // Creamos la variable $pdo que usaremos en los otros archivos
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (\PDOException $e) {
    // Si la base de datos se cae, avisamos en formato JSON para no romper el Fetch
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['error' => 'Error de conexión a la BD: ' . $e->getMessage()]);
    exit;
}
?>