<?php
require_once('../../conexao.php');
require_once('../../config.php');
login('ADMIN', '../../');

$page1 = 'militar';
$page2 = 'perfil';
$page3 = 'secao';
$page4 = 'posto';
$page5 = 'exercicioanterior';
?>
<!DOCTYPE html>
<html>
<head>	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" type="image/png" href="../../img/gapls.png">
	<link href="../../css/font-awesome.all.min.css" rel="stylesheet">
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/index.css" rel="stylesheet"> 
	<title>SISPAGPES 2.0</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<img src="../../img/gapls.png" class="" style="width: 0.75cm; height: 0.85cm;">
	<a class="navbar-brand h1 ml-3 mb-0" href="#">SISPAGPES</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite"><span class="navbar-toggler-icon"></span></button>
	<div class="collapse navbar-collapse" id="navbarSite">
		<ul class="navbar-nav mr-auto">
			<li class="navbar-item">
				<a class="nav-link" href="../admin">Início</a>		
			</li>
			<li class="navbar-item">
				<a class="nav-link" href="index.php?page=<?=$page1;?>">Militar</a>		
			</li>
			<li class="navbar-item">
				<a class="nav-link" href="index.php?page=<?=$page2;?>">Perfil</a>		
			</li>
			<li class="navbar-item">
				<a class="nav-link" href="index.php?page=<?=$page3;?>">Seção</a>		
			</li>
			<li class="navbar-item">
				<a class="nav-link" href="index.php?page=<?=$page4;?>">Posto</a>	
			</li>
			<li class="navbar-item">
				<a class="nav-link" href="index.php?page=<?=$page5;?>">Exercício Anterior</a>	
			</li>
		</ul>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">Perfis</a>
				<div class="dropdown-menu" aria-labelledby="navDrop">
					<a class="dropdown-item" href="../tesouraria">Painel do Tesoureiro</a>
					<a class="dropdown-item" href="../saque">Painel do Sacador</a>
				</div>
			</li>
		</ul>
		<!-- <div class="dropdown">
		  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown link</a>
		  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
		    <a class="dropdown-item" href="#">Action</a>
		    <a class="dropdown-item" href="#">Another action</a>
		    <a class="dropdown-item" href="#">Something else here</a>
	  </div> -->
	  <a href=""><img src="../../img/icons/add-colored.svg" class="" style="width: 0.85cm; height: 0.85cm;"></a>
		<ul class="navbar-nav ml-auto">
	    <li class="nav-item dropdown">
	      <a class="nav-link" data-toggle="dropdown" href="#">
	        <i class="fas fa-bars"></i>
	        <?= $_SESSION['nome_usuario'] ?>
	        <!-- <span class="d-lg-none d-md-block">Some Actions</span> -->
	      </a>
	      <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
	        <a class="dropdown-item" href="#">
	          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
	          Perfil
	        </a>
	        <a class="dropdown-item" href="#">
	          <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
	          Configurações
	        </a>
	        <a class="dropdown-item" href="#">
	          <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
	          Atividade
	        </a>
	        <div class="dropdown-divider"></div>
	        <a class="dropdown-item" href="../../logout.php" data-target="#logoutModal">
	          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
	          Sair
	        </a>
	      </div>
	    </li>
  	</ul>  	
	</div>	
</nav>
<div class="container-fluid">
	<?php 
		if (@$_GET['page'] == $page1) {
			include_once($page1.".php");
		}elseif (@$_GET['page'] == $page2) {
			include_once($page2.".php");
		}elseif (@$_GET['page'] == $page3) {
			include_once($page3.".php");
		}elseif (@$_GET['page'] == $page4) {
			include_once($page4.".php");
		}elseif (@$_GET['page'] == $page5) {
			include_once($page5.".php");
		}
	?>
</div>
</body>
<script type="text/javascript" src="../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../../js/jquery.quicksearch.min.js"></script>
<script type="text/javascript" src="../../js/select2.full.min.js"></script>
<script type="text/javascript" src="../../js/font-awesome.all.min.js"></script>
</html>