<?php
session_start();
include('../../conexao.php');
include('../../verificar_login.php');
include('../../dist/php/functions.php');
login('ADMIN', '../../');
?>

<!DOCTYPE html>
<html lang="pt-br">

<?php include('../../dist/php/pageHead.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php include('../../dist/php/pageNavbar.php'); ?>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="painel_admin.php" class="brand-link">
        <img src="../../dist/img/gapls.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
        <b><span class="brand-text font-weight-light">SISPAGPES</span></b>
      </a>
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="painel_admin.php" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Página Inicial
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="militares.php" class="nav-link active">
                <i class="nav-icon fas fa-fingerprint"></i>
                <p>
                  Militares
                  <?php
                  $query = "SELECT * FROM militares where status = 'Aguardando'";
                  $result = mysqli_query($conexao, $query);
                  $res = mysqli_fetch_array($result);
                  $row = mysqli_num_rows($result);
                  if ($row > 0) {
                    echo '<span class="badge badge-warning right">' . $row . '</span>' ?>
                  <?php } else {
                  } ?>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="perfis.php" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Perfis
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="secoes_exant.php" class="nav-link">
                <i class="nav-icon fas fa-door-open"></i>
                <p>
                  Seções
                  <?php
                  $query = "SELECT * FROM tb_secoes_exant where status = 'Aguardando'";
                  $result = mysqli_query($conexao, $query);
                  $res = mysqli_fetch_array($result);
                  $row = mysqli_num_rows($result);
                  if ($row > 0) {
                    echo '<span class="badge badge-warning right">' . $row . '</span>';
                  } else {
                  } ?>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="posto.php" class="nav-link">
                <i class="nav-icon fas fa-medal"></i>
                <p>
                  Posto
                  <?php
                  $query = "SELECT * FROM tb_posto where status = 'Aguardando'";
                  $result = mysqli_query($conexao, $query);
                  $res = mysqli_fetch_array($result);
                  $row = mysqli_num_rows($result);
                  if ($row > 0) {
                    echo '<span class="badge badge-warning right">' . $row . '</span>';
                  } else {
                  } ?>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="exercicio_anterior.php" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Exercício Anterior
                </p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <div class="content-wrapper">
      <br>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content" style="text-align:center;">
                  <span class="info-box-text">TOTAL DE SOLICITAÇÕES</span>
                  <span class="info-box-number">
                    <h4>
                      <?php
                      $query = "SELECT * FROM militares";
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
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-check"></i></span>
                <div class="info-box-content" style="text-align:center;">
                  <span class="info-box-text">SOLICITAÇÕES APROVADAS</span>
                  <span class="info-box-number">
                    <h4>
                      <?php
                      $query = "SELECT * FROM militares where status = 'Aprovado'";
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
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-clock"></i></span>
                <div class="info-box-content" style="text-align:center;">
                  <span class="info-box-text">SOLICITAÇÕES AGUARDANDO</span>
                  <span class="info-box-number">
                    <h4>
                      <?php
                      $query = "SELECT * FROM militares where status = 'Aguardando'";
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
                <span class="info-box-icon badge-danger elevation-1"><i class="fa fa-user-times"></i></span>
                <div class="info-box-content" style="text-align:center;">
                  <span class="info-box-text">SOLICITAÇÕES REJEITADAS</span>
                  <span class="info-box-number">
                    <h4>
                      <?php
                      $query = "SELECT * FROM militares where status = 'Rejeitado'";
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
            <div class="col-md-12">
              <div class="card">
                <div class="card-header" style="text-align: center;">
                  <h4 class="" style="text-align:center;"><strong>TABELA DE MILITARES CADASTRADOS</strong></h4>
                </div>
                <div class="card-body">
                  <button type="button" class="btn btn-primary btn-sm" style="margin-bottom:20px;" data-toggle="modal" style="text-transform: capitalize;" data-target="#modalExemplo">
                    <i class="fas fa-user-plus"></i> Inserir Novo
                  </button>
                  <div class="table-responsive" style="text-align: center; overflow-x:auto; overflow-y:auto;">
                    <?php
                    if (isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != '') {
                      $nome = '%' . $_GET['txtpesquisar'] . '%';
                      $query = "SELECT m.id as id_militar, m.saram, m.cpf, m.posto, p.id, p.posto as nome_posto, m.nome, m.nomeguerra, m.perfil, f.id, f.perfil as nome_perfil, m.status, m.data FROM militares as m LEFT JOIN tb_posto as p ON m.posto = p.id LEFT JOIN perfis as f ON m.perfil = f.id WHERE nome LIKE '$nome' ORDER BY m.id ASC";
                    } else {
                      $query = "SELECT m.id as id_militar, m.saram, m.cpf, m.posto, p.id, p.posto as nome_posto, m.nome, m.nomeguerra, m.perfil, f.id, f.perfil as nome_perfil, m.status, m.data FROM militares as m LEFT JOIN tb_posto as p ON m.posto = p.id LEFT JOIN perfis as f ON m.perfil = f.id ORDER BY m.id ASC";
                    }
                    $result = mysqli_query($conexao, $query);
                    $row = mysqli_num_rows($result);
                    ?>
                    <table class="table table-sm table-borderless table-striped">
                      <thead class="text-primary align-middle">
                        <th class="align-middle">#</th>
                        <th class="align-middle">Saram</th>
                        <th class="align-middle">CPF</th>
                        <th class="align-middle">Posto</th>
                        <th class="align-middle">Nome Completo</th>
                        <th class="align-middle">Nome de Guerra</th>
                        <th class="align-middle">Perfil</th>
                        <th class="align-middle">Status</th>
                        <th class="align-middle">Dt. Inclusão</th>
                        <th class="align-middle">Ações</th>
                      </thead>
                      <tbody>
                        <?php
                        while ($res_1 = mysqli_fetch_array($result)) {
                          $id = $res_1['id_militar'];
                          $saram = $res_1['saram'];
                          $cpf = $res_1['cpf'];
                          $posto = $res_1['nome_posto'];
                          $nome = $res_1['nome'];
                          $nomeguerra = $res_1['nomeguerra'];
                          $perfil = $res_1['nome_perfil'];
                          $status = $res_1['status'];
                          $data = $res_1['data'];
                        ?>
                          <tr>
                            <td class="align-middle"><?= $id; ?></td>
                            <td class="align-middle"><?= $saram; ?></td>
                            <td class="align-middle"><?= $cpf; ?></td>
                            <td class="align-middle"><?= $posto; ?></td>
                            <td class="align-middle" style="text-transform:uppercase;"><?= $nome; ?></td>
                            <td class="align-middle" style="text-transform:uppercase;"><?= $nomeguerra; ?></td>
                            <td class="align-middle"><?= $perfil; ?></td>
                            <td class="align-middle">
                              <?php
                              if ($status == 'Aguardando') { ?>
                                <span class="badge badge-warning">
                                  <?= $status; ?>
                                </span>
                              <?php
                              } else if ($status == 'Aprovado') { ?>
                                <span class="badge badge-success">
                                  <?= $status; ?>
                                </span>
                              <?php
                              }
                              else if ($status == 'Rejeitado') { ?>
                                <span class="badge badge-danger">
                                  <?= $status; ?>
                                </span>
                              <?php
                              }
                              else {
                                echo $status;
                              }
                              ?>
                            </td>
                            <td class="align-middle"><?= data($data); ?></td>
                            <td class="align-middle">
                              <?php
                              if ($status == 'Aprovado') { ?>
                                <a href="militares.php?func=aprova&id=<?= $id; ?>"><button class="btn btn-success btn-table disabled"><i class="fas fa-thumbs-up"></i></button></a>
                                <a href="militares.php?func=senha&id=<?= $id; ?>"><button class="btn btn-dark btn-table"><i class="fas fa-key"></i></button></a>
                                <a href="militares.php?func=edita&id=<?= $id; ?>"><button class="btn btn-warning btn-table"><i class="fas fa-tools"></i></button></a>
                                <a href="militares.php?func=deleta&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo rejeitar a solicitação?');"><button class="btn btn-danger btn-table"><i class="far fa-trash-alt"></i></button></a>
                              <?php
                              } elseif ($status == 'Aguardando') { ?>
                                <a href="militares.php?func=aprova&id=<?= $id; ?>"><button class="btn btn-success btn-table"><i class="fas fa-thumbs-up"></i></button></a>
                                <a href="militares.php?func=senha&id=<?= $id; ?>"><button class="btn btn-dark btn-table"><i class="fas fa-key"></i></button></a>
                                <a href="militares.php?func=edita&id=<?= $id; ?>"><button class="btn btn-warning btn-table"><i class="fas fa-tools"></i></button></a>
                                <a href="militares.php?func=deleta&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo rejeitar a solicitação?');"><button class="btn btn-danger btn-table"><i class="far fa-trash-alt"></i></button></a>
                              <?php
                              }
                              else { ?>
                                <a href="militares.php?func=aprova&id=<?= $id; ?>"><button class="btn btn-success btn-table"><i class="fas fa-thumbs-up"></i></button></a>
                                <a href="militares.php?func=senha&id=<?= $id; ?>"><button class="btn btn-dark btn-table"><i class="fas fa-key"></i></button></a>
                                <a href="militares.php?func=edita&id=<?= $id; ?>"><button class="btn btn-warning btn-table"><i class="fas fa-tools"></i></button></a>
                                <a href="militares.php?func=deleta&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo rejeitar a solicitação?');"><button class="btn btn-danger btn-table disabled"><i class="far fa-trash-alt"></i></button></a>
                              <?php } ?>
                            </td>
                          </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                    <?php
                    if ($row == '') {
                      echo "<h3>Não existem dados para consulta</h3>";
                    } else {
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="modalExemplo" class="modal fade" role="dialog">
            <!---Modal Exemplo--->
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Militares</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="">
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
                        <option value="" disabled selected hidden>Selecione o posto...</option>
                        <?php
                        $query_posto = "SELECT * FROM tb_posto WHERE status = 'Aprovado'";
                        $result_posto = mysqli_query($conexao, $query_posto);
                        while ($res_ex = mysqli_fetch_array($result_posto)) {
                          $id_ex = $res_ex['id'];
                          $posto_ex = $res_ex['posto'];
                        ?>
                          <option value="<?= $id_ex ?>"><?= $posto_ex ?></option>
                        <?php
                        }
                        ?>
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
                      <label for="id_produto">Senha</label>
                      <input type="password" class="form-control mr-2" id="txtsenha" name="txtsenha" autocomplete="off" placeholder="Senha" required>
                    </div>
                    <div class="form-group">
                      <label for="id_produto">Repita a senha</label>
                      <input type="password" class="form-control mr-2" id="txtsenha" name="txtsenha2" autocomplete="off" placeholder="Senha" required>
                    </div>
                    <div class="form-group">
                      <label for="id_produto">Perfil</label>
                      <select name="perfil" class="form-control mr-2" id="category" name="category" required>
                        <option value="" disabled selected hidden>Perfil</option>
                        <?php
                        $query = "SELECT * FROM perfis ORDER BY perfil asc";
                        $result = mysqli_query($conexao, $query);
                        while ($res_1 = mysqli_fetch_array($result)) {
                        ?>
                          <option value="<?= $res_1['id']; ?>"><?= $res_1['perfil']; ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary btn-sm" name="button" style="text-transform: capitalize;"><i class="fas fa-check"></i> Salvar</button>
                  <button type="button" class="btn btn-light btn-sm" data-dismiss="modal" style="text-transform: capitalize;"><i class="fas fa-times"></i> Cancelar</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php include('../../dist/php/pageFooter.php'); ?>
    <aside class="control-sidebar control-sidebar-dark"></aside>
  </div>
  <?php include('../../dist/php/pageJavascript.php'); ?>
</body>

</html>

<!---------------------------------CADASTRAR-------------------------------------------->

<?php
if (isset($_POST['button'])) {
  $saram = $_POST['txtsaram'];
  $cpf = $_POST['txtcpf'];
  $posto = $_POST['txtposto'];
  $nome = strtoupper($_POST['txtnome']);
  $nomeguerra = strtoupper($_POST['txtnomeguerra']);
  $senha = md5($_POST['txtsenha']);
  $senha2 = md5($_POST['txtsenha2']);
  $perfil = $_POST['perfil'];
  $status = 'Aprovado';

  if ($senha != $senha2) {
    Alerta("info", "Senhas não conferem!", false, "militares.php");
    exit();
  }
  $query_verificar = "SELECT * FROM militares WHERE saram = '$saram' OR cpf = '$cpf'";
  $result_verificar = mysqli_query($conexao, $query_verificar);
  $dado_verificar = mysqli_fetch_array($result_verificar);
  $row_verificar = mysqli_num_rows($result_verificar);

  if ($row_verificar > 0) {
    Alerta("info", "Militar já cadastrado!", false, "militares.php");
    exit();
  }

  $query = "INSERT INTO militares (saram, cpf, posto, nome, nomeguerra, senha, perfil, status, data) VALUES ('$saram', '$cpf', '$posto', '$nome', '$nomeguerra', '$senha','$perfil', '$status', curDate() )";

  $result = mysqli_query($conexao, $query);

  if ($result == '') {
    Alerta("error", "Ocorreu algum erro ao cadastrar!", false, "militares.php");
  } else {
    Alerta("success", "Salvo com sucesso", false, "militares.php");
  }

  //EXCLUIR REGISTRO DA TABELA
} elseif (@$_GET['func'] == 'deleta') {
  $id = $_GET['id'];
  $query = "UPDATE militares SET status = 'Rejeitado' WHERE id = '$id'";
  mysqli_query($conexao, $query);
  Alerta("success", "Excluído com sucesso", false, "militares.php");

  //ALTERAR SENHA
}
elseif (@$_GET['func'] == 'senha') {
  $id = $_GET['id'];
  $query = "SELECT * FROM militares WHERE id = '$id'";
  $result = mysqli_query($conexao, $query);
  while ($res_1 = mysqli_fetch_array($result)) { ?>
    <div id="modalSenha" class="modal fade" role="dialog">
      <!---Modal EDITAR --->
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Militares</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">
              <div class="form-group">
                <label for="fornecedor">Senha</label>
                <input type="text" class="form-control mr-2" id="txtsenhaatual" name="txtsenhaatual" autocomplete="off" value="<?= $res_1['senha']; ?>" disabled>
              </div>
              <div class="form-group">
                <label for="fornecedor">Nova Senha</label>
                <input type="password" class="form-control mr-2" id="txtnovasenha1" name="txtnovasenha1" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="fornecedor">Repita a Senha</label>
                <input type="password" class="form-control mr-2" id="txtnovasenha2" name="txtnovasenha2" autocomplete="off">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm" name="buttonSenha" style="text-transform: capitalize;"><i class="fas fa-check"></i> Salvar</button>
                <button type="button" class="btn btn-light btn-sm" data-dismiss="modal" style="text-transform: capitalize;"><i class="fas fa-times"></i> Cancelar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script>
      $('#modalSenha').modal("show");
    </script>
    <!--Modal SENHA -->
    <?php
    if (isset($_POST['buttonSenha'])) {
      $senhaatual = $_POST['txtsenhaatual'];
      $novasenha1 = md5($_POST['txtnovasenha1']);
      $novasenha2 = md5($_POST['txtnovasenha2']);

      if ($novasenha1 != $novasenha2) {
        Alerta("info", "Senhas não conferem!", false, "militares.php");
      } else {
        $query_editar = "UPDATE militares set senha = '$novasenha1' WHERE id = '$id'";
        $result_editar = mysqli_query($conexao, $query_editar);

        if ($result_editar == '') {
          Alerta("error", "Não foi possível alterar!", false, "militares.php");
        } else {
          Alerta("success", "Editado com sucesso!", false, "militares.php");
        }
      }
    }
  }

  //EDITAR REGISTRO DA TABELA
}
elseif (@$_GET['func'] == 'edita') {
  $id = $_GET['id'];
  $query = "SELECT m.id as id_militar, m.saram, m.cpf, m.posto, p.id as id_posto, p.posto as nome_posto, m.nome, m.nomeguerra, m.perfil, f.id as id_perfil, f.perfil as nome_perfil, m.status, m.data FROM militares as m LEFT JOIN tb_posto as p ON m.posto = p.id LEFT JOIN perfis as f ON m.perfil = f.id WHERE m.id = '$id'";
  $result = mysqli_query($conexao, $query);
  while ($res_1 = mysqli_fetch_array($result)) {
    $id_posto = $res_1['id_posto'];
    $id_perfil = $res_1['id_perfil'];
    $posto = $res_1['nome_posto'];
    $perfil = $res_1['nome_perfil'];
    ?>
    <div id="modalEditar" class="modal fade" role="dialog">
      <!---Modal EDITAR --->
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Militares</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">
              <div class="form-group">
                <label for="fornecedor">Saram</label>
                <input type="text" class="form-control mr-2" id="txtsaram2" name="txtsaram" autocomplete="off" maxlength="9" placeholder="000.000-0" value="<?= $res_1['saram']; ?>" required>
              </div>
              <div class="form-group">
                <label for="fornecedor">CPF</label>
                <input type="text" class="form-control mr-2" id="txtcpf2" name="txtcpf" autocomplete="off" maxlength="14" placeholder="000.000.000-00" value="<?= $res_1['cpf']; ?>" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Posto/Grad.</label>
                <select class="form-control mr-2" name="txtposto" required>
                  <option value="<?= $id_posto ?>" selected><?= $posto ?></option>
                  <?php
                  $query_posto = "SELECT * FROM tb_posto WHERE status = 'Aprovado'";
                  $result_posto = mysqli_query($conexao, $query_posto);
                  while ($res_ex = mysqli_fetch_array($result_posto)) {
                    $id_ex = $res_ex['id'];
                    $posto_ex = $res_ex['posto'];
                  ?>
                    <option value="<?= $id_ex ?>"><?= $posto_ex ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="id_produto">Nome Completo</label>
                <input type="text" class="form-control mr-2" id="txtnome" name="txtnome" autocomplete="off" placeholder="Nome Completo" value="<?= $res_1['nome']; ?>" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Nome Guerra</label>
                <input type="text" class="form-control mr-2" id="txtnomeguerra" name="txtnomeguerra" autocomplete="off" placeholder="Nome de Guerra" value="<?= $res_1['nomeguerra']; ?>" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Perfil</label>
                <select name="perfil" class="form-control mr-2" id="category" name="category" required>
                  <option value="<?= $id_perfil; ?>" selected><?= $perfil; ?></option>
                  <?php
                  $query = "SELECT * FROM perfis ORDER BY perfil asc";
                  $result = mysqli_query($conexao, $query);
                  while ($res_2 = mysqli_fetch_array($result)) {
                  ?>
                    <option value="<?= $res_2['id']; ?>"><?= $res_2['perfil']; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-sm" name="buttonEditar" style="text-transform: capitalize;"><i class="fas fa-check"></i> Salvar</button>
            <button type="button" class="btn btn-light btn-sm" data-dismiss="modal" style="text-transform: capitalize;"><i class="fas fa-times"></i> Cancelar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <script>
      $('#modalEditar').modal("show");
    </script>
    <!--Modal EDITAR -->
    <?php
    if (isset($_POST['buttonEditar'])) {
      $saram = $_POST['txtsaram'];
      $cpf = $_POST['txtcpf'];
      $posto = $_POST['txtposto'];
      $nome = strtoupper($_POST['txtnome']);
      $nomeguerra = strtoupper($_POST['txtnomeguerra']);
      $perfil = $_POST['perfil'];

      if ($res_1['cpf'] != $cpf) {

        //Verificar se o CPF já está cadastrado
        $query_verificar = "SELECT * FROM militares WHERE saram = '$saram' OR cpf = '$cpf'"; //Adicionar mais campos para filtrar. Por exemplo, SARAM.

        $result_verificar = mysqli_query($conexao, $query_verificar);
        $dado_verificar = mysqli_fetch_array($result_verificar);
        $row_verificar = mysqli_num_rows($result_verificar);

        if ($row_verificar > 0) {
          Alerta("info", "Militar já cadastrado!", false, "militares.php");
          exit();
        }
      }

      $query_editar = "UPDATE militares set saram = '$saram', cpf = '$cpf', posto = '$posto', nome = '$nome', nomeguerra = '$nomeguerra', perfil = '$perfil' where id = '$id'";

      $result_editar = mysqli_query($conexao, $query_editar);

      if ($result_editar == '') {
        Alerta("error", "Não foi possível editar", false, "militares.php");
      } else {
        Alerta("success", "Editado com sucesso", false, "militares.php");
      }
    }
  }

  // APROVAR NOVA SOLICITAÇÃO
}
elseif (@$_GET['func'] == 'aprova') {
  $id = $_GET['id'];
  $query = "SELECT m.id as id_militar, m.saram, m.cpf, m.posto, p.id as id_posto, p.posto as nome_posto, m.nome, m.nomeguerra, m.perfil, f.id as id_perfil, f.perfil as nome_perfil, m.status, m.data FROM militares as m LEFT JOIN tb_posto as p ON m.posto = p.id LEFT JOIN perfis as f ON m.perfil = f.id WHERE m.id = '$id'";
  $result = mysqli_query($conexao, $query);
  while ($res_1 = mysqli_fetch_array($result)) { ?>
    <div id="modalAprovar" class="modal fade" role="dialog">
      <!---Modal EDITAR --->
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Militares</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">
              <div class="form-group">
                <label for="fornecedor">Saram</label>
                <input type="text" class="form-control mr-2" id="txtsaram2" name="txtsaram" autocomplete="off" maxlength="9" placeholder="000.000-0" value="<?= $res_1['saram']; ?>" required>
              </div>
              <div class="form-group">
                <label for="fornecedor">CPF</label>
                <input type="text" class="form-control mr-2" id="txtcpf2" name="txtcpf" autocomplete="off" maxlength="14" placeholder="000.000.000-00" value="<?= $res_1['cpf']; ?>" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Posto/Grad.</label>
                <select class="form-control mr-2" name="txtposto" required>
                  <option value="<?= $res_1['id_posto']; ?>" selected><?= $res_1['nome_posto']; ?></option>
                  <?php
                  $query_posto = "SELECT * FROM tb_posto where status = 'Aprovado'";
                  $result_posto = mysqli_query($conexao, $query_posto);
                  while ($res_ex = mysqli_fetch_array($result_posto)) {
                    $id_ex = $res_ex['id'];
                    $posto_ex = $res_ex['posto'];
                  ?>
                    <option value="<?= $id_ex ?>"><?= $posto_ex ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="id_produto">Nome Completo</label>
                <input type="text" class="form-control mr-2" id="txtnome" name="txtnome" autocomplete="off" placeholder="Nome Completo" value="<?= $res_1['nome']; ?>" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Nome Guerra</label>
                <input type="text" class="form-control mr-2" id="txtnomeguerra" name="txtnomeguerra" autocomplete="off" placeholder="Nome de Guerra" value="<?= $res_1['nomeguerra']; ?>" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Perfil</label>
                <select class="form-control mr-2" id="txtperfil2" name="txtperfil2" required>
                  <option value="<?= $res_1['id_perfil']; ?>" selected><?= $res_1['nome_perfil']; ?></option>
                  <?php
                  $query = "SELECT * FROM perfis ORDER BY perfil asc";
                  $result = mysqli_query($conexao, $query);
                  while ($res_2 = mysqli_fetch_array($result)) {
                  ?>
                    <option value="<?= $res_2['id']; ?>"><?= $res_2['perfil']; ?></option>
                  <?php }
                  ?>
                </select>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success btn-sm" name="buttonAprovar" style="text-transform: capitalize;"><i class="fas fa-check"></i> Aprovar</button>
            <button type="button" class="btn btn-light btn-sm" data-dismiss="modal" style="text-transform: capitalize;"><i class="fas fa-times"></i> Cancelar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <script>
      $('#modalAprovar').modal("show");
    </script>
    <!--Modal Aprovar -->
<?php
    if (isset($_POST['buttonAprovar'])) {
      $saram = $_POST['txtsaram'];
      $cpf = $_POST['txtcpf'];
      $posto = $_POST['txtposto'];
      $nome = strtoupper($_POST['txtnome']);
      $nomeguerra = strtoupper($_POST['txtnomeguerra']);
      $perfil2 = $_POST['txtperfil2'];

      if ($res_1['cpf'] != $cpf) {

        //Verificar se o CPF já está cadastrado
        $query_verificar = "select * from militares where cpf = '$cpf'"; //Adicionar mais campos para filtrar. Por exemplo, SARAM.

        $result_verificar = mysqli_query($conexao, $query_verificar);
        $dado_verificar = mysqli_fetch_array($result_verificar);
        $row_verificar = mysqli_num_rows($result_verificar);

        if ($row_verificar > 0) {
          Alerta("info", "CPF já cadastrado!", false, "militares.php");
          exit();
        }
      }

      $query_editar = "UPDATE militares set perfil = '$perfil2', status = 'Aprovado' where id = '$id'";

      $result_editar = mysqli_query($conexao, $query_editar);

      if ($result_editar == '') {
        Alerta("error", "Não foi possível alterar", false, "militares.php");
      } else {
        Alerta("success", "Aprovado com sucesso!", false, "militares.php");
      }
    }
  }
} ?>

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