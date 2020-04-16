<?php
session_start();
include('dist/php/functions.php');
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link href="dist/css/index.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/toastr/toastr.css" />
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="plugins/jquery-mask/dist/jquery.mask.js"></script>
  <script src="plugins/toastr/toastr.min.js"></script>
  <title>SISPAGPES</title>
</head>

<body>
  <div class="wrapper fadeIn">
    <div id="formContent">
      <!-- Tabs Titles -->
      <!-- Icon -->
      <div class="fadeIn" id="img">
        <img src="dist/img/gapls1.png" id="icon" alt="User Icon" />
      </div>
      <div>
        <h1><strong>SISPAGPES</strong></h1>
      </div>
      <!-- Login Form -->
      <form method="POST" class="form-container" action="login.php">
        <div class="form-group">
          <input type="text" id="txtcpf" class="fadeIn" name="usuario" placeholder="CPF" required><br>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
          <input type="password" id="senha" class="fadeIn" name="senha" placeholder="Senha" required> <br>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <?php
        if (isset($_SESSION['nao_autenticado'])) {
          //AlertaConsulta('error', 'ERRO', 'CPF ou SENHA inválidos');        
          Toast('error', 'CPF ou SENHA inválidos!');
        }
        unset($_SESSION['nao_autenticado']);
        ?>
        <div style="padding-bottom:15px;">
          <button type="submit" class="btn btn-primary btn-lg" value="Entrar" style="width:200px;">Entrar</button>
        </div>
      </form>
      <!-- Remind Passowrd -->
      <div id="formFooter">
        <small><a class="underlineHover" href="#">Esqueceu a senha?</a></small>
        <br>
        <small><a class="underlineHover" href="solicitar_acesso.php">Registre-se</a></small>
      </div>
    </div>

    <footer class="main-footer">
      <strong>&copy; 2019-<?php echo date("Y") ?> <a href="#">GAP-LS</a>.</strong>
      Desenvolvido por DANIEL ANGELO CHIPOLESCH DE ALMEIDA 1º Ten Int. All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Versão</b> 1.0.0
      </div>
    </footer>

  </div>
</body>
<script>
  $(document).ready(function() {
    $('#txtcpf').mask('000.000.000-00', {
      reverse: true
    });
  });
</script>

</html>