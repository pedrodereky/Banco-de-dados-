<H1>LISTAR VENDA</H1>
<?php
    $sql = "SELECT * FROM venda v INNER JOIN cliente c ON c.id_cliente = v.cliente_id_cliente 
    INNER JOIN funcionario f ON f.id_funcionario = v.funcionario_id_funcionario 
    INNER JOIN modelo m ON m.id_modelo = v.modelo_id_modelo";

    $res = $conn->query($sql);

    $qtd = $res->num_rows;

    if($qtd > 0){
        print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
        print "<table class='table table-bordered table-striped table-hover'>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Data</th>";
        print "<th>Valor</th>";
        print "<th>Cliente</th>";
        print "<th>Funcionário</th>";
        print "<th>Modelo</th>";
        print "<th>Ações</th>";
        print "</tr>";
        while($row = $res->fetch_object()) {
            print "<tr>";
            print "<td>{$row->id_modelo}</td>";
            print "<td>{$row->data_venda}</td>";
            print "<td>{$row->valor_venda}</td>";
            print "<td>{$row->nome_cliente}</td>";
            print "<td>{$row->nome_funcionario}</td>";
            print "<td>{$row->nome_modelo}</td>";
                print "<td>
                        <button class='btn btn-success' onclick=\"location.href='?page=editar_venda&id_venda={$row->id_venda}';\">Editar</button>

                        <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar_venda&acao=excluir&id_venda={$row->id_venda}';} else{false;}\">Excluir</button>
                    </td>";
                print "</tr>";
        }
        print "</table>";
    } else {
        print "<p>Não encontrou o resultado</p>";
    }
?>