<?php

// Configurações de conexão
$user = "root";
$pass = "";
$db = "delicatto"; 
$host = "localhost";

$conn = mysqli_connect($host, $user, $pass, $db);

function obterProdutos()
{
    $bd = obterConexao();
    // Adicionando a coluna tipo na consulta SQL
    $sentencia = $bd->query("SELECT id, nome, preco, tipo FROM produtos");
    return $sentencia->fetchAll(PDO::FETCH_OBJ); // Retorna todos os produtos como objetos
}

function adicionarProdutoAoCarrinho($idProduto, $quantidade)
{
    $bd = obterConexao();
    iniciarSessaoSeNaoIniciada();
    $idSessao = session_id();

    // Verifica se o produto já está no carrinho do usuário
    $sentenciaVerificar = $bd->prepare("SELECT quantidade FROM carrinho_usuarios WHERE id_sessao = ? AND id_produto = ?");
    $sentenciaVerificar->execute([$idSessao, $idProduto]);
    $produtoExistente = $sentenciaVerificar->fetch(PDO::FETCH_OBJ);

    if ($produtoExistente) {
        // Se o produto já está no carrinho, atualize a quantidade
        $novaQuantidade = $produtoExistente->quantidade + $quantidade;
        $sentenciaAtualizar = $bd->prepare("UPDATE carrinho_usuarios SET quantidade = ? WHERE id_sessao = ? AND id_produto = ?");
        return $sentenciaAtualizar->execute([$novaQuantidade, $idSessao, $idProduto]);
    } else {
        // Se o produto não está no carrinho, insira uma nova linha
        $sentenciaInserir = $bd->prepare("INSERT INTO carrinho_usuarios (id_sessao, id_produto, quantidade) VALUES (?, ?, ?)");
        return $sentenciaInserir->execute([$idSessao, $idProduto, $quantidade]);
    }
}

function obterProdutosNoCarrinho()
{
    $bd = obterConexao();
    iniciarSessaoSeNaoIniciada();
    $sentencia = $bd->prepare("SELECT produtos.id, produtos.nome, produtos.preco, produtos.tipo
     FROM produtos
     INNER JOIN carrinho_usuarios
     ON produtos.id = carrinho_usuarios.id_produto
     WHERE carrinho_usuarios.id_sessao = ?");
    $idSessao = session_id();
    $sentencia->execute([$idSessao]);
    return $sentencia->fetchAll(); // Retorna os produtos que estão no carrinho
}

function removerProdutoDoCarrinho($idProduto)
{
    $bd = obterConexao();
    iniciarSessaoSeNaoIniciada();
    $idSessao = session_id();
    $sentencia = $bd->prepare("DELETE FROM carrinho_usuarios WHERE id_sessao = ? AND id_produto = ?");
    return $sentencia->execute([$idSessao, $idProduto]);
}

function produtoJaEstaNoCarrinho($idProduto)
{
    $ids = obterIdsDeProdutosNoCarrinho();
    foreach ($ids as $id) {
        if ($id == $idProduto) return true;
    }
    return false;
}

function obterIdsDeProdutosNoCarrinho()
{
    $bd = obterConexao();
    iniciarSessaoSeNaoIniciada();
    $sentencia = $bd->prepare("SELECT id_produto FROM carrinho_usuarios WHERE id_sessao = ?");
    $idSessao = session_id();
    $sentencia->execute([$idSessao]);
    return $sentencia->fetchAll(PDO::FETCH_COLUMN); // Retorna apenas os IDs dos produtos no carrinho
}

function adicionarSalgadoAoCarrinho($idProduto, $quantidade = 1) {
    $bd = obterConexao();
    iniciarSessaoSeNaoIniciada();
    $idSessao = session_id();

    // Verifica se o produto é do tipo salgado e está na tabela 'produtos'
    $verificaProduto = $bd->prepare("SELECT id FROM produtos WHERE id = ? AND tipo = 'salgado'");
    $verificaProduto->execute([$idProduto]);
    $produto = $verificaProduto->fetch(PDO::FETCH_OBJ);

    if ($produto) {
        // Se o produto existe e é do tipo 'salgado', adicione ao carrinho
        $sentencia = $bd->prepare("INSERT INTO carrinho_usuarios (id_sessao, id_produto, quantidade) VALUES (?, ?, ?)");
        return $sentencia->execute([$idSessao, $produto->id, $quantidade]);
    } else {
        // Produto não encontrado ou não é do tipo 'salgado'
        return false;
    }
}

function iniciarSessaoSeNaoIniciada()
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
       
    }
}

function removerProduto($id)
{
    $bd = obterConexao();
    $sentencia = $bd->prepare("DELETE FROM produtos WHERE id = ?");
    return $sentencia->execute([$id]);
}

function salvarProduto($nome, $preco, $tipo)
{
    $bd = obterConexao();
    $sentencia = $bd->prepare("INSERT INTO produtos(nome, preco, tipo) VALUES(?, ?, ?)");
    return $sentencia->execute([$nome, $preco, $tipo]); // Incluindo tipo no insert
}

function obterVariavelDoAmbiente($chave)
{
    if (defined("_ENV_CACHE")) {
        $variaveis = _ENV_CACHE;
    } else {
        $arquivo = "env.php";
        if (!file_exists($arquivo)) {
            throw new Exception("O arquivo de variáveis de ambiente ($arquivo) não existe. Favor criá-lo.");
        }
        $variaveis = parse_ini_file($arquivo);
        define("_ENV_CACHE", $variaveis);
    }
    if (isset($variaveis[$chave])) {
        return $variaveis[$chave];
    } else {
        throw new Exception("A chave especificada (" . $chave . ") não existe no arquivo de variáveis de ambiente.");
    }
}

function obterConexao()
{
    $senha = obterVariavelDoAmbiente("MYSQL_PASSWORD");
    $usuario = obterVariavelDoAmbiente("MYSQL_USER");
    $nomeBanco = obterVariavelDoAmbiente("MYSQL_DATABASE_NAME");
    $database = new PDO('mysql:host=localhost;dbname=' . $nomeBanco, $usuario, $senha);
    $database->query("set names utf8;");
    $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $database;
}
?>
