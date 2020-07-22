<?php
require_once('../../conexao.php');
require_once('../../config.php');
login('EXANT', '../../');
	echo 'Este é o perfil '.$_SESSION['perfil_usuario'].' e o usuário é o '.$_SESSION['nome_usuario'];
 ?>