<H1>EDITAR CLIENTE</H1>
<?php
    $sql = "SELECT * FROM cliente WHERE id_cliente=".$_REQUEST['id_cliente'];

    $res = $conn->query($sql);

    $row = $res->fetch_object();
?>

<form action="?page=salvar_cliente" method='POST'>
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_cliente" value="<?php print $row->id_cliente; ?>">
    <div class="mb-3">
        <label>Nome
            <input type="text" name="nome_cliente" class="form-control" value="<?php print $row->nome_cliente; ?>">
        </label>
    </div>
    <div class="mb-3">
        <label>Cpf
            <input type="text" name="cpf_cliente" class="form-control" value="<?php print $row->cpf_cliente; ?>">
        </label>
    </div>
    <div class="mb-3">
        <label>Email
            <input type="text" name="email_cliente" class="form-control" value="<?php print $row->email_cliente; ?>">
        </label>
    </div>
    <div class="mb-3">
        <label>Telefone
            <input type="text" name="telefone_cliente" class="form-control" value="<?php print $row->telefone_cliente; ?>">
        </label>
    </div>
    <div class="mb-3">
        <label>Endereço
            <input type="text" name="endereco_cliente" class="form-control" value="<?php print $row->endereco_cliente; ?>">
        </label>
    </div>
    <div class="mb-3">
        <label>Data de nascimento
            <input type="text" name="data_nasc_cliente" class="form-control" value="<?php print $row->dt_nasc_cliente; ?>">
        </label>
    </div>
    
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>