<?php
include('process/conn.php');
include('templates/header.php');

if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);  // Criptografando a senha
    $nivel = $_POST['nivel'];  // Recebendo o papel do usuário

    // Inserindo no banco de dados
    $sql = "INSERT INTO usuarios (nome, email, senha, nivel) VALUES ('$nome', '$email', '$senha', '$nivel')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Usuário cadastrado com sucesso!');</script>";
        header("Location: login.php?redirect=doces.php");
        exit;
    } else {
        echo "<script>alert('Erro ao cadastrar usuário!');</script>";
    }
}
?>

    <div id="login-form-container">
        <form method="POST" action="cadastro.php">
            <h2>Cadastrar Usuário</h2>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" class="form-control" required><br>
            <label for="email">E-mail:</label>
            <input type="email" name="email" class="form-control" required><br>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" class="form-control" required><br>
            <label for="nivel">Tipo de Usuário:</label>
            <select name="nivel" class="form-control">
                <option value="usuario">Usuário</option>
                <option value="admin">Administrador</option>
            </select><br>
            <input type="submit" value="Cadastrar" class="btn-submit">
        </form>
    </div>

    <?php
include_once('templates/footer.php');
?>