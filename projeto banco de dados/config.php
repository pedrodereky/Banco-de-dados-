<?php
    //nome do arquivo config.php

    // Valores padrão para o XAMPP; podem ser trocados por variáveis de ambiente.
    define('HOST', getenv('DB_HOST') ?: 'localhost:3306');
    define('USER', getenv('DB_USER') ?: 'root');
    define('PASS', getenv('DB_PASS') ?: '');
    define('BASE', getenv('DB_NAME') ?: 'concessionaria6162');

    $conn = new mysqli(HOST,USER,PASS,BASE);

    // Escapa um valor antes de colocá-lo no HTML. Sem isso, um nome como
    // <script>...</script> salvo no banco vira código executado na página.
    function e($valor) {
        return htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8');
    }

    // Executa um prepared statement e devolve o código de erro do MySQL (0 = sucesso).
    // No PHP 8.1+ o mysqli lança exceção em vez de retornar false; sem isso, uma
    // exclusão barrada por chave estrangeira derrubava a página.
    function executar($stmt) {
        try {
            $stmt->execute();
            return 0;
        } catch (mysqli_sql_exception $erro) {
            return $erro->getCode();
        }
    }
