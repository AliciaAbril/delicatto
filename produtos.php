<?php include_once "templates/header.php" ?>
<?php
include_once "func.php";
$produtos = obterProdutos(); // Chama a função para obter os produtos do banco de dados
?>
<div class="columns">
    <div class="column">
        <h2 class="is-size-2">Produtos Cadastrados</h2>
        <a class="button is-success" href="adicionarproduto.php">Novo&nbsp;<i class="fa fa-plus"></i></a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Tipo</th> <!-- Nova coluna para Tipo -->
                    <th>Apagar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($produto->nome); ?></td>
                        <td>R$<?php echo number_format($produto->preco, 2, ',', '.'); ?></td>
                        <td><?php echo htmlspecialchars($produto->tipo); ?></td> <!-- Exibindo o Tipo do Produto -->
                        <td>
                            <form action="eliminar_produto.php" method="post">
                                <input type="hidden" name="id_produto" value="<?php echo $produto->id; ?>">
                                <button class="button is-danger">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
