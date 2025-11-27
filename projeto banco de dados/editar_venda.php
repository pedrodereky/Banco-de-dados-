<h1>EDITAR VENDA</h1>
<?php
    $sql = "SELECT * FROM venda WHERE id_venda=".$_REQUEST['id_venda'];

    $res = $conn->query($sql);

    $row = $res->fetch_object();
?>

<form action="?page=salvar_venda" method='POST'>
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_venda" value="<?php print $row->id_venda; ?>">
    <div class="mb-3">
        <label>Data
            <input type="text" name="data_venda" class="form-control" value="<?php print $row->data_venda; ?>">
        </label>
    </div>
    <div class="mb-3">
        <label>Valor
            <input type="text" name="valor_venda" class="form-control" value="<?php print $row->valor_venda; ?>">
        </label>
    </div>
    <div class="mb-3">
        <label for="">Cliente
           <select name="cliente_id_cliente" class="form-control" required>
            <?php
                $sql_1 = "SELECT * FROM cliente";
                $res_1 = $conn->query($sql_1);
                $qtd_1 = $res_1->num_rows;
                if($qtd_1 > 0) {
                    while($row_1 = $res_1->fetch_object()) {
                        if($row->cliente_id_cliente == $row_1->id_marca) {
                            print "<option value='{$row_1->id_cliente}' selected>
                                {$row_1->nome_cliente}</option>";
                        } else {
                            print "<option value='{$row_1->id_cliente}'>{$row_1->nome_cliente}</option>";
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
        <label for="">Funcionário
           <select name="funcionario_id_funcionario" class="form-control" required>
            <?php
                $sql_1 = "SELECT * FROM funcionario";
                $res_1 = $conn->query($sql_1);
                $qtd_1 = $res_1->num_rows;
                if($qtd_1 > 0) {
                    while($row_1 = $res_1->fetch_object()) {
                        if($row->funcionario_id_funcionario == $row_1->id_funcionario) {
                            print "<option value='{$row_1->id_funcionario}' selected>
                                {$row_1->nome_funcionario}</option>";
                        } else {
                            print "<option value='{$row_1->id_funcionario}'>{$row_1->nome_funcionario}</option>";
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
        <label for="">Modelo
           <select name="modelo_id_modelo" class="form-control" required>
            <?php
                $sql_1 = "SELECT * FROM modelo";
                $res_1 = $conn->query($sql_1);
                $qtd_1 = $res_1->num_rows;
                if($qtd_1 > 0) {
                    while($row_1 = $res_1->fetch_object()) {
                        if($row->modelo_id_modelo == $row_1->id_modelo) {
                            print "<option value='{$row_1->id_modelo}' selected>
                                {$row_1->nome_modelo}</option>";
                        } else {
                            print "<option value='{$row_1->id_modelo}'>{$row_1->nome_modelo}</option>";
                        }
                    }
                } else {
                    print "<option>Não há marcas cadastradas</option>";
                }
            ?>
           </select>
        </label>
    </div>
    
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>