<?php
session_start();
include('conexao.php');
?>
<!DOCTYPE html>
<html>
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
  <title>SIGPAGPES</title>
</head>
<body>
  <style>
    html {
  color: #92badd;;
  }
   .container {
     width: 550px;
     height: auto;
     
     justify-content: center;
     align-items: center;
     align-content: center;
   }
   .card {
    margin-top: 50px;
    width: 500px;
    height: auto;
    background: #fff;
    align-content: center;
  }
  .body {
    margin: 0px;
  }
  .footer{
    clear: both;
    float: left;
    padding-top:14px;    
    background-repeat:no-repeat;
    background-position:bottom;
    width: 925px;
    height: 50px;
    margin-left:332px;/*Serve para posicionar no meio da pagina*/    
    margin-top:70px; 
    position: relative; 
    color: grey; 
    font-size: 11px;
    align-content: center;
  }
</style>
<div class="container">    
  <div class="card" style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0 rgba(0, 0, 0, 0.2);">
    <div class="card-header" style="text-align: center;">
      <h4 class="" style="text-align:center;"><strong>REGISTRE-SE</strong></h4>
    </div>
    <div class="card-body register-card-body">
      <form method="POST" action="">
        <fieldset>
          <legend>Não há</legend>
          <div class="form-group">
            <label for="fornecedor">Saram</label>
            <input type="text" class="form-control mr-2" id="txtsaram" name="txtsaram" autocomplete="off" maxlength="9" placeholder="000.000-0" required>
          </div>
          <div class="form-group">
            <label for="fornecedor">CPF</label>
            <input type="text" class="form-control mr-2" id="txtcpf" name="txtcpf" autocomplete="off" maxlength="14" placeholder="000.000.000-00" required>
          </div>
          <div class="form-group">
            <label for="id_produto">Posto/Grad.</label>
            <select class="form-control mr-2" name="txtposto" required>
              <option value="" disabled selected hidden>Posto/Grad.</option>
              <option value="PM">PM</option>
              <option value="TB">TB</option>
              <option value="MB">MB</option>
              <option value="BR">BR</option>
              <option value="CL">CL</option>
              <option value="TC">TC</option>
              <option value="MJ">MJ</option>
              <option value="CP">CP</option>
              <option value="1T">1T</option>
              <option value="2T">2T</option>
              <option value="AP">AP</option>
              <option value="SO">SO</option>
              <option value="1S">1S</option>
              <option value="2S">2S</option>
              <option value="3S">3S</option>
              <option value="CB">CB</option>
              <option value="S1">S1</option>
              <option value="S2">S2</option>
              <option value="SD">SD</option>
            </select>
          </div>
          <div class="form-group">
            <label for="id_produto">Nome Completo</label>
            <input type="text" class="form-control mr-2" id="txtnome" name="txtnome" autocomplete="off" placeholder="Nome Completo" required>
          </div>
          <div class="form-group">
            <label for="id_produto">Nome de Guerra</label>
            <input type="text" class="form-control mr-2" id="txtnomeguerra" name="txtnomeguerra" autocomplete="off" placeholder="Nome de Guerra" required>
          </div>
          <div class="form-group">
            <label for="id_produto">Perfil</label>
            <select name="perfil" class="form-control mr-2" id="category" name="category" required>
              <option value="" disabled selected hidden>Perfil</option>
              <?php
              $query = "SELECT perfil FROM perfis ORDER BY perfil asc";
              $result = mysqli_query($conexao, $query);
              if (count($result)) {
                while ($res_1 = mysqli_fetch_array($result)) {
                  ?>
                  <option value="<?php echo $res_1['perfil']; ?>"><?php echo $res_1['perfil']; ?></option>
                <?php } } ?>
              </select>
            </div>
          </fieldset>
          <fieldset>
            <div class="form-group">
              <label for="id_produto">Usuário</label>
              <input type="text" class="form-control mr-2" id="txtnomeguerra" name="txtnomeguerra" autocomplete="off" placeholder="Digite o Usuário" required>
            </div>
            <div class="form-group">
              <label for="id_produto">Senha</label>
              <input type="password" class="form-control mr-2" id="txtsenha" name="txtsenha" autocomplete="off" placeholder="Digite uma Senha" required>
            </div>
          </div>
        </fieldset>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-sm" name="button" style="text-transform: capitalize;"><i class="fas fa-check"></i> Salvar</button>
          <button type="button" class="btn btn-light btn-sm" data-dismiss="modal" style="text-transform: capitalize;"><i class="fas fa-times"></i> Cancelar</button>
        </div>
      </form>
    </div>
  </div>    
</div>
<div class="footer">
  <footer class="main-footer">
    <strong>Copyright &copy; 2019 <a href="#">GAP-LS</a>.</strong>
    Desenvolvido por DANIEL ANGELO CHIPOLESCH DE ALMEIDA 1º Ten Int. All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Versão</b> 1.0.0
    </div>
  </footer>
</div>  
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
</body>
</html>
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