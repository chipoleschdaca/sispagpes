<?php
session_start();
include('../../verificar_login.php');
include('../../conexao.php');
include('../../dist/php/functions.php');
login('EXANT', '../../');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <?php head('../../') ?>
</head>
<style>
  .textarea {
    text-align: justify;
    white-space: normal;
  }

  a {
    padding: 0;
    margin: 2px;
  }

  table {
    text-align: center;
  }
</style>

<body class="sidebar-mini">
  <div class="wrapper">
    <?php navbar() ?>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="painel_exant.php" class="brand-link">
        <img src="../../dist/img/gapls.png" alt="AdminLTE Logo" class="brand-image elevation-3">
        <b><span class="brand-text font-weight-light">SISPAGPES</span></b>
      </a>
      <div class="sidebar">
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
          </ul>
        </nav>
      </div>
    </aside>
    <div class="content-wrapper">
      <section class="content">
        <div class="container-fluid">
          <br>
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-inbox"></i></span>
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
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-folder-open"></i></span>
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
          </div>
          <div>
            <button type="button" class="general-btn" data-toggle="modal" data-target="#modalExemplo" data-tt="tooltip" title="Inserir Processo" style="background-color: white;">
              <img src="../../dist/icons/add_to_open_folder.svg" />
            </button>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header" style="text-align: center; height: 55px;">
                  <h4 class="align-middle" style="text-align:center;"><strong>EXERCÍCIOS
                      ANTERIORES</strong></h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive" style="text-align: center; font-size: 12px; height: 430px;">

                    <?php

                    if (isset($_GET['buttonPesquisar']) and $_GET['txtnome'] != '') {
                      $nome = '%' . $_GET['txtnome'] . '%';
                      $query = "SELECT e.id, e.saram, e.cpf, e.requerente, e.sacador, e.nup, e.data_criacao, e.direito_pleiteado, e.secao_origem, e.obs, e.data_saida, e.estado, e.secao_atual, r.id as id_req, r.saram as req_saram, r.cpf as req_cpf, r.nome as req_nome, r.dt_nascimento as data_nascimento, m.nome as mil_nome, d.direito as dir_direito, s.secao as sec_origem, sec.secao as sec_atual, est.estado as est_estado from exercicioanterior as e LEFT JOIN requerentes as r on e.requerente = r.id LEFT JOIN militares as m on e.sacador = m.id LEFT JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id LEFT JOIN tb_secoes_exant as s ON e.secao_origem = s.id LEFT JOIN tb_secoes_exant as sec ON e.secao_atual = sec.id LEFT JOIN tb_estado_exant as est ON e.estado = est.id WHERE r.nome LIKE '$nome' order by e.id asc";
                    } else if (isset($_GET['buttonPesquisar']) and $_GET['txtsaram3'] != '') {
                      $saram_filtro = $_GET['txtsaram3'] . '%';
                      $query = "SELECT e.id, e.saram, e.cpf, e.requerente, e.sacador, e.nup, e.data_criacao, e.direito_pleiteado, e.secao_origem, e.obs, e.data_saida, e.estado, e.secao_atual, r.id as id_req, r.saram as req_saram, r.cpf as req_cpf, r.nome as req_nome, r.dt_nascimento as data_nascimento, m.nome as mil_nome, d.direito as dir_direito, s.secao as sec_origem, sec.secao as sec_atual, est.estado as est_estado from exercicioanterior as e LEFT JOIN requerentes as r on e.requerente = r.id LEFT JOIN militares as m on e.sacador = m.id LEFT JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id LEFT JOIN tb_secoes_exant as s ON e.secao_origem = s.id LEFT JOIN tb_secoes_exant as sec ON e.secao_atual = sec.id LEFT JOIN tb_estado_exant as est ON e.estado = est.id WHERE r.saram LIKE '$saram_filtro' order by e.id asc";
                    } else if (isset($_GET['buttonPesquisar']) and $_GET['txtdirpleiteado'] != '') {
                      $dir_pleiteado = $_GET['txtdirpleiteado'] . '%';
                      $query = "SELECT e.id, e.saram, e.cpf, e.requerente, e.sacador, e.nup, e.data_criacao, e.direito_pleiteado, e.secao_origem, e.obs, e.data_saida, e.estado, e.secao_atual, r.id as id_req, r.saram as req_saram, r.cpf as req_cpf, r.nome as req_nome, r.dt_nascimento as data_nascimento, m.nome as mil_nome, d.direito as dir_direito, s.secao as sec_origem, sec.secao as sec_atual, est.estado as est_estado from exercicioanterior as e LEFT JOIN requerentes as r on e.requerente = r.id LEFT JOIN militares as m on e.sacador = m.id LEFT JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id LEFT JOIN tb_secoes_exant as s ON e.secao_origem = s.id LEFT JOIN tb_secoes_exant as sec ON e.secao_atual = sec.id LEFT JOIN tb_estado_exant as est ON e.estado = est.id WHERE d.id = '$dir_pleiteado' order by e.id asc";
                    } else if (isset($_GET['buttonPesquisar']) and $_GET['txtestadofiltro'] != '') {
                      $estado_filtro = $_GET['txtestadofiltro'];
                      $query = "SELECT e.id, e.saram, e.cpf, e.requerente, e.sacador, e.nup, e.data_criacao, e.direito_pleiteado, e.secao_origem, e.obs, e.data_saida, e.estado, e.secao_atual, r.id as id_req, r.saram as req_saram, r.cpf as req_cpf, r.nome as req_nome, r.dt_nascimento as data_nascimento, m.nome as mil_nome, d.direito as dir_direito, s.secao as sec_origem, sec.secao as sec_atual, est.estado as est_estado from exercicioanterior as e LEFT JOIN requerentes as r on e.requerente = r.id LEFT JOIN militares as m on e.sacador = m.id LEFT JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id LEFT JOIN tb_secoes_exant as s ON e.secao_origem = s.id LEFT JOIN tb_secoes_exant as sec ON e.secao_atual = sec.id LEFT JOIN tb_estado_exant as est ON e.estado = est.id WHERE est.id = '$estado_filtro' order by e.id asc";
                    } else {
                      $query = "SELECT e.id, e.saram, e.cpf, e.requerente, e.sacador, e.nup, e.data_criacao, e.direito_pleiteado, e.secao_origem, e.obs, e.data_saida, e.estado, e.secao_atual, r.id as id_req, r.saram as req_saram, r.cpf as req_cpf, r.nome as req_nome, r.dt_nascimento as data_nascimento, m.nome as mil_nome, d.direito as dir_direito, s.secao as sec_origem, sec.secao as sec_atual, est.estado as est_estado from exercicioanterior as e LEFT JOIN requerentes as r on e.requerente = r.id LEFT JOIN militares as m on e.sacador = m.id LEFT JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id LEFT JOIN tb_secoes_exant as s ON e.secao_origem = s.id LEFT JOIN tb_secoes_exant as sec ON e.secao_atual = sec.id LEFT JOIN tb_estado_exant as est ON e.estado = est.id order by e.id asc";
                    }

                    $result = mysqli_query($conexao, $query);
                    $row = mysqli_num_rows($result);

                    ?>

                    <table class="table table-sm table-borderless table-hover" id="example1">
                      <thead class="text-primary">
                        <tr>
                          <th class="align-middle">#</th>
                          <th class="align-middle">SARAM</th>
                          <th class="align-middle">Requerente</th>
                          <th class="align-middle">NUP</th>
                          <th class="align-middle">Est. Idoso</th>
                          <th class="align-middle">Dt. Criação</th>
                          <th class="align-middle">Direito Pleiteado</th>
                          <th class="align-middle">Origem</th>
                          <th class="align-middle">Estado</th>
                          <th class="align-middle">Seção Atual</th>
                          <th class="align-middle">Prazo</th>
                          <th class="align-middle">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        while ($res_1 = mysqli_fetch_array($result)) {
                          $id = $res_1["id"];
                          $id_req = $res_1["id_req"];
                          $saram = $res_1["req_saram"];
                          $cpf = $res_1["cpf"];
                          $requerente = $res_1["req_nome"];
                          $sacador = $res_1["mil_nome"];
                          $nup = $res_1["nup"];
                          $dt_nascimento = $res_1["data_nascimento"];
                          $data_criacao = $res_1["data_criacao"];
                          $direito_pleiteado = $res_1["dir_direito"];
                          $secao_origem = $res_1["sec_origem"];
                          $data_saida = $res_1["data_saida"];
                          $estado = $res_1["est_estado"];
                          $secao_atual = $res_1['sec_atual'];

                          $query_prazo = "SELECT prazo_exant FROM tb_secoes_exant WHERE secao = '$secao_atual'";
                          $result_prazo = mysqli_query($conexao, $query_prazo);
                          $res_prazo = mysqli_fetch_array($result_prazo);
                          $prazoSecao = $res_prazo['prazo_exant'];

                          if ($data_saida != "") {
                            $dtPrazoSecao = date('Y-m-d', strtotime('+' . $prazoSecao . ' days', strtotime($res_1["data_saida"])));
                          } else {
                            $dtPrazoSecao = date('Y-m-d', strtotime('+' . $prazoSecao . ' days', strtotime($res_1["data_criacao"])));
                          }
                          $dtPrazoSecao = date('Y-m-d', strtotime('+' . $prazoSecao . ' days', strtotime($res_1["data_saida"])));
                          $today = date('Y-m-d');
                        ?>
                          <tr>
                            <td class="align-middle"><?= $id; ?></td>
                            <td class="align-middle"><?= $saram; ?></td>
                            <td class="align-middle"><?= $requerente; ?></td>
                            <td class="align-middle"><?= $nup; ?></td>
                            <td class="align-middle">
                              <?php
                              if (($dt_nascimento) == '0000-00-00') {
                                echo '<img src="../../dist/icons/delete-colored.svg" style="height: 30px; width:30px;"/>';
                              } else if (descobrirIdade($dt_nascimento) >= 60) {
                                echo '<img src="../../dist/icons/accept-colored.svg" style="height: 30px; width:30px;"/>';
                              } else {
                                echo '<img src="../../dist/icons/delete-colored.svg" style="height: 30px; width:30px;"/>';
                              } ?>
                            </td>
                            <td class="align-middle"><?= data($data_criacao); ?></td>
                            <td class="align-middle"><?= $direito_pleiteado; ?></td>
                            <td class="align-middle"><?= $secao_origem ?></td>
                            <td class="align-middle"><?= $estado; ?></td>
                            <td class="align-middle"><?= $secao_atual; ?></td>
                            <?php
                            if (diferenca($dtPrazoSecao, $today) >= (2 / 3) * $prazoSecao) {
                              echo '<td class="align-middle" style="background-color: rgba(0, 128, 0, 0.3);">' . data_show($dtPrazoSecao) . '</td>';
                            } elseif (diferenca($dtPrazoSecao, $today) < (2 / 3) * $prazoSecao && diferenca($dtPrazoSecao, $today) >= $prazoSecao / 3) {
                              echo '<td class="align-middle" style="background-color: rgba(255, 255, 0, 0.3);">' . data_show($dtPrazoSecao) . '</td>';
                            } else {
                              echo '<td class="align-middle" style="background-color: rgba(255, 0, 0, 0.3);">' . data_show($dtPrazoSecao) . '</td>';
                            }
                            ?>
                            <td class="align-middle" style="display: inline;">
                              <a href="processos_exant.php?func=estado&id=<?= $id; ?>">
                                <button class="btn btn-dark btn-table" data-toggle="popover" data-content="Encaminhar processo"><i class="fas fa-truck-moving"></i></button>
                              </a>
                              <a href="processos_exant.php?func=historico&id=<?= $id; ?>&id_req=<?= $id_req; ?>">
                                <button class="btn btn-info btn-table" data-toggle="popover" data-content="Histórico"><i class="fas fa-eye"></i>
                                </button>
                              </a>
                              <!--<a href="rel/historico_processo_exant.php?id=<?= $id; ?>&id_req=<?= $id_req; ?>" target="_blank" rel=”noopener” id="tableButton"><button class="btn btn-light btn-table" data-toggle="popover" data-content="HTML"><span class="material-icons">print</span></button></a>-->
                              <a href="rel/historico_exant_pdf.php?id=<?= $id; ?>&id_req=<?= $id_req; ?>" target="_blank" rel=”noopener”>
                                <button class="btn btn-primary btn-table" data-toggle="popover" data-content="PDF"><i class="fas fa-file-pdf"></i></button>
                              </a>
                              <a href="processos_exant.php?func=edita&id=<?= $id; ?>&id_req=<?= $id_req; ?>">
                                <button class="btn btn-warning btn-table" data-toggle="popover" data-content="Editar"><i class="fas fa-tools"></i></button>
                              </a>
                              <a href="processos_exant.php?func=deleta&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');" id="tableButton">
                                <button class="btn btn-danger btn-table" data-toggle="popover" data-content="Excluir"><i class="far fa-trash-alt"></i></button>
                              </a>
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
                <div class="card-footer clearfix" style="font-size: 12px;">
                  Prazo de cada seção:
                  <?php
                  $query_prazo2 = "SELECT * FROM tb_secoes_exant";
                  $result_prazo2 = mysqli_query($conexao, $query_prazo2);
                  while ($res_prazo2 = mysqli_fetch_array($result_prazo2)) {
                    echo "<span style='margin-right: 5px; padding: 2px;'>" . "<b>" . $res_prazo2['secao'] . "</b>: " . $res_prazo2['prazo_exant'] . " dias " . "</span>";
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
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
                    <div class="form-group col-sm-7">
                      <label for="">Requerente</label>
                      <select class="form-control select2" name="txtcpf" required>
                        <option value="" disabled selected hidden>Selecione o requerente...</option>
                        <?php
                        $query = "SELECT * FROM requerentes ORDER BY nome ASC";
                        $result = mysqli_query($conexao, $query);
                        while ($res_1 = mysqli_fetch_array($result)) {
                        ?>
                          <option value="<?= $res_1['id']; ?>"><?= $res_1['saram']; ?> | <?= $res_1['nome']; ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group col-sm-5">
                      <label for="fornecedor">Usuário</label>
                      <?php
                      $id_perfil = $_SESSION['id_perfil'];
                      $id_militar = $_SESSION['id_militar'];
                      $query = "SELECT * FROM militares WHERE id = '$id_militar' AND perfil = '$id_perfil'";
                      $result = mysqli_query($conexao, $query);
                      $res_1 = mysqli_fetch_array($result);
                      ?>
                      <input type="text" class="form-control mr-2" name="funcionario" value="<?= $_SESSION['nome_usuario'] ?>" disabled>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="form-group col-sm-3">
                      <label for="quantidade">NUP</label>
                      <input type="text" class="form-control mr-2" id="txtnup" name="txtnup" placeholder="00000.000000/0000-00" autocomplete="off" required>
                    </div>
                    <div class="col-sm-2"></div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="form-group col-sm-5">
                      <label for="quantidade">Data de Abertura</label>
                      <input type="date" class="form-control" name="txtdatacriacao" placeholder="Data de Abertura" required>
                    </div>
                    <div class="form-group col-sm-7">
                      <label>Direito Pleiteado</label>
                      <select class="form-control select2" id="txtdireitopleiteado" name="txtdireitopleiteado" required>
                        <option value="" disabled selected hidden>Direito Pleiteado</option>
                        <?php
                        $query_direito = "SELECT * FROM tb_direitoPleiteado_exant where status = 'Aprovado' ORDER BY direito";
                        $result_direito = mysqli_query($conexao, $query_direito);
                        while ($res_dir = mysqli_fetch_array($result_direito)) {
                          $id = $res_dir['id'];
                          $direito = $res_dir['direito'];
                        ?>
                          <option value="<?= $id ?>"><?= $direito ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label>Seção de Origem</label>
                      <select class="form-control select2" id="txtsecaoorigem" name="txtsecaoorigem" required>
                        <option value="" disabled selected hidden>Seção que abriu o processo...</option>
                        <?php
                        $query_secao = "SELECT * FROM tb_secoes_exant WHERE status = 'Aprovado'";
                        $result_secao = mysqli_query($conexao, $query_secao);
                        while ($res_2 = mysqli_fetch_array($result_secao)) {
                          $id = $res_2['id'];
                          $secao = $res_2['secao'];
                        ?>
                          <option value="<?= $id ?>"><?= $secao ?></option>
                        <?php
                        }
                        ?>
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
                      <input type="text" class="form-control mr-2" id="txtestado" name="txtestado" value="<?= $res_estado["estado"]; ?>" disabled>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm" name="button" style="text-transform: capitalize;"><i class="fas fa-check"></i> Salvar
                </button>
                <button type="button" class="btn btn-light btn-sm" data-dismiss="modal" style="text-transform: capitalize;"><i class="fas fa-times"></i> Cancelar
                </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <footer class="main-footer">
      <?php footer() ?>
    </footer>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
  </div>
  <?= javascript('../../') ?>
  <script>
    $(document).ready(function() {
      $("#example1").DataTable({
        "scrollX": false,
        "scrollY": "350px",
        "paging": false,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": false,
        "autoWidth": false,
      });
    });
  </script>
</body>

</html>

<?php
if (isset($_POST['button'])) {
  $cpf = $_POST['txtcpf'];
  $sacador = $_POST['funcionario'];
  $nup = $_POST['txtnup'];
  $data_criacao = $_POST['txtdatacriacao'];
  $direito = $_POST['txtdireitopleiteado'];
  $secao_origem = $_POST['txtsecaoorigem'];
  $estado = $_POST['txtestado'];

  // Verificar se o NUP já está cadastrado
  $query_nup = "SELECT * FROM exercicioanterior WHERE nup = '$nup'";
  $result_nup = mysqli_query($conexao, $query_nup);
  $row_nup = mysqli_num_rows($result_nup);

  if ($row_nup > 0) {
    Alerta("info", "O NUP já existe!", false, "processos_exant.php");
    exit();
  }

  $query = "INSERT INTO exercicioanterior (saram, cpf, requerente, sacador, nup, data_criacao, direito_pleiteado, secao_origem, data_saida, estado, secao_atual) VALUES ('$cpf', '$cpf', '$cpf', '$id_militar', '$nup', '$data_criacao', '$direito', '$secao_origem','$data_criacao', '$id_estado', '$secao_origem')";

  $result = mysqli_query($conexao, $query);

  if ($result == '') {
    Alerta("error", "Não foi possível cadastrar!", false, "processos_exant.php");
  } else {
    Alerta("success", "Salvo com sucesso!", false, "processos_exant.php");
  }

  //Função para EXCLUIR o registro
} else if (@$_GET['func'] == 'deleta') {
  $id = $_GET['id'];
  $query = "DELETE FROM exercicioanterior WHERE id = '$id'";
  mysqli_query($conexao, $query);
  Alerta("success", "Excluído com sucesso!", false, "processos_exant.php");

  //Função para EDITAR o registro
} else if (@$_GET['func'] == 'edita') {
  $id_ed = $_GET['id'];
  $query_ed = "SELECT e.id, e.saram, e.cpf, e.requerente, e.sacador, e.nup, e.data_criacao, e.direito_pleiteado, e.secao_origem, e.obs, e.data_saida, e.estado, e.secao_atual, r.id as id_req, r.posto as req_posto, r.situacao as req_situacao, r.saram as req_saram, r.cpf as req_cpf, r.nome as req_nome, r.dt_nascimento as data_nascimento, m.id as id_mil, m.nome as mil_nome, d.id as id_dir, d.direito as dir_direito, s.id as id_sec, s.secao as sec_origem, est.id as id_est, est.estado as est_estado from exercicioanterior as e LEFT JOIN requerentes as r ON e.requerente = r.id LEFT JOIN militares as m ON e.sacador = m.id LEFT JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id LEFT JOIN tb_secoes_exant as s ON e.secao_origem = s.id LEFT JOIN tb_estado_exant as est ON e.estado = est.id WHERE e.id = '$id_ed'";

  $result_ed = mysqli_query($conexao, $query_ed);
  $res_1 = mysqli_fetch_array($result_ed);
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
  $data_criacao = $res_1["data_criacao"];
  $direito_pleiteado = $res_1["dir_direito"];
  $secao_origem = $res_1["sec_origem"];
  $obs = $res_1["obs"];
  $data_saida = $res_1["data_saida"];
  $estado = $res_1["est_estado"];
  $secao_atual = $res_1['secao_atual'];
?>
  <!-- Modal -->
  <div id="modalEditar" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <?php
          $id_req = $_GET['id_req'];
          $query_req = "SELECT r.posto, r.situacao, r.nome, p.id, p.posto as nome_posto FROM requerentes as r LEFT JOIN tb_posto as p ON p.id = r.posto WHERE r.id = '$id_req'";
          $result_req = mysqli_query($conexao, $query_req);
          $res_req = mysqli_fetch_array($result_req);
          $nome = $res_req['nome'];
          $posto = $res_req['nome_posto'];
          $situacao = $res_req["situacao"];
          ?>
          <h4 class="modal-title" style="text-align:center; width: 100%;">Dados do(a):
            <strong><?= $res_req["nome_posto"], " ", $res_req["situacao"], " ", $res_req["nome"] ?></strong>
          </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form method="POST" action="">
            <div class="row">
              <div class="form-group col-sm-7">
                <label for="">Requerente</label>
                <select class="form-control select2" name="txtcpf2" required>
                  <option value="<?= $res_1["id_req"]; ?>" selected><?= $res_1["req_saram"]; ?> | <?= $res_1["req_nome"]; ?></option>
                  <?php
                  $query_consulta_requerente = "SELECT * FROM requerentes ORDER BY nome asc";
                  $result_consulta_requerente = mysqli_query($conexao, $query_consulta_requerente);
                  while ($res_consulta_requerente = mysqli_fetch_array($result_consulta_requerente)) {
                  ?>
                    <option value="<?= $res_consulta_requerente['id']; ?>"><?= $res_consulta_requerente['saram'] . " | " . $res_consulta_requerente['nome']; ?></option>
                  <?php
                  } ?>
                </select>
              </div>
              <div class="form-group col-sm-5">
                <label for="fornecedor">Usuário</label>
                <?php
                $id_perfil2 = $_SESSION['id_perfil'];
                $id_militar2 = $_SESSION['id_militar'];
                $query = "SELECT * FROM militares WHERE id = '$id_militar2' AND perfil = '$id_perfil2'";
                $result = mysqli_query($conexao, $query);
                $res_row = mysqli_fetch_array($result);
                ?>
                <input type="text" class="form-control mr-2" name="funcionario2" value="<?= $_SESSION['nome_usuario'] ?>" disabled>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="form-group col-sm-3">
                <label for="quantidade">NUP</label>
                <input type="text" class="form-control mr-2" id="txtnup2" name="txtnup2" placeholder="00000.000000/0000-00" value="<?= $res_1["nup"]; ?>" required>
              </div>
              <div class="col-sm-2"></div>
              <div class="form-group col-sm-7">
                <div class="col-sm-2"></div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="form-group col-sm-5">
                <label for="quantidade">Data de Abertura</label>
                <input type="date" class="form-control" name="txtdatacriacao2" placeholder="Data de Abertura" value="<?= $res_1['data_criacao']; ?>" required>
                <!--<input class="form-control" type="text" id="datepicker" name="txtdatacriacao2" placeholder="Data de Abertura" value="<?php data_show($res_1['data_criacao']); ?>">-->
              </div>
              <div class="form-group col-sm-7">
                <label>Direito Pleiteado</label>
                <select class="form-control select2" id="txtdireitopleiteado2" name="txtdireitopleiteado2" required>
                  <option value="<?= $res_1["id_dir"]; ?>" selected><?= $res_1["dir_direito"]; ?></option>
                  <?php
                  $query_direito = "SELECT * FROM tb_direitoPleiteado_exant WHERE status = 'Aprovado' ORDER BY direito ASC";
                  $result_direito = mysqli_query($conexao, $query_direito);
                  while ($res_dir = mysqli_fetch_array($result_direito)) {
                    $id_direito = $res_dir['id'];
                    $direito_direito = $res_dir['direito'];
                  ?>
                    <option value="<?= $id_direito ?>"><?= $direito_direito ?></option>
                  <?php
                  } ?>
                </select>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="form-group col-sm-6">
                <label>Seção de Origem</label>
                <select class="form-control select2" id="txtsecaoorigem2" name="txtsecaoorigem2" required>
                  <option value="<?= $res_1['id_sec']; ?>" selected><?= $res_1['sec_origem']; ?></option>
                  <?php
                  $query_secao = "SELECT * FROM tb_secoes_exant WHERE status = 'Aprovado'";
                  $result_secao = mysqli_query($conexao, $query_secao);
                  while ($res_secao = mysqli_fetch_array($result_secao)) {
                    $id_secao = $res_secao['id'];
                    $secao_secao = $res_secao['secao'];
                  ?>
                    <option value="<?= $id_secao ?>"><?= $secao_secao ?></option>
                  <?php
                  } ?>
                </select>
              </div>
              <div class="form-group col-sm-6">
                <label for="quantidade">Estado do Processo</label>
                <input type="text" class="form-control mr-2" id="txtestado2" name="txtestado2" value="<?= $res_1["est_estado"]; ?>" disabled>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-sm" id="buttonEditar" name="buttonEditar" style="text-transform: capitalize;"><i class="fas fa-check"></i> Salvar
              </button>
              <button type="button" class="btn btn-light btn-sm" data-dismiss="modal" style="text-transform: capitalize;"><i class="fas fa-times"></i> Cancelar
              </button>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script>
    $("#modalEditar").modal("show");
  </script>
  <?php
  if (isset($_POST['buttonEditar'])) {
    $cpf_edita = $_POST['txtcpf2'];
    $sacador_edita = $_POST['funcionario2'];
    $nup_edita = $_POST['txtnup2'];
    $data_criacao_edita = $_POST['txtdatacriacao2'];
    $direito_edita = $_POST['txtdireitopleiteado2'];
    $secao_origem_edita = $_POST['txtsecaoorigem2'];

    if ($res_1['nup'] != $nup_edita) {
      $query_verificar = "SELECT * FROM exercicioanterior WHERE nup = '$nup_edita'";
      $result_verificar = mysqli_query($conexao, $query_verificar);
      $dado_verificar = mysqli_fetch_array($result_verificar);
      $row_verificar = mysqli_num_rows($result_verificar);

      if ($row_verificar > 0) {
        Alerta("info", "NUP já existe!", false, "processos_exant.php");
        exit();
      }
    }

    $query_editar = "UPDATE exercicioanterior set saram = '$cpf_edita', cpf = '$cpf_edita', requerente = '$cpf_edita', nup = '$nup_edita', data_criacao = '$data_criacao_edita', direito_pleiteado = '$direito_edita', secao_origem = '$secao_origem_edita' where id = '$id_ed'";

    $result_editar = mysqli_query($conexao, $query_editar);

    if ($result_editar == '') {
      Alerta("error", "Não foi possível editar!", false, "processos_exant.php");
    } else {
      Alerta("success", "Editado com sucesso!", false, "processos_exant.php");
    }
  }
  // Função para ALTERAR ESTADO do processo.
} elseif (@$_GET['func'] == 'estado') {
  $idSetEstado = $_GET['id'];
  $query = "SELECT e.id, e.secao_origem, e.obs, e.data_saida, e.estado, e.secao_atual, s.id as id_sec, s.secao as sec_origem, sec.secao as sec_atual, est.id as id_est, est.estado as est_estado from exercicioanterior as e LEFT JOIN tb_secoes_exant as s ON e.secao_origem = s.id LEFT JOIN tb_secoes_exant as sec ON e.secao_atual = sec.id LEFT JOIN tb_estado_exant as est ON e.estado = est.id where e.id = '$idSetEstado'";
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
  $data_saida = $res_1["data_saida"];
  $obs = $res_1["obs"];
  $estado = $res_1["est_estado"];
  $secao_atual = $res_1['sec_atual'];
  $result = mysqli_query($conexao, $query);
  while ($res_1 = mysqli_fetch_array($result)) {
  ?>
    <div id="modalEstado" class="modal fade" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><i class="far fa-folder-open"></i>Alterar ESTADO do Processo</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">
              <div class="row">
                <div class="form-group col-sm-5">
                  <label for="fornecedor">Responsável</label>
                  <?php
                  $id_militar3 = $_SESSION['id_militar'];
                  $query = "SELECT * FROM militares WHERE id = '$id_militar3'";
                  $result = mysqli_query($conexao, $query);
                  $res_row = mysqli_fetch_array($result);
                  ?>
                  <input type="text" class="form-control mr-2" name="funcionario3" value="<?= $_SESSION['nome_usuario'] ?>" disabled>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-5">
                  <label for="">Dt. Último Movimento</label>
                  <input type="date" class="form-control mr-2" value="<?= $res_1["data_saida"]; ?>" disabled>
                </div>
                <div class="col-sm-2" style="text-align: center;">
                  <label for=""></label>
                  <h1><i class="fas fa-angle-double-right"></i></h1>
                </div>
                <div class="form-group col-sm-5">
                  <label for="">Data</label>
                  <input type="date" class="form-control mr-2" id="txtdataatual" name="txtdataatual" required>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-5">
                  <label for="quantidade">Seção Atual</label>
                  <input type="text" class="form-control mr-2" id="txtsecaoatual" name="txtsecaoatual" value="<?= $res_1["sec_atual"]; ?>" disabled>
                </div>
                <div class="col-sm-2" style="text-align: center;">
                  <label for=""></label>
                  <h1><i class="fas fa-angle-double-right"></i></h1>
                </div>
                <div class="form-group col-sm-5">
                  <label>Seção de Destino</label>
                  <select class="form-control select2" id="txtnovasecao" name="txtnovasecao" required>
                    <option value="" disabled selected hidden>Selecione a nova Seção...
                    </option>
                    <?php
                    $query_sec = "SELECT * FROM tb_secoes_exant WHERE status = 'Aprovado'";
                    $result_sec = mysqli_query($conexao, $query_sec);
                    while ($res_sec = mysqli_fetch_array($result_sec)) {
                      $id_sec_2 = $res_sec['id'];
                      $secao_sec = $res_sec['secao'];
                    ?>
                      <option value="<?= $id_sec_2 ?>"><?= $secao_sec ?></option>
                    <?php
                    } ?>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-5">
                  <label for="quantidade">Estado Atual</label>
                  <input type="text" class="form-control mr-2" id="txtestado" name="txtestado" value="<?= $res_1["est_estado"]; ?>" disabled>
                </div>
                <div class="col-sm-2" style="text-align: center;">
                  <label for=""></label>
                  <h1><i class="fas fa-angle-double-right"></i></h1>
                </div>
                <div class="form-group col-sm-5">
                  <label>Novo estado do Processo</label>
                  <select class="form-control select2" id="txtnovoestado" name="txtnovoestado" required>
                    <option value="" disabled selected hidden>Selecione o novo estado do Processo...
                    </option>
                    <?php
                    $query_est = "SELECT * FROM tb_estado_exant WHERE status = 'Aprovado' ORDER BY estado ASC";
                    $result_est = mysqli_query($conexao, $query_est);
                    while ($res_est = mysqli_fetch_array($result_est)) {
                      $id_est_2 = $res_est['id'];
                      $estado_est = $res_est['estado'];
                    ?>
                      <option value="<?= $id_est_2 ?>"><?= $estado_est ?></option>
                    <?php
                    } ?>
                  </select>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="form-group col-12">
                  <label>Observação</label>
                  <textarea class="form-control" id="textobs" name="txtobs" rows="3" style="text-align: justify; font-size:12px;" placeholder="Digite uma observação..."></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm" name="buttonEstado" style="text-transform: capitalize;"><i class="fas fa-check"></i> Salvar
                </button>
                <button type="button" class="btn btn-light btn-sm" data-dismiss="modal" style="text-transform: capitalize;"><i class="fas fa-times"></i> Cancelar
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script>
      $("#modalEstado").modal("show");
    </script>
  <?php
    if (isset($_POST['buttonEstado'])) {
      $novoestado = $_POST['txtnovoestado'];
      $estadoatual = $_POST['txtestado'];
      $novasecao = $_POST['txtnovasecao'];
      $data_atual = $_POST['txtdataatual'];
      $obs = $_POST['txtobs'];
      $query_estado = "UPDATE exercicioanterior set sacador = '$id_militar3', obs = '$obs', data_saida = '$data_atual', estado = '$novoestado', secao_atual = '$novasecao' WHERE id = '$idSetEstado'";
      $result_estado = mysqli_query($conexao, $query_estado);
      if ($result_estado == '') {
        Alerta("error", "Não foi possível editar", false, "processos_exant.php");
      } else {
        Alerta("success", "Alterado com sucesso!", false, "processos_exant.php");
      }
    }
  }

  //comando para CONSULTAR HISTÓRICO do processo
} elseif (@$_GET['func'] == 'historico') {
  $idConsultHistorico = $_GET['id'];
  $queryConsultHistorico = "SELECT * FROM exercicioanterior WHERE id = '$idConsultHistorico'";
  $resultConsultHistorico = mysqli_query($conexao, $queryConsultHistorico);
  $res_ConsultHistorico = mysqli_fetch_array($resultConsultHistorico);
  $nup = $res_ConsultHistorico["nup"];
  ?>
  <div id="modalHistorico" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header align-middle">
          <?php
          $id_req = $_GET['id_req'];
          $query_req = "SELECT r.posto, r.situacao, r.nome, p.id, p.posto as nome_posto FROM requerentes as r LEFT JOIN tb_posto as p ON p.id = r.posto WHERE r.id = '$id_req'";
          $result_req = mysqli_query($conexao, $query_req);
          $res_req = mysqli_fetch_array($result_req);
          $nome = $res_req['nome'];
          $posto = $res_req['nome_posto'];
          $situacao = $res_req["situacao"];
          ?>
          <div class="col-sm-0">
            <h2>
              <div class="modal-title"></div>
            </h2>
          </div>
          <div class="col-sm-10">
            <h5><i class="far fa-user"></i> Requerente:
              <strong><?= $posto ?> <?= $situacao ?> <?= $nome ?></strong></h5>
            <h5><i class="far fa-folder-open"></i> Processo nº: <strong><?= $nup ?></strong></h5>
          </div>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form method="POST" action="">
            <div class="table-responsive" style="border-radius: 3px; margin: 20px; width: 95%;">
              <?php
              $query_h = "SELECT h.id as id_hist, h.data_anterior, h.data_novo, h.id_exant, h.responsavel, m.id as id_militar, m.nome as nome_militar, h.estado_anterior, h.estado_novo, h.secao_anterior, h.secao_novo, h.obs_exant, e.id, e.nup as e_nup, es.id as es_id, es.estado as es_anterior, est.estado as est_novo, s.id as s_id_anterior, s.secao as s_anterior, s.prazo_exant as prazo_secao_exant, sec.secao as sec_novo FROM tb_historico_exant_estado_secao as h LEFT JOIN exercicioanterior as e ON h.id_exant = e.id LEFT JOIN tb_estado_exant as es ON h.estado_anterior = es.id LEFT JOIN tb_estado_exant as est ON h.estado_novo = est.id LEFT JOIN tb_secoes_exant as s ON h.secao_anterior = s.id LEFT JOIN tb_secoes_exant as sec ON h.secao_novo = sec.id LEFT JOIN militares as m ON h.responsavel = m.id WHERE id_exant = '$idConsultHistorico' ORDER BY h.data_novo";
              $result_h = mysqli_query($conexao, $query_h);
              $row_h = mysqli_num_rows($result_h);
              ?>
              <table class="table table-sm table-borderless table-striped">
                <thead class="text-primary" style="text-align: center;">
                  <tr>
                    <th class="align-middle">Movimento</th>
                    <th class="align-middle">Observação</th>
                    <th class="align-middle">Dt. Movimento</th>
                    <th class="align-middle">Dt. Prazo</th>
                    <th class="align-middle">Meta</th>
                    <th class="align-middle">Responsável</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($res_h = mysqli_fetch_array($result_h)) {
                    $id_hist = $res_h["id_hist"];
                    $data_anterior = $res_h["data_anterior"];
                    $data_novo = $res_h["data_novo"];
                    $id_exant = $res_h["e_nup"];
                    $nome_sacador = $res_h["nome_militar"];
                    $old_estado = $res_h["es_anterior"];
                    $new_estado = $res_h["est_novo"];
                    $old_secao = $res_h["s_anterior"];
                    $new_secao = $res_h["sec_novo"];
                    $obs_exant = $res_h["obs_exant"];

                    $queryPrazo2 = "SELECT prazo_exant FROM tb_secoes_exant WHERE secao = '$old_secao'";
                    $resultPrazo2 = mysqli_query($conexao, $queryPrazo2);
                    $resPrazo2 = mysqli_fetch_array($resultPrazo2);
                    $prazoSecao2 = $resPrazo2['prazo_exant'];
                    $dtPrazoSecao_cons = date('Y-m-d', strtotime('+' . $prazoSecao2 . ' days', strtotime($res_h["data_anterior"])));
                    $today_cons = date('Y-m-d');
                  ?>
                    <tr>
                      <td class="align-middle" style="width: 12.1%; text-align: justify;">
                        <?php
                        if ($old_secao == "") {
                          echo 'Criado na: ' . '<br>';
                          echo '<b>' . $new_secao . '</b>';
                        } else {
                          echo 'De:   ' . '<b>' . $old_secao . '</b><br>';
                          echo 'Para: ' . '<b>' . $new_secao . '</b><br>';
                        } ?>
                      </td>
                      <td class="align-middle" style="text-align: justify;">
                        <strong><?= $new_estado; ?></strong><br>
                        <?php
                        if ($res_h["obs_exant"] == '') {
                          echo 'Não há';
                        } else { ?>
                          <span><?= $obs_exant; ?> </span>
                        <?php
                        }
                        ?>
                      </td>
                      <td class="align-middle" style="text-align: center;">
                        <?= data($data_novo); ?>
                      </td>
                      <td class="align-middle" style="text-align:center;">
                        <?php
                        if ($old_secao == '') {
                          echo '----------';
                        } else {
                          echo data($dtPrazoSecao_cons);
                        } ?>
                      </td>
                      <?php
                      if ($old_secao == '') {
                        echo '<td class="align-middle" style="background-color: rgba(0, 128, 0, 0.3); text-align:center;">Criado</td>';
                      } elseif (diferenca($dtPrazoSecao_cons, $data_novo) < 0) {
                        echo '<td class="align-middle" style="background-color: rgba(255,0,0, 0.3); text-align:center;">' . number_format(diferenca($dtPrazoSecao_cons, $data_novo), 0) . '</td>';
                      } elseif (diferenca($dtPrazoSecao_cons, $data_novo) >= 0) {
                        echo '<td class="align-middle" style="background-color: rgba(0, 128, 0, 0.3); text-align:center;">' . number_format(diferenca($dtPrazoSecao_cons, $data_novo)) . '</td>';
                      } else {
                        echo '<td class="align-middle" style="text-align:center;">' . number_format(diferenca($dtPrazoSecao_cons, $data_novo)) . '</td>';
                      }
                      ?>
                      <td class="align-middle" style="text-align: center;">
                        <?= $nome_sacador; ?>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <a class="btn btn-primary btn-sm" type="button" href="rel/historico_exant_pdf.php?id=<?= $id; ?>&id_req=<?= $id_req; ?>&nup=<?= $nup; ?>" target="_blank" rel=”noopener style="margin-right: 5px;"><i class="far fa-file-pdf"></i>
                Gerar PDF</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    $("#modalHistorico").modal("show");
  </script>
<?php } ?>