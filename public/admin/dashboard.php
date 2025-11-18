<?php
require '../../src/auth.php';
requireAdmin();
?>

<h1>Painel do Administrador</h1>

<p>Bem-vindo, professor <?= $_SESSION['user']['nome'] ?>!</p>

<ul>
    <li><a href="criar-evento.php">Criar novo evento</a></li>
    <li><a href="listar-eventos.php">Gerenciar eventos</a></li>
</ul>

<a href="../logout.php">Sair</a>
