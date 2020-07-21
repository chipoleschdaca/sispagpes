<?php
	require_once('../../conexao.php');	
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../css/font-awesome.all.min.css" rel="stylesheet">
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <link href="../../css/index.css" rel="stylesheet"> 
  <title>SISPAGPES 2.0</title>
 </head>
 <body>
 <nav class="navbar navbar-dark bg-dark">
 	
</nav>
<div class="container-fluid">
	<?= 'Este é o perfil '.$_SESSION['perfil_usuario'].' e o usuário é o '.$_SESSION['nome_usuario'];?>
</div>
 </body>
 </html>