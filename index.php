<?php
session_start();
include('dist/php/functions.php');
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/index.css">
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
      <div class="fadeIn" id="img">
        <img src="dist/img/gapls1.png" style="width: 3.7cm; height: 4.5cm;" id="icon" alt="User Icon" />
      </div>
      <div>
        <h2><b>SISPAGPES</b></h2>
      </div>
      <form method="POST" class="form-container" action="login.php">
        <div class="form-group">
          <input type="text" id="txtcpf" class="fadeIn" name="usuario" placeholder="CPF" required><br>
          <div class="valid-feedback">Válido</div>
          <div class="invalid-feedback">Preencha este campo</div>
        </div>
        <div class="form-group">
          <input type="password" id="senha" class="fadeIn" name="senha" placeholder="Senha" required> <br>
          <div class="valid-feedback">Válido</div>
          <div class="invalid-feedback">Preencha este campo</div>
        </div>
        <?php
        if (isset($_SESSION['status'])) {
          Toast('error', 'Usuário não autorizado!');
          unset($_SESSION['status']);
        } elseif (isset($_SESSION['nao_autenticado'])) {
          Toast('error', 'CPF ou SENHA inválidos!');
          unset($_SESSION['nao_autenticado']);
        }
        ?>
        <div style="padding-bottom:15px;">
          <button type="submit" class="btn btn-primary btn-lg" value="Entrar" style="width:200px;">Entrar</button>
        </div>
      </form>
      <div id="formFooter">
        <small><a class="underlineHover" href="#">Esqueceu a senha?</a></small>
        <br>
        <small><a class="underlineHover" href="solicitar_acesso.php">Registre-se</a></small>
        <br>
        <small><a class="underlineHover" href="apps/exercicioanterior/consultar_processo.php" target="_blank" rel="noopener">Consultar Processo</a></small>
      </div>
    </div>
    <!-- <?php include('dist/php/pageFooter.php'); ?> -->
    <footer class="main-footer">
      <span style="margin-right: 1cm;">&copy; 2019-<?= date("Y") ?> <a href="#"><b>SISPAGPES</b></a>. Desenvolvido por DANIEL ANGELO <b style="text-decoration: underline;">CHIPOLESCH</b> DE ALMEIDA <b>1º Ten Int</b></span> <span class="float-right"> v1.1.1</span>
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