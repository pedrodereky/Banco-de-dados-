# Cliente: apóstrofo no nome, edição e tentativa de injeção na exclusão.
enviar salvar_cliente acao=cadastrar nome_cliente="Joana D'Ávila" cpf_cliente=11122233344 email_cliente=joana@exemplo.com \
  telefone_cliente=61977770000 endereco_cliente="Rua B, 2" data_nasc_cliente=1985-02-10
confere "cliente com apóstrofo no nome" "SELECT nome_cliente FROM cliente WHERE id_cliente=2" "Joana D'Ávila"

enviar salvar_cliente acao=editar id_cliente=2 nome_cliente="Joana D'Ávila" cpf_cliente=11122233344 email_cliente=joana@exemplo.com \
  telefone_cliente=61977770000 endereco_cliente="Avenida C, 300" data_nasc_cliente=1985-03-15
confere "edita endereço e data do cliente" "SELECT CONCAT(endereco_cliente,'/',dt_nasc_cliente) FROM cliente WHERE id_cliente=2" "Avenida C, 300/1985-03-15"

enviar salvar_cliente acao=cadastrar nome_cliente="Carlos" cpf_cliente=55566677788 email_cliente=c@exemplo.com \
  telefone_cliente=1 endereco_cliente=x data_nasc_cliente=1970-01-01
enviar salvar_cliente acao=excluir id_cliente="3 OR id_cliente=2"
confere "injeção na exclusão não apaga outro cliente" "SELECT COUNT(*) FROM cliente WHERE id_cliente IN (2,3)" "1"
