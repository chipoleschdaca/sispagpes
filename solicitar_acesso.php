<?php
include('conexao.php');
include('dist/php/functions.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include('dist/php/pageHead2.php'); ?>

<style>
  body {
    background-color: #f4f6f9;
  }

  .wrapper {
    position: absolute;
    display: flex;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    align-items: center;
    flex-direction: column;
    justify-content: center;
    width: 100%;
    min-height: 100%;
  }

  .card {
    width: 100%;
    left: 50%;
    transform: translateX(-50%);
    position: relative;
  }

  .card-header {
    padding: 0;
  }

  .card-body {
    padding: 20px;
  }
</style>

<body>
  <div class="wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="card card-primary">
            <div class="card-body">
              <form method="POST" action="">
                <div class="row">
                  <div class="col-8">
                    <h1><b>Dados Cadastrais</b></h1>
                  </div>
                  <div class="col-4" style="text-align:right;">
                    <button type="submit" class="general-btn-xs" name="button" data-tt="tooltip" title="Salvar & Solicitar"><img src="dist/icons/save.svg" /></button>
                    <button type="button" class="general-btn-xs" onclick="window.location.href='index.php'" data-tt="tooltip" title="Voltar para a Página de Login"><img src="dist/icons/shut_down.svg" /></button>
                  </div>
                </div>
                <div class="row">
                  <div class="col-5">
                    <img src="dist/icons/add_business_user.svg" />
                  </div>
                  <div class="col-7">
                    <div class="row">
                      <div class="form-group col-4">
                        <label for="fornecedor"><i class="fas fa-address-card"></i> Saram</label>
                        <input type="text" class="form-control mr-2" id="txtsaram" name="txtsaram" autocomplete="off" maxlength="9" placeholder="000.000-0" required>
                      </div>
                      <div class="form-group col-4">
                        <label for="fornecedor"><i class="fas fa-id-card-alt"></i> CPF</label>
                        <input type="text" class="form-control mr-2" id="txtcpf" name="txtcpf" autocomplete="off" maxlength="14" placeholder="000.000.000-00" required>
                      </div>
                      <div class="form-group col-4">
                        <label for="id_produto"><i class="fas fa-user-graduate"></i> Posto/Grad.</label>
                        <select class="form-control mr-2" name="txtposto" required>
                          <option value="" disabled selected hidden>Posto...</option>
                          <?php
                          $query_posto = "SELECT * FROM tb_posto where status = 'Aprovado'";
                          $result_posto = mysqli_query($conexao, $query_posto);
                          while ($res_ex = mysqli_fetch_array($result_posto)) {
                            $id_ex = $res_ex['id'];
                            $posto_ex = $res_ex['posto'];
                          ?>
                            <option value="<?php echo $id_ex ?>"><?php echo $posto_ex ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-12">
                        <label for="id_produto"><i class="fas fa-user"></i> Nome Completo</label>
                        <input type="text" class="form-control mr-2" id="txtnome" name="txtnome" autocomplete="off" placeholder="Nome Completo" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-4">
                        <label for="id_produto"><i class="fas fa-id-badge"></i> Nome Guerra</label>
                        <input type="text" class="form-control mr-2" id="txtnomeguerra" name="txtnomeguerra" autocomplete="off" placeholder="Nome de Guerra" required>
                      </div>
                      <div class="form-group col-4">
                        <label for="id_produto"><i class="fas fa-key"></i> Senha</label>
                        <input type="password" class="form-control mr-2" id="txtsenha" name="txtsenha" autocomplete="off" placeholder="Senha" required>
                      </div>
                      <div class="form-group col-4">
                        <label for="id_produto"><i class="fas fa-key"></i> Repita a senha</label>
                        <input type="password" class="form-control mr-2" id="txtsenha" name="txtsenha2" autocomplete="off" placeholder="repita a senha" required>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php include('dist/php/pageFooter.php'); ?>
  <?php include('dist/php/pageJavascript2.php'); ?>
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