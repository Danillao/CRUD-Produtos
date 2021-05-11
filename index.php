<?php
require 'config/conexao.php';
require 'DAO/ProdutoDAOMySQL.php';

$produtoDao = new ProdutoDAOMySQL($pdo);
$lista = $produtoDao->findAll();

?>

<a href="cadastrar.php">CADASTRAR PRODUTO</a> <br><br>

<table border=1 width=100%>
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>QUANTIDADE</th>
        <th>PRECO</th>
        <th>LUCRO</th>
    </tr>

    <? foreach($lista as $produto): ?>
        <tr>
            <td><?=$produto->getId();?></td>
            <td><?=$produto->getNome();?></td>
            <td><?=$produto->getQt();?></td>
            <td><?=$produto->getPreco();?></td>
            <td><?=$produto->getLucro();?></td>
            <td>
                <a href="editar.php?id=<?=$produto->getId();?>"> [ EDITAR ] </a>
                <a href="excluir.php?id=<?=$produto->getId();?>" onclick="return confirm('Tem Certeza que deseja excluir ?')"> [ EXCLUIR ] </a>
            </td>
        </tr>
    <? endforeach; ?>
</table>