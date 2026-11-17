# XSS: um nome com HTML precisa aparecer escapado na listagem e no formulário de edição.
enviar salvar_marca acao=cadastrar nome_marca="<script>alert(1)</script>"
xss_id="$("${DB[@]}" "SELECT MAX(id_marca) FROM marca")"
pagina_lista="$(curl -sS "$BASE?page=listar_marca")"
pagina_edicao="$(curl -sS "$BASE?page=editar_marca&id_marca=$xss_id")"
if grep -q "<script>alert(1)</script>" <<<"$pagina_lista$pagina_edicao"; then
  echo "FALHA - HTML do banco aparece sem escape"; falhas=$((falhas + 1))
elif grep -q "&lt;script&gt;alert(1)&lt;/script&gt;" <<<"$pagina_lista" && grep -q "&lt;script&gt;" <<<"$pagina_edicao"; then
  echo "ok   - HTML do banco aparece escapado na listagem e na edição"
else
  echo "FALHA - nome da marca não encontrado nas páginas"; falhas=$((falhas + 1))
fi
