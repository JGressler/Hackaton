<?php
require '../src/auth.php';
requireLogin();
?>

<h1>Bem-vindo, <?= $_SESSION['user']['nome'] ?></h1>

<p>Aqui o aluno verá os eventos disponíveis e inscrições.</p>

<a href="logout.php">Sair</a>
