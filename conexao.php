<?php
require_once('config.php');
try {
	$pdo = new PDO("mysql:dbname=$db;host=$host", "$usuario", "$senha");	
} catch (Exception $e) {
	echo 'Erro ao conectar ao Bando de Dados<br>'.$e;
}
 ?>