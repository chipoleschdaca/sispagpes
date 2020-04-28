<?php

define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '123456');
define('BD', 'sispagpes');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, BD) or die('Não foi possível conectar!');
mysqli_set_charset($conexao,'utf8');

$url = "http://localhost/sispagpes";
