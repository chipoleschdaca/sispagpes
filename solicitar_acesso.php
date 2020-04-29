<?php
include('conexao.php');
include('dist/php/functions.php');
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
  <!-- SweetAlert2 -->
  <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <!-- Toastr -->
  <script src="plugins/toastr/toastr.min.js"></script>
</head>

<body>
  <div class="wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row" style="margin-top: 100px;">
          <div class="col-4"></div>
          <div class="col-4">
            <form method="POST" action="">
              <div class="row">
                <div class="form-group col-4">
                  <label for="fornecedor">Saram</label>
                  <input type="text" class="form-control mr-2" id="txtsaram" name="txtsaram" autocomplete="off" maxlength="9" placeholder="000.000-0" required>
                </div>
                <div class="form-group col-4">
                  <label for="fornecedor">CPF</label>
                  <input type="text" class="form-control mr-2" id="txtcpf" name="txtcpf" autocomplete="off" maxlength="14" placeholder="000.000.000-00" required>
                </div>
                <div class="form-group col-4">
                  <label for="id_produto">Posto/Grad.</label>
                  <select class="form-control mr-2" name="txtposto" required>
                    <option value="" disabled selected hidden>Posto/Grad.</option>
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
                    <option value="PM">PM</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-8">
                  <label for="id_produto">Nome Completo</label>
                  <input type="text" class="form-control mr-2" id="txtnome" name="txtnome" autocomplete="off" placeholder="Nome Completo" required>
                </div>
                <div class="form-group col-4">
                  <label for="id_produto">Nome de Guerra</label>
                  <input type="text" class="form-control mr-2" id="txtnomeguerra" name="txtnomeguerra" autocomplete="off" placeholder="Nome de Guerra" required>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-4">
                  <label for="id_produto">Senha</label>
                  <input type="password" class="form-control mr-2" id="txtsenha" name="txtsenha" autocomplete="off" placeholder="Senha" required>
                </div>
                <div class="form-group col-4">
                  <label for="id_produto">Repita a senha</label>
                  <input type="password" class="form-control mr-2" id="txtsenha" name="txtsenha2" autocomplete="off" placeholder="repita a senha" required>
                </div>
              </div>
              <div class="footer" style="float: right">
                <button type="submit" class="btn btn-primary btn-sm" name="button" style="text-transform: capitalize;"><i class="fas fa-check"></i> Salvar</button>
                <a type="button" class="btn btn-danger btn-sm" href="index.php" style="text-transform: capitalize;"><i class="fas fa-times"></i> Cancelar</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery Mask -->
  <script src="plugins/jquery-mask/dist/jquery.mask.js"></script>
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
<?php
if (isset($_POST['button'])) {
  $saram = $_POST['txtsaram'];
  $cpf = $_POST['txtcpf'];
  $posto = $_POST['txtposto'];
  $nome = strtoupper($_POST['txtnome']);
  $nomeguerra = strtoupper($_POST['txtnomeguerra']);
  $senha = md5($_POST['txtsenha']);
  $senha2 = md5($_POST['txtsenha2']);
  $status = 'Aguardando';

  if ($senha != $senha2) {
    Alerta("info", "Senhas não conferem!", false, "solicitar_acesso.php");
    exit();
  }
  $query_verificar = "SELECT * FROM militares WHERE saram = '$saram' OR cpf = '$cpf'";
  $result_verificar = mysqli_query($conexao, $query_verificar);
  $dado_verificar = mysqli_fetch_array($result_verificar);
  $row_verificar = mysqli_num_rows($result_verificar);

  if ($row_verificar > 0) {
    Alerta("info", "Militar já cadastrado!", false, "solicitar_acesso.php");
    exit();
  }

  $query = "INSERT INTO militares (saram, cpf, posto, nome, nomeguerra, senha, status, data) VALUES ('$saram', '$cpf', '$posto', '$nome', '$nomeguerra', '$senha', '$status', curDate() )";

  $result = mysqli_query($conexao, $query);

  if ($result == '') {
    Alerta("info", "Ocorreu um erro ao cadastrar!", false, "solicitar_acesso.php");
  } else {
    Alerta("success", "Solicitado com sucesso", false, "index.php");
  }
}
?>
<!--Máscaras-->
<script>
  $(document).ready(function() {
    $('#txtcpf').mask('000.000.000-00', {
      reverse: true
    });
    $('#txtsaram').mask('000.000-0', {
      reverse: true
    });
  });
</script>