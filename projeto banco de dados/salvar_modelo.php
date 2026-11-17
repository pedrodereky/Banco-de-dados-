<?php
    // Todas as consultas usam prepared statements: os valores digitados nunca
    // entram no texto do SQL, então aspas e comandos não podem alterar a consulta.
    $id = (int) ($_REQUEST['id_modelo'] ?? 0);

    switch ($_REQUEST['acao'] ?? '') {
        case 'cadastrar':
            $stmt = $conn->prepare("INSERT INTO modelo (nome_modelo, cor_modelo, ano_modelo, tipo_modelo, marca_id_marca) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param('ssssi', $_POST['nome_modelo'], $_POST['cor_modelo'], $_POST['ano_modelo'], $_POST['tipo_modelo'], $_POST['marca_id_marca']);
            $res = $stmt->execute();

            if ($res == true) {
                print "<script>alert('Cadastrado com sucesso!');</script>";
                print "<script>location.href='?page=listar_modelo';</script>";
            } else {
                print "<script>alert('Erro ao cadastrar.');</script>";
                print "<script>location.href='?page=listar_modelo';</script>";
            }
            break;

        case 'editar':
            $stmt = $conn->prepare("UPDATE modelo SET nome_modelo=?, cor_modelo=?, ano_modelo=?, tipo_modelo=?, marca_id_marca=? WHERE id_modelo=?");
            $stmt->bind_param('ssssii', $_POST['nome_modelo'], $_POST['cor_modelo'], $_POST['ano_modelo'], $_POST['tipo_modelo'], $_POST['marca_id_marca'], $id);
            $res = $stmt->execute();

            if ($res == true) {
                print "<script>alert('Editou com sucesso!');</script>";
                print "<script>location.href='?page=listar_modelo';</script>";
            } else {
                print "<script>alert('Não editou.');</script>";
                print "<script>location.href='?page=listar_modelo';</script>";
            }
            break;

        case 'excluir':
            // Exclusão só por POST: um link GET pode ser aberto por engano,
            // pré-carregado pelo navegador ou embutido em outra página.
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                print "<script>alert('Use o botão Excluir da listagem.');</script>";
                print "<script>location.href='?page=listar_modelo';</script>";
                break;
            }
            $stmt = $conn->prepare("DELETE FROM modelo WHERE id_modelo=?");
            $stmt->bind_param('i', $id);
            $erro = executar($stmt);

            if ($erro == 1451) { // registro ainda referenciado por chave estrangeira
                print "<script>alert('Não é possível excluir: há vendas deste modelo.');</script>";
                print "<script>location.href='?page=listar_modelo';</script>";
            } elseif ($erro == 0) {
                print "<script>alert('Excluiu com sucesso!');</script>";
                print "<script>location.href='?page=listar_modelo';</script>";
            } else {
                print "<script>alert('Não excluiu.');</script>";
                print "<script>location.href='?page=listar_modelo';</script>";
            }
            break;
    }
?>
