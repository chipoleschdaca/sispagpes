<?php
include('../conexao.php');
session_start();

$id = $_GET['id'];

$query = "select o.id, o.requerente, o.tecnico, o.produto, o.serie, o.problema, o.laudo, o.obs, o.valor_servico, o.pecas, o.valor_pecas, o.total, o.desconto, o.valor_total, o.pgto, o.data_abertura, o.data_geracao, o.data_aprovacao, o.status, c.nome as req_nome, f.nome as func_nome from orcamentos as o INNER JOIN requerentes as c on o.requerente = c.cpf INNER JOIN militares as f on o.tecnico = f.id where o.id = '$id' order by id asc";

$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);
$res_1 = mysqli_fetch_array($result);
//$id = $res_1['id'];
$requerente = $res_1["req_nome"];
$tecnico = $res_1["func_nome"];
$produto = $res_1["produto"];
$serie = $res_1["serie"];
$problema = $res_1["problema"];
$laudo = $res_1["laudo"];
$obs = $res_1["obs"];
$pecas = $res_1["pecas"];
$valor_pecas = $res_1["valor_pecas"];
$total = $res_1["total"];
$desconto = $res_1["desconto"];
$valor_total = $res_1["valor_total"];
$pgto = $res_1["pgto"];
$data_abertura = $res_1['data_abertura'];
$data_geracao = $res_1["data_geracao"];
$data_aprovacao = $res_1["data_aprovacao"];
$status = $res_1["status"];
$data2 = implode('/', array_reverse(explode('-', $data_abertura)));

//Se eu coloco o $id como res_1 ele pega sempre o primeiro id da lista, mas se eu coloco como $_GET, ele pega o id correto, mas traz os dados somente do primeiro id.

function data($data){
    return date("d/m/Y", strtotime($data));
}
?>

<!DOCTYPE html>
<html>
<head lang="pt-br">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Orçamento nº <?php echo $id ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper" style="border: 2px solid #000; padding: 10px;">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-globe"></i> AdminLTE, Inc.          
          <small class="float-right">Data: <?php echo data($data_abertura) ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-3 invoice-col">
        Requerente:
        <address>          
          <strong><?php echo $requerente ?></strong><br>
          795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Phone: (804) 123-5432<br>
          Email: info@almasaeedstudio.com
        </address>
      </div>      
      <div class="col-6 invoice-col">
        Sacador:
        <address>
          <strong><?php echo $tecnico ?></strong><br>
          795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Phone: (555) 539-1037<br>
          Email: john.doe@example.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-3 invoice-col float-right">
        <b>Invoice #<?php echo $serie ?> </b><br>
        <br>
        <?php
          if ($status == 'Aberto') { ?>
            <span class="badge badge-secondary">
              <?php echo $status; ?>
            </span>
            <?php
          } elseif ($status == 'Aguardando') { ?>
            <span class="badge badge-warning">
              <?php echo $status; ?>
            </span>
            <?php
          } elseif ($status == 'Aprovado') { ?>
            <span class="badge badge-success">
              <?php echo $status; ?>
            </span>
            <?php
          } elseif ($status == 'Cancelado') { ?>
            <span class="badge badge-danger">
              <?php echo $status; ?>
            </span>
            <?php
          } else {
            echo $status;
          }
          ?><br>
        <b>Order ID:</b> 4F3S8J<br>
        <b>Payment Due:</b> 2/22/2014<br>
        <b>Account:</b> 968-34567
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Qty</th>
            <th>Product</th>
            <th>Serial #</th>
            <th>Description</th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>1</td>
            <td>Call of Duty</td>
            <td>455-981-221</td>
            <td>El snort testosterone trophy driving gloves handsome</td>
            <td>$64.50</td>
          </tr>
          <tr>
            <td>1</td>
            <td>Need for Speed IV</td>
            <td>247-925-726</td>
            <td>Wes Anderson umami biodiesel</td>
            <td>$50.00</td>
          </tr>
          <tr>
            <td>1</td>
            <td>Monsters DVD</td>
            <td>735-845-642</td>
            <td>Terry Richardson helvetica tousled street art master</td>
            <td>$10.70</td>
          </tr>
          <tr>
            <td>1</td>
            <td>Grown Ups Blue Ray</td>
            <td>422-568-642</td>
            <td>Tousled lomo letterpress</td>
            <td>$25.99</td>
          </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
        <p class="lead">Payment Methods:</p>
        <img src="../dist/img/credit/visa.png" alt="Visa">
        <img src="../dist/img/credit/mastercard.png" alt="Mastercard">
        <img src="../dist/img/credit/american-express.png" alt="American Express">
        <img src="../dist/img/credit/paypal2.png" alt="Paypal">
        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
      </div>
      <!-- /.col -->
      <div class="col-6">
        <p class="lead">Valor fechado em <?php echo data($data_aprovacao) ?></p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td>R$ <?php echo number_format($total, 2, ',', '.') ?></td>
            </tr>
            <tr>
              <th>Imposto (9.3%):</th>
              <td>$10.34</td>
            </tr>
            <tr>
              <th>Desconto:</th>
              <td>R$ <?php echo number_format($desconto, 2, ',', '.') ?></td>
            </tr>
            <tr>
              <th>Total:</th>
              <td>R$ <?php echo number_format($valor_total, 2, ',', '.')?></td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<div class="row no-print" align="center;">
    <div class="col-12">
      <a class="btn btn-default" href="#" onclick="window.print();"><i class="fas fa-print"></i> Imprimir</a>
      <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Enviar Pagamento</button>
      <button type="button" class="btn btn-primary float-right" onclick="" style="margin-right: 5px;"><i class="fas fa-download"></i> Gerar PDF</button>
    </div>
  </div>
</body>
</html>