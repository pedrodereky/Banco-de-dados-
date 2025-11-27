Sobre o Projeto
Este projeto consiste em um sistema para gerenciamento de uma concessionária, desenvolvido utilizando Java, PHP, HTML e MySQL.
O objetivo é centralizar e organizar informações de veículos, clientes, funcionários e vendas, oferecendo uma interface web e suporte a operações internas por meio de aplicações Java.
Banco de Dados
O sistema utiliza MySQL como banco de dados relacional. As principais tabelas são:
Veiculos: informações dos veículos disponíveis para venda.
Clientes: cadastro de compradores.
Funcionarios: dados de colaboradores e vendedores.
Vendas: registro das transações realizadas.
Servicos (opcional): histórico de manutenções e serviços executados.
O banco serve como ponto central de integração entre PHP, Java e a interface HTML.
Tecnologias Utilizadas
Frontend
HTML5
CSS3 (opcional)
JavaScript (opcional)
Backend
PHP: responsável pela lógica do lado do servidor, manipulação de dados e comunicação com o banco.
Java: utilizado para geração de relatórios, consultas internas e integrações adicionais.
MySQL: armazenamento e gerenciamento dos dados da concessionária.
Funcionalidades
Cadastro e listagem de veículos
Cadastro de clientes
Cadastro de funcionários
Registro e consulta de vendas
Integração com Java para relatórios ou processos internos
Exibição de informações por meio de páginas HTML
Estrutura do Projeto
/projeto-concessionaria
│
├── frontend/
│   ├── index.html
│   ├── cadastro-veiculo.html
│   ├── lista-veiculos.html
│
├── backend-php/
│   ├── conexao.php
│   ├── inserirVeiculo.php
│   ├── listarVeiculos.php
│
├── java-app/
│   ├── src/
│   │   └── ConexaoBD.java
│   │   └── Relatorios.java
│
└── database/
    └── concessionaria.sql
Como Executar o Projeto
1. Configuração do Banco de Dados
Instalar o MySQL.
Importar o arquivo concessionaria.sql.
Atualizar usuário e senha nos arquivos:
backend-php/conexao.php
java-app/src/ConexaoBD.java
2. Execução do Backend PHP
Hospedar o projeto em um servidor local (ex.: XAMPP ou WAMP).
Acessar no navegador:
http://localhost/projeto-concessionaria/frontend/index.html
3. Execução da Aplicação Java
Importar o projeto em uma IDE (IntelliJ, NetBeans ou Eclipse).
Configurar dependências JDBC.
Executar as classes responsáveis por relatórios e consultas.
Requisitos
PHP 7 ou superior
Java 8 ou superior
MySQL 5.7 ou superior
Servidor Apache (XAMPP recomendado)
Contribuições
Sugestões, melhorias e pull requests são bem-vindos.
Licença
Projeto de uso acadêmico e livre para modificações conforme necessidade.
