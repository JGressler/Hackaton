<?php

$host = "localhost";      // ou o IP do seu servidor
$user = "root";           // seu usuário do MySQL
$pass = "";               // sua senha do MySQL
$dbname = "eventos_academicos";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);

    // Modo de erros do PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Erro na conexão com o banco: " . $e->getMessage());
}
?>

