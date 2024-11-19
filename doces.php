<?php
session_start();
include("process/conn.php"); 
include("templates/header.php");

// Consulta para buscar produtos do tipo "doce" na tabela `produtos`
$query = "SELECT * FROM produtos WHERE tipo = 'doce'"; 
$result = mysqli_query($conn, $query);
?>

<div class="container my-5">
    <h2 class="text-center mb-5">Doces</h2>
    <div class="row doces justify-content-center">

    <?php while ($produto = mysqli_fetch_object($result)) { ?>
        <div class="col-md-6 col-lg-4 mb-4 d-flex align-items-stretch">
            <div class="card h-100 shadow-sm border-0">
                <!-- Exibir imagem armazenada no banco de dados -->
                <img src="<?php echo htmlspecialchars($produto->imagem); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($produto->nome); ?>">
                <div class="card-body text-center">
                    <h5 class="card-title"><?php echo htmlspecialchars($produto->nome); ?></h5>
                    <p class="card-text text-muted">R$<?php echo number_format($produto->preco, 2, ',', '.'); ?></p>
                    
                    <label class="quantity-label">Quantidade:</label>
                    <input type="number" name="quantidade" id="quantidade-<?php echo $produto->id; ?>" min="1" value="1" class="quantity-input">

                    <div class="mt-3">
                        <?php if (produtoJaEstaNoCarrinho($produto->id)) { ?>
                            <form action="apagardocarrinho.php" method="post" class="d-inline">
                                <input type="hidden" name="id_produto" value="<?php echo $produto->id; ?>">
                                <span class="button is-success btn btn-success btn-sm mr-2">
                                    <i class="fa fa-check"></i>&nbsp;No Carrinho
                                </span>
                                <button class="button is-danger btn btn-danger btn-sm">
                                    <i class="fa fa-trash-o"></i>&nbsp;Remover
                                </button>
                            </form>
                        <?php } else { ?>
                            <!-- Formulário de adição ao carrinho -->
                            <form action="adicionarcarrinho.php" method="post" class="d-inline">
                                <input type="hidden" name="id_produto" value="<?php echo $produto->id; ?>"> <!-- ID do produto -->
                                <input type="hidden" name="quantidade" value="1" id="quantidade-<?php echo $produto->id; ?>"> <!-- Quantidade -->
                                <button class="button is-primary btn btn-primary btn-sm">
                                    <i class="fa fa-cart-plus"></i>&nbsp;Adicionar ao carrinho
                                </button>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    
    </div>
</div>
