# Cada listagem precisa gerar o link de exclusão com o parâmetro de id completo
# (a de marcas gerava "&id_marca1", sem o "=", e nunca excluía nada).
for ent in marca modelo cliente funcionario venda; do
  if curl -sS "$BASE?page=listar_$ent" | grep -q "acao=excluir&amp;id_$ent=[0-9]\|acao=excluir&id_$ent=[0-9]"; then
    echo "ok   - listar_$ent gera link de exclusão com id_$ent="
  else
    echo "FALHA - listar_$ent não gera link de exclusão válido"; falhas=$((falhas + 1))
  fi
done
