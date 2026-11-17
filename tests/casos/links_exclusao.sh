# Cada listagem precisa ter um formulário POST de exclusão com o id completo.
for ent in marca modelo cliente funcionario venda; do
  if curl -sS "$BASE?page=listar_$ent" | grep -q "name='id_$ent' value='[0-9]"; then
    echo "ok   - listar_$ent tem formulário de exclusão com id_$ent"
  else
    echo "FALHA - listar_$ent sem formulário de exclusão válido"; falhas=$((falhas + 1))
  fi
done

# Exclusão por GET (link) não pode apagar nada.
enviar salvar_marca acao=cadastrar nome_marca=GetTeste
get_id="$("${DB[@]}" "SELECT id_marca FROM marca WHERE nome_marca='GetTeste'")"
curl -sS -o /dev/null "$BASE?page=salvar_marca&acao=excluir&id_marca=$get_id"
confere "exclusão por GET é recusada" "SELECT COUNT(*) FROM marca WHERE id_marca=$get_id" "1"
enviar salvar_marca acao=excluir id_marca="$get_id"
confere "exclusão por POST funciona" "SELECT COUNT(*) FROM marca WHERE id_marca=$get_id" "0"
