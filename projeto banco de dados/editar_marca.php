<H1>EDITAR MARCA</H1>
<?php
    $stmt = $conn->prepare("SELECT * FROM marca WHERE id_marca=?");
    $id = (int) ($_REQUEST['id_marca'] ?? 0);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $row = $stmt->get_result()->fetch_object();
?>

<form action="?page=salvar_marca" method='POST'>
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_marca" value="<?php print e($row->id_marca); ?>">
    <div class="mb-3">
        <label>Nome
            <input type="text" name="nome_marca" class="form-control" value="<?php print e($row->nome_marca); ?>">
        </label>
    </div>
    
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>