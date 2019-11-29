<?php

define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '123456');
define('BD', 'sispagpes');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, BD) or die('Não foi possível conectar!');

?>