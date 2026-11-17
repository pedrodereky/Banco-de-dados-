# Modelo: apóstrofo, edição (inclusive troca de marca) e injeção na exclusão.
enviar salvar_modelo acao=cadastrar nome_modelo="Cee'd" cor_modelo=Prata ano_modelo=2019 tipo_modelo=Hatch marca_id_marca=1
confere "modelo com apóstrofo" "SELECT nome_modelo FROM modelo WHERE id_modelo=2" "Cee'd"
enviar salvar_modelo acao=editar id_modelo=2 nome_modelo="Cee'd" cor_modelo=Azul ano_modelo=2021 tipo_modelo=Hatch marca_id_marca=1
confere "edita modelo" "SELECT CONCAT(cor_modelo,'/',ano_modelo) FROM modelo WHERE id_modelo=2" "Azul/2021"
enviar salvar_modelo acao=cadastrar nome_modelo=Mobi cor_modelo=Preto ano_modelo=2022 tipo_modelo=Hatch marca_id_marca=1
enviar salvar_modelo acao=excluir id_modelo="3 OR id_modelo=2"
confere "injeção na exclusão não apaga outro modelo" "SELECT COUNT(*) FROM modelo WHERE id_modelo IN (2,3)" "1"
