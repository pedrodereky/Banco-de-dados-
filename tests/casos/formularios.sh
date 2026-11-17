# Tipos de campo que afetam o que o usuário consegue digitar.
html_cliente="$(curl -sS "$BASE?page=cadastrar_cliente")"
html_venda="$(curl -sS "$BASE?page=cadastrar_venda")"
checa_html() {  # checa_html <descrição> <html> <trecho esperado>
  if grep -qF "$3" <<<"$2"; then echo "ok   - $1"; else echo "FALHA - $1"; falhas=$((falhas + 1)); fi
}
checa_html "CPF é texto de 11 dígitos (preserva zero à esquerda)" "$html_cliente" 'pattern="[0-9]{11}"'
checa_html "e-mail usa type=email" "$html_cliente" 'type="email" name="email_cliente"'
checa_html "valor da venda aceita centavos" "$html_venda" 'step="0.01"'

enviar salvar_cliente acao=cadastrar nome_cliente="Zero à esquerda" cpf_cliente=01234567890 email_cliente=z@exemplo.com \
  telefone_cliente="(61) 99999-0000" endereco_cliente=x data_nasc_cliente=2000-01-01
confere "CPF começando com zero é salvo inteiro" "SELECT cpf_cliente FROM cliente WHERE nome_cliente='Zero à esquerda'" "01234567890"
