<?php
    //nome do arquivo config.php

    define('HOST', 'localhost:3306');
    define('USER', 'root');
    define('PASS', '');
    define('BASE', 'concessionaria6162');

    $conn = new mysqli(HOST,USER,PASS,BASE);