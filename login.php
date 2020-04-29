<?php
session_start();
include('conexao.php');

if (empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, md5($_POST['senha']));
$query = "SELECT * FROM militares WHERE cpf = '{$usuario}' AND senha = '{$senha}' AND status = 'Aprovado'";
$result = mysqli_query($conexao, $query);
$dado = mysqli_fetch_array($result);
$row = mysqli_num_rows($result);

if ($row > 0) {
	$_SESSION['usuario'] = $usuario;
	$_SESSION['nome_usuario'] = $dado['nome'];
	$_SESSION['perfil_usuario'] = $dado['perfil'];
	$_SESSION['status'] = $dado['status'];

	if ($_SESSION['status'] == 'Aprovado'){

		if ($_SESSION['perfil_usuario'] == 'TESOU') {
			header('Location: apps/tesoureiro/painel_tesouraria.php');
			exit();
		}

		if ($_SESSION['perfil_usuario'] == 'ADMIN') {
			header('Location: apps/admin/painel_admin.php');
			exit();
		}

		if ($_SESSION['perfil_usuario'] == 'EXANT') {
			header('Location: apps/exercicioanterior/painel_exant.php');
			exit();
		}
	} elseif ($_SESSION['status'] != 'Aprovado') {		
		header('Location: index.php');
		exit();
	}
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}
