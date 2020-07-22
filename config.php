<?php
date_default_timezone_set('America/Sao_Paulo');
$host = 'localhost';
$usuario = 'root';
$senha = '123456';
$db = 'sispagpes';

function login($a, $b)
{
	if (@$_SESSION['perfil_usuario'] == 'ADMIN') {
	} else {
		if (@$_SESSION['perfil_usuario'] != $a) {
			header('Location:' . $b);
			exit();
		} elseif (@!$_SESSION['usuario']) {
			header('Location:' . $b);
			exit();
		}
	}
}
