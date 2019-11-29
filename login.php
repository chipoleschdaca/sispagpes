<?php
session_start();
include('conexao.php');

//CANCELAR ORÇAMENTOS APÓS 5 DIAS

$query = "SELECT * from orcamentos where status = 'Aguardando'";
$result = mysqli_query($conexao, $query);
	while($res_1 = mysqli_fetch_array($result)){
		$data_geracao = $res_1['data_geracao'];
		$data_cancelamento = date('Y/m/d', strtotime("-7 days",strtotime(date('Y/m/d'))));
		$query_editar = "UPDATE orcamentos set status = 'Cancelado' where data_geracao = '$data_cancelamento' and status = 'Aguardando'";
		$result_editar = mysqli_query($conexao, $query_editar);
	}


if(empty($_POST['usuario']) || empty($_POST['senha'])){
	header('Location: index.php');
	exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select * from usuarios where usuario = '{$usuario}' and senha = '{$senha}' ";

$result = mysqli_query($conexao, $query);
$dado = mysqli_fetch_array($result);
$row = mysqli_num_rows($result);

if ($row > 0){
	$_SESSION['usuario'] = $usuario;
	$_SESSION['nome_usuario'] = $dado['nome'];
	$_SESSION['cargo_usuario'] = $dado['cargo'];
	

	if ($_SESSION['cargo_usuario'] == 'Administrador' || $_SESSION['cargo_usuario'] == 'Gerente'){
		header('Location: painel_admin.php');
		exit();
	}

	if ($_SESSION['cargo_usuario'] == 'Tesoureiro'){
		header('Location: painel_tesouraria.php');
		exit();
	}


	//if ($_SESSION['cargo_usuario'] == 'Funcionario'){
		header('Location: painel_funcionario.php'); // --> Faz com que qualquer login que não seja com perfil de Administrador ou Tesoureiro caia na página painel_funcionario.
	//	exit();
	//}
	
	exit();
}else{
	$_SESSION['nao_autenticado'] = true; //Essa variável 'nao_autenticado' não está especificada em lugar nenhum
	header('Location: index.php');
	exit();
}

?>