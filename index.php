<?php 
@session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/font-awesome.all.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/index.css" rel="stylesheet"> 
  <title>SISPAGPES 2.0</title>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="card">
      <h4 class="card-header" style="text-align: center;"><b>SISPAGPES 2.0</b></h4>
      <div class="card-body">
        <div class="alert alert-danger" role="alert" hidden="">
          Usuário ou Senha incorreto.
        </div>
        <form data-toggle="validator" role="form" method="post" action="autenticar.php">
          <input type="hidden" class="hide" id="csrf_token" name="csrf_token" value="C8nPqbqTxzcML7Hw0jLRu41ry5b9a10a0e2bc2">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>CPF</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-id-card" aria-hidden="true"></i></span>
                  </div>
                  <input type="text" class="form-control" id="txtcpf" name="usuario" placeholder="CPF" required>
                </div>
                <div class="help-block with-errors text-danger"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Senha</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                  </div>
                  <input type="password" class="form-control" id="senha"  name="senha" placeholder="Entrar" required>
                </div>
                <div class="help-block with-errors text-danger"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="checkbox checkbox-primary">
              <input id="checkbox_remember" type="checkbox" name="remember">
              <label for="checkbox_remember"> Lembrar-me</label>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">                         
              <button type="submit" class="btn btn-primary btn-lg btn-block">Entrar</button>
            </div>
          </div>
        </form>
        <div class="clear" style="text-align: center; padding-top: 10px; width: 300px;">
          <a href="#">Registrar-se</a><br>
          <a href="#">Consultar processo</a>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="js/font-awesome.all.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.mask.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#txtcpf').mask('000.000.000-00', {
      reverse: true
    });
  });
</script>
</body>
</html>