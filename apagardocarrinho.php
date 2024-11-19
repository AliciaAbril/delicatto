<?php
include_once "func.php"; // Inclui o arquivo de funções
if (!isset($_POST["id_produto"])) { // Verifica se o ID do produto não está definido
    exit("Não há produto"); // Encerra o script com uma mensagem de erro
}
removerProdutoDoCarrinho($_POST["id_produto"]); // Remove o produto do carrinho

if (isset($_POST["redirecionar_carrinho"])) { // Verifica se a variável de redirecionamento do carrinho está definida
    header("Location: vercarrinho.php"); // Redireciona para a página vercarrinho.php
} else {
    header("Location: vercarrinho.php"); // Redireciona para a página catalogo.php
}
?>
