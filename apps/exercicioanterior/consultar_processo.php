<?php
include '../../conexao.php';
include '../../dist/php/functions.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<?php include('../../dist/php/pageHead.php'); ?>
<style>
  .body {
    position: absolute;
  }

  body {
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-position-y: 50%;
    background-position-x: 50%;
  }

  #backgroundimage {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0.07;
  }

  .row2 {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
  }

  .form-inline {
    position: relative;
    padding: 0px;
    margin: 0px;
  }

  #txtsaram {
    background-color: transparent;
    border-radius: 3px;
    vertical-align: middle;
    margin-right: 10px;
    margin-bottom: 10px;
    height: 4rem;
  }

  .table-responsive {
    align-content: center;
    position: absolute;
    width: 80%;
    left: 50%;
    top: 9%;
    transform: translate(-50%, -9%);
  }

  .general-btn2 {
    background-color: transparent;
    width: 100px;
    height: 100px;
    padding: 0;
    margin-right: 10px;
    margin-bottom: 10px;
    text-align: center;
    border-radius: 5px;
    cursor: pointer;
    border: 0px solid #d6d8db;
    box-shadow: 5px 5px -5px -5px #00000070;
  }

  .general-btn2 img {
    vertical-align: middle;
    width: 4rem;
    height: 4rem;
    margin: 0;
  }

  .general-btn2:hover img {
    transform: scale(1.3);
  }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
  <section class="content">
    <div class="container-fluid">
      <br>
      <div>
        <img id="backgroundimage" src="../../dist/img/gapls1.png" />
      </div>
      <div class="row2">
        <form class="form-inline">
          <label for="txtsaram" style="margin-right: 10px;">
            <h4><b>SARAM:</b></h4>
          </label>
          <input type="search" class="form-control form-control-lg" id="txtsaram" name="txtsaram" placeholder="Digite o seu SARAM..." autocomplete="off">
          <button class="general-btn2" type="submit" name="buttonPesquisar"><img src="../../dist/icons/search-colored.svg"></button>
          <button class="general-btn2" type="button" onclick="window.location.href='consultar_processo.php';" id="novapesquisa" name="button"><img src="../../dist/icons/delete-colored.svg"></button>
        </form>
      </div>
      <?php
      if (isset($_GET['buttonPesquisar']) and $_GET['txtsaram'] != '') {

        $saram = $_GET['txtsaram'];
        $query = "SELECT e.id, e.saram, e.cpf, e.requerente, e.nup, e.direito_pleiteado, e.estado, e.secao_atual as id_sec_atual, r.id as id_req, r.saram as req_saram, r.cpf as req_cpf, r.nome as req_nome, d.direito as dir_direito, sec.secao as sec_atual, est.estado as est_estado from exercicioanterior as e LEFT JOIN requerentes as r on e.saram = r.id LEFT JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id LEFT JOIN tb_secoes_exant as s ON e.secao_origem = s.id LEFT JOIN tb_secoes_exant as sec ON e.secao_atual = sec.id LEFT JOIN tb_estado_exant as est ON e.estado = est.id WHERE r.saram = '$saram'";
        $result = mysqli_query($conexao, $query);
        $row = mysqli_num_rows($result);

        if ($row == 0) {
          Alerta("error", "Processo não encontrado!", false, "consultar_processo.php");
        } else {
      ?>
          <div class="row">
            <div class="table-responsive" style="text-align: center;">
              <table class="table table-sm table-bordered table-striped">
                <thead class="text-primary">
                  <th class="align-middle">Requerente</th>
                  <th class="align-middle">NUP</th>
                  <th class="align-middle">Direito Pleiteado</th>
                  <th class="align-middle">Estado</th>
                  <th class="align-middle">Seção Atual</th>
                </thead>
                <?php
                while ($res_1 = mysqli_fetch_array($result)) {
                  $id = $res_1["id"];
                  $id_req = $res_1["id_req"];
                  $requerente = $res_1["req_nome"];
                  $nup = $res_1["nup"];
                  $direito_pleiteado = $res_1["dir_direito"];
                  $estado = $res_1["est_estado"];
                  $id_sec_atual = $res_1['id_sec_atual'];
                  $secao_atual = $res_1['sec_atual'];
                ?>
                  <tbody>
                    <tr>
                      <td class="align-middle"><?php echo $requerente; ?></td>
                      <td class="align-middle"><?php echo $nup; ?></td>
                      <td class="align-middle"><?php echo $direito_pleiteado; ?></td>
                      <td class="align-middle">
                        <?php
                        if ($id_sec_atual == 6 || $secao_atual == 'SDPP') {
                          echo "Em conferência na SDPP";
                        } else {
                          echo 'Em trâmite no GAP-LS';
                        }
                        ?>
                      </td>
                      <td class="align-middle"><?php echo $secao_atual; ?></td>
                    </tr>
                  </tbody>
              <?php
                }
                AlertaConsulta("success", "Processo encontrado!", false);
              } ?>
              </table>
            <?php
          } else if (isset($_GET['buttonPesquisar']) and $_GET['txtsaram'] == '') {
            Alerta("error", "Processo não encontrado!", false, "consultar_processo.php");
          }
            ?>
            </div>
          </div>
    </div>
  </section>
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <script src="../../plugins/jquery-mask/dist/jquery.mask.js"></script>
  <script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <script src="../../plugins/select2/js/select2.full.min.js"></script>
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <script src="../../plugins/summernote/summernote-bs4.min.js"></script>
  <script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="../../dist/js/adminlte.js"></script>
  <script src="../../dist/js/pages/dashboard.js"></script>
  <script src="../../dist/js/demo.js"></script>
  <script>
    $(document).ready(function() {
      $('#txtsaram').mask('000.000-0', {
        reverse: true
      });
    });
  </script>
</body>

</html>