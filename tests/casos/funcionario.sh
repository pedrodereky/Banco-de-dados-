# Funcionário: apóstrofo, edição e tentativa de injeção na exclusão.
enviar salvar_funcionario acao=cadastrar nome_funcionario="Maria D'Paula" email_funcionario=m@exemplo.com telefone_funcionario=1
confere "funcionário com apóstrofo no nome" "SELECT nome_funcionario FROM funcionario WHERE id_funcionario=2" "Maria D'Paula"
enviar salvar_funcionario acao=editar id_funcionario=2 nome_funcionario="Maria D'Paula" email_funcionario=maria@exemplo.com telefone_funcionario=61900001111
confere "edita funcionário" "SELECT CONCAT(email_funcionario,'/',telefone_funcionario) FROM funcionario WHERE id_funcionario=2" "maria@exemplo.com/61900001111"
enviar salvar_funcionario acao=cadastrar nome_funcionario=Pedro email_funcionario=p@exemplo.com telefone_funcionario=2
enviar salvar_funcionario acao=excluir id_funcionario="3 OR id_funcionario=2"
confere "injeção na exclusão não apaga outro funcionário" "SELECT COUNT(*) FROM funcionario WHERE id_funcionario IN (2,3)" "1"
