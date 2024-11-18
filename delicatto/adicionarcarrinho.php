<?php
include_once "templates/header.php";
include_once "func.php"; // Inclui o arquivo de funções

// Verifica se o ID do produto e a quantidade estão definidos
if (!isset($_POST["id_produto"]) || !isset($_POST["quantidade"])) {
    // Exibe mensagem de erro
    echo '<div class="mensagem erro">Produto ou quantidade não definidos.</div>';
    exit; // Encerra o script com uma mensagem de erro
} else {
    $idProduto = $_POST["id_produto"];
    $quantidade = (int)$_POST["quantidade"]; // Converte a quantidade para inteiro

    // Chama a função para adicionar o produto ao carrinho, passando o ID e a quantidade
    $resultado = adicionarProdutoAoCarrinho($idProduto, $quantidade);

    // Verifica o resultado da função e exibe a mensagem apropriada
    if ($resultado) {
        echo '<div class="mensagem sucesso">Produto adicionado ao carrinho com sucesso!</div>';
    } else {
        echo '<div class="mensagem erro">Erro ao adicionar produto ao carrinho. Tente novamente.</div>';
    }
}
?>
