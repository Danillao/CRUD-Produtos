<?php
require 'config/conexao.php';
require 'DAO/ProdutoDAOMySQL.php';

$produtoDao = new ProdutoDAOMySQL($pdo);

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, "nome");
$qt = filter_input(INPUT_POST, "qt");
$preco = filter_input(INPUT_POST, "preco");
$p_produto = filter_input(INPUT_POST, "porcentagem");

$total = ($preco*$qt);

$lucro = $total - (($total*$p_produto)/100);

if ($id && $nome && $qt && $preco) {
    $produto = $produtoDao->findById($id);

    $produto->setNome($nome);
    $produto->setQt($qt);
    $produto->setPreco($preco);
    $produto->setPorcentagem($p_produto);
    $produto->setLucro($lucro);

    $produtoDao->update($produto);

    header("Location: index.php");
    exit;
} else {
    header("Location: cadastrar.php?id=$id");
    exit;
}






?>