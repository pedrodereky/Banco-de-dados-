<?php
    // Todas as consultas usam prepared statements: os valores digitados nunca
    // entram no texto do SQL, então aspas e comandos não podem alterar a consulta.
    $id = (int) ($_REQUEST['id_marca'] ?? 0);

    switch ($_REQUEST['acao'] ?? '') {
        case 'cadastrar':
            $stmt = $conn->prepare("INSERT INTO marca (nome_marca) VALUES (?)");
            $stmt->bind_param('s', $_POST['nome_marca']);
            $res = $stmt->execute();

            if ($res == true) {
                print "<script>alert('Cadastrado com sucesso!');</script>";
                print "<script>location.href='?page=listar_marca';</script>";
            } else {
                print "<script>alert('Erro ao cadastrar.');</script>";
                print "<script>location.href='?page=listar_marca';</script>";
            }
            break;

        case 'editar':
            $stmt = $conn->prepare("UPDATE marca SET nome_marca=? WHERE id_marca=?");
            $stmt->bind_param('si', $_POST['nome_marca'], $id);
            $res = $stmt->execute();

            if ($res == true) {
                print "<script>alert('Editou com sucesso!');</script>";
                print "<script>location.href='?page=listar_marca';</script>";
            } else {
                print "<script>alert('Não editou.');</script>";
                print "<script>location.href='?page=listar_marca';</script>";
            }
            break;

        case 'excluir':
            $stmt = $conn->prepare("DELETE FROM marca WHERE id_marca=?");
            $stmt->bind_param('i', $id);
            $erro = executar($stmt);

            if ($erro == 1451) { // registro ainda referenciado por chave estrangeira
                print "<script>alert('Não é possível excluir: há modelos desta marca cadastrados.');</script>";
                print "<script>location.href='?page=listar_marca';</script>";
            } elseif ($erro == 0) {
                print "<script>alert('Excluiu com sucesso!');</script>";
                print "<script>location.href='?page=listar_marca';</script>";
            } else {
                print "<script>alert('Não excluiu.');</script>";
                print "<script>location.href='?page=listar_marca';</script>";
            }
            break;
    }
?>
