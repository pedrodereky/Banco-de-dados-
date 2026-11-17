<?php
    //nome do arquivo config.php

    // Valores padrão para o XAMPP; podem ser trocados por variáveis de ambiente.
    define('HOST', getenv('DB_HOST') ?: 'localhost:3306');
    define('USER', getenv('DB_USER') ?: 'root');
    define('PASS', getenv('DB_PASS') ?: '');
    define('BASE', getenv('DB_NAME') ?: 'concessionaria6162');

    $conn = new mysqli(HOST,USER,PASS,BASE);