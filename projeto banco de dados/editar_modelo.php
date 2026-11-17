<H1>EDITAR MODELO</H1>
<?php
    $stmt = $conn->prepare("SELECT * FROM modelo WHERE id_modelo=?");
    $id = (int) ($_REQUEST['id_modelo'] ?? 0);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $row = $stmt->get_result()->fetch_object();
?>

<form action="?page=salvar_modelo" method='POST'>
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_modelo" value="<?php print e($row->id_modelo); ?>">
    <div class="mb-3">
        <label for="">Marca
           <select name="marca_id_marca" class="form-control" required>
            <?php
                $sql_1 = "SELECT * FROM marca";
                $res_1 = $conn->query($sql_1);
                $qtd_1 = $res_1->num_rows;
                if($qtd_1 > 0) {
                    while($row_1 = $res_1->fetch_object()) {
                        if($row->marca_id_marca == $row_1->id_marca) {
                            print "<option value='" . e($row_1->id_marca) . "' selected>
                                " . e($row_1->nome_marca) . "</option>";
                        } else {
                            print "<option value='" . e($row_1->id_marca) . "'>" . e($row_1->nome_marca) . "</option>";
                        }
                    }
                } else {
                    print "<option>Não há marcas cadastradas</option>";
                }
            ?>
           </select>
        </label>
    </div>
    <div class="mb-3">
        <label>Nome
            <input type="text" name="nome_modelo" class="form-control" class="form-control" value="<?php print e($row->nome_modelo); ?>">
        </label>
    </div>
    <div class="mb-3">
        <label>Cor
            <input type="text" name="cor_modelo" class="form-control" class="form-control" value="<?php print e($row->cor_modelo); ?>">
        </label>
    </div>
    <div class="mb-3">
        <label>Ano
            <input type="text" name="ano_modelo" class="form-control" class="form-control" value="<?php print e($row->ano_modelo); ?>">
        </label>
    </div>
    <div class="mb-3">
        <label>Tipo
            <input type="text" name="tipo_modelo" class="form-control" class="form-control" value="<?php print e($row->tipo_modelo); ?>">
        </label>
    </div>
    
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>