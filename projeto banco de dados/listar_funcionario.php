<H1>LISTAR FUNCIONÁRIO</H1>
<?php
    $sql = "SELECT * FROM funcionario";

    $res = $conn->query($sql);

    $qtd = $res->num_rows;

    if($qtd > 0){
        print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
        print "<table class='table table-bordered table-striped table-hover'>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Nome</th>";
        print "<th>E-mail</th>";
        print "<th>Telefone</th>";
        print "<th>Ações</th>";
        print "</tr>";
        while($row = $res->fetch_object()) {
            print "<tr>";
            print "<td>" . e($row->id_funcionario) . "</td>";
            print "<td>" . e($row->nome_funcionario) . "</td>";
            print "<td>" . e($row->email_funcionario) . "</td>";
            print "<td>" . e($row->telefone_funcionario) . "</td>";
            print "<td>
                    <button class='btn btn-success' onclick=\"location.href='?page=editar_funcionario&id_funcionario=" . e($row->id_funcionario) . "';\">Editar</button>

                    <form method='post' action='?page=salvar_funcionario' style='display:inline' onsubmit=\"return confirm('Tem certeza que deseja excluir?');\"><input type='hidden' name='acao' value='excluir'><input type='hidden' name='id_funcionario' value='" . e($row->id_funcionario) . "'><button type='submit' class='btn btn-danger'>Excluir</button></form>
                   </td>";
            print "</tr>";
        }
        print "</table>";
    } else {
        print "<p>Não encontrou o resultado</p>";
    }
?>