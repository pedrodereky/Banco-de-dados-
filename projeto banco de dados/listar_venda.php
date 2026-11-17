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
            print "<td>" . e($row->id_modelo) . "</td>";
            print "<td>" . e($row->data_venda) . "</td>";
            print "<td>" . e($row->valor_venda) . "</td>";
            print "<td>" . e($row->nome_cliente) . "</td>";
            print "<td>" . e($row->nome_funcionario) . "</td>";
            print "<td>" . e($row->nome_modelo) . "</td>";
                print "<td>
                        <button class='btn btn-success' onclick=\"location.href='?page=editar_venda&id_venda=" . e($row->id_venda) . "';\">Editar</button>

                        <form method='post' action='?page=salvar_venda' style='display:inline' onsubmit=\"return confirm('Tem certeza que deseja excluir?');\"><input type='hidden' name='acao' value='excluir'><input type='hidden' name='id_venda' value='" . e($row->id_venda) . "'><button type='submit' class='btn btn-danger'>Excluir</button></form>
                    </td>";
                print "</tr>";
        }
        print "</table>";
    } else {
        print "<p>Não encontrou o resultado</p>";
    }
?>