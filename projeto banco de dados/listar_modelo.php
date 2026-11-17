<H1>LISTAR MODELO</H1>
<?php
    $sql = "SELECT * FROM modelo AS mo INNER JOIN marca AS ma ON mo.marca_id_marca = ma.id_marca";

    $res = $conn->query($sql);

    $qtd = $res->num_rows;

    if($qtd > 0){
        print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
        print "<table class='table table-bordered table-striped table-hover'>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Marca</th>";
        print "<th>Nome</th>";
        print "<th>Cor</th>";
        print "<th>Ano</th>";
        print "<th>Tipo</th>";
        print "<th>Ações</th>";
        print "</tr>";
        while($row = $res->fetch_object()) {
            print "<tr>";
            print "<td>" . e($row->id_modelo) . "</td>";
            print "<td>" . e($row->nome_marca) . "</td>";
            print "<td>" . e($row->nome_modelo) . "</td>";
            print "<td>" . e($row->cor_modelo) . "</td>";
            print "<td>" . e($row->ano_modelo) . "</td>";
            print "<td>" . e($row->tipo_modelo) . "</td>";
                print "<td>
                        <button class='btn btn-success' onclick=\"location.href='?page=editar_modelo&id_modelo=" . e($row->id_modelo) . "';\">Editar</button>

                        <form method='post' action='?page=salvar_modelo' style='display:inline' onsubmit=\"return confirm('Tem certeza que deseja excluir?');\"><input type='hidden' name='acao' value='excluir'><input type='hidden' name='id_modelo' value='" . e($row->id_modelo) . "'><button type='submit' class='btn btn-danger'>Excluir</button></form>
                    </td>";
                print "</tr>";
        }
        print "</table>";
    } else {
        print "<p>Não encontrou o resultado</p>";
    }
?>