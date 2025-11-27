<H1>CADASTRAR FUNCIONARIO</H1>
<form action="?page=salvar_funcionario" method='POST'>
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label for="">Nome
            <input type="text" name="nome_funcionario" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label for="">E-mail
            <input type="text" name="email_funcionario" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label for="">Telefone
            <input type="text" name="telefone_funcionario" class="form-control">
        </label>
    </div>
    
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>