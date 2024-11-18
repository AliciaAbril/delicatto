<?php
// Verifica se os dados necessários estão definidos
if (!isset($_POST["nome"]) || !isset($_POST["preco"]) || !isset($_POST["tipo"])) { 
    exit("Faltam dados"); // Encerra o script com uma mensagem de erro
}

include_once "func.php"; // Inclui o arquivo de funções

// Salva o produto incluindo o tipo
guardarProduto($_POST["nome"], $_POST["preco"], $_POST["tipo"]); 

header("Location: produtos.php"); // Redireciona para a página produtos.php
?>
