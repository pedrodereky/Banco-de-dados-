<?php
    // Todas as consultas usam prepared statements: os valores digitados nunca
    // entram no texto do SQL, então aspas e comandos não podem alterar a consulta.
    $id = (int) ($_REQUEST['id_cliente'] ?? 0);

    switch ($_REQUEST['acao'] ?? '') {
        case 'cadastrar':
            $stmt = $conn->prepare("INSERT INTO cliente (nome_cliente, cpf_cliente, email_cliente, telefone_cliente, endereco_cliente, dt_nasc_cliente)
            VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('ssssss', $_POST['nome_cliente'], $_POST['cpf_cliente'], $_POST['email_cliente'],
                $_POST['telefone_cliente'], $_POST['endereco_cliente'], $_POST['data_nasc_cliente']);
            $res = $stmt->execute();

            if ($res == true) {
                print "<script>alert('Cadastrado com sucesso!');</script>";
                print "<script>location.href='?page=listar_cliente';</script>";
            } else {
                print "<script>alert('Erro ao cadastrar.');</script>";
                print "<script>location.href='?page=listar_cliente';</script>";
            }
            break;

        case 'editar':
            // Antes, endereço e data entravam sem aspas no UPDATE, e toda edição falhava.
            $stmt = $conn->prepare("UPDATE cliente SET nome_cliente=?, cpf_cliente=?, email_cliente=?, telefone_cliente=?, endereco_cliente=?, dt_nasc_cliente=? WHERE id_cliente=?");
            $stmt->bind_param('ssssssi', $_POST['nome_cliente'], $_POST['cpf_cliente'], $_POST['email_cliente'],
                $_POST['telefone_cliente'], $_POST['endereco_cliente'], $_POST['data_nasc_cliente'], $id);
            $res = $stmt->execute();

            if ($res == true) {
                print "<script>alert('Editou com sucesso!');</script>";
                print "<script>location.href='?page=listar_cliente';</script>";
            } else {
                print "<script>alert('Não editou.');</script>";
                print "<script>location.href='?page=listar_cliente';</script>";
            }
            break;

        case 'excluir':
            // Exclusão só por POST: um link GET pode ser aberto por engano,
            // pré-carregado pelo navegador ou embutido em outra página.
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                print "<script>alert('Use o botão Excluir da listagem.');</script>";
                print "<script>location.href='?page=listar_cliente';</script>";
                break;
            }
            $stmt = $conn->prepare("DELETE FROM cliente WHERE id_cliente=?");
            $stmt->bind_param('i', $id);
            $erro = executar($stmt);

            if ($erro == 1451) { // registro ainda referenciado por chave estrangeira
                print "<script>alert('Não é possível excluir: este cliente tem vendas registradas.');</script>";
                print "<script>location.href='?page=listar_cliente';</script>";
            } elseif ($erro == 0) {
                print "<script>alert('Excluiu com sucesso!');</script>";
                print "<script>location.href='?page=listar_cliente';</script>";
            } else {
                print "<script>alert('Não excluiu.');</script>";
                print "<script>location.href='?page=listar_cliente';</script>";
            }
            break;
    }
?>
