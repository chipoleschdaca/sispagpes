<?php
session_start();
include('verificar_login.php');
include('conexao.php');
if ($_SESSION['perfil_usuario'] != 'EXANT') {
  header('Location: index.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" href="dist/img/gapls.png">
  <title>SISPAGPES</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">     
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto"> 
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">        
              <div class="media">
                <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>       
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">        
              <div class="media">
                <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>        
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>

            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>  
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
            <i class="fas fa-th-large"></i>
          </a>
        </li>  
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
            <a class="dropdown-item" href="logout.php" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Sair
            </a>
          </div>
        </li>
      </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4"> 
      <a href="painel_exant.php" class="brand-link" style="heigh:50px;">
        <img src="dist/img/gapls.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
        <b><span class="brand-text font-weight-light">SISPAGPES</span></b>
      </a> 
      <div class="sidebar">
        <!-- Sidebar Menu -->
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
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-list-ul"></i>
                <p>
                  Ordens de Serviço
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="os_abertas.php" class="nav-link">
                    <i class="far fa-hand-point-right nav-icon"></i>
                    <p>Abertas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="consultar_os.php" class="nav-link">
                    <i class="far fa-hand-point-right nav-icon"></i>
                    <p>Consultar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="rel_orcamentos.php" class="nav-link">
                    <i class="far fa-hand-point-right nav-icon"></i>
                    <p>Relatórios</p>
                  </a>
                </li>
              </ul>
            </li>            
          </div>
        </aside>
        <div class="content-wrapper">  
          <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-3">                  
                </div>
                <div class="col-sm-6" style="text-align: center;">
                  <h1 class="m-0 text-dark"></h1>
                </div>
                <div class="col-sm-3">                  
                </div>
              </div>
            </div>
          </div>
          <section class="content">
            <div class="container-fluid">      
              <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-folder-open"></i></span>
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
                    <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-hand-holding-usd"></i></span>
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
                <div class="col-12 col-sm-6 col-md-3">
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
                </div>       
              </div>     
              <br>        
              <div class="row">
                <p>
                  <a class="btn btn-outline-dark btn-sm" style="font-style: arial;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample">
                    <i class="fa fa-plus"></i> Filtrar
                  </a>              
                </p>
                <div class="collapse" id="collapseExample" style="width: 100%;" aria-expanded="true">
                  <div class="card card-body">
                    <div class="col-sm-12">
                      <form class="form-inline">
                        <div class="input-group input-group-sm">                              
                          <label for="txtpesquisar" style="margin-right: 10px;">Requerente: </label>
                          <input class="form-control" type="search" id="txtpesquisar" name="txtpesquisar" placeholder="Pesquisar" aria-label="Pesquisar" style="border-radius:3px;">                  
                        </div>
                      </form>                            
                      <form class="form-inline">
                        <div class="input-group input-group-sm">                              
                          <label for="status" style="margin-right: 10px;">Status: </label>         
                          <select class="form-control select2" id="status" name="status" style="border-radius:3px;">
                            <option value="" disabled selected hidden>Status</option>
                            <option value="Aberto">Aberto</option>
                            <option value="Aguardando">Aguardando</option>
                            <option value="Aprovado">Aprovado</option>
                            <option value="Cancelado">Cancelado</option>
                          </select>                
                        </div>
                      </form>              
                      <form class="form-inline">
                        <div class="input-group input-group-sm">
                          <label for="txtpesquisar2" style="margin-right: 10px;">Data de Abertura: </label>
                          <input class="form-control" type="date" id="txtpesquisar" name="txtpesquisar" placeholder="Pesquisar" aria-label="Pesquisar" style="border-radius:3px;">           
                        </form>
                        <div class="input-group-append">
                          <button class="btn btn-app" type="submit" name="buttonPesquisar">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
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
                  <h4 class="align-middle" style="text-align:center;"><strong>EXERCÍCIOS ANTERIORES</strong></h4>
                </div>
                <div class="card-body">
                  <div class="row" style="margin-bottom: 20px;">                    
                    <div class="col-sm-6">
                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" style="text-transform: capitalize;" data-target="#modalExemplo">
                        <i class="far fa-folder-open"></i> Inserir Novo
                      </button>
                    </div>                    
                  </div>
                  <div class="table-responsive" style="text-align: center;">

                    <!-------------LISTAR TODOS OS ORÇAMENTOS-------------->

                    <?php

                    if (isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] and $_GET['status'] != '') {
                      $data = $_GET['txtpesquisar'] . '%';
                      $statusOrc = $_GET['status'];
                      $query = "select e.id, e.requerente, e.sacador, e.direito_pleiteado, e.status, c.nome as req_nome, f.nome as func_nome from exercicioanterior as e INNER JOIN requerentes as c on e.requerente = c.cpf INNER JOIN militares as f on e.tecnico = f.id where data_abertura = '$data' and status = '$statusOrc' order by id asc";

                    } else if (isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] == '' and $_GET['status'] != '') {
                      $data = $_GET['txtpesquisar'] . '%';
                      $statusOrc = $_GET['status'];
                      $query = "select e.id, e.requerente, e.sacador, e.direito_pleiteado, e.status, c.nome as req_nome, f.nome as func_nome from exercicioanterior as e INNER JOIN requerentes as c on e.requerente = c.cpf INNER JOIN militares as f on e.tecnico = f.id where status = '$statusOrc' order by id asc";

                    } else if (isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != '' and $_GET['status'] == '') {
                      $data = $_GET['txtpesquisar'] . '%';
                      $statusOrc = $_GET['status'];
                      $query = "select e.id, e.requerente, e.sacador, e.direito_pleiteado, e.status, c.nome as req_nome, f.nome as func_nome from exercicioanterior as e INNER JOIN requerentes as c on e.requerente = c.cpf INNER JOIN militares as f on e.tecnico = f.id where data_abertura = '$data' order by id asc";

                    } else {
                      //$query = "select * from exercicioanterior as e order by id asc";

                      $query = "select e.id, e.saram, e.cpf, e.requerente, e.sacador, e.nup, e.prioridade, e.data_criacao, e.direito_pleiteado, e.secao_origem, e.data_entrada, e.data_saida, e.estado, e.secao_atual, r.saram as req_saram, r.cpf as req_cpf, r.nome as req_nome, m.nome as mil_nome, d.direito as dir_direito, s.secao as sec_origem, est.estado as est_estado from exercicioanterior as e INNER JOIN requerentes as r on e.saram = r.id INNER JOIN militares as m on e.sacador = m.id INNER JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id INNER JOIN tb_secoes_exant as s ON e.secao_origem = s.id INNER JOIN tb_estado_exant as est ON e.estado = est.id order by id asc";

                      //$query2 = "select o.id, o.requerente, o.tecnico, o.produto, o.valor_total, o.data_abertura, o.status, c.nome as req_nome, f.nome as func_nome from orcamentos as o INNER JOIN requerentes as c on o.requerente = c.cpf INNER JOIN militares as f on o.tecnico = f.id order by id asc";
                    }

                    $result = mysqli_query($conexao, $query);
                    //$dado = mysqli_fetch_array($result);
                    $row = mysqli_num_rows($result);

                    function data($data){
                      return date("d/m/Y", strtotime($data));
                    }

                    ?>

                    <table class="table table-sm table-bordered table-striped">
                      <thead class="text-primary">
                        <th class="align-middle">#</th>
                        <th class="align-middle">SARAM</th>
                        <th class="align-middle">Requerente</th>                        
                        <th class="align-middle">NUP</th>
                        <th class="align-middle">Prioridade</th>
                        <th class="align-middle">Dt. Criação</th>
                        <th class="align-middle">Direito Pleiteado</th>
                        <th class="align-middle">Origem</th>                        
                        <th class="align-middle">Estado</th>
                        <th class="align-middle">Seção Atual</th>
                        <th class="align-middle">Ações</th>
                      </thead>
                      <tbody>

                        <?php

                        while ($res_1 = mysqli_fetch_array($result)) {
                          $id = $res_1["id"];
                          $saram = $res_1["req_saram"];
                          $cpf = $res_1["cpf"];
                          $posto = $res_1["posto"];
                          $situacao = $res_1["situacao"];
                          $requerente = $res_1["req_nome"];
                          $sacador = $res_1["mil_nome"];
                          $nup = $res_1["nup"];
                          $prioridade = $res_1["prioridade"];
                          $data_criacao = $res_1["data_criacao"];
                          $direito_pleiteado = $res_1["dir_direito"];
                          $secao_origem = $res_1["sec_origem"];
                          $data_entrada = $res_1["data_entrada"];
                          $data_saida = $res_1["data_saida"];
                          $estado = $res_1["est_estado"];                          
                          $secao_atual = $res_1['secao_atual'];                          

                          ?>

                          <tr>
                            <td class="align-middle"><?php echo $id; ?></td>
                            <td class="align-middle"><?php echo $saram; ?></td>
                            <td class="align-middle"><?php echo $requerente; ?></td>                            
                            <td class="align-middle"><?php echo $nup; ?></td>
                            <td class="align-middle">
                              <?php 
                              if ($prioridade == 'SIM') {
                                echo '<i class="fas fa-thumbs-up"></i>';
                              } else if ($prioridade == 'NÃO') {                              
                                echo '<i class="fas fa-minus"></i>';
                              } else {
                                echo $prioridade;                              
                              } ?>                                
                            </td>
                            <td class="align-middle"><?php echo data($data_criacao); ?></td>
                            <td class="align-middle"><?php echo $direito_pleiteado; ?></td>
                            <td class="align-middle"><?php echo $secao_origem ?></td>                            
                            <td class="align-middle">
                              <?php
                              if ($estado == 'Aberto') { ?>
                                <span class="badge badge-secondary">
                                  <?php echo $status; ?>
                                </span>
                                <?php
                              } elseif ($estado == 'Aguardando') { ?>
                                <span class="badge badge-warning">
                                  <?php echo $status; ?>
                                </span>
                                <?php
                              } elseif ($estado == 'Aprovado') { ?>
                                <span class="badge badge-success">
                                  <?php echo $status; ?>
                                </span>
                                <?php
                              } elseif ($estado == 'Cancelado') { ?>
                                <span class="badge badge-danger">
                                  <?php echo $estado; ?>
                                </span>
                                <?php
                              } else {
                                echo $estado;
                              }
                              ?>
                            </td>
                            <td class="align-middle"><?php echo $secao_atual; ?></td>
                            <td class="align-middle">
                              <?php
                              if ($status == 'Aberto') { ?>
                                <a class="btn btn-dark btn-xs" style="width: 24px;" href="processos_exant.php?func=estado&id=<?php echo $id; ?>"><i class="fas fa-location-arrow"></i></a>
                                <a class="btn btn-success btn-xs disabled" style="width: 24px;" href="#"><i class="fas fa-thumbs-up"></i></a>
                                <a class="btn btn-primary btn-xs disabled" style="width: 24px;" href="#" target="_blank" rel=”noopener”><i class="fas fa-print"></i></a>
                                <a class="btn btn-warning btn-xs" style="width: 24px;" href="processos_exant.php?func=edita&id=<?php echo $id; ?>"><i class="fas fa-cog"></i></a>
                                <a class="btn btn-danger btn-xs" style="width: 24px;" href="processos_exant.php?func=deleta&id=<?php echo $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><i class="far fa-trash-alt"></i></a>
                                <?php
                              } elseif ($status == 'Aguardando') { ?>
                                <a class="btn btn-secondary btn-xs" style="width: 24px;" href="processos_exant.php?func=estado&id=<?php echo $id; ?>"><i class="fas fa-location-arrow"></i></a>
                                <a class="btn btn-success btn-xs" style="width: 24px;" href="processos_exant.php?func=aprova&id=<?php echo $id; ?>"><i class="fas fa-thumbs-up"></i></a>
                                <a class="btn btn-primary btn-xs disabled" style="width: 24px;" href="#" target="_blank" rel=”noopener”><i class="fas fa-print"></i></a>
                                <a class="btn btn-warning btn-xs" style="width: 24px;" href="processos_exant.php?func=edita&id=<?php echo $id; ?>"><i class="fas fa-cog"></i></a>
                                <a class="btn btn-danger btn-xs" style="width: 24px;" href="processos_exant.php?func=deleta&id=<?php echo $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><i class="far fa-trash-alt"></i></a>
                                <?php
                              } elseif ($status == 'Aprovado') { ?>
                                <a class="btn btn-secondary btn-xs" style="width: 24px;" href="processos_exant.php?func=estado&id=<?php echo $id; ?>"><i class="fas fa-location-arrow"></i></a>
                                <a class="btn btn-success btn-xs disabled" style="width: 24px;" href="#"><i class="fas fa-thumbs-up"></i></a>
                                <a class="btn btn-primary btn-xs" style="width: 24px;" href="rel/invoice-print.php?id=<?php echo $id; ?>" target="_blank" rel=”noopener”><i class="fas fa-print"></i></a>
                                <a class="btn btn-warning btn-xs" style="width: 24px;" href="processos_exant.php?func=edita&id=<?php echo $id; ?>"><i class="fas fa-cog"></i></a>
                                <a class="btn btn-danger btn-xs" style="width: 24px;" href="processos_exant.php?func=deleta&id=<?php echo $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><i class="far fa-trash-alt"></i></a>
                                <?php
                              } elseif ($status == 'Cancelado') { ?>
                                <span class="badge badge-danger">
                                  <?php echo $status; ?>
                                </span>
                                <?php
                              } else { ?>
                                <a class="btn btn-secondary btn-xs" style="width: 24px;" href="processos_exant.php?func=estado&id=<?php echo $id; ?>"><i class="fas fa-location-arrow"></i></a>
                                <a class="btn btn-success btn-xs" style="width: 24px;" href="processos_exant.php?func=aprova&id=<?php echo $id; ?>"><i class="fas fa-thumbs-up"></i></a>
                                <a class="btn btn-primary btn-xs disabled" style="width: 24px;" href="#" target="_blank" rel=”noopener”><i class="fas fa-print"></i></a>
                                <a class="btn btn-warning btn-xs" style="width: 24px;" href="processos_exant.php?func=edita&id=<?php echo $id; ?>"><i class="fas fa-cog"></i></a>
                                <a class="btn btn-danger btn-xs" style="width: 24px;" href="processos_exant.php?func=deleta&id=<?php echo $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><i class="far fa-trash-alt"></i></a>
                                <?php  
                              } ?>                        
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
                <div class="card-footer">
                  <hr>
                  <div class="stats">
                    <i class="fa fa-history"></i>Updated 3 minutes ago
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!------------------------------------------------------------------------------MODAL----------------------------------------------------------------------------------------->
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
                              <option value="<?php echo $res_1['id']; ?>"><?php echo $res_1['saram'];?> | <?php echo $res_1['nome'];?></option>
                            <?php } } ?>
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
                                <option value="<?php echo $res_1['id']; ?>"><?php echo $res_1['nome']; ?></option>
                              <?php } } ?>
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
                              <label class="" for="txtprioridade" style="margin-left: 20px; text-align: center;">Prioridade Lei nº 10.741 (Estatuto do Idoso)</label>
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
                              $query_direito = "SELECT * FROM tb_direitoPleiteado_exant where status = 'Aprovado'";
                              $result_direito = mysqli_query($conexao, $query_direito);                            
                              if (count($result_direito)) {
                                while ($res_dir = mysqli_fetch_array($result_direito)) {
                                  $id = $res_dir['id'];
                                  $direito = $res_dir['direito'];                                
                                  ?>
                                  <option value="<?php echo $id ?>"><?php echo $direito ?></option>
                                <?php } } ?>
                              </select>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="form-group col-sm-6">
                              <label>Seção de Origem</label>
                              <select class="form-control select2" id="txtsecaoorigem" name="txtsecaoorigem">
                                <option value="" disabled selected hidden>Escolha a seção onde o processo foi criado...</option>
                                <?php                            
                                $query_secao = "SELECT * FROM tb_secoes_exant where status = 'Aprovado'";
                                $result_secao = mysqli_query($conexao, $query_secao);                            
                                if (count($result_secao)) {
                                  while ($res_2 = mysqli_fetch_array($result_secao)) {
                                    $id = $res_2['id'];
                                    $secao = $res_2['secao'];                                
                                    ?>
                                    <option value="<?php echo $id ?>"><?php echo $secao ?></option>
                                  <?php } } ?>
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
                                <input type="text" class="form-control mr-2" id="txtestado" name="txtestado" value="<?php echo $res_estado["estado"];?>" disabled>
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
                  <div class="row">
                    <div class="info-box">
                      <button class="info-box-icon bg-success"><i class="fas fa-thumbs-up"></i></button>
                    </div>       
                    <button class="btn btn-app">
                      <i class="fas fa-save"></i> Salvar
                    </button>
                  </div>
                </section>
              </div>
              <footer class="main-footer">
                <strong>Copyright &copy; 2019 <a href="#">GAP-LS</a>.</strong>
                Desenvolvido por DANIEL ANGELO CHIPOLESCH DE ALMEIDA 1º Ten Int. All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                  <b>Versão</b> 1.0.0
                </div>
              </footer>
              <aside class="control-sidebar control-sidebar-dark">
              </aside>
            </div>
            <!-- jQuery -->
            <script src="plugins/jquery/jquery.min.js"></script>
            <!-- jQuery Mask -->
            <script src="plugins/jQuery-Mask/dist/jquery.mask.js"></script>
            <!-- jQuery UI 1.11.4 -->
            <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script>
              $.widget.bridge('uibutton', $.ui.button)
            </script>
            <!-- Bootstrap 4 -->
            <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- ChartJS -->
            <script src="plugins/chart.js/Chart.min.js"></script>
            <!-- Sparkline -->
            <script src="plugins/sparklines/sparkline.js"></script>
            <!-- JQVMap -->
            <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
            <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
            <!-- jQuery Knob Chart -->
            <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
            <!-- daterangepicker -->
            <script src="plugins/moment/moment.min.js"></script>
            <script src="plugins/daterangepicker/daterangepicker.js"></script>
            <!-- Tempusdominus Bootstrap 4 -->
            <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
            <!-- Bootstrap Switch -->
            <script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
            <!-- Summernote -->
            <script src="plugins/summernote/summernote-bs4.min.js"></script>
            <!-- overlayScrollbars -->
            <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
            <!-- AdminLTE App -->
            <script src="dist/js/adminlte.js"></script>
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <script src="dist/js/pages/dashboard.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="dist/js/demo.js"></script>

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

//VERIFICAR SE O requerente JÁ ESTÁ CADASTRADO
            $query_verificar = "select * from requerentes where cpf = '$cpf'";
            $result_verificar = mysqli_query($conexao, $query_verificar);
            $row_verificar = mysqli_num_rows($result_verificar);

            if ($row_verificar > 0) {
              echo "<script language='javascript'> window.alert('O Requerente já está cadastrado!'); </script>";
              exit();
            }
// Verificar se o NUP já está cadastrado
            $query_nup = "select * from exercicioanterior where nup = '$nup'";
            $result_nup = mysqli_query($conexao, $query_nup);
            $row_nup = mysqli_num_rows($result_nup);

            if ($row_nup > 0) {
              echo "<script language='javascript'> window.alert('O NUP já está cadastrado!'); </script>";
              exit();
            }

            $query = "INSERT into exercicioanterior (saram, cpf, requerente, sacador, nup, prioridade, data_criacao, direito_pleiteado, secao_origem, estado) VALUES ('$cpf', '$cpf', '$cpf', '$sacador', '$nup', '$prioridade', '$data_criacao', '$direito', '$secao_origem', '$id_estado')";

            $result = mysqli_query($conexao, $query);

            if ($result == '') {
              echo "<script language='javascript'> window.alert('Ocorreu um erro ao cadastrar!'); </script>";
            } else {
              echo "<script language='javascript'> window.alert('Salvo com sucesso!'); </script>";
              echo "<script language='javascript'> window.location='processos_exant.php'; </script>";
            }
          }
          ?>

          <!--EXCLUIR -->
          <?php
          if (@$_GET['func'] == 'deleta') {
            $id = $_GET['id'];
            $query = "DELETE FROM exercicioanterior where id = '$id'";
            mysqli_query($conexao, $query);
            echo "<script language='javascript'> window.location='processos_exant.php'; </script>";
          }
          ?>

          <!--EDITAR -->
          <?php
          if (@$_GET['func'] == 'edita') {
            $id = $_GET['id'];      
            $query = "select e.id, e.saram, e.cpf, e.requerente, e.sacador, e.nup, e.prioridade, e.data_criacao, e.direito_pleiteado, e.secao_origem, e.data_entrada, e.data_saida, e.estado, e.secao_atual, r.id as id_req, r.posto as req_posto, r.situacao as req_situacao, r.saram as req_saram, r.cpf as req_cpf, r.nome as req_nome, m.id as id_mil, m.nome as mil_nome, d.id as id_dir, d.direito as dir_direito, s.id as id_sec, s.secao as sec_origem, est.id as id_est, est.estado as est_estado from exercicioanterior as e INNER JOIN requerentes as r on e.saram = r.id INNER JOIN militares as m on e.sacador = m.id INNER JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id INNER JOIN tb_secoes_exant as s ON e.secao_origem = s.id INNER JOIN tb_estado_exant as est ON e.estado = est.id where e.id = '$id'";
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
            $data_entrada = $res_1["data_entrada"];
            $data_saida = $res_1["data_saida"];
            $estado = $res_1["est_estado"];                          
            $secao_atual = $res_1['secao_atual'];

            $result = mysqli_query($conexao, $query);
            while ($res_1 = mysqli_fetch_array($result)) {
              ?>
              <!-- Modal -->
              <div id="modalEditar" class="modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg">   
                  <div class="modal-content">
                    <div class="modal-header">                  
                      <h4 class="modal-title" style="text-align:center; width: 100%;">DADOS DO(A): <strong><?php echo $res_1["req_posto"]," ", $res_1["req_situacao"]," ", $res_1["req_nome"]?></strong></h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>                  
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="">                    
                        <div class="row">
                          <div class="form-group col-sm-6">
                            <label for="">Requerente</label>
                            <select class="form-control select2" id="category" name="txtcpf" required>
                              <option value="" disabled selected hidden><?php echo $res_1["req_saram"];?> | <?php echo $res_1["req_nome"];?></option>
                              <?php
                              $query = "SELECT * FROM requerentes ORDER BY nome asc";
                              $result = mysqli_query($conexao, $query);
                              if (count($result)) {
                                while ($res_2 = mysqli_fetch_array($result)) {
                                  ?>
                                  <option value="<?php echo $res_2['id']; ?>"><?php echo $res_2['saram'];?> | <?php echo $res_2['nome'];?></option>
                                <?php } } ?>
                              </select>
                            </div>
                            <div class="form-group col-sm-6">
                              <label for="fornecedor">Sacador</label>
                              <select class="form-control select2" id="category" name="funcionario" required>
                                <option value="" disabled selected hidden><?php echo $res_1["mil_nome"];?></option>
                                <?php
                                $query = "SELECT * FROM militares where perfil = 'EXANT' ORDER BY nome asc";
                                $result = mysqli_query($conexao, $query);
                                if (count($result)) {
                                  while ($res_3 = mysqli_fetch_array($result)) {
                                    ?>
                                    <option value="<?php echo $res_3['id']; ?>"><?php echo $res_3['nome']; ?></option>
                                  <?php } } ?>
                                </select>
                              </div>
                            </div>
                            <br>                      
                            <div class="row">                    
                              <div class="form-group col-sm-3">
                                <label for="quantidade">NUP</label>
                                <input type="text" class="form-control mr-2" id="txtnup" name="txtnup" placeholder="00000.000000/0000-00" value="<?php echo $res_1["nup"];?>" required>
                              </div>
                              <div class="col-sm-2"></div>                   
                              <div class="form-group col-sm-7">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">                            
                                  <label class="" for="txtprioridade" style="margin-left: 20px; text-align: center;">Prioridade Lei nº 10.741 (Estatuto do Idoso)</label>
                                  <div class="col-sm-5"></div>
                                  <div class="col-sm-4">
                                    <?php 
                                    if ($res_1["prioridade"] == 'SIM') {?>
                                      <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio1" name="txtprioridade" value="SIM" checked>
                                        <label for="customRadio1" class="custom-control-label">SIM</label>
                                      </div>
                                      <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio2" name="txtprioridade" value="NÃO">
                                        <label for="customRadio2" class="custom-control-label">NÃO</label>
                                      </div>
                                      <?php 
                                    } else { ?>
                                      <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio1" name="txtprioridade" value="SIM">
                                        <label for="customRadio1" class="custom-control-label">SIM</label>
                                      </div>
                                      <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio2" name="txtprioridade" value="NÃO" checked>
                                        <label for="customRadio2" class="custom-control-label">NÃO</label>
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
                                <input type="date" class="form-control" name="txtdatacriacao" placeholder="Data de Abertura" value="<?php echo $res_1['data_criacao'];?>" required>
                              </div>
                              <div class="form-group col-sm-7">
                                <label>Direito Pleiteado</label>
                                <select class="form-control select2" id="txtdireitopleiteado" name="txtdireitopleiteado" required>
                                  <option value="" disabled selected hidden><?php echo $res_1["dir_direito"]; ?></option>
                                  <?php                            
                                  $query_direito = "SELECT * FROM tb_direitoPleiteado_exant where status = 'Aprovado'";
                                  $result_direito = mysqli_query($conexao, $query_direito);                            
                                  if (count($result_direito)) {
                                    while ($res_dir = mysqli_fetch_array($result_direito)) {
                                      $id = $res_dir['id'];
                                      $direito = $res_dir['direito'];                                
                                      ?>
                                      <option value="<?php echo $id ?>"><?php echo $direito ?></option>
                                    <?php } } ?>
                                  </select>
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class="form-group col-sm-6">
                                  <label>Seção de Origem</label>
                                  <select class="form-control select2" id="txtsecaoorigem" name="txtsecaoorigem" required>
                                    <option value="" disabled selected hidden><?php echo $res_1['sec_origem']; ?></option>
                                    <?php                            
                                    $query_secao = "SELECT * FROM tb_secoes_exant where status = 'Aprovado'";
                                    $result_secao = mysqli_query($conexao, $query_secao);                            
                                    if (count($result_secao)) {
                                      while ($res_secao = mysqli_fetch_array($result_secao)) {
                                        $id = $res_secao['id'];
                                        $secao = $res_secao['secao'];
                                        ?>
                                        <option value="<?php echo $id ?>"><?php echo $secao ?></option>
                                      <?php } } ?>
                                    </select>
                                  </div>
                                  <div class="form-group col-sm-6">
                                    <label for="quantidade">Estado do Processo</label>                                    
                                    <input type="text" class="form-control mr-2" id="txtestado" name="txtestado" value="<?php echo $res_1["est_estado"];?>" disabled>
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
                    $cpf = $_POST['txtcpf'];
                    $sacador = $_POST['funcionario'];
                    $nup = $_POST['txtnup'];
                    $prioridade = $_POST['txtprioridade'];
                    $data_criacao = $_POST['txtdatacriacao'];
                    $direito = $_POST['txtdireitopleiteado'];
                    $secao_origem = $_POST['txtsecaoorigem'];

                    $query_editar = "UPDATE exercicioanterior set saram = '$cpf', cpf = '$cpf', requerente = '$cpf', sacador = '$sacador', nup = '$nup', prioridade = '$prioridade', data_criacao = '$data_criacao', direito_pleiteado = '$direito', secao_origem = '$secao_origem' where id = '$id' ";

                    $result_editar = mysqli_query($conexao, $query_editar);

                    if ($result_editar == '') {
                      echo "<script language='javascript'> window.alert('Ocorreu um erro ao editar!'); </script>";
                    } else {
                      echo "<script language='javascript'> window.alert('Editado com sucesso!'); </script>";
                      echo "<script language='javascript'> window.location='processos_exant.php'; </script>";
                    }
                  }
                }

// Função para alterar estado do processo.

              } elseif (@$_GET['func'] == 'estado') {
                $id = $_GET['id'];      
                $query = "select e.id, e.secao_origem, e.data_entrada, e.data_saida, e.estado, e.secao_atual, s.id as id_sec, s.secao as sec_origem, est.id as id_est, est.estado as est_estado from exercicioanterior as e INNER JOIN tb_secoes_exant as s ON e.secao_origem = s.id INNER JOIN tb_estado_exant as est ON e.estado = est.id where e.id = '$id'";
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
                $data_entrada = $res_1["data_entrada"];
                $data_saida = $res_1["data_saida"];
                $estado = $res_1["est_estado"];                         
                $secao_atual = $res_1['secao_atual'];
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
                            <div class="row"><div class="form-group col-sm-5">
                              <label for="quantidade">Estado Atual</label>                                    
                              <input type="text" class="form-control mr-2" id="txtestado" name="txtestado" value="<?php echo $res_1["est_estado"];?>" disabled>
                            </div>
                            <div class="col-sm-2" style="text-align: center;">
                              <label for=""></label>
                              <h1><i class="fas fa-angle-double-right"></i></h1>
                            </div>
                            <div class="form-group col-sm-5">
                              <label>Estado do Processo</label>
                              <select class="form-control select2" id="txtnovoestado" name="txtnovoestado" required>
                                <option value="" disabled selected hidden>Selecione o novo estado do Processo...</option>
                                <?php                            
                                $query_est = "SELECT * FROM tb_estado_exant where status = 'Aprovado'";
                                $result_est = mysqli_query($conexao, $query_est);                            
                                if (count($result_est)) {
                                  while ($res_est = mysqli_fetch_array($result_est)) {
                                    $id_est_2 = $res_est['id'];
                                    $estado_est = $res_est['estado'];
                                    ?>
                                    <option value="<?php echo $id_est_2 ?>"><?php echo $estado_est ?></option>
                                  <?php } } ?>
                                </select>
                              </div>                                                       
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm" name="buttonEstado" style="text-transform: capitalize;"><i class="fas fa-check"></i> Salvar</button>
                            <button type="button" class="btn btn-light btn-sm" data-dismiss="modal" style="text-transform: capitalize;"><i class="fas fa-times"></i> Cancelar</button>
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
                      $query_estado = "UPDATE exercicioanterior set estado = '$novoestado' where id = '$id'";
                      $result_estado = mysqli_query($conexao, $query_estado);

                      if ($result_estado == '') {
                        echo "<script language='javascript'> window.alert('Ocorreu um erro ao editar!'); </script>";
                      } else {
                        echo "<script language='javascript'> window.alert('Estado alterado com sucesso!'); </script>";
                        echo "<script language='javascript'> window.location='processos_exant.php'; </script>";
                      }
                    }
                  }
                } elseif (@$_GET['func'] == 'aprova') {
                  $id = $_GET['id'];
                  $query = "select * from orcamentos where id = '$id'";
                  $result = mysqli_query($conexao, $query);

                  while ($res_1 = mysqli_fetch_array($result)) {
                    $total = $res_1['total'];
                    $requerente = $res_1['requerente'];
                    $produto = $res_1['produto'];
                    $tecnico = $res_1['tecnico'];
                  }
                  ?>

                  <!-- Modal -->
                  <div id="modalAprovar" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Aprovar Orçamento</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" action="">
                            <div class="form-group">
                              <label for="fornecedor">Forma de Pagamento</label>
                              <select class="form-control mr-2" id="category" name="pgto">
                                <option value="Dinheiro">Dinheiro</option>
                                <option value="Cartão">Cartão</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="quantidade">Desconto</label>
                              <input type="text" class="form-control mr-2" name="txtdesconto" value="<?php echo $res_1['produto']; ?>" placeholder="Desconto" required>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm" name="buttonAprovar" style="text-transform: capitalize;"><i class="fas fa-check"></i> Salvar</button>
                            <button type="button" class="btn btn-light btn-sm" data-dismiss="modal" style="text-transform: capitalize;"><i class="fas fa-times"></i> Cancelar</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <script>
                    $("#modalAprovar").modal("show");
                  </script>

                  <!--Comando para editar os dados UPDATE -->
                  <?php
                  if (isset($_POST['buttonAprovar'])) {

                    $pgto = $_POST['pgto'];
                    $desconto = $_POST['txtdesconto'];
                    $valor_total = $total - $desconto;
                    $query_editar = "UPDATE orcamentos set desconto = '$desconto', valor_total = '$valor_total', pgto = '$pgto', data_aprovacao = curDate(), status = 'Aprovado' where id = '$id' ";
                    $result_editar = mysqli_query($conexao, $query_editar);

//FAZER ABERTURA DA OS
                    $query_os = "INSERT INTO os (id_orc, requerente, produto, tecnico, total, data_abertura, status) VALUES ('$id', '$requerente', '$produto', '$tecnico', '$valor_total', curDate(), 'Aberta')";
    $result_os = mysqli_query($conexao, $query_os); // Os campos que ficarão em branco têm que ser selecionados como "NULL" no banco de dados. Caso contrário, ele não funciona.

    if ($result_editar == '' or $result_os == '') {
      echo "<script language='javascript'> window.alert('Ocorreu um erro ao aprovar!'); </script>";
    } else {
      echo "<script language='javascript'> window.alert('Orçamento aprovado e OS criada com sucesso!'); </script>";
      echo "<script language='javascript'> window.location='processos_exant.php'; </script>";
    }
  }
} ?>

<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!--Máscaras-->
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
  });

  $("input[data-bootstrap-switch]").each(function(){
   $(this).bootstrapSwitch('state', $(this).prop('checked'));
 });
</script>