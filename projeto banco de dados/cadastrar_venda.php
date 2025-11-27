<H1>CADASTRAR VENDA</H1>
<form action="?page=salvar_venda" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>Data
            <input type="date" name="data_venda" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>Valor
            <input type="number" name="valor_venda" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label for="">Cliente
            <select name="cliente_id_cliente" class="form-control" required>
                <option>-= Escolha =-</option>
                <?php
                    $sql = "SELECT * FROM cliente";
                    $res = $conn->query($sql);
                    $qtd = $res->num_rows;
                    if($qtd > 0) {
                        while($row = $res->fetch_object()) {
                            print "<option value='{$row->id_cliente}'>
                                {$row->nome_cliente}</option>";
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
                <option>-= Escolha =-</option>
                <?php
                    $sql = "SELECT * FROM funcionario";
                    $res = $conn->query($sql);
                    $qtd = $res->num_rows;
                    if($qtd > 0) {
                        while($row = $res->fetch_object()) {
                            print "<option value='{$row->id_funcionario}'>
                                {$row->nome_funcionario}</option>";
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
                <option>-= Escolha =-</option>
                <?php
                    $sql = "SELECT * FROM modelo";
                    $res = $conn->query($sql);
                    $qtd = $res->num_rows;
                    if($qtd > 0) {
                        while($row = $res->fetch_object()) {
                            print "<option value='{$row->id_modelo}'>
                                {$row->nome_modelo}</option>";
                        }
                    } else {
                        print "<option>Não há marcas cadastradas</option>";
                    }
                ?>
            </select>
        </label>
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>