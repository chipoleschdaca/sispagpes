<?php 
@session_start();
include('conexao.php');

$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);

if (empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}else{
	$res = $pdo->prepare("SELECT m.id as id_militar, m.cpf, m.nome, m.senha, m.perfil, m.status, p.id as id_perfil, p.perfil as nome_perfil FROM militares as m LEFT JOIN perfis as p ON m.perfil = p.id WHERE cpf = :usuario AND senha = :senha AND status = 'Aprovado'");

	$res->bindValue(":usuario", $usuario);
	$res->bindValue(":senha", $senha);
	$res->execute();

	$dados = $res->fetchAll(PDO::FETCH_ASSOC);
	$row = count($dados);

	if ($row > 0) {
		//header('Location: app/admin');

		$_SESSION['usuario'] = $usuario;
		$_SESSION['nome_usuario'] = $dados[0]['nome'];
		$_SESSION['perfil_usuario'] = $dados[0]['nome_perfil'];
		$_SESSION['status'] = $dados[0]['status'];
		$_SESSION['id_militar'] = $dados[0]['id_militar'];
		$_SESSION['id_perfil'] = $dados[0]['id_perfil'];

		if ($_SESSION['status'] == 'Aprovado') {
			if ($_SESSION['perfil_usuario'] == 'ADMIN') {
				header('Location: app/admin');
				exit();
			} elseif ($_SESSION['perfil_usuario'] == 'TESOU' || $_SESSION['perfil_usuario'] == 'ADMIN') {
				header('Location: app/tesouraria');
				exit();
			} elseif ($_SESSION['perfil_usuario'] == 'EXANT' || $_SESSION['perfil_usuario'] == 'ADMIN') {
				header('Location: app/saque');
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
}
?>