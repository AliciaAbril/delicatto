<?php
include_once 'func.php'; 
$produtos = obterProdutos(); 

// Verifica se $produtos não está vazio
if (!$produtos) {
    $produtos = []; // Inicializa como um array vazio se não houver produtos
}

include_once 'templates/header.php'; // Inclui o cabeçalho da página
?>

<div class="container mt-5">
    <div class="row">
        <?php if (empty($produtos)) : ?>
            <div class="col-12">
                <div class="alert alert-warning">Nenhum produto encontrado.</div>
            </div>
        <?php else: ?>
            <?php foreach ($produtos as $produto) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"><?php echo htmlspecialchars($produto->nome); ?></h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">R$ <?php echo number_format($produto->preco, 2, ',', '.'); ?></h6>
                            <p class="card-text">Tipo: <?php echo htmlspecialchars($produto->tipo); ?></p>
                            <form action="adicionarcarinho.php" method="post">
                                <input type="hidden" name="id_produto" value="<?php echo $produto->id; ?>">
                                <button class="btn btn-primary">Adicionar ao carrinho</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php endif; ?>
    </div>
</div>

<?php include_once 'templates/footer.php'; ?>
