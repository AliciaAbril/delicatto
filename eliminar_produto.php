<?php
?>
<?php
if (!isset($_POST["id_produto"])) { // Verifica se o ID do produto não está definido
    exit("Não tem cadastro"); // Encerra o script com uma mensagem de erro
}

include_once "func.php"; // Inclui o arquivo de funções
eliminarProduto($_POST["id_produto"]); // Remove o produto
header("Location: produtos.php"); // Redireciona para a página produtos.php
?>
