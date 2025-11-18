<?php
require '../src/db.php';
require '../src/auth.php';

if (isLogged()) {
    // se já estiver logado, pula pro dashboard
    if (isAdmin()) {
        header("Location: admin/dashboard.php");
    } else {
        header("Location: dashboard.php");
    }
    exit;
}

$erro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($senha, $user['senha'])) {
        $_SESSION['user'] = $user;

        if ($user['tipo'] === 'admin') {
            header("Location: admin/dashboard.php");
        } else {
            header("Location: dashboard.php");
        }
        exit;
    } else {
        $erro = "Email ou senha incorretos";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login - Sistema de Eventos</title>
</head>
<body>

<h2>Login</h2>

<?php if ($erro): ?>
    <p style="color:red;"><?= $erro ?></p>
<?php endif; ?>

<form method="POST">
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Senha:</label><br>
    <input type="password" name="senha" required><br><br>

    <button type="submit">Entrar</button>
</form>

</body>
</html>
