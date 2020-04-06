<?php
function login($a, $b)
{
	if ($_SESSION['perfil_usuario'] != $a) {
		header('Location:' . $b . 'index.php');
		exit();
	}
	if (!$_SESSION['usuario']) {
		header('Location:' . $b . 'index.php');
		exit();
	}
}
