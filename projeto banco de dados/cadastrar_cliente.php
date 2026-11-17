<H1>CADASTRAR CLIENTE</H1>
<form action="?page=salvar_cliente" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>Nome
            <input type="text" name="nome_cliente" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>CPF
            <input type="text" inputmode="numeric" pattern="[0-9]{11}" maxlength="11" title="11 dígitos, só números" name="cpf_cliente" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>E-mail
            <input type="email" name="email_cliente" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>Telefone
            <input type="tel" maxlength="20" name="telefone_cliente" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>Endereço
            <input type="text" name="endereco_cliente" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>Data de Nascimento
            <input type="date" name="data_nasc_cliente" class="form-control">
        </label>
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>