<H1>EDITAR FUNCIONÁRIO</H1>
<?php
    $sql = "SELECT * FROM funcionario WHERE id_funcionario=".$_REQUEST['id_funcionario'];

    $res = $conn->query($sql);

    $row = $res->fetch_object();
?>

<form action="?page=salvar_funcionario" method='POST'>
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label for="">Nome
            <input type="text" name="nome_funcionario" class="form-control" class="form-control" value="<?php print $row->nome_funcionario; ?>">
        </label>
    </div>
    <div class="mb-3">
        <label for="">E-mail
            <input type="text" name="email_funcionario" class="form-control" class="form-control" value="<?php print $row->email_funcionario; ?>">
        </label>
    </div>
    <div class="mb-3">
        <label for="">Telefone
            <input type="text" name="telefone_funcionario" class="form-control" class="form-control" value="<?php print $row->telefone_funcionario; ?>">
        </label>
    </div>
    
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>