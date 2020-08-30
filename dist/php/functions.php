<?php
date_default_timezone_set('America/Sao_paulo');

function Alerta($type, $title, $msg, $location)
{
  echo "<script type='text/javascript'>
        Swal.fire({
          type: '$type',
          title: '$title',
          text: '$msg',
          showConfirmButton: false          
        });
        setTimeout(function() {
          window.location='$location';
        }, 1500);
        </script>";
}

function AlertaConsulta($type, $title, $msg)
{
  echo "<script type='text/javascript'>
        Swal.fire({
          type: '$type',
          title: '$title',
          text: '$msg',
          showConfirmButton: false,
          timer: 1500          
        });        
        </script>";
}

function AlertaExcluir($type, $title, $msg, $location)
{
  echo "<script type='text/javascript'>
        Swal.fire({
        title: '$title',
        text: '$msg',
        icon: '$type',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
        }
      },
       window.location='$location'
    )      
      </script>";
}

function AlertaLocation($type, $title, $msg, $location)
{
  echo "<script type='text/javascript'>
        Swal.fire({
          type: '$type',
          title: '$title',
          text: '$msg',
          showConfirmButton: false,          
          timer: 1500
        },
        function (){
        window.location.href='$location'
        });
        </script>";
}

function Toast($type, $title)
{
  echo "<script>  
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000
      });     
      Toast.fire({
        type: '$type',
        title: '$title'
      })
    });  
</script>";
}

function AnoAtual()
{
  return date("Y") . " ";
}

function data($data)
{
  return date("d/m/Y", strtotime($data));
}

function data_show($data)
{
  $data = implode('/', array_reverse(explode('-', $data)));
  return $data;
}

function data_db($data)
{
  $data = implode('-', array_reverse(explode('/', $data)));
  return $data;
}

function data2()
{
  $dia = date('d');
  $mes = date('m');
  $ano = date('Y');

  switch ($mes) {

    case 1:
      $mes = "janeiro";
      break;
    case 2:
      $mes = "fevereiro";
      break;
    case 3:
      $mes = "março";
      break;
    case 4:
      $mes = "abril";
      break;
    case 5:
      $mes = "maio";
      break;
    case 6:
      $mes = "junho";
      break;
    case 7:
      $mes = "julho";
      break;
    case 8:
      $mes = "agosto";
      break;
    case 9:
      $mes = "setembro";
      break;
    case 10:
      $mes = "outubro";
      break;
    case 11:
      $mes = "novembro";
      break;
    case 12:
      $mes = "dezembro";
      break;
  }
  print("$dia de $mes de $ano");
}

function diferenca($a, $b)
{
  return (strtotime($a) - strtotime($b)) / (60 * 60 * 24);
}

function descobrirIdade($dataNascimento)
{
  $dn = new DateTime($dataNascimento);
  $agora = new DateTime();

  $idade = date_diff($agora, $dn);
  return $idade->y;
}

function tempoMedioSecao($conn)
{
  $queryTempoMedio = "SELECT h.id, h.id_exant, AVG(DATEDIFF(h.data_novo, h.data_anterior)) AS difData, s.id AS id_secao, s.secao AS nome_secao FROM tb_historico_exant_estado_secao AS h LEFT JOIN tb_estado_exant AS e ON h.estado_novo = e.id LEFT JOIN tb_secoes_exant AS s ON h.secao_anterior = s.id WHERE h.id_exant IN (SELECT id FROM exercicioanterior) AND h.id_exant NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY s.id";

  $resultTempoMedio = mysqli_query($conn, $queryTempoMedio);
  $countRows = mysqli_num_rows($resultTempoMedio);
  if ($countRows == 0) {
    echo 'Não existem dados para serem exibidos';
  } else {
?>
    <table class="table table-sm table-borderless table-striped" id="example1" style="width: 200px; height:200px; text-align: center;">
      <thead class="text-primary">
        <tr>
          <th class="align-middle">Seção</th>
          <th class="align-middle">T. Médio (dias)</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($resTempoMedio = mysqli_fetch_array($resultTempoMedio)) {
          $nomeSecao = $resTempoMedio['nome_secao'];
          $avgSecao = number_format($resTempoMedio['difData'], 0, ',', '.');
        ?>
          <tr>
            <td class="align-middle"><?= $nomeSecao; ?></td>
            <td class="align-middle"><?= $avgSecao; ?></td>
          </tr>
        <?php
        } ?>
      </tbody>
    </table>
<?php
  }
}
