<?php include_once "templates/header.php" ?>
<div class="columns">
    <div class="column is-one-third">
        <h2 class="is-size-2">Novo produto</h2>
        <form action="salvar_produto.php" method="post">
            <div class="field">
                <label for="nome">Nome</label>
                <div class="control">
                    <input required id="nome" class="input" type="text" placeholder="Nome" name="nome">
                </div>
            </div>
            <div class="field">
                <label for="tipo">Tipo</label>
                <div class="control">
                    <div class="select is-fullwidth">
                        <select required id="tipo" name="tipo"> <!-- Campo select para Tipo -->
                            <option value="" disabled selected>Selecione o tipo</option> <!-- Placeholder -->
                            <option value="massa">Massa</option>
                            <option value="recheio">Recheio</option>
                            <option value="cobertura">Cobertura</option>
                            <option value="doce">Doce</option>
                            <option value="salgado">Salgado</option>
                            <option value="bebida">Bebida</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <label for="preco">Preço</label>
                <div class="control">
                    <input required id="preco" name="preco" class="input" type="number" placeholder="Preço" step="0.01">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <button class="button is-success">Salvar</button>
                    <a href="produtos.php" class="button is-warning">Voltar</a>
                </div>
            </div>
        </form>
    </div>
</div>
