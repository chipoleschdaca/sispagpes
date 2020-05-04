<?php
session_start();
include('conexao.php');

if (empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, md5($_POST['senha']));
$query = "SELECT m.cpf, m.senha, m.perfil, m.status, p.id, p.perfil as nome_perfil FROM militares as m LEFT JOIN perfis as p ON m.perfil = p.id WHERE cpf = '{$usuario}' AND senha = '{$senha}' AND status = 'Aprovado'";
$result = mysqli_query($conexao, $query);
$dado = mysqli_fetch_array($result);
$row = mysqli_num_rows($result);

if ($row > 0) {
	$_SESSION['usuario'] = $usuario;
	$_SESSION['nome_usuario'] = $dado['nome'];
	$_SESSION['perfil_usuario'] = $dado['nome_perfil'];
	$_SESSION['status'] = $dado['status'];

	if ($_SESSION['status'] == 'Aprovado') {

		if ($_SESSION['perfil_usuario'] == 'TESOU') {
			header('Location: apps/tesoureiro/painel_tesouraria.php');
			exit();
		} elseif ($_SESSION['perfil_usuario'] == 'ADMIN') {
			header('Location: apps/admin/painel_admin.php');
			exit();
		} elseif ($_SESSION['perfil_usuario'] == 'EXANT') {
			header('Location: apps/exercicioanterior/painel_exant.php');
			exit();
		} else {
			header('Location: index.php');
			exit();
		}
	} elseif ($_SESSION['status'] != 'Aprovado') {
		$_SESSION['status'] = true;
		header('Location: index.php');
		exit();
	}
	exit();
} elseif ($_SESSION['status'] != 'Aprovado') {
	$_SESSION['status'] = true;
	header('Location: index.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}
