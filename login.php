<?php
session_start();
include('conexao.php');

//CANCELAR ORÇAMENTOS APÓS 5 DIAS

$query = "SELECT * from orcamentos where status = 'Aguardando'";
$result = mysqli_query($conexao, $query);
while ($res_1 = mysqli_fetch_array($result)) {
	$data_geracao = $res_1['data_geracao'];
	$data_cancelamento = date('Y/m/d', strtotime("-7 days", strtotime(date('Y/m/d'))));
	$query_editar = "UPDATE orcamentos set status = 'Cancelado' where data_geracao = '$data_cancelamento' and status = 'Aguardando'";
	$result_editar = mysqli_query($conexao, $query_editar);
}


if (empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, md5($_POST['senha']));
$query = "select * from usuarios where usuario = '{$usuario}' and senha = '{$senha}'";
$result = mysqli_query($conexao, $query);
$dado = mysqli_fetch_array($result);
$row = mysqli_num_rows($result);

if ($row > 0) {
	$_SESSION['usuario'] = $usuario;
	$_SESSION['nome_usuario'] = $dado['nome'];
	$_SESSION['perfil_usuario'] = $dado['perfil'];


	if ($_SESSION['perfil_usuario'] == 'Administrador' || $_SESSION['perfil_usuario'] == 'Gerente') {
		header('Location: apps/admin/painel_admin.php');
		exit();
	}

	if ($_SESSION['perfil_usuario'] == 'Tesoureiro') {
		header('Location: painel_tesouraria.php');
		exit();
	}

	if ($_SESSION['perfil_usuario'] == 'EXANT') {
		header('Location: apps/exercicioanterior/exant/painel_exant.php');
		exit();
	}

	if ($_SESSION['perfil_usuario'] == 'Funcionário') {
		header('Location: painel_funcionario.php');
		exit();
	}

	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}
