# Sistema de Concessionária

Sistema web para gerenciar uma concessionária: **marcas, modelos, clientes, funcionários e vendas**. Feito em PHP com MySQL e Bootstrap, como projeto da disciplina de Banco de Dados.

## Funcionalidades

Cada cadastro tem as telas de **cadastrar, listar, editar e excluir**:

| Cadastro | Campos |
|---|---|
| Marcas | nome |
| Modelos | nome, cor, ano, tipo e marca |
| Clientes | nome, CPF, e-mail, telefone, endereço e data de nascimento |
| Funcionários | nome, e-mail e telefone |
| Vendas | data, valor, cliente, funcionário e modelo vendido |

## Banco de dados

O modelo foi feito no MySQL Workbench e está em [`banco-de-dados-2122m.sql`](<projeto banco de dados/banco-de-dados-2122m.sql>) (schema `concessionaria6162`):

```
marca 1───N modelo 1───N venda N───1 cliente
                                   N
                                   │
                                   1
                              funcionario
```

## Como executar

Requer PHP 7.4+ com a extensão `mysqli` e MySQL 5.7+ (o XAMPP traz os dois).

1. Crie o banco importando o script:
   ```sh
   mysql -u root < "projeto banco de dados/banco-de-dados-2122m.sql"
   ```
2. Coloque a pasta `projeto banco de dados` no `htdocs` do XAMPP e acesse `http://localhost/<pasta>/index.php`.
   Ou, sem XAMPP:
   ```sh
   cd "projeto banco de dados" && php -S localhost:8000
   ```

A conexão usa `localhost:3306`, usuário `root` e senha vazia, o padrão do XAMPP. Para outro servidor, defina as variáveis de ambiente `DB_HOST`, `DB_USER`, `DB_PASS` e `DB_NAME`.

## Segurança

- Todas as consultas usam **prepared statements**, sem SQL injection.
- Todo valor vindo do banco passa por `htmlspecialchars` antes de ir para a página, sem XSS.

## Testes

O GitHub Actions sobe um MySQL, cria o banco com o script do projeto, roda o site e executa [`tests/smoke.sh`](tests/smoke.sh): cadastro, edição e exclusão das cinco telas, além de tentativas de SQL injection e XSS.
