<?php
    // Todas as consultas usam prepared statements: os valores digitados nunca
    // entram no texto do SQL, então aspas e comandos não podem alterar a consulta.
    $id = (int) ($_REQUEST['id_venda'] ?? 0);

    switch ($_REQUEST['acao'] ?? '') {
        case 'cadastrar':
            $stmt = $conn->prepare("INSERT INTO venda (data_venda, valor_venda, cliente_id_cliente, funcionario_id_funcionario, modelo_id_modelo) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param('sdiii', $_POST['data_venda'], $_POST['valor_venda'], $_POST['cliente_id_cliente'], $_POST['funcionario_id_funcionario'], $_POST['modelo_id_modelo']);
            $res = $stmt->execute();

            if ($res == true) {
                print "<script>alert('Cadastrado com sucesso!');</script>";
                print "<script>location.href='?page=listar_venda';</script>";
            } else {
                print "<script>alert('Erro ao cadastrar.');</script>";
                print "<script>location.href='?page=listar_venda';</script>";
            }
            break;

        case 'editar':
            $stmt = $conn->prepare("UPDATE venda SET data_venda=?, valor_venda=?, cliente_id_cliente=?, funcionario_id_funcionario=?, modelo_id_modelo=? WHERE id_venda=?");
            $stmt->bind_param('sdiiii', $_POST['data_venda'], $_POST['valor_venda'], $_POST['cliente_id_cliente'], $_POST['funcionario_id_funcionario'], $_POST['modelo_id_modelo'], $id);
            $res = $stmt->execute();

            if ($res == true) {
                print "<script>alert('Editou com sucesso!');</script>";
                print "<script>location.href='?page=listar_venda';</script>";
            } else {
                print "<script>alert('Não editou.');</script>";
                print "<script>location.href='?page=listar_venda';</script>";
            }
            break;

        case 'excluir':
            // Exclusão só por POST: um link GET pode ser aberto por engano,
            // pré-carregado pelo navegador ou embutido em outra página.
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                print "<script>alert('Use o botão Excluir da listagem.');</script>";
                print "<script>location.href='?page=listar_venda';</script>";
                break;
            }
            $stmt = $conn->prepare("DELETE FROM venda WHERE id_venda=?");
            $stmt->bind_param('i', $id);
            $erro = executar($stmt);

            if ($erro == 0) {
                print "<script>alert('Excluiu com sucesso!');</script>";
                print "<script>location.href='?page=listar_venda';</script>";
            } else {
                print "<script>alert('Não excluiu.');</script>";
                print "<script>location.href='?page=listar_venda';</script>";
            }
            break;
    }
?>
