<?php
function login($a, $b)
{
	if ($_SESSION['perfil_usuario'] == 'ADMIN') {
	} else {
		if ($_SESSION['perfil_usuario'] != $a) {
			header('Location:' . $b . 'index.php');
			exit();
		} elseif (!$_SESSION['usuario']) {
			header('Location:' . $b . 'index.php');
			exit();
		}
	}
}
