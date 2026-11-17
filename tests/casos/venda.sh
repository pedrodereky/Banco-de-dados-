# Venda: edição do valor e tentativa de injeção na exclusão.
enviar salvar_venda acao=editar id_venda=1 data_venda=2025-10-14 valor_venda=54000.00 cliente_id_cliente=1 funcionario_id_funcionario=1 modelo_id_modelo=1
confere "edita venda" "SELECT CONCAT(data_venda,'/',valor_venda) FROM venda WHERE id_venda=1" "2025-10-14/54000.00"
enviar salvar_venda acao=cadastrar data_venda=2025-11-01 valor_venda=10 cliente_id_cliente=1 funcionario_id_funcionario=1 modelo_id_modelo=1
enviar salvar_venda acao=cadastrar data_venda=2025-11-02 valor_venda=20 cliente_id_cliente=1 funcionario_id_funcionario=1 modelo_id_modelo=1
enviar salvar_venda acao=excluir id_venda="3 OR id_venda=2"
confere "injeção na exclusão não apaga outra venda" "SELECT COUNT(*) FROM venda WHERE id_venda IN (2,3)" "1"
