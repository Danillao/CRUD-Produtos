<h3>CADASTRAR PRODUTO</h3>
<form method="POST" action="cadastrar_action.php">
    <label>
        Nome:
        <input type="text" name="nome">
    </label> <br><br>

    <label>
        Quantidade:
        <input type="number" min="1" step="1" name="qt"/>
    </label> <br><br>

    <label>
        Preço a ser Vendido:
        <input type="number" min="0" step="0.10" placeholder="R$" name="preco"/>
    </label> <br><br>

    <label>
        % do capital inicial do produto:
        <input type="number" min="0" step="0.10" placeholder="0%" name="porcentagem"/>
    </label> <br><br>

    <input type="submit" value="Enviar">
</form>