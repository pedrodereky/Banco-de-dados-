# Excluir algo que ainda tem vínculos (marca com modelos, cliente com vendas...)
# precisa mostrar um aviso, não derrubar a página.
for alvo in "salvar_marca&acao=excluir&id_marca=1|Não é possível excluir: há modelos" \
            "salvar_cliente&acao=excluir&id_cliente=1|Não é possível excluir: este cliente" \
            "salvar_funcionario&acao=excluir&id_funcionario=1|Não é possível excluir: este funcionário" \
            "salvar_modelo&acao=excluir&id_modelo=1|Não é possível excluir: há vendas"; do
  url="${alvo%%|*}"; esperado="${alvo#*|}"
  resposta="$(curl -sS -w '\n%{http_code}' -X POST "$BASE?page=$url")"
  status="${resposta##*$'\n'}"
  if [ "$status" = 200 ] && grep -q "$esperado" <<<"$resposta"; then
    echo "ok   - ${url%%&*}: aviso de vínculo em vez de erro"
  else
    echo "FALHA - ${url%%&*}: status $status, aviso não encontrado"; falhas=$((falhas + 1))
  fi
done
confere "registros com vínculo continuam no banco" "SELECT (SELECT COUNT(*) FROM marca WHERE id_marca=1)+(SELECT COUNT(*) FROM cliente WHERE id_cliente=1)" "2"
