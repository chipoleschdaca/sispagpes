<?php
if (!$_SESSION['usuario']) {
	header('Location: index.php');
	exit();
}

function login($a, $b)
{
	if ($_SESSION['perfil_usuario'] != $a) {
		header('Location: ' . $b . 'index.php');
		exit();
	}
}
