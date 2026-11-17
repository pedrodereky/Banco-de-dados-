# Marca: apóstrofo, edição e tentativa de injeção na exclusão.
# Os ids são buscados pelo nome, para o teste não depender da ordem dos outros casos.
enviar salvar_marca acao=cadastrar nome_marca="Land Rover's"
echo "DEBUG marcas: $("${DB[@]}" "SELECT GROUP_CONCAT(id_marca, x27=x27, nome_marca) FROM marca")"; echo "DEBUG resposta: $(curl -sS -X POST "$BASE?page=salvar_marca" --data-urlencode acao=cadastrar --data-urlencode nome_marca=Debug | tail -c 300)"
lr="$("${DB[@]}" "SELECT MAX(id_marca) FROM marca WHERE nome_marca='Land Rover''s'")"
confere "marca com apóstrofo" "SELECT nome_marca FROM marca WHERE id_marca=${lr:-0}" "Land Rover's"
enviar salvar_marca acao=editar id_marca="$lr" nome_marca="Land Rover"
confere "edita marca" "SELECT nome_marca FROM marca WHERE id_marca=${lr:-0}" "Land Rover"
enviar salvar_marca acao=cadastrar nome_marca=Kia
kia="$("${DB[@]}" "SELECT MAX(id_marca) FROM marca WHERE nome_marca='Kia'")"
enviar salvar_marca acao=excluir id_marca="$kia OR id_marca=$lr"
confere "injeção na exclusão não apaga outra marca" "SELECT COUNT(*) FROM marca WHERE id_marca IN (${lr:-0},${kia:-0})" "1"
