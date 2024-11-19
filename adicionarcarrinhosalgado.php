<?php
include_once "templates/header.php";
include_once "func.php"; // Inclui o arquivo de funções

if (!isset($_POST["id_salgado"]) || !isset($_POST["quantidade"])) { 
    exit("Produto ou quantidade não definidos"); // Verifica se os parâmetros estão definidos
}

$idSalgado = $_POST["id_salgado"];
$quantidade = $_POST["quantidade"];

adicionarSalgadoAoCarrinho($idSalgado, $quantidade); // Adiciona o salgado ao carrinho
echo "Salgado adicionado ao carrinho com sucesso!";
?>
