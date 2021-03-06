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
              <a href="militares.php" class="nav-link">
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
                  </span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="perfis.php" class="nav-link active">
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
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                <div class="info-box-content" style="text-align:center;">
                  <span class="info-box-text">TOTAL DE REGISTROS</span>
                  <span class="info-box-number">
                    <h4>
                      <?php
                      $query = "SELECT * FROM perfis";
                      $result = mysqli_query($conexao, $query);
                      //$res = mysqli_fetch_array($result);
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
          <div class="row" style="align-content: center;">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-header" style="text-align: center;">
                  <h4 class="" style="text-align:center;"><strong>TABELA DE PERFIS</strong></h4>
                </div>
                <div class="card-body">
                  <button type="button" class="btn btn-primary btn-sm" style="margin-bottom:20px;" data-toggle="modal" style="text-transform: capitalize;" data-target="#modalExemplo">
                    <i class="fas fa-user-plus"></i> Inserir Novo
                  </button>
                  <div class="table-responsive" style="text-align: center; overflow-x:auto; overflow-y:auto;">
                    <?php
                    if (isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != '') {
                      $nome = '%' . $_GET['txtpesquisar'] . '%';
                      $query = "select * from perfis where perfil LIKE '$nome' order by id asc";
                    } else {
                      $query = "select * from perfis order by id asc";
                    }
                    $result = mysqli_query($conexao, $query);
                    $row = mysqli_num_rows($result);
                    ?>
                    <table class="table table-sm table-borderless table-striped" style="table-layout: fixed;">
                      <thead class="text-primary" style="text-align: center;">
                        <th class="align-middle">#</th>
                        <th class="align-middle">Perfil</th>
                        <th class="align-middle">Ações</th>
                      </thead>
                      <tbody>
                        <?php
                        while ($res_1 = mysqli_fetch_array($result)) {
                          $nome = $res_1["perfil"];
                          $id = $res_1["id"];
                        ?>
                          <tr style="text-align: center;">
                            <td class="align-middle"><?= $id; ?></td>
                            <td class="align-middle"><?= $nome; ?></td>
                            <td class="align-middle">
                              <a href="perfis.php?func=edita&id=<?= $id; ?>"><button class="btn btn-warning btn-table"><i class="fas fa-tools"></i></button></a>
                              <a href="perfis.php?func=deleta&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><button class="btn btn-danger btn-table"><i class="far fa-trash-alt"></i></button></a>
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
            <div class="col-md-4"></div>
          </div>
          <div id="modalExemplo" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Inserir novo PERFIL</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="">
                    <div class="form-group">
                      <label for="id_produto">Perfil</label>
                      <input type="text" class="form-control mr-2" id="txtnome" name="txtnome" autocomplete="off" required>
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
        </div>
      </section>
    </div>
    <?php include('../../dist/php/pageFooter.php'); ?>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
  </div>
  <?php include('../../dist/php/pageJavascript.php'); ?>
</body>

</html>

<?php
if (isset($_POST['button'])) {
  $nome = strtoupper($_POST['txtnome']);
  //Verificar se o perfil já está cadastrado
  $query_verificar = "SELECT * FROM perfis WHERE perfil = '$nome'"; //Adicionar mais campos para filtrar. Por exemplo, SARAM.
  $result_verificar = mysqli_query($conexao, $query_verificar);
  $dado_verificar = mysqli_fetch_array($result_verificar);
  $row_verificar = mysqli_num_rows($result_verificar);
  if ($row_verificar > 0) {
    Alerta("info", "Perfil já cadastrado!", false, "perfis.php");
    exit();
  }
  $query = "INSERT into perfis (perfil) VALUES ('$nome')";
  $result = mysqli_query($conexao, $query);
  if ($result == '') {
    Alerta("error", "Não foi possível cadastrar!", false, "perfis.php");
  } else {
    Alerta("success", "Salvo com sucesso!", false, "perfis.php");
  }
}
?>
<!--------------------------EXCLUIR REGISTRO DA TABELA--------------------------->
<?php
if (@$_GET['func'] == 'deleta') {
  $id = $_GET['id'];
  $query = "DELETE FROM perfis where id = '$id'";
  mysqli_query($conexao, $query);
  Alerta("success", "Excluído com sucesso", false, "perfis.php");
}
?>
<!---------------------------EDITAR REGISTRO DA TABELA---------------------------->
<?php
if (@$_GET['func'] == 'edita') {
  $id = $_GET['id'];
  $query = "SELECT * FROM perfis WHERE id = '$id'";
  $result = mysqli_query($conexao, $query);

  while ($res_1 = mysqli_fetch_array($result)) {
    $perfil = $res_1['perfil'];
?>
    <div id="modalEditar" class="modal fade" role="dialog">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Perfis</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">
              <div class="form-group">
                <label for="id_produto">Perfis</label>
                <input type="text" class="form-control mr-2" id="txtnome" name="txtnome" autocomplete="off" value="<?= $perfil; ?>" required>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm" name="buttonEditar" style="text-transform: capitalize;"><i class="fas fa-check"></i> Salvar</button>
                <button type="button" class="btn btn-light btn-sm" data-dismiss="modal" style="text-transform: capitalize;"><i class="fas fa-times"></i> Cancelar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
    <script>
      $('#modalEditar').modal("show");
    </script>
<?php
    if (isset($_POST['buttonEditar'])) {
      $nome = strtoupper($_POST['txtnome']);
      $query_verificar = "SELECT * FROM perfis WHERE perfil = '$nome'";
      $result_verificar = mysqli_query($conexao, $query_verificar);
      $row_verificar = mysqli_num_rows($result_verificar);
      if ($row_verificar > 0) {
        Alerta("info", "Perfil já cadastrado!", false, "perfis.php");
        exit();
      }
      $query_editar = "UPDATE perfis set perfil = '$nome' where id = '$id'";
      $result_editar = mysqli_query($conexao, $query_editar);
      if ($result_editar == '') {
        Alerta("error", "Não foi possível editar!", false, "perfis.php");
      } else {
        Alerta("success", "Editado com sucesso!", false, "perfis.php");
      }
    }
  }
}
?>