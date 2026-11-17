# Marca: apóstrofo, edição e tentativa de injeção na exclusão.
enviar salvar_marca acao=cadastrar nome_marca="Land Rover's"
confere "marca com apóstrofo" "SELECT nome_marca FROM marca WHERE id_marca=2" "Land Rover's"
enviar salvar_marca acao=editar id_marca=2 nome_marca="Land Rover"
confere "edita marca" "SELECT nome_marca FROM marca WHERE id_marca=2" "Land Rover"
enviar salvar_marca acao=cadastrar nome_marca=Kia
enviar salvar_marca acao=excluir id_marca="3 OR id_marca=2"
confere "injeção na exclusão não apaga outra marca" "SELECT COUNT(*) FROM marca WHERE id_marca IN (2,3)" "1"
