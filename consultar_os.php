<?php
include('conexao.php');
session_start();
include('verificar_login.php');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" href="dist/img/gapls.png">
  <title>SISPAGPES | Dashboard</title>
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

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <!--<li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Início</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contato</a>
        </li>-->
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
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
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
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
              <!-- Message End -->
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
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
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
        <!-- Este é a tag que faz aparecer o nome aparece no menu direito superior. -->
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
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="painel_admin.php" class="brand-link" style="heigh:50px;">
        <img src="dist/img/gapls.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
        <b><span class="brand-text font-weight-light">SISPAGPES</span></b>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) 
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
          </div>
        </div> -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="painel_funcionario.php" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Página Inicial
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="requerentes.php" class="nav-link">
                <i class="nav-icon fas fa-user-friends"></i>
                <p>
                  Requerentes
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Orçamentos
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="abrir_orcamentos.php" class="nav-link">
                    <i class="far fa-hand-point-right nav-icon"></i>
                    <p>Abrir Orçamento</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="fechar_orcamentos.php" class="nav-link">
                    <i class="far fa-hand-point-right nav-icon"></i>
                    <p>Fechar Orçamento</p>
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
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
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
                  <a href="consultar_os.php" class="nav-link active">
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
            <!-- OMITIDO
              <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Home
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./index.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard v1</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./index2.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard v2</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./index3.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard v3</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="pages/widgets.html" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Widgets
                  <span class="right badge badge-danger">New</span>
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Layout Options
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right">6</span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/layout/top-nav.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Top Navigation</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/boxed.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Boxed</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Fixed Sidebar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/fixed-topnav.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Fixed Navbar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/fixed-footer.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Fixed Footer</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Collapsed Sidebar</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Charts
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/charts/chartjs.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>ChartJS</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/flot.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Flot</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/inline.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Inline</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tree"></i>
                <p>
                  UI Elements
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/UI/general.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>General</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/icons.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Icons</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/buttons.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Buttons</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/sliders.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sliders</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/modals.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Modals & Alerts</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/navbar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Navbar & Tabs</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/timeline.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Timeline</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/ribbons.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ribbons</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Forms
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/forms/general.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>General Elements</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/forms/advanced.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Advanced Elements</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/forms/editors.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Editors</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Tables
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/tables/simple.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Simple Tables</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/tables/data.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>DataTables</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/tables/jsgrid.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>jsGrid</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header">EXAMPLES</li>
            <li class="nav-item">
              <a href="pages/calendar.html" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Calendar
                  <span class="badge badge-info right">2</span>
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p>
                  Mailbox
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/mailbox/mailbox.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Inbox</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/mailbox/compose.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Compose</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/mailbox/read-mail.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Read</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Pages
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/examples/invoice.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Invoice</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/profile.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Profile</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/e_commerce.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>E-commerce</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/projects.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Projects</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/project_add.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Project Add</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/project_edit.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Project Edit</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/project_detail.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Project Detail</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/contacts.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Contacts</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-plus-square"></i>
                <p>
                  Extras
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/examples/login.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Login</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/register.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Register</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/lockscreen.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lockscreen</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Legacy User Menu</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/language-menu.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Language Menu</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/404.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Error 404</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/500.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Error 500</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/pace.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pace</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/blank.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Blank Page</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="starter.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Starter Page</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header">MISCELLANEOUS</li>
            <li class="nav-item">
              <a href="https://adminlte.io/docs/3.0" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>Documentation</p>
              </a>
            </li>
            <li class="nav-header">MULTI LEVEL EXAMPLE</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-circle nav-icon"></i>
                <p>Level 1</p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>
                  Level 1
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Level 2</p>
                  </a>
                </li>
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Level 2
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Level 3</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Level 3</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Level 3</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Level 2</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-circle nav-icon"></i>
                <p>Level 1</p>
              </a>
            </li>
            <li class="nav-header">LABELS</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-danger"></i>
                <p class="text">Important</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-warning"></i>
                <p>Warning</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                <p>Informational</p>
              </a>
            </li>
          </ul>
        </nav> -->
            <!-- /.sidebar-menu -->
      </div>
      <!--/.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                <div class="info-box-content" style="text-align:center;">
                  <span class="info-box-text">TOTAL DE ORDENS DE SERVIÇO</span>
                  <span class="info-box-number">
                    <h4>
                      <?php
                      $query = "SELECT * FROM os";
                      $result = mysqli_query($conexao, $query);
                      $res = mysqli_fetch_array($result);
                      $row = mysqli_num_rows($result);
                      ?>
                      <?php
                      echo $row;
                      ?>
                    </h4>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Likes</span>
                  <span class="info-box-number">
                    <h4>41,410</h4>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Sales</span>
                  <span class="info-box-number">
                    <h4>760</h4>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">New Members</span>
                  <span class="info-box-number">
                    <h4>2,000</h4>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <!-- /.row -->
          <!-- Main row -->
          <!-- Left col -->
          <br>

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header" style="text-align: center;">
                  <h4 class="" style="text-align:center;"><strong>TABELA DE ORDENS DE SERVIÇO</strong></h4>
                </div>
                <div class="card-body">
                  <div class="row" style="margin-bottom: 20px;">
                    <div class="col-sm-6">
                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" style="text-transform: capitalize;" data-target="#modalExemplo">
                        <i class="far fa-folder-open"></i> Inserir Novo
                      </button>
                    </div>
                    <div class="col-sm-6">
                      <!-- SEARCH FORM -->
                      <form class="form-inline">
                        <label for="">Filtros: </label>
                        <div class="input-group input-group-sm" style="margin-left:10px;">
                          <select class="form-control" id="category" name="status" style="border-radius:3px;">
                            <option value="" disabled selected hidden>Status</option>
                            <option value="Aberta">Aberta</option>
                            <option value="Aprovada">Aprovada</option>
                            <option value="Cancelada">Cancelada</option>
                          </select>
                          <input class="form-control" type="search" id="txtpesquisar" name="txtpesquisar" placeholder="Pesquisar" aria-label="Pesquisar" style="margin-right:10px; margin-left:10px; border-radius:3px;">
                          <input class="form-control" type="date" id="txtpesquisar" name="txtpesquisar" placeholder="Pesquisar" aria-label="Pesquisar" style="border-radius:3px;">
                          <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit" name="buttonPesquisar">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>

                  <div class="table-responsive" style="text-align: center; overflow-x:auto; overflow-y:auto;">

                    <!-------------LISTAR TODOS OS ORÇAMENTOS-------------->

                    <?php


                    if (isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != '' and $_GET['status'] != '') {
                      $data = '%' . $_GET['txtpesquisar'] . '%';
                      $status_os = $_GET['status'];
                      $query = "select * from os where data_abertura = '$data' and status = '$status_os' order by id asc";
                    } else if (isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] == '' and $_GET['status'] != '') {
                      $status_os = $_GET['status'];
                      $query = "select * from os where status = '$status_os' order by id asc";
                    } else if (isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != '' and $_GET['status'] == '') {
                      $data = $_GET['txtpesquisar'] . '%';
                      $query = "select * from os where data_abertura = '$data' order by id asc";
                    } else {
                      $query = "select * from os order by id asc";
                    }

                    $result = mysqli_query($conexao, $query);
                    //$dado = mysqli_fetch_array($result);
                    $row = mysqli_num_rows($result);

                    ?>


                    <table class="table">
                      <thead class="text-primary">

                        <th>
                          Requerente
                        </th>
                        <th>
                          Militar
                        </th>
                        <th>
                          Produto
                        </th>
                        <th>
                          Valor Total
                        </th>
                        <th>
                          Status
                        </th>
                        <th>
                          Data de Abertura
                        </th>
                        <th>
                          Data de Fechamento
                        </th>
                        <th>
                          Ações
                        </th>
                      </thead>
                      <tbody>

                        <?php

                        while ($res_1 = mysqli_fetch_array($result)) {
                          $requerente = $res_1["requerente"];
                          $tecnico = $res_1["tecnico"];
                          $produto = $res_1["produto"];
                          $valor_total = $res_1["total"];
                          $status = $res_1["status"];
                          $data_abertura = $res_1['data_abertura'];
                          $data_fechamento = $res_1['data_fechamento'];
                          $id = $res_1['id'];
                          $data2 = implode('/', array_reverse(explode('-', $data_abertura)));
                          $data3 = implode('/', array_reverse(explode('-', $data_fechamento)));

                          //Recupera o requente através do CPF sem precisar de INNER JOIN
                          $query_requerente = "select * from requerentes where cpf = '$requerente'";
                          $result_requerente = mysqli_query($conexao, $query_requerente);
                          while ($res_requerente = mysqli_fetch_array($result_requerente)) {
                            $nome_requerente = $res_requerente['nome'];

                            //Recupera o técnico através do CPF sem precisar de INNER JOIN
                            $query_tecnico = "select * from militares where id = '$tecnico'";
                            $result_tecnico = mysqli_query($conexao, $query_tecnico);
                            while ($res_tecnico = mysqli_fetch_array($result_tecnico)) {
                              $nome_tecnico = $res_tecnico['nome'];
                              ?>

                              <tr>
                                <td><?php echo $nome_requerente; ?></td>
                                <td><?php echo $nome_tecnico; ?></td>
                                <td><?php echo $produto; ?></td>
                                <td>R$ <?php echo $valor_total; ?></td>
                                <td>
                                  <?php
                                    if ($status == 'Aberta') { ?>
                                    <span class="badge badge-secondary">
                                      <?php echo $status; ?>
                                    </span>
                                  <?php                                        
                                    } elseif ($status == 'Aprovada') { ?>
                                    <span class="badge badge-success">
                                      <?php echo $status; ?>
                                    </span>
                                  <?php
                                    } elseif ($status == 'Cancelada') { ?>
                                    <span class="badge badge-danger">
                                      <?php echo $status; ?>
                                    </span>
                                  <?php
                                    } else {
                                          echo $status;
                                    }
                                  ?>
                                </td>
                                <td style="width: 175px;"><?php echo $data2; ?></td>
                                <td style="width: 175px;"><?php echo $data3; ?></td>

                                <td>
                                  <!-- <?php
                                              if ($status == 'Aberto') { ?>
                                <a class="btn btn-success btn-sm disabled" href="#"><i class="fas fa-thumbs-up"></i></a>
                                <a class="btn btn-primary btn-sm disabled" href="#" target="_blank" rel=”noopener” style="width: 33px;"><i class="far fa-file-pdf"></i></a>
                                <a class="btn btn-secondary btn-sm" href="fechar_orcamentos.php?func=edita&id=<?php echo $id; ?>"><i class="far fa-share-square"></i></a>
                                <a class="btn btn-warning btn-sm" href="abrir_orcamentos.php?func=edita&id=<?php echo $id; ?>"><i class="fas fa-cog"></i></a>
                                <a class="btn btn-danger btn-sm" href="abrir_orcamentos.php?func=deleta&id=<?php echo $id; ?>" onclick="return confirm('Deseja mesmo deletar o registro?');"><i class="far fa-trash-alt"></i></a>
                              <?php
                                    } elseif ($status == 'Aguardando') { ?>
                                <a class="btn btn-success btn-sm" href="rel_orcamentos.php?func=edita&id=<?php echo $id; ?>"><i class="fas fa-thumbs-up"></i></a>
                                <a class="btn btn-primary btn-sm" href="rel/rel_orcamentos_class.php?id=<?php echo $id; ?>" target="_blank" rel=”noopener” style="width: 33px;"><i class="far fa-file-pdf"></i></a>
                                <a class="btn btn-secondary btn-sm disabled" href="#"><i class="far fa-share-square"></i></a>
                                <a class="btn btn-warning btn-sm" href="abrir_orcamentos.php?func=edita&id=<?php echo $id; ?>"><i class="fas fa-cog"></i></a>
                                <a class="btn btn-danger btn-sm" href="abrir_orcamentos.php?func=deleta&id=<?php echo $id; ?>" onclick="return confirm('Deseja mesmo deletar o registro?');"><i class="far fa-trash-alt"></i></a>
                              <?php
                                    } elseif ($status == 'Aprovado') { ?>
                                <a class="btn btn-success btn-sm disabled" href="#"><i class="fas fa-thumbs-up"></i></a>
                                <a class="btn btn-primary btn-sm disabled" href="#" target="_blank" rel=”noopener” style="width: 33px;"><i class="far fa-file-pdf"></i></a>
                                <a class="btn btn-secondary btn-sm disabled" href="#"><i class="far fa-share-square"></i></a>
                                <a class="btn btn-warning btn-sm" href="abrir_orcamentos.php?func=edita&id=<?php echo $id; ?>"><i class="fas fa-cog"></i></a>
                                <a class="btn btn-danger btn-sm" href="abrir_orcamentos.php?func=deleta&id=<?php echo $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><i class="far fa-trash-alt"></i></a>
                              <?php
                                    } elseif ($status == 'Cancelado') { ?>
                                <span class="badge badge-danger">
                                  <?php echo $status; ?>
                                </span>
                              <?php
                                    } else {
                                      echo $status;
                                    }
                                    ?>-->
                                  <a class="btn btn-warning btn-sm" href="abrir_orcamentos.php?func=edita&id=<?php echo $id; ?>"><i class="fas fa-cog"></i></a>
                                  <a class="btn btn-danger btn-sm" href="abrir_orcamentos.php?func=deleta&id=<?php echo $id; ?>" onclick="return confirm('Deseja mesmo deletar o registro?');"><i class="far fa-trash-alt"></i></a>
                                </td>
                              </tr>

                        <?php
                            }
                          }
                        }
                        ?>
                      </tbody>
                    </table>
                    <?php
                    if ($row == '') {

                      echo "<h3> Não existem dados cadastrados no banco </h3>";
                    } else { }
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

          <!-- Modal -->
          <div id="modalExemplo" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">

                  <h4 class="modal-title">Novo Orçamento</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="">
                    <div class="form-group">
                      <label for="fornecedor">CPF</label>
                      <input type="text" class="form-control mr-2" name="txtcpf" id="txtcpf" placeholder="CPF" required>
                    </div>
                    <div class="form-group">
                      <label for="fornecedor">Técnico</label>

                      <select class="form-control mr-2" id="category" name="funcionario">
                        <option value="" disabled selected hidden>Escolha um técnico...</option>
                        <?php

                        $query = "SELECT * FROM militares where perfil = 'Funcionário' ORDER BY nome asc";
                        $result = mysqli_query($conexao, $query);

                        if (count($result)) {
                          while ($res_1 = mysqli_fetch_array($result)) {
                            ?>
                            <option value="<?php echo $res_1['id']; ?>"><?php echo $res_1['nome']; ?></option>
                        <?php
                          }
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="quantidade">Produto</label>
                      <input type="text" class="form-control mr-2" name="txtproduto" placeholder="Produto" required>
                    </div>

                    <div class="form-group">
                      <label for="quantidade">Nº de Série</label>
                      <input type="text" class="form-control mr-2" name="txtserie" placeholder="Nº de Série" required>
                    </div>

                    <div class="form-group">
                      <label for="quantidade">Defeito</label>
                      <input type="text" class="form-control mr-2" name="txtdefeito" placeholder="Defeito" required>
                    </div>

                    <div class="form-group">
                      <label for="quantidade">Observações</label>
                      <input type="text" class="form-control mr-2" name="txtobs" placeholder="Observações" required>
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
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <strong>Copyright &copy; 2019 <a href="#">GAP-LS</a>.</strong>
      Desenvolvido por DANIEL ANGELO CHIPOLESCH DE ALMEIDA 1º Ten Int. All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Versão</b> 1.0.0
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

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
  $nome = $_POST['txtcpf'];
  $tecnico = $_POST['funcionario'];
  $produto = $_POST['txtproduto'];
  $serie = $_POST['txtserie'];
  $defeito = $_POST['txtdefeito'];
  $obs = $_POST['txtobs'];


  //VERIFICAR SE O requerente JÁ ESTÁ CADASTRADO
  $query_verificar = "select * from requerentes where cpf = '$nome' ";

  $result_verificar = mysqli_query($conexao, $query_verificar);
  $row_verificar = mysqli_num_rows($result_verificar);

  if ($row_verificar <= 0) {
    echo "<script language='javascript'> window.alert('O Requerente não está cadastrado!'); </script>";
    exit();
  }

  $query = "INSERT into orcamentos (requerente, tecnico, produto, serie, problema, obs, valor_total, data_abertura, status) VALUES ('$nome', '$tecnico', '$produto', '$serie', '$defeito', '$obs', '0',  curDate(), 'Aberto' )";

  $result = mysqli_query($conexao, $query);

  if ($result == '') {
    echo "<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar!'); </script>";
  } else {
    echo "<script language='javascript'> window.alert('Salvo com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location='abrir_orcamentos.php'; </script>";
  }
}
?>


<!--EXCLUIR -->
<?php
if (@$_GET['func'] == 'deleta') {
  $id = $_GET['id'];
  $query = "DELETE FROM orcamentos where id = '$id'";
  mysqli_query($conexao, $query);
  echo "<script language='javascript'> window.location='abrir_orcamentos.php'; </script>";
}
?>


<!--EDITAR -->
<?php
if (@$_GET['func'] == 'edita') {
  $id = $_GET['id'];
  $query = "select * from orcamentos where id = '$id'";
  $result = mysqli_query($conexao, $query);

  while ($res_1 = mysqli_fetch_array($result)) {

    ?>

    <!-- Modal -->
    <div id="modalEditar" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">

            <h4 class="modal-title">Editar Orçamento</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">

              <div class="form-group">
                <label for="fornecedor">Técnico</label>

                <select class="form-control mr-2" id="category" name="funcionario">
                  <?php

                      $query = "SELECT * FROM militares where perfil = 'Funcionário' ORDER BY nome asc";
                      $result = mysqli_query($conexao, $query);

                      if (count($result)) {
                        while ($res_2 = mysqli_fetch_array($result)) {
                          ?>
                      <option value="<?php echo $res_2['id']; ?>"><?php echo $res_2['nome']; ?></option>
                  <?php
                        }
                      }
                      ?>
                </select>
              </div>
              <div class="form-group">
                <label for="quantidade">Produto</label>
                <input type="text" class="form-control mr-2" name="txtproduto" value="<?php echo $res_1['produto']; ?>" placeholder="Produto" required>
              </div>

              <div class="form-group">
                <label for="quantidade">Nº de Série</label>
                <input type="text" class="form-control mr-2" name="txtserie" placeholder="Número de Série" value="<?php echo $res_1['serie']; ?>" required>
              </div>

              <div class="form-group">
                <label for="quantidade">Defeito</label>
                <input type="text" class="form-control mr-2" name="txtdefeito" value="<?php echo $res_1['problema']; ?>" placeholder="Defeito" required>
              </div>

              <div class="form-group">
                <label for="quantidade">Observações</label>
                <input type="text" class="form-control mr-2" name="txtobs" placeholder="Observações" value="<?php echo $res_1['obs']; ?>" required>
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

    <script>
      $("#modalEditar").modal("show");
    </script>

    <!--Comando para editar os dados UPDATE -->
    <?php
        if (isset($_POST['buttonEditar'])) {

          $tecnico = $_POST['funcionario'];
          $produto = $_POST['txtproduto'];
          $serie = $_POST['txtserie'];
          $defeito = $_POST['txtdefeito'];
          $obs = $_POST['txtobs'];

          $query_editar = "UPDATE orcamentos set tecnico = '$tecnico', produto = '$produto', serie = '$serie', problema = '$defeito', obs = '$obs' where id = '$id' ";

          $result_editar = mysqli_query($conexao, $query_editar);

          if ($result_editar == '') {
            echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
          } else {
            echo "<script language='javascript'> window.alert('Editado com Sucesso!'); </script>";
            echo "<script language='javascript'> window.location='abrir_orcamentos.php'; </script>";
          }
        }
        ?>


<?php }
}  ?>

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
    $('#txtcpf2').mask('000.000.000-00', {
      reverse: true
    });
    $('#txtsaram2').mask('000.000-0', {
      reverse: true
    });
  });
</script>