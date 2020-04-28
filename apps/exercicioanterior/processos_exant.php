<?php
session_start();
include('../../verificar_login.php');
include('../../conexao.php');
include('../../dist/php/functions.php');
login('EXANT', '../../');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<?php head('../../') ?>
	<!-- DataTables -->
	<link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="fas fa-bars"></i>
						<?php echo $_SESSION['nome_usuario'] ?>
						<span class="d-lg-none d-md-block">Some Actions</span>
					</a>
					<!-- Dropdown - User Information -->
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
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
		</nav>
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<a href="painel_exant.php" class="brand-link">
				<img src="../../dist/img/gapls.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
				<b><span class="brand-text font-weight-light">SISPAGPES</span></b>
			</a>
			<div class="sidebar">
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<li class="nav-item">
							<a href="painel_exant.php" class="nav-link">
								<i class="nav-icon fas fa-home"></i>
								<p>
									Página Inicial
								</p>
							</a>
						</li>
						<li class="nav-item has-treeview menu-open">
							<a href="#" class="nav-link active">
								<i class="fas fa-folder-open nav-icon"></i>
								<p>Exercício Anterior</p>
								<i class="right fas fa-angle-left"></i>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="requerentes.php" class="nav-link">
										<i class="far fa-hand-point-right nav-icon"></i>
										<p>
											Requerentes
										</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="processos_exant.php" class="nav-link active">
										<i class="far fa-hand-point-right nav-icon"></i>
										<p>Processos</p>
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</aside>
		<div class="content-wrapper">
			<section class="content">
				<div class="container-fluid">
					<br>
					<div class="row">
						<div class="col-12 col-sm-6 col-md-3">
							<div class="info-box mb-3">
								<span class="info-box-icon bg-dark elevation-1"><i class="fas fa-inbox"></i></span>
								<div class="info-box-content" style="text-align:center;">
									<span class="info-box-text">TOTAL DE PROCESSOS</span>
									<span class="info-box-number">
										<h4>
											<?php
											$query = "SELECT * FROM exercicioanterior";
											$result = mysqli_query($conexao, $query);
											$res = mysqli_fetch_array($result);
											$row = mysqli_num_rows($result);
											echo $row;
											?>
										</h4>
									</span>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							<div class="info-box">
								<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-folder-open"></i></span>
								<div class="info-box-content" style="text-align:center;">
									<span class="info-box-text">PROCESSOS ABERTOS</span>
									<span class="info-box-number">
										<h4>
											<?php
											$query = "SELECT * FROM exercicioanterior where estado = 'Aberto'";
											$result = mysqli_query($conexao, $query);
											$res = mysqli_fetch_array($result);
											$row = mysqli_num_rows($result);
											echo $row;
											?>
										</h4>
									</span>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							<div class="info-box mb-3">
								<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-cogs"></i></span>
								<div class="info-box-content" style="text-align:center;">
									<span class="info-box-text">PROCESSOS AGUARDANDO</span>
									<span class="info-box-number">
										<h4>
											<?php
											$query = "SELECT * FROM exercicioanterior where estado = 'Aguardando'";
											$result = mysqli_query($conexao, $query);
											$res = mysqli_fetch_array($result);
											$row = mysqli_num_rows($result);
											echo $row;
											?>
										</h4>
									</span>
								</div>
							</div>
						</div>
						<div class="clearfix hidden-md-up"></div>
						<div class="col-12 col-sm-6 col-md-3">
							<div class="info-box mb-3">
								<span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>
								<div class="info-box-content" style="text-align:center;">
									<span class="info-box-text">PROCESSOS APROVADOS</span>
									<span class="info-box-number">
										<h4>
											<?php
											$query = "SELECT * FROM exercicioanterior where estado = 'Aprovado'";
											$result = mysqli_query($conexao, $query);
											$res = mysqli_fetch_array($result);
											$row = mysqli_num_rows($result);
											echo $row;
											?>
										</h4>
									</span>
								</div>
							</div>
						</div>
						<div class="clearfix hidden-md-up"></div>
						<!--	<dv class="col-12 col-sm-6 col-md-3">
							<div class="info-box mb-3">
								<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-down"></i></span>
								<div class="info-box-content" style="text-align:center;">
									<span class="info-box-text">PROCESSOS CANCELADOS</span>
									<span class="info-box-number">
										<h4>
											<?php
											$query = "SELECT * FROM exercicioanterior where estado = 'Cancelado'";
											$result = mysqli_query($conexao, $query);
											$res = mysqli_fetch_array($result);
											$row = mysqli_num_rows($result);
											echo $row;
											?>
										</h4>
									</span>
								</div>
							</div>
						</dv>-->
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<p>
								<a class="btn btn-outline-dark btn-sm" style="font-style: arial;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample">
									<i class="fa fa-plus"></i> Filtrar
								</a>
							</p>
							<div class="collapse" id="collapseExample" style="width: 100%;" aria-expanded="true">
								<div class="card">
									<div class="card-body">
										<form class="form-inline">
											<div class="input-group input-group-sm">
												<label for="txtnome" style="margin-right: 5px;">SARAM:</label>
												<input class="form-control" type="search" id="txtsaram3" name="txtsaram3" placeholder="SARAM" aria-label="Pesquisar" style="border-radius:3px; margin-right: 20px;">
											</div>
											<div class="input-group input-group-sm">
												<label for="txtnome" style="margin-right: 5px;">Requerente:</label>
												<input class="form-control" type="search" id="txtnome" name="txtnome" placeholder="Nome ou parte do nome" aria-label="Pesquisar" style="border-radius:3px; margin-right: 20px;">
											</div>
											<br>
											<div class="input-group input-group-sm">
												<label for="status" style="margin-right: 5px;">Direito Pleiteado: </label>
												<select class="form-control select2" id="txtdirpleiteado" name="txtdirpleiteado" style="border-radius:3px; margin-right:20px; width: 375px">
													<option value="">Selecione o direito pleiteado</option>
													<?php
													$query_direito = "SELECT d.id as id_direito, d.direito as direito_pleiteado, COUNT(e.direito_pleiteado) FROM exercicioanterior as e LEFT JOIN tb_direitoPleiteado_exant as d ON d.id = e.direito_pleiteado GROUP BY e.direito_pleiteado";
													$result_direito = mysqli_query($conexao, $query_direito);
													if (count($result_direito)) {
														while ($res_dir = mysqli_fetch_array($result_direito)) {
															$id = $res_dir['id_direito'];
															$direito = $res_dir['direito_pleiteado'];

													?>
															<option value="<?php echo $id ?>"><?php echo $direito ?></option>
													<?php }
													} ?>
												</select>
											</div>
											<div class="input-group input-group-sm">
												<label for="status" style="margin-right: 5px;">Estado: </label>
												<select class="form-control select2" id="txtestadofiltro" name="txtestadofiltro" style="border-radius:3px; margin-right:20px; width: 375px;">
													<option value="" selected>Selecione o estado do processo</option>
													<?php
													$query_est = "SELECT est.id as id_estado, est.estado as estado_processo, COUNT(e.estado) FROM exercicioanterior as e LEFT JOIN tb_estado_exant as est ON est.id = e.estado GROUP BY e.estado";
													$result_est = mysqli_query($conexao, $query_est);
													if (count($result_est)) {
														while ($res_est = mysqli_fetch_array($result_est)) {
															$id_est_2 = $res_est['id_estado'];
															$estado_est = $res_est['estado_processo'];
													?>
															<option value="<?php echo $id_est_2 ?>"><?php echo $estado_est ?></option>
													<?php }
													} ?>
												</select>
											</div>
											<br>
											<br>
											<div class="input-group-append">
												<button class="btn btn-primary btn-lg" type="submit" name="buttonPesquisar">
													<i class="fas fa-search"></i>
												</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header" style="text-align: center;">
									<h4 class="align-middle" style="text-align:center;"><strong>EXERCÍCIOS ANTERIORES</strong>
									</h4>
								</div>
								<div class="card-body">
									<div class="row" style="margin-bottom: 20px;">
										<div class="col-sm-6">
											<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" style="text-transform: capitalize;" data-target="#modalExemplo">
												<i class="far fa-folder-open"></i> Inserir Novo
											</button>
										</div>
									</div>
									<div class="table-responsive" style="text-align: center; font-size: 12px;">

										<!-------------LISTAR TODOS OS PROCESSOS-------------->

										<?php

										if (isset($_GET['buttonPesquisar']) and $_GET['txtnome'] != '') {
											$nome = '%' . $_GET['txtnome'] . '%';
											$query = "SELECT e.id, e.saram, e.cpf, e.requerente, e.sacador, e.nup, e.prioridade, e.data_criacao, e.direito_pleiteado, e.secao_origem, e.obs, e.data_saida, e.estado, e.secao_atual, r.id as id_req, r.saram as req_saram, r.cpf as req_cpf, r.nome as req_nome, m.nome as mil_nome, d.direito as dir_direito, s.secao as sec_origem, sec.secao as sec_atual, est.estado as est_estado from exercicioanterior as e LEFT JOIN requerentes as r on e.saram = r.id LEFT JOIN militares as m on e.sacador = m.id LEFT JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id LEFT JOIN tb_secoes_exant as s ON e.secao_origem = s.id LEFT JOIN tb_secoes_exant as sec ON e.secao_atual = sec.id LEFT JOIN tb_estado_exant as est ON e.estado = est.id WHERE r.nome LIKE '$nome' order by e.id asc";
										} else if (isset($_GET['buttonPesquisar']) and $_GET['txtsaram3'] != '') {
											$saram_filtro = $_GET['txtsaram3'] . '%';
											$query = "SELECT e.id, e.saram, e.cpf, e.requerente, e.sacador, e.nup, e.prioridade, e.data_criacao, e.direito_pleiteado, e.secao_origem, e.obs, e.data_saida, e.estado, e.secao_atual, r.id as id_req, r.saram as req_saram, r.cpf as req_cpf, r.nome as req_nome, m.nome as mil_nome, d.direito as dir_direito, s.secao as sec_origem, sec.secao as sec_atual, est.estado as est_estado from exercicioanterior as e LEFT JOIN requerentes as r on e.saram = r.id LEFT JOIN militares as m on e.sacador = m.id LEFT JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id LEFT JOIN tb_secoes_exant as s ON e.secao_origem = s.id LEFT JOIN tb_secoes_exant as sec ON e.secao_atual = sec.id LEFT JOIN tb_estado_exant as est ON e.estado = est.id WHERE r.saram LIKE '$saram_filtro' order by e.id asc";
										} else if (isset($_GET['buttonPesquisar']) and $_GET['txtdirpleiteado'] != '') {
											$dir_pleiteado = $_GET['txtdirpleiteado'] . '%';
											$query = "SELECT e.id, e.saram, e.cpf, e.requerente, e.sacador, e.nup, e.prioridade, e.data_criacao, e.direito_pleiteado, e.secao_origem, e.obs, e.data_saida, e.estado, e.secao_atual, r.id as id_req, r.saram as req_saram, r.cpf as req_cpf, r.nome as req_nome, m.nome as mil_nome, d.direito as dir_direito, s.secao as sec_origem, sec.secao as sec_atual, est.estado as est_estado from exercicioanterior as e LEFT JOIN requerentes as r on e.saram = r.id LEFT JOIN militares as m on e.sacador = m.id LEFT JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id LEFT JOIN tb_secoes_exant as s ON e.secao_origem = s.id LEFT JOIN tb_secoes_exant as sec ON e.secao_atual = sec.id LEFT JOIN tb_estado_exant as est ON e.estado = est.id WHERE d.id = '$dir_pleiteado' order by e.id asc";
										} else if (isset($_GET['buttonPesquisar']) and $_GET['txtestadofiltro'] != '') {
											$estado_filtro = $_GET['txtestadofiltro'];
											$query = "SELECT e.id, e.saram, e.cpf, e.requerente, e.sacador, e.nup, e.prioridade, e.data_criacao, e.direito_pleiteado, e.secao_origem, e.obs, e.data_saida, e.estado, e.secao_atual, r.id as id_req, r.saram as req_saram, r.cpf as req_cpf, r.nome as req_nome, m.nome as mil_nome, d.direito as dir_direito, s.secao as sec_origem, sec.secao as sec_atual, est.estado as est_estado from exercicioanterior as e LEFT JOIN requerentes as r on e.saram = r.id LEFT JOIN militares as m on e.sacador = m.id LEFT JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id LEFT JOIN tb_secoes_exant as s ON e.secao_origem = s.id LEFT JOIN tb_secoes_exant as sec ON e.secao_atual = sec.id LEFT JOIN tb_estado_exant as est ON e.estado = est.id WHERE est.id = '$estado_filtro' order by e.id asc";
										} else {
											$query = "SELECT e.id, e.saram, e.cpf, e.requerente, e.sacador, e.nup, e.prioridade, e.data_criacao, e.direito_pleiteado, e.secao_origem, e.obs, e.data_saida, e.estado, e.secao_atual, r.id as id_req, r.saram as req_saram, r.cpf as req_cpf, r.nome as req_nome, m.nome as mil_nome, d.direito as dir_direito, s.secao as sec_origem, sec.secao as sec_atual, est.estado as est_estado from exercicioanterior as e LEFT JOIN requerentes as r on e.saram = r.id LEFT JOIN militares as m on e.sacador = m.id LEFT JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id LEFT JOIN tb_secoes_exant as s ON e.secao_origem = s.id LEFT JOIN tb_secoes_exant as sec ON e.secao_atual = sec.id LEFT JOIN tb_estado_exant as est ON e.estado = est.id order by e.id asc";
										}

										$result = mysqli_query($conexao, $query);
										$row = mysqli_num_rows($result);



										?>

										<table class="table table-sm table-bordered table-striped" id="example1" style="width:100%">
											<thead class="text-primary">
												<th class="align-middle">#</th>
												<th class="align-middle">SARAM</th>
												<th class="align-middle">Requerente</th>
												<th class="align-middle">NUP</th>
												<th class="align-middle">Est. Idoso</th>
												<th class="align-middle">Dt. Criação</th>
												<th class="align-middle">Direito Pleiteado</th>
												<th class="align-middle">Origem</th>
												<th class="align-middle">Estado</th>
												<th class="align-middle">Seção Atual</th>
												<th class="align-middle">Prazo</th>
												<th class="align-middle">Ações</th>
											</thead>
											<tbody>

												<?php

												while ($res_1 = mysqli_fetch_array($result)) {
													$id = $res_1["id"];
													$id_req = $res_1["id_req"];
													$saram = $res_1["req_saram"];
													$cpf = $res_1["cpf"];
													$requerente = $res_1["req_nome"];
													$sacador = $res_1["mil_nome"];
													$nup = $res_1["nup"];
													$prioridade = $res_1["prioridade"];
													$data_criacao = $res_1["data_criacao"];
													$direito_pleiteado = $res_1["dir_direito"];
													$secao_origem = $res_1["sec_origem"];
													$data_saida = $res_1["data_saida"];
													$estado = $res_1["est_estado"];
													$secao_atual = $res_1['sec_atual'];

													$query_prazo = "SELECT prazo_exant FROM tb_secoes_exant WHERE secao = '$secao_atual'";
													$result_prazo = mysqli_query($conexao, $query_prazo);
													$res_prazo = mysqli_fetch_array($result_prazo);
													$prazo_secao = $res_prazo['prazo_exant'];

													if ($data_saida != "") {
														$prazo_pessoal = date('Y-m-d', strtotime('+' . $prazo_secao . ' days', strtotime($res_1["data_saida"])));
													} else {
														$prazo_pessoal = date('Y-m-d', strtotime('+' . $prazo_secao . ' days', strtotime($res_1["data_criacao"])));
													}
													$prazo_pagpes = date('Y-m-d', strtotime('+' . $prazo_secao . ' days', strtotime($res_1["data_saida"])));
													$prazo_controle = date('Y-m-d', strtotime('+' . $prazo_secao . ' days', strtotime($res_1["data_saida"])));
													$prazo_sdpp = date('Y-m-d', strtotime('+' . $prazo_secao . ' days', strtotime($res_1["data_saida"])));
													$today = date('Y-m-d');

												?>

													<tr>
														<td class="align-middle"><?php echo $id; ?></td>
														<td class="align-middle"><?php echo $saram; ?></td>
														<td class="align-middle"><?php echo $requerente; ?></td>
														<td class="align-middle"><?php echo $nup; ?></td>
														<td class="align-middle">
															<?php
															if ($prioridade == 'SIM') {
																echo '<i class="fas fa-check-square"></i>';
															} else if ($prioridade == 'NÃO') {
																echo '<i class="far fa-square"></i>';
															} else {
																echo $prioridade;
															} ?>
														</td>
														<td class="align-middle"><?php echo data($data_criacao); ?></td>
														<td class="align-middle"><?php echo $direito_pleiteado; ?></td>
														<td class="align-middle"><?php echo $secao_origem ?></td>
														<td class="align-middle"><?php echo $estado; ?></td>
														<td class="align-middle"><?php echo $secao_atual; ?></td>
														<?php
														if ($secao_atual == 'DP-1' or $secao_atual == 'DP-4' or $secao_atual == 'ES-LS') {
															if (diferenca($prazo_pessoal, $today) > 15) {
																echo '<td class="align-middle" style="background-color: rgb(0,128,0,0.5);">' . data($prazo_pessoal) . '</td>';
															} elseif (diferenca($prazo_pessoal, $today) <= 15 and diferenca($prazo_pessoal, $today) > 10) {
																echo '<td class="align-middle" style="background-color: rgb(255,255,0, 0.5);">' . data($prazo_pessoal) . '</td>';
															} elseif (diferenca($prazo_pessoal, $today) <= 10) {
																echo '<td class="align-middle" style="background-color: rgb(255,0,0, 0.5);">' . data($prazo_pessoal) . '</td>';
															} else {
																echo '<td class="align-middle">' . data($prazo_pessoal) . '</td>';
															}
														} elseif ($secao_atual == 'DP-3') {
															if (diferenca($prazo_pagpes, $today) > 10) {
																echo '<td class="align-middle" style="background-color: rgb(0,128,0,0.5);">' . data($prazo_pagpes) . '</td>';
															} elseif (diferenca($prazo_pagpes, $today) <= 10 and diferenca($prazo_pagpes, $today) > 5) {
																echo '<td class="align-middle" style="background-color: rgb(255,255,0, 0.5);">' . data($prazo_pagpes) . '</td>';
															} elseif (diferenca($prazo_pagpes, $today) <= 5) {
																echo '<td class="align-middle" style="background-color: rgb(255,0,0, 0.5);">' . data($prazo_pagpes) . '</td>';
															} else {
																echo '<td class="align-middle">' . data($prazo_pagpes) . '</td>';
															}
														} elseif ($secao_atual == 'ACI-1') {
															if (diferenca($prazo_controle, $today) > 10) {
																echo '<td class="align-middle" style="background-color: rgb(0,128,0,0.5);">' . data($prazo_controle) . '</td>';
															} elseif (diferenca($prazo_controle, $today) <= 10 and diferenca($prazo_controle, $today) > 5) {
																echo '<td class="align-middle" style="background-color: rgb(255,255,0, 0.5);">' . data($prazo_controle) . '</td>';
															} elseif (diferenca($prazo_controle, $today) <= 5) {
																echo '<td class="align-middle" style="background-color: rgb(255,0,0, 0.5);">' . data($prazo_controle) . '</td>';
															} else {
																echo '<td class="align-middle">' . data($prazo_controle) . '</td>';
															}
														} else {
															if (diferenca($prazo_sdpp, $today) > 120) {
																echo '<td class="align-middle" style="background-color: rgb(0,128,0,0.5);">' . data($prazo_sdpp) . '</td>';
															} elseif (diferenca($prazo_sdpp, $today) <= 120 and diferenca($prazo_sdpp, $today) > 90) {
																echo '<td class="align-middle" style="background-color: rgb(255,255,0, 0.5);">' . data($prazo_controle) . '</td>';
															} elseif (diferenca($prazo_sdpp, $today) <= 90 and diferenca($prazo_sdpp, $today) > 0) {
																echo '<td class="align-middle" style="background-color: rgb(255,0,0, 0.5);">' . data($prazo_sdpp) . '</td>';
															} else {
																echo '<td class="align-middle">' . data($prazo_sdpp) . '</td>';
															}
														}
														?>
														<td class="align-middle inline-block" id="actionbuttons">
															<a class="btn btn-light btn-xs" data-toggle="popover" data-content="Encaminhar processo" style="width: 24px; height: 24px; padding: 0px;" href="processos_exant.php?func=estado&id=<?php echo $id; ?>"><span class="material-icons" style="font-size: 17px; padding: 0; margin: 0; vertical-align:middle;">local_shipping</span></a>
															<a class="btn btn-light btn-xs" data-toggle="popover" data-content="Histórico" style="width: 24px; height: 24px;" href="processos_exant.php?func=historico&id=<?php echo $id; ?>&id_req=<?php echo $id_req; ?>"><i class="fas fa-eye"></i></a>
															<a class="btn btn-light btn-xs" data-toggle="popover" data-content="HTML" style="width: 24px; height: 24px; padding: 0px;" href="rel/historico_processo_exant.php?id=<?php echo $id; ?>&id_req=<?php echo $id_req; ?>" target="_blank" rel=”noopener”><span class="material-icons" style="font-size: 17px; padding: 0; margin: 0; vertical-align:middle;">print</span></a>
															<a class="btn btn-light btn-xs" data-toggle="popover" data-content="PDF" style="width: 24px; height: 24px;" href="rel/historico_exant_pdf_class.php?id=<?php echo $id; ?>&id_req=<?php echo $id_req; ?>&nup=<?php echo $nup; ?>" target="_blank" rel=”noopener”><i class="fas fa-file-pdf"></i></a>
															<a class="btn btn-light btn-xs" data-toggle="popover" data-content="Editar" style="width: 24px; height: 24px;" href="processos_exant.php?func=edita&id=<?php echo $id; ?>&id_req=<?php echo $id_req; ?>"><i class="fas fa-tools"></i></a>
															<a class="btn btn-light btn-xs" data-toggle="popover" data-content="Excluir" style="width: 24px; height: 24px;" href="processos_exant.php?func=deleta&id=<?php echo $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><i class="fas fa-trash-alt"></i></a>
														</td>
													</tr>
												<?php } ?>
											</tbody>
										</table>
										<?php
										if ($row == '') {
											echo "<h3> Não existem dados cadastrados no banco </h3>";
										}
										?>
									</div>
								</div>
								<div class="card-footer clearfix" style="font-size: 12px;">
									Prazo de cada seção:
									<?php
									$query_prazo2 = "SELECT * FROM tb_secoes_exant";
									$result_prazo2 = mysqli_query($conexao, $query_prazo2);
									while ($res_prazo2 = mysqli_fetch_array($result_prazo2)) {
										echo $res_prazo2['secao'] . ': ' . $res_prazo2['prazo_exant'] . ' dias' . ' / ';
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<style>
					#actionbuttons {
						display: flex;
						justify-content: space-between;
					}
				</style>
				<div id="modalExemplo" class="modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title"><i class="far fa-folder-open"></i> Inserir novo Processo</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
								<form method="POST" action="">
									<div class="row">
										<div class="form-group col-sm-6">
											<label for="">Requerente</label>
											<select class="form-control select2" id="category" name="txtcpf">
												<option value="" disabled selected hidden>selecione o requerente...</option>
												<?php
												$query = "SELECT * FROM requerentes ORDER BY nome asc";
												$result = mysqli_query($conexao, $query);
												if (count($result)) {
													while ($res_1 = mysqli_fetch_array($result)) {
												?>
														<option value="<?php echo $res_1['id']; ?>"><?php echo $res_1['saram']; ?> |
															<?php echo $res_1['nome']; ?></option>
												<?php }
												} ?>
											</select>
										</div>
										<div class="form-group col-sm-6">
											<label for="fornecedor">Sacador</label>
											<select class="form-control select2" id="category" name="funcionario">
												<option value="" disabled selected hidden>Escolha um sacador...</option>
												<?php
												$query = "SELECT * FROM militares where perfil = 'EXANT' ORDER BY nome asc";
												$result = mysqli_query($conexao, $query);
												if (count($result)) {
													while ($res_1 = mysqli_fetch_array($result)) {
												?>
														<option value="<?php echo $res_1['id']; ?>"><?php echo $res_1['nome']; ?>
														</option>
												<?php }
												} ?>
											</select>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="form-group col-sm-3">
											<label for="quantidade">NUP</label>
											<input type="text" class="form-control mr-2" id="txtnup" name="txtnup" placeholder="00000.000000/0000-00" autocomplete="off" required>
										</div>
										<div class="col-sm-2"></div>
										<div class="form-group col-sm-7">
											<div class="col-sm-2"></div>
											<div class="col-sm-10">
												<label class="" for="txtprioridade" style="margin-left: 20px; text-align: center;">Prioridade Lei nº 10.741
													(Estatuto do Idoso)</label>
												<div class="col-sm-5"></div>
												<div class="col-sm-4">
													<div class="custom-control custom-radio">
														<input class="custom-control-input" type="radio" id="customRadio1" name="txtprioridade" value="SIM">
														<label for="customRadio1" class="custom-control-label">SIM</label>
													</div>
													<div class="custom-control custom-radio">
														<input class="custom-control-input" type="radio" id="customRadio2" name="txtprioridade" value="NÃO">
														<label for="customRadio2" class="custom-control-label">NÃO</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="form-group col-sm-5">
											<label for="quantidade">Data de Abertura</label>
											<input type="date" class="form-control" name="txtdatacriacao" placeholder="Data de Abertura" required>
										</div>
										<div class="form-group col-sm-7">
											<label>Direito Pleiteado</label>
											<select class="form-control select2" id="txtdireitopleiteado" name="txtdireitopleiteado">
												<option value="" disabled selected hidden>Direito Pleiteado</option>
												<?php
												$query_direito = "SELECT * FROM tb_direitoPleiteado_exant where status = 'Aprovado' ORDER BY direito";
												$result_direito = mysqli_query($conexao, $query_direito);
												if (count($result_direito)) {
													while ($res_dir = mysqli_fetch_array($result_direito)) {
														$id = $res_dir['id'];
														$direito = $res_dir['direito'];
												?>
														<option value="<?php echo $id ?>"><?php echo $direito ?></option>
												<?php }
												} ?>
											</select>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="form-group col-sm-6">
											<label>Seção de Origem</label>
											<select class="form-control select2" id="txtsecaoorigem" name="txtsecaoorigem">
												<option value="" disabled selected hidden>Escolha a seção onde o processo
													foi criado...</option>
												<?php
												$query_secao = "SELECT * FROM tb_secoes_exant where status = 'Aprovado'";
												$result_secao = mysqli_query($conexao, $query_secao);
												if (count($result_secao)) {
													while ($res_2 = mysqli_fetch_array($result_secao)) {
														$id = $res_2['id'];
														$secao = $res_2['secao'];
												?>
														<option value="<?php echo $id ?>"><?php echo $secao ?></option>
												<?php }
												} ?>
											</select>
										</div>
										<div class="form-group col-sm-6">
											<label for="quantidade">Estado do Processo após criação</label>
											<?php
											$query_estado = "SELECT * FROM tb_estado_exant where estado = 'Criado'";
											$result_estado = mysqli_query($conexao, $query_estado);
											$res_estado = mysqli_fetch_array($result_estado);
											$id_estado = $res_estado['id'];
											$estado_estado = $res_estado['estado'];
											?>
											<input type="text" class="form-control mr-2" id="txtestado" name="txtestado" value="<?php echo $res_estado["estado"]; ?>" disabled>
										</div>
									</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary btn-sm" name="button" style="text-transform: capitalize;"><i class="fas fa-check"></i> Salvar</button>
								<button type="button" class="btn btn-light btn-sm" data-dismiss="modal" style="text-transform: capitalize;"><i class="fas fa-times"></i> Cancelar</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<footer class="main-footer">
			<?php footer() ?>
		</footer>
		<aside class="control-sidebar control-sidebar-dark">
		</aside>
	</div>
	<!-- jQuery -->
	<script src="../../plugins/jquery/jquery.min.js"></script>
	<!-- jQuery Mask -->
	<script src="../../plugins/jquery-mask/dist/jquery.mask.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button)
	</script>
	<!-- Bootstrap 4 -->
	<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- ChartJS -->
	<script src="../../plugins/chart.js/Chart.min.js"></script>
	<!-- Sparkline -->
	<script src="../../plugins/sparklines/sparkline.js"></script>
	<!-- JQVMap -->
	<script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
	<script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
	<!-- jQuery Knob Chart -->
	<script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
	<!-- daterangepicker -->
	<script src="../../plugins/moment/moment.min.js"></script>
	<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
	<!-- Tempusdominus Bootstrap 4 -->
	<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
	<!-- Bootstrap Switch -->
	<script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
	<!-- Summernote -->
	<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="../../dist/js/adminlte.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="../../dist/js/pages/dashboard.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="../../dist/js/demo.js"></script>
	<!-- Material Design-->
	<script src="https://unpkg.com/material-components-web@v4.0.0/dist/material-components-web.min.js"></script>
	<!--IonIcon-->
	<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
	<script type="text/javascript" charset="utf8" src="../../plugins/datatables/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf8" src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

	<script>
		$(document).ready(function() {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"language": {
					"select": {
						"rows": {
							"_": "Selecionado %d linhas",
							"0": "Nenhuma linha selecionada",
							"1": "Selecionado 1 linha"
						}
					}
				},
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>
	<script>
		$(document).ready(function() {
			$('#txtcpf').mask('000.000.000-00', {
				reverse: true
			});
			$('#txtsaram').mask('000.000-0', {
				reverse: true
			});
			$('#txtnup').mask('00000.000000/0000-00', {
				reverse: true
			});
			$('#txtcpf2').mask('000.000.000-00', {
				reverse: true
			});
			$('#txtsaram2').mask('000.000-0', {
				reverse: true
			});
			$('#txtnup2').mask('00000.000000/0000-00', {
				reverse: true
			});
			$('#txtsaram3').mask('000.000-0', {
				reverse: true
			});
		});
	</script>
	<script>
		$(function() {
			$("#datepicker").datepicker({

				dateFormat: 'dd/mm/yy',
				dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
				dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
				dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
				monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
				monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
				nextText: 'Próximo',
				prevText: 'Anterior',
				changeMonth: true,
				changeYear: true,
				showOtherMonths: true,
				selectOtherMonths: true
			});
		});
	</script>
	<script>
		$('[data-toggle="popover"]').popover({
			placement: 'auto',
			trigger: 'hover'
		});
	</script>
	<!-----------------FILTRO PARA PESQUISAR EM QUALQUER COLUNA DA TABELA (JQuery)------------------->

	<!---------------------------------------------------------------------------------------------->
</body>
<style>
	/* The container */
	.container {
		display: block;
		position: relative;
		padding-left: 35px;
		margin-bottom: 12px;
		cursor: pointer;
		font-size: 16px;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
	}

	/* Hide the browser's default radio button */
	.container input {
		position: absolute;
		opacity: 0;
		cursor: pointer;
	}

	/* Create a custom radio button */
	.checkmark {
		position: absolute;
		top: 0;
		left: 0;
		height: 20px;
		width: 20px;
		background-color: #eee;
		border-radius: 50%;
	}

	/* On mouse-over, add a grey background color */
	.container:hover input~.checkmark {
		background-color: #ccc;
	}

	/* When the radio button is checked, add a blue background */
	.container input:checked~.checkmark {
		background-color: #2196F3;
	}

	/* Create the indicator (the dot/circle - hidden when not checked) */
	.checkmark:after {
		content: "";
		position: absolute;
		display: none;
	}

	/* Show the indicator (dot/circle) when checked */
	.container input:checked~.checkmark:after {
		display: block;
	}

	/* Style the indicator (dot/circle) */
	.container .checkmark:after {
		top: 7px;
		left: 7px;
		width: 6px;
		height: 6px;
		border-radius: 50%;
		background: white;
	}

	.textarea {
		text-align: justify;
		white-space: normal;
	}
</style>

</html>

<!--CADASTRAR -->

<?php
if (isset($_POST['button'])) {
	$cpf = $_POST['txtcpf'];
	$sacador = $_POST['funcionario'];
	$nup = $_POST['txtnup'];
	$prioridade = $_POST['txtprioridade'];
	$data_criacao = $_POST['txtdatacriacao'];
	$direito = $_POST['txtdireitopleiteado'];
	$secao_origem = $_POST['txtsecaoorigem'];
	$estado = $_POST['txtestado'];

	// Verificar se o NUP já está cadastrado
	$query_nup = "SELECT * FROM exercicioanterior WHERE nup = '$nup'";
	$result_nup = mysqli_query($conexao, $query_nup);
	$row_nup = mysqli_num_rows($result_nup);

	if ($row_nup > 0) {
		Alerta("info", "O NUP já existe!", false, "processos_exant.php");
		exit();
	}

	$query = "INSERT INTO exercicioanterior (saram, cpf, requerente, sacador, nup, prioridade, data_criacao, direito_pleiteado, secao_origem, data_saida, estado, secao_atual) VALUES ('$cpf', '$cpf', '$cpf', '$sacador', '$nup', '$prioridade', '$data_criacao', '$direito', '$secao_origem','$data_criacao', '$id_estado', '$secao_origem')";

	$result = mysqli_query($conexao, $query);

	if ($result == '') {
		Alerta("error", "Não foi possível cadastrar!", false, "processos_exant.php");
	} else {
		Alerta("success", "Salvo com sucesso!", false, "processos_exant.php");
	}

	//Função para EXCLUIR o registro
} else if (@$_GET['func'] == 'deleta') {
	$id = $_GET['id'];
	$query = "DELETE FROM exercicioanterior where id = '$id'";
	mysqli_query($conexao, $query);
	Alerta("success", "Excluído com sucesso!", false, "processos_exant.php");

	//Função para EDITAR o registro
} else if (@$_GET['func'] == 'edita') {
	$id_ed = $_GET['id'];
	$query_ed = "SELECT e.id, e.saram, e.cpf, e.requerente, e.sacador, e.nup, e.prioridade, e.data_criacao, e.direito_pleiteado, e.secao_origem, e.obs, e.data_saida, e.estado, e.secao_atual, r.id as id_req, r.posto as req_posto, r.situacao as req_situacao, r.saram as req_saram, r.cpf as req_cpf, r.nome as req_nome, m.id as id_mil, m.nome as mil_nome, d.id as id_dir, d.direito as dir_direito, s.id as id_sec, s.secao as sec_origem, est.id as id_est, est.estado as est_estado from exercicioanterior as e LEFT JOIN requerentes as r on e.saram = r.id LEFT JOIN militares as m on e.sacador = m.id LEFT JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id LEFT JOIN tb_secoes_exant as s ON e.secao_origem = s.id LEFT JOIN tb_estado_exant as est ON e.estado = est.id WHERE e.id = '$id_ed'";

	$result_ed = mysqli_query($conexao, $query_ed);
	while ($res_1 = mysqli_fetch_array($result_ed)) {
		$id_req = $res_1["id_req"];
		$id_mil = $res_1["id_mil"];
		$id_dir = $res_1["id_dir"];
		$id_sec = $res_1["id_sec"];
		$id_est = $res_1["id_est"];
		$saram = $res_1['req_saram'];
		$cpf = $res_1["cpf"];
		$posto = $res_1["req_posto"];
		$situacao = $res_1["req_situacao"];
		$requerente = $res_1["req_nome"];
		$sacador = $res_1["mil_nome"];
		$nup = $res_1["nup"];
		$prioridade = $res_1["prioridade"];
		$data_criacao = $res_1["data_criacao"];
		$direito_pleiteado = $res_1["dir_direito"];
		$secao_origem = $res_1["sec_origem"];
		$obs = $res_1["obs"];
		$data_saida = $res_1["data_saida"];
		$estado = $res_1["est_estado"];
		$secao_atual = $res_1['secao_atual'];
?>
		<!-- Modal -->
		<div id="modalEditar" class="modal fade" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<?php
						$id_req = $_GET['id_req'];
						$query_req = "SELECT r.posto, r.situacao, r.nome, p.id, p.posto as nome_posto FROM requerentes as r LEFT JOIN tb_posto as p ON p.id = r.posto WHERE r.id = '$id_req'";
						$result_req = mysqli_query($conexao, $query_req);
						$res_req = mysqli_fetch_array($result_req);
						$nome = $res_req['nome'];
						$posto = $res_req['nome_posto'];
						$situacao = $res_req["situacao"];
						?>
						<h4 class="modal-title" style="text-align:center; width: 100%;">Dados do(a):
							<strong><?php echo $res_req["nome_posto"], " ", $res_req["situacao"], " ", $res_req["nome"] ?></strong>
						</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<form method="POST" action="">
							<div class="row">
								<div class="form-group col-sm-6">
									<label for="">Requerente</label>
									<select class="form-control select2" id="category" name="txtcpf2" required>
										<option value="" disabled selected hidden><?php echo $res_1["req_saram"]; ?> |
											<?php echo $res_1["req_nome"]; ?></option>
										<?php
										$query_consulta_requerente = "SELECT * FROM requerentes ORDER BY nome asc";
										$result_consulta_requerente = mysqli_query($conexao, $query_consulta_requerente);
										while ($res_consulta_requerente = mysqli_fetch_array($result_consulta_requerente)) {
										?>
											<option value="<?php echo $res_consulta_requerente['id']; ?>"><?php echo $res_consulta_requerente['saram'] . " | " . $res_consulta_requerente['nome']; ?></option>
										<?php
										} ?>
									</select>
								</div>
								<div class="form-group col-sm-6">
									<label for="fornecedor">Sacador</label>
									<select class="form-control select2" id="category" name="funcionario2" required>
										<option value="" disabled selected hidden><?php echo $res_1["mil_nome"]; ?></option>
										<?php
										$query_mil = "SELECT * FROM militares where perfil = 'EXANT' ORDER BY nome asc";
										$result_mil = mysqli_query($conexao, $query_mil);
										while ($res_mil = mysqli_fetch_array($result_mil)) {
										?>
											<option value="<?php echo $res_mil['id']; ?>"><?php echo $res_mil['nome']; ?></option>
										<?php
										} ?>
									</select>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="form-group col-sm-3">
									<label for="quantidade">NUP</label>
									<input type="text" class="form-control mr-2" id="txtnup2" name="txtnup2" placeholder="00000.000000/0000-00" value="<?php echo $res_1["nup"]; ?>" required>
								</div>
								<div class="col-sm-2"></div>
								<div class="form-group col-sm-7">
									<div class="col-sm-2"></div>
									<div class="col-sm-10">
										<label class="" for="txtprioridade" style="margin-left: 20px; text-align: center;">Prioridade Lei nº 10.741 (Estatuto do
											Idoso)</label>
										<div class="col-sm-5"></div>
										<div class="col-sm-4">
											<?php
											if ($res_1["prioridade"] == 'SIM') { ?>
												<div class="custom-control custom-radio">
													<input class="custom-control-input" type="radio" id="customRadio3" name="txtprioridade2" value="SIM" checked>
													<label for="customRadio3" class="custom-control-label">SIM</label>
												</div>
												<div class="custom-control custom-radio">
													<input class="custom-control-input" type="radio" id="customRadio4" name="txtprioridade2" value="NÃO">
													<label for="customRadio4" class="custom-control-label">NÃO</label>
												</div>
											<?php
											} else { ?>
												<div class="custom-control custom-radio">
													<input class="custom-control-input" type="radio" id="customRadio3" name="txtprioridade2" value="SIM">
													<label for="customRadio3" class="custom-control-label">SIM</label>
												</div>
												<div class="custom-control custom-radio">
													<input class="custom-control-input" type="radio" id="customRadio4" name="txtprioridade2" value="NÃO" checked>
													<label for="customRadio4" class="custom-control-label">NÃO</label>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="form-group col-sm-5">
									<label for="quantidade">Data de Abertura</label>
									<input type="date" class="form-control" name="txtdatacriacao2" placeholder="Data de Abertura" value="<?php echo $res_1['data_criacao']; ?>" required>
									<!--<input class="form-control" type="text" id="datepicker" name="txtdatacriacao2" placeholder="Data de Abertura" value="<?php data_show($res_1['data_criacao']); ?>">-->
								</div>
								<div class="form-group col-sm-7">
									<label>Direito Pleiteado</label>
									<select class="form-control select2" id="txtdireitopleiteado2" name="txtdireitopleiteado2" required>
										<option value="" disabled selected hidden><?php echo $res_1["dir_direito"]; ?></option>
										<?php
										$query_direito = "SELECT * FROM tb_direitoPleiteado_exant WHERE status = 'Aprovado' ORDER BY direito ASC";
										$result_direito = mysqli_query($conexao, $query_direito);
										while ($res_dir = mysqli_fetch_array($result_direito)) {
											$id_direito = $res_dir['id'];
											$direito_direito = $res_dir['direito'];
										?>
											<option value="<?php echo $id_direito ?>"><?php echo $direito_direito ?></option>
										<?php
										} ?>
									</select>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="form-group col-sm-6">
									<label>Seção de Origem</label>
									<select class="form-control select2" id="txtsecaoorigem2" name="txtsecaoorigem2" required>
										<option value="" disabled selected hidden><?php echo $res_1['sec_origem']; ?></option>
										<?php
										$query_secao = "SELECT * FROM tb_secoes_exant WHERE status = 'Aprovado'";
										$result_secao = mysqli_query($conexao, $query_secao);
										while ($res_secao = mysqli_fetch_array($result_secao)) {
											$id_secao = $res_secao['id'];
											$secao_secao = $res_secao['secao'];
										?>
											<option value="<?php echo $id_secao ?>"><?php echo $secao_secao ?></option>
										<?php
										} ?>
									</select>
								</div>
								<div class="form-group col-sm-6">
									<label for="quantidade">Estado do Processo</label>
									<input type="text" class="form-control mr-2" id="txtestado2" name="txtestado2" value="<?php echo $res_1["est_estado"]; ?>" disabled>
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary btn-sm" name="buttonEditar" style="text-transform: capitalize;"><i class="fas fa-check"></i> Salvar</button>
								<button type="button" class="btn btn-light btn-sm" data-dismiss="modal" style="text-transform: capitalize;"><i class="fas fa-times"></i> Cancelar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		</section>
		</div>
		<script>
			$("#modalEditar").modal("show");
		</script>
		<!--Comando para editar os dados UPDATE -->
		<?php
		if (isset($_POST['buttonEditar'])) {
			$cpf_edita = $_POST['txtcpf2'];
			$sacador_edita = $_POST['funcionario2'];
			$nup_edita = $_POST['txtnup2'];
			$prioridade_edita = $_POST['txtprioridade2'];
			$data_criacao_edita = $_POST['txtdatacriacao2'];
			$direito_edita = $_POST['txtdireitopleiteado2'];
			$secao_origem_edita = $_POST['txtsecaoorigem2'];

			if ($res_1['nup'] != $nup_edita) {
				$query_verificar = "SELECT * FROM exercicioanterior WHERE nup = '$nup_edita'";
				$result_verificar = mysqli_query($conexao, $query_verificar);
				$dado_verificar = mysqli_fetch_array($result_verificar);
				$row_verificar = mysqli_num_rows($result_verificar);

				if ($row_verificar > 0) {
					Alerta("info", "NUP já existe!", false, "processos_exant.php");
					exit();
				}
			}

			$query_editar = "UPDATE exercicioanterior set saram = '$cpf_edita', cpf = '$cpf_edita', requerente = '$cpf_edita', sacador = '$sacador_edita', nup = '$nup_edita', prioridade = '$prioridade_edita', data_criacao = '$data_criacao_edita', direito_pleiteado = '$direito_edita', secao_origem = '$secao_origem_edita' where id = '$id_ed'";

			$result_editar = mysqli_query($conexao, $query_editar);

			if ($result_editar == '') {
				Alerta("error", "Não foi possível editar!", false, "processos_exant.php");
			} else {
				Alerta("success", "Editado com sucesso!", false, "processos_exant.php");
			}
		}
	}
	// Função para ALTERAR ESTADO do processo.
} elseif (@$_GET['func'] == 'estado') {
	$id = $_GET['id'];
	$query = "SELECT e.id, e.secao_origem, e.obs, e.data_saida, e.estado, e.secao_atual, s.id as id_sec, s.secao as sec_origem, sec.secao as sec_atual, est.id as id_est, est.estado as est_estado from exercicioanterior as e LEFT JOIN tb_secoes_exant as s ON e.secao_origem = s.id LEFT JOIN tb_secoes_exant as sec ON e.secao_atual = sec.id LEFT JOIN tb_estado_exant as est ON e.estado = est.id where e.id = '$id'";
	$id_req = $res_1["id_req"];
	$id_mil = $res_1["id_mil"];
	$id_dir = $res_1["id_dir"];
	$id_sec = $res_1["id_sec"];
	$id_est = $res_1["id_est"];
	$saram = $res_1['req_saram'];
	$cpf = $res_1["cpf"];
	$posto = $res_1["req_posto"];
	$situacao = $res_1["req_situacao"];
	$requerente = $res_1["req_nome"];
	$sacador = $res_1["mil_nome"];
	$nup = $res_1["nup"];
	$prioridade = $res_1["prioridade"];
	$data_criacao = $res_1["data_criacao"];
	$direito_pleiteado = $res_1["dir_direito"];
	$secao_origem = $res_1["sec_origem"];
	$data_saida = $res_1["data_saida"];
	$obs = $res_1["obs"];
	$estado = $res_1["est_estado"];
	$secao_atual = $res_1['sec_atual'];
	$result = mysqli_query($conexao, $query);
	while ($res_1 = mysqli_fetch_array($result)) {
		?>
		<!-- Modal -->
		<div id="modalEstado" class="modal fade" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title"><i class="far fa-folder-open"></i>Alterar ESTADO do Processo</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<form method="POST" action="">
							<div class="row">
								<div class="form-group col-sm-5">
									<label for="">Data Anterior</label>
									<input type="date" class="form-control mr-2" value="<?php echo $res_1["data_saida"]; ?>" disabled>
								</div>
								<div class="col-sm-2" style="text-align: center;">
									<label for=""></label>
									<h1><i class="fas fa-angle-double-right"></i></h1>
								</div>
								<div class="form-group col-sm-5">
									<label for="">Data</label>
									<input type="date" class="form-control mr-2" id="txtdataatual" name="txtdataatual" required>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-5">
									<label for="quantidade">Seção Atual</label>
									<input type="text" class="form-control mr-2" id="txtsecaoatual" name="txtsecaoatual" value="<?php echo $res_1["sec_atual"]; ?>" disabled>
								</div>
								<div class="col-sm-2" style="text-align: center;">
									<label for=""></label>
									<h1><i class="fas fa-angle-double-right"></i></h1>
								</div>
								<div class="form-group col-sm-5">
									<label>Seção de Destino</label>
									<select class="form-control select2" id="txtnovasecao" name="txtnovasecao" required>
										<option value="" disabled selected hidden>Selecione a nova Seção...
										</option>
										<?php
										$query_sec = "SELECT * FROM tb_secoes_exant WHERE status = 'Aprovado'";
										$result_sec = mysqli_query($conexao, $query_sec);
										while ($res_sec = mysqli_fetch_array($result_sec)) {
											$id_sec_2 = $res_sec['id'];
											$secao_sec = $res_sec['secao'];
										?>
											<option value="<?php echo $id_sec_2 ?>"><?php echo $secao_sec ?></option>
										<?php
										} ?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-5">
									<label for="quantidade">Estado Atual</label>
									<input type="text" class="form-control mr-2" id="txtestado" name="txtestado" value="<?php echo $res_1["est_estado"]; ?>" disabled>
								</div>
								<div class="col-sm-2" style="text-align: center;">
									<label for=""></label>
									<h1><i class="fas fa-angle-double-right"></i></h1>
								</div>
								<div class="form-group col-sm-5">
									<label>Novo estado do Processo</label>
									<select class="form-control select2" id="txtnovoestado" name="txtnovoestado" required>
										<option value="" disabled selected hidden>Selecione o novo estado do Processo...
										</option>
										<?php
										$query_est = "SELECT * FROM tb_estado_exant WHERE status = 'Aprovado' ORDER BY estado ASC";
										$result_est = mysqli_query($conexao, $query_est);
										while ($res_est = mysqli_fetch_array($result_est)) {
											$id_est_2 = $res_est['id'];
											$estado_est = $res_est['estado'];
										?>
											<option value="<?php echo $id_est_2 ?>"><?php echo $estado_est ?></option>
										<?php
										} ?>
									</select>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="form-group col-12">
									<label>Observação</label>
									<textarea class="form-control" id="textobs" name="txtobs" rows="3" style="text-align: justify; font-size:12px;" placeholder="Digite uma observação..."></textarea>
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary btn-sm" name="buttonEstado" style="text-transform: capitalize;"><i class="fas fa-check"></i> Salvar</button>
								<button type="button" class="btn btn-light btn-sm" data-dismiss="modal" style="text-transform: capitalize;"><i class="fas fa-times"></i> Cancelar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script>
			$("#modalEstado").modal("show");
		</script>
		<!-- COMANDO PARA ALTERAR ESTADO DO PROCESSO -->
	<?php
		if (isset($_POST['buttonEstado'])) {

			$novoestado = $_POST['txtnovoestado'];
			$estadoatual = $_POST['txtestado'];
			$novasecao = $_POST['txtnovasecao'];
			$data_atual = $_POST['txtdataatual'];
			$obs = $_POST['txtobs'];
			$query_estado = "UPDATE exercicioanterior set obs = '$obs', data_saida = '$data_atual', estado = '$novoestado', secao_atual = '$novasecao' WHERE id = '$id'";
			$result_estado = mysqli_query($conexao, $query_estado);

			if ($result_estado == '') {
				Alerta("error", "Não foi possível editar", false, "processos_exant.php");
			} else {
				Alerta("success", "Alterado com sucesso!", false, "processos_exant.php");
			}
		}
	}

	//comando para CONSULTAR HISTÓRICO do processo
} elseif (@$_GET['func'] == 'historico') {
	$id        = $_GET['id'];
	$query     = "SELECT * FROM exercicioanterior where id = '$id'";
	$result    = mysqli_query($conexao, $query);
	$res_nup   = mysqli_fetch_array($result);
	$nup       = $res_nup["nup"];
	?>
	<!-- Modal -->
	<div id="modalHistorico" class="modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-xl">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header align-middle">
					<?php
					$id_req = $_GET['id_req'];
					$query_req = "SELECT r.posto, r.situacao, r.nome, p.id, p.posto as nome_posto FROM requerentes as r LEFT JOIN tb_posto as p ON p.id = r.posto WHERE r.id = '$id_req'";
					$result_req = mysqli_query($conexao, $query_req);
					$res_req = mysqli_fetch_array($result_req);
					$nome = $res_req['nome'];
					$posto = $res_req['nome_posto'];
					$situacao = $res_req["situacao"];
					?>
					<div class="col-sm-0">
						<h2>
							<div class="modal-title"></div>
						</h2>
					</div>
					<div class="col-sm-10">
						<h5><i class="far fa-user"></i> Requerente: <strong><?php echo $posto ?> <?php echo $situacao ?> <?php echo $nome ?></strong></h5>
						<h5><i class="far fa-folder-open"></i> Processo nº: <strong><?php echo $nup ?></strong></h5>
					</div>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="">
						<div class="table-responsive" style="border-radius: 3px; margin: 20px; width: 95%;">
							<?php
							$query_h = "SELECT h.id as id_hist, h.data_anterior, h.data_novo, h.id_exant, h.estado_anterior, h.estado_novo, h.secao_anterior, h.secao_novo, h.obs_exant, e.id, e.nup as e_nup, es.id as es_id, es.estado as es_anterior, est.estado as est_novo, s.id as s_id_anterior, s.secao as s_anterior, s.prazo_exant as prazo_secao_exant, sec.secao as sec_novo FROM tb_historico_exant_estado_secao as h LEFT JOIN exercicioanterior as e ON h.id_exant = e.id LEFT JOIN tb_estado_exant as es ON h.estado_anterior = es.id LEFT JOIN tb_estado_exant as est ON h.estado_novo = est.id LEFT JOIN tb_secoes_exant as s ON h.secao_anterior = s.id LEFT JOIN tb_secoes_exant as sec ON h.secao_novo = sec.id WHERE id_exant = '$id' ORDER BY h.data_novo";
							$result_h = mysqli_query($conexao, $query_h);
							$row_h = mysqli_num_rows($result_h);
							?>
							<table class="table table-sm table-bordered table-striped">
								<thead class="text-primary" style="text-align: center;">
									<tr>
										<th class="align-middle">Movimento</th>
										<th class="align-middle">Observação</th>
										<th class="align-middle">Dt. Prazo</th>
										<th class="align-middle">Dt. Movimento</th>
										<th class="align-middle">Meta</th>
									</tr>
								</thead>
								<tbody>
									<?php
									while ($res_h = mysqli_fetch_array($result_h)) {
										$id_hist = $res_h["id_hist"];
										$data_anterior = $res_h["data_anterior"];
										$data_novo = $res_h["data_novo"];
										$id_exant = $res_h["e_nup"];
										$old_estado = $res_h["es_anterior"];
										$new_estado = $res_h["est_novo"];
										$old_secao = $res_h["s_anterior"];
										$new_secao = $res_h["sec_novo"];
										$obs_exant = $res_h["obs_exant"];


										$query_prazo = "SELECT prazo_exant FROM tb_secoes_exant WHERE secao = '$secao_atual'";
										$result_prazo = mysqli_query($conexao, $query_prazo);
										$res_prazo = mysqli_fetch_array($result_prazo);
										$prazo_secao = $res_prazo['prazo_exant'];

										$prazo_pessoal_cons = date('Y-m-d', strtotime('+' . $prazo_secao . ' days', strtotime($res_h["data_anterior"])));
										$prazo_pagpes_cons = date('Y-m-d', strtotime('+' . $prazo_secao . ' days', strtotime($res_h["data_anterior"])));
										$prazo_controle_cons = date('Y-m-d', strtotime('+' . $prazo_secao . ' days', strtotime($res_h["data_anterior"])));
										$prazo_sdpp_cons = date('Y-m-d', strtotime('+' . $prazo_secao . ' days', strtotime($res_h["data_anterior"])));
										$today_cons = date('Y-m-d');
									?>
										<tr>
											<td class="align-middle" style="width: 12.1%;">
												<?php
												if ($old_secao == "") {
													echo 'Criado na: ' . '<br>';
													echo '<b>' . $new_secao . '</b>';
												} else {
													echo 'De:   ' . '<b>' . $old_secao . '</b><br>';
													echo 'Para: ' . '<b>' . $new_secao . '</b>';
												} ?>
											</td>
											<td class="align-middle">
												<strong><?php echo $new_estado; ?></strong><br>
												<?php
												if ($res_h["obs_exant"] == '') {
													echo 'Não há';
												} else { ?>
													<p style="text-align: justify;"><?php echo $obs_exant; ?> </p>
												<?php
												}
												?>
											</td>
											<?php
											if ($old_secao == 'DP-1' or $old_secao == 'DP-4' or $old_secao == 'ES-LS') {
												echo '<td class="align-middle" style="text-align:center;">' . data($prazo_pessoal_cons) . '</td>';
											} elseif ($old_secao == 'DP-3') {
												echo '<td class="align-middle" style="text-align:center;">' . data($prazo_pagpes_cons) . '</td>';
											} elseif ($old_secao == 'ACI-1') {
												echo '<td class="align-middle" style="text-align:center;">' . data($prazo_controle_cons) . '</td>';
											} elseif ($old_secao == 'SDPP') {
												echo '<td class="align-middle" style="text-align:center;">' . data($prazo_sdpp_cons) . '</td>';
											} else {
												echo '<td class="align-middle" style="text-align:center;">' . data($prazo_pessoal_cons) . '</td>';
											} ?>
											<td class="align-middle" style="text-align: center;">
												<?php echo data($data_novo) ?>
											</td>
											<?php
											if ($old_secao == 'DP-1' or $old_secao == 'DP-4' or $old_secao == 'ES-LS') {
												if ((diferenca($prazo_pessoal_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) < 0) {
													echo '<td class="align-middle" style="background-color: rgb(255,0,0, 0.5); text-align:center;">' . (diferenca($prazo_pessoal_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) . '</td>';
												} elseif ((diferenca($prazo_pessoal_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) >= 0) {
													echo '<td class="align-middle" style="background-color: rgb(0,128,0,0.5); text-align:center;">' . (diferenca($prazo_pessoal_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) . '</td>';
												} else {
													echo '<td class="align-middle" style="text-align:center;">' . (diferenca($prazo_pessoal_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) . '</td>';
												}
											} elseif ($old_secao == 'DP-3') {
												if ((diferenca($prazo_pagpes_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) < 0) {
													echo '<td class="align-middle" style="background-color: rgb(255,0,0, 0.5); text-align:center;">' . (diferenca($prazo_pagpes_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) . '</td>';
												} elseif ((diferenca($prazo_pagpes_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) >= 0) {
													echo '<td class="align-middle" style="background-color: rgb(0,128,0,0.5); text-align:center;">' . (diferenca($prazo_pagpes_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) . '</td>';
												} else {
													echo '<td class="align-middle" style="text-align:center;">' . (diferenca($prazo_pagpes_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) . '</td>';
												}
											} elseif ($old_secao == 'ACI-1') {
												if ((diferenca($prazo_controle_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) < 0) {
													echo '<td class="align-middle" style="background-color: rgb(255,0,0, 0.5); text-align:center;">' . (diferenca($prazo_controle_cons, $data_novo) - diferenca($data_novo, $data_anterior)) . '</td>';
												} elseif ((diferenca($prazo_controle_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) >= 0) {
													echo '<td class="align-middle" style="background-color: rgb(0,128,0,0.5); text-align:center;">' . (diferenca($prazo_controle_cons, $data_novo) - diferenca($data_novo, $data_anterior)) . '</td>';
												} else {
													echo '<td class="align-middle" style="text-align:center;">' . (diferenca($prazo_controle_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) . '</td>';
												}
											} elseif ($old_secao == 'SDPP') {
												if ((diferenca($prazo_sdpp_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) > 0) {
													echo '<td class="align-middle" style="background-color: rgb(255,0,0, 0.5); text-align:center;">' . (diferenca($prazo_sdpp_cons, $data_novo) - diferenca($data_novo, $data_anterior)) . '</td>';
												} elseif ((diferenca($prazo_sdpp_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) >= 0) {
													echo '<td class="align-middle" style="background-color: rgb(0,128,0,0.5); text-align:center;">' . (diferenca($prazo_sdpp_cons, $data_novo) - diferenca($data_novo, $data_anterior)) . '</td>';
												} else {
													echo '<td class="align-middle" style="text-align:center;">' . (diferenca($prazo_sdpp_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) . '</td>';
												}
											} else {
												if ((diferenca($prazo_pessoal_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) < 0) {
													echo '<td class="align-middle" style="background-color: rgb(255,0,0, 0.5); text-align:center;">' . (diferenca($prazo_pessoal_cons, $$data_anterior) - diferenca($data_novo, $data_anterior)) . '</td>';
												} elseif ((diferenca($prazo_pessoal_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) >= 0) {
													echo '<td class="align-middle" style="background-color: rgb(0,128,0,0.5); text-align:center;">' . (diferenca($prazo_pessoal_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) . '</td>';
												} else {
													echo '<td class="align-middle" style="text-align:center;">' . (diferenca($prazo_pessoal_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) . '</td>';
												}
											}
											?>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<div class="modal-footer">
							<a class="btn btn-primary btn-sm" type="button" href="rel/historico_exant_pdf_class.php?id=<?php echo $id; ?>&id_req=<?php echo $id_req; ?>&nup=<?php echo $nup; ?>" target="_blank" rel=”noopener style="margin-right: 5px;"><i class="far fa-file-pdf"></i> Gerar PDF</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
		$("#modalHistorico").modal("show");
	</script>
<?php } ?>