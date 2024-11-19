<?php
ob_start();
include('process/conn.php');
include('templates/header_admin.php');

if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $erro = '';

    // Verificando o email
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $usuario = mysqli_fetch_assoc($result);

        // Verificando a senha
        if (password_verify($senha, $usuario['senha'])) {
            // Definindo as variáveis de sessão
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['nivel'] = $usuario['nivel'];

            if ($_SESSION['nivel'] == 'admin') {
                header("Location: dashboard.php");
                exit;
            } else {
                header("Location: index.php");
                exit;
            }
        } else {
            $erro = "Senha incorreta!";
        }
    } else {
        $erro = "E-mail não encontrado!";
    }
}
?>

<body>
<div id="login-form-container">
    <form method="POST" action="login.php<?php echo isset($_GET['redirect']) ? '?redirect=' . htmlspecialchars($_GET['redirect']) : ''; ?>">
        <h2>Login</h2>
        <input type="email" name="email" class="form-control" placeholder="E-mail" required>
        <input type="password" name="senha" class="form-control" placeholder="Senha" required>
        <a href="cadastro.php<?php echo isset($_GET['redirect']) ? '?redirect=' . htmlspecialchars($_GET['redirect']) : ''; ?>">Não tem um cadastro? Crie já</a>
        <br><br>
        <input type="submit" value="Entrar" class="btn-submit">
    </form>
    <div id="error-message">
        <?php if (isset($erro)) echo $erro; ?>
    </div>
</div>

<?php
include_once('templates/footer.php');
ob_end_flush();
?>
