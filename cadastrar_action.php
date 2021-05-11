<?php
require 'config/conexao.php';
require 'DAO/ProdutoDAOMySQL.php';

$produtoDao = new ProdutoDAOMySQL($pdo);

$nome = filter_input(INPUT_POST, "nome");
$qt = filter_input(INPUT_POST, "qt");
$preco = filter_input(INPUT_POST, "preco");
$p_produto = filter_input(INPUT_POST, "porcentagem");

$total = ($preco * $qt);

$lucro = $total - (($total * $p_produto) / 100);

if($nome && $qt && $preco) {

    if($produtoDao->findByNome($nome) == false) {
        $novoProduto = new Produto();
        $novoProduto->setNome($nome);
        $novoProduto->setQt($qt);
        $novoProduto->setPreco($preco);
        $novoProduto->setPorcentagem($p_produto);
        $novoProduto->setLucro($lucro);

        $produtoDao->add($novoProduto);

        header("Location: index.php");
        exit;
    } else {
        header("Location: cadastrar.php");
        exit;
    }
} else {
    header("Location: cadastrar.php");
    exit;
}


?>