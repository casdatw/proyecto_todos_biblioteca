<?php
$host = 'localhost';   // O el host de tu servidor
$dbname = 'biblioteca';
$username = 'root';    // Usuario de la base de datos
$password = '';        // Contraseña de la base de datos

try {
    // Conexión con PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
}
?>
