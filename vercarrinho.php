<?php 
include_once "templates/header.php";
?>

<?php
include_once "func.php"; // Inclui o arquivo de funções
$produtos = obterProdutosNoCarrinho(); // Obtém os produtos no carrinho
if (count($produtos) <= 0) { // Verifica se o carrinho está vazio
?>
   <section class="hero is-info">
    <div class="hero-body">
        <div class="containerc has-text-centered">
            <h1 class="title has-text-weight-bold">
                Adicione itens ao seu carrinho
            </h1>
            <h2 class="subtitle has-text-light" id="subtitle">
                Veja nosso cardápio para escolher os itens
            </h2>
            <button class="button is-warning is-large" onclick="window.location.href='ver_pdf.php?file=cardapio.pdf'">Ver cardápio</button>
        </div>
    </div>
</section>

<?php } else { ?>
    <div class="columns is-centered">
        <div class="column is-8">
            <h2 class="is-size-2 has-text-centered has-text-danger">Meu Carrinho de Compras</h2>
            <table class="table is-striped is-hoverable">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Remover</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0; // Inicializa o total
                    foreach ($produtos as $produto) { // Itera pelos produtos no carrinho
                        $total += $produto->preco; // Acumula o preço dos produtos
                    ?>
                        <tr>
                            <td><?php echo $produto->nome ?></td> <!-- Nome do produto -->
                            <td>R$ <?php echo number_format($produto->preco, 2, ',', '.') ?></td> <!-- Preço do produto formatado -->
                            <td>
                                <form action="apagardocarrinho.php" method="post"> <!-- Formulário para remover produto -->
                                    <input type="hidden" name="id_produto" value="<?php echo $produto->id ?>"> <!-- ID do produto -->
                                    <input type="hidden" name="redirecionar_carinho"> <!-- Para redirecionar depois -->
                                    <button class="button is-danger">
                                        <i class="fa fa-trash-o"></i> <!-- Ícone de remover -->
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="is-size-4 has-text-right"><strong>Total</strong></td>
                        <td colspan="2" class="is-size-4 has-text-weight-bold">
                            R$ <?php echo number_format($total, 2, ',', '.') ?> 
                        </td>
                    </tr>
                </tfoot>
            </table>
            <div class="botao_carrinho">
                <a href="terminar_compra.php" class="botao_finalizar"><i class="fa fa-check"></i>&nbsp;Finalizar compra</a>
            </div>
        </div>
    </div>

<?php } ?>
<?php include_once "templates/footer.php" ?>
