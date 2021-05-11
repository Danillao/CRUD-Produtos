<?php
require 'config/conexao.php';
require 'DAO/ProdutoDAOMySQL.php';

$produtoDao = new ProdutoDAOMySQL($pdo);

$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $produtoDao->delete($id);
}

header("Location: index.php");
exit;



?>