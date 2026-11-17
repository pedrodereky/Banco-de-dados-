<H1>EDITAR CLIENTE</H1>
<?php
    $stmt = $conn->prepare("SELECT * FROM cliente WHERE id_cliente=?");
    $id = (int) ($_REQUEST['id_cliente'] ?? 0);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $row = $stmt->get_result()->fetch_object();
?>

<form action="?page=salvar_cliente" method='POST'>
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_cliente" value="<?php print e($row->id_cliente); ?>">
    <div class="mb-3">
        <label>Nome
            <input type="text" name="nome_cliente" class="form-control" value="<?php print e($row->nome_cliente); ?>">
        </label>
    </div>
    <div class="mb-3">
        <label>Cpf
            <input type="text" inputmode="numeric" pattern="[0-9]{11}" maxlength="11" title="11 dígitos, só números" name="cpf_cliente" class="form-control" value="<?php print e($row->cpf_cliente); ?>">
        </label>
    </div>
    <div class="mb-3">
        <label>Email
            <input type="email" name="email_cliente" class="form-control" value="<?php print e($row->email_cliente); ?>">
        </label>
    </div>
    <div class="mb-3">
        <label>Telefone
            <input type="tel" maxlength="20" name="telefone_cliente" class="form-control" value="<?php print e($row->telefone_cliente); ?>">
        </label>
    </div>
    <div class="mb-3">
        <label>Endereço
            <input type="text" name="endereco_cliente" class="form-control" value="<?php print e($row->endereco_cliente); ?>">
        </label>
    </div>
    <div class="mb-3">
        <label>Data de nascimento
            <input type="date" name="data_nasc_cliente" class="form-control" value="<?php print e($row->dt_nasc_cliente); ?>">
        </label>
    </div>
    
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>