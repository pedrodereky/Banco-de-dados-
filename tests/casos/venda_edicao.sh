# Ao abrir a edição de uma venda, os três selects (cliente, funcionário, modelo)
# precisam vir com o valor atual marcado. Antes, o de cliente comparava com
# id_marca e nunca marcava nada: salvar a edição trocava o cliente da venda.
selecionados="$(curl -sS "$BASE?page=editar_venda&id_venda=1" | grep -o "selected" | wc -l | tr -d ' ')"
if [ "$selecionados" = 3 ]; then
  echo "ok   - edição de venda marca cliente, funcionário e modelo atuais"
else
  echo "FALHA - edição de venda marcou $selecionados de 3 selects"; falhas=$((falhas + 1))
fi
