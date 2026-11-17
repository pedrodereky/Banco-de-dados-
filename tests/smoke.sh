#!/usr/bin/env bash
# Teste de ponta a ponta: envia os formulários para o site rodando em
# http://127.0.0.1:8000 e confere o resultado direto no MySQL.
set -euo pipefail

BASE="http://127.0.0.1:8000/index.php"
DB=(mysql -h127.0.0.1 -uroot concessionaria6162 -N -B -e)
falhas=0

enviar() {  # enviar <page> <campo=valor>...
  local page="$1"; shift
  local args=()
  for kv in "$@"; do args+=(--data-urlencode "$kv"); done
  curl -sS -o /dev/null -X POST "$BASE?page=$page" "${args[@]}"
}

confere() {  # confere <descrição> <sql> <esperado>
  local obtido
  obtido="$("${DB[@]}" "$2")"
  if [ "$obtido" = "$3" ]; then
    echo "ok   - $1"
  else
    echo "FALHA - $1: esperado [$3], obtido [$obtido]"
    falhas=$((falhas + 1))
  fi
}

enviar salvar_marca acao=cadastrar nome_marca=Fiat
confere "cadastra marca" "SELECT nome_marca FROM marca WHERE id_marca=1" "Fiat"

enviar salvar_modelo acao=cadastrar nome_modelo=Uno cor_modelo=Branco ano_modelo=2020 tipo_modelo=Hatch marca_id_marca=1
confere "cadastra modelo" "SELECT CONCAT(nome_modelo,'/',marca_id_marca) FROM modelo WHERE id_modelo=1" "Uno/1"

enviar salvar_cliente acao=cadastrar nome_cliente="Ana Souza" cpf_cliente=12345678901 email_cliente=ana@exemplo.com \
  telefone_cliente=61999990000 endereco_cliente="Rua A, 10" data_nasc_cliente=1990-05-20
confere "cadastra cliente" "SELECT CONCAT(nome_cliente,'/',dt_nasc_cliente) FROM cliente WHERE id_cliente=1" "Ana Souza/1990-05-20"

enviar salvar_funcionario acao=cadastrar nome_funcionario="Bruno Lima" email_funcionario=bruno@exemplo.com telefone_funcionario=61988880000
confere "cadastra funcionário" "SELECT nome_funcionario FROM funcionario WHERE id_funcionario=1" "Bruno Lima"

enviar salvar_venda acao=cadastrar data_venda=2025-10-13 valor_venda=55000.50 cliente_id_cliente=1 funcionario_id_funcionario=1 modelo_id_modelo=1
confere "cadastra venda" "SELECT valor_venda FROM venda WHERE id_venda=1" "55000.50"

for pagina in listar_marca listar_modelo listar_cliente listar_funcionario listar_venda; do
  status="$(curl -sS -o /dev/null -w '%{http_code}' "$BASE?page=$pagina")"
  [ "$status" = 200 ] && echo "ok   - $pagina responde 200" || { echo "FALHA - $pagina respondeu $status"; falhas=$((falhas + 1)); }
done

# Testes adicionais, um arquivo por tela, em tests/casos/*.sh
for caso in "$(dirname "$0")"/casos/*.sh; do
  [ -e "$caso" ] || continue
  # shellcheck source=/dev/null
  source "$caso"
done

echo
[ "$falhas" -eq 0 ] && echo "Todos os testes passaram." || { echo "$falhas teste(s) falharam."; exit 1; }
