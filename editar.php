<?php
require 'config/conexao.php';
require 'DAO/ProdutoDAOMySQL.php';

$produtoDao = new ProdutoDAOMySQL($pdo);

$produto = false;

$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $produto = $produtoDao->findById($id);
}

if ($id == false) {
    header("Location: index.php");
    exit;
}
?>

<h1>EDITAR PRODUTO</h1>

<form method="POST" action="editar_action.php">
    <input type="hidden" name="id" value="<?=$produto->getId();?>">

    <label>
        Nome:
        <input type="text" name="nome" value="<?=$produto->getNome();?>">
    </label><br><br>

    <label>
        Quantidade:
        <input type="number" min="1" step="1" name="qt" value="<?=$produto->getQt();?>"/>
    </label><br><br>

    <label>
        Preco:
        <input type="number" min="1" step="0.10" name="preco" value="<?=$produto->getPreco();?>"/>
    </label><br><br>

    <label>
        % do capital inicial do produto:
        <input type="number" min="0" step="0.10" placeholder="0%" name="porcentagem"/>
    </label> <br><br>

    <input type="submit" value="Salvar">
</form>