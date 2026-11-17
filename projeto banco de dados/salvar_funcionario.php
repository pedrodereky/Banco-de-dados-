<?php
    // Todas as consultas usam prepared statements: os valores digitados nunca
    // entram no texto do SQL, então aspas e comandos não podem alterar a consulta.
    $id = (int) ($_REQUEST['id_funcionario'] ?? 0);

    switch ($_REQUEST['acao'] ?? '') {
        case 'cadastrar':
            $stmt = $conn->prepare("INSERT INTO funcionario (nome_funcionario, email_funcionario, telefone_funcionario) VALUES (?, ?, ?)");
            $stmt->bind_param('sss', $_POST['nome_funcionario'], $_POST['email_funcionario'], $_POST['telefone_funcionario']);
            $res = $stmt->execute();

            if ($res == true) {
                print "<script>alert('Cadastrado com sucesso!');</script>";
                print "<script>location.href='?page=listar_funcionario';</script>";
            } else {
                print "<script>alert('Erro ao cadastrar.');</script>";
                print "<script>location.href='?page=listar_funcionario';</script>";
            }
            break;

        case 'editar':
            $stmt = $conn->prepare("UPDATE funcionario SET nome_funcionario=?, email_funcionario=?, telefone_funcionario=? WHERE id_funcionario=?");
            $stmt->bind_param('sssi', $_POST['nome_funcionario'], $_POST['email_funcionario'], $_POST['telefone_funcionario'], $id);
            $res = $stmt->execute();

            if ($res == true) {
                print "<script>alert('Editou com sucesso!');</script>";
                print "<script>location.href='?page=listar_funcionario';</script>";
            } else {
                print "<script>alert('Não editou.');</script>";
                print "<script>location.href='?page=listar_funcionario';</script>";
            }
            break;

        case 'excluir':
            $stmt = $conn->prepare("DELETE FROM funcionario WHERE id_funcionario=?");
            $stmt->bind_param('i', $id);
            $erro = executar($stmt);

            if ($erro == 1451) { // registro ainda referenciado por chave estrangeira
                print "<script>alert('Não é possível excluir: este funcionário tem vendas registradas.');</script>";
                print "<script>location.href='?page=listar_funcionario';</script>";
            } elseif ($erro == 0) {
                print "<script>alert('Excluiu com sucesso!');</script>";
                print "<script>location.href='?page=listar_funcionario';</script>";
            } else {
                print "<script>alert('Não excluiu.');</script>";
                print "<script>location.href='?page=listar_funcionario';</script>";
            }
            break;
    }
?>
