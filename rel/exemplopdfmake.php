<?php
session_start();
include('../verificar_login.php');
include('../conexao.php');
if ($_SESSION['perfil_usuario'] != 'EXANT') {
  header('Location: ../index.php');
  exit();
}

$id = $_GET['id'];
$id_req = $_GET['id_req'];

$query     = "SELECT * FROM exercicioanterior where id = '$id'";
$result    = mysqli_query($conexao, $query);
$res_nup   = mysqli_fetch_array($result);
$nup       = $res_nup["nup"];

$id_req = $_GET['id_req'];
$query_req = "select * from requerentes where id = '$id_req'";
$result_req = mysqli_query($conexao, $query_req);
//$dado = mysqli_fetch_array($result);
$row_req = mysqli_num_rows($result_req);
$res_1 = mysqli_fetch_array($result_req);
$requerente = $res_1['nome'];
$posto = $res_1['posto'];
$situacao = $res_1["situacao"];

function data($data)
{
  return date("d/m/Y", strtotime($data));
}
?>
<script src='../plugins/pdfmake/pdfmake.min.js'></script>
<script src='../plugins/pdfmake/vfs_fonts.js'></script>
<script>
  var docDefinition = {
    content: [
      // if you don't need styles, you can use a simple string to define a paragraph
      'This is a standard paragraph, using default style',

      // using a { text: '...' } object lets you set styling properties
      {
        text: '<?php echo $nup ?>',
        fontSize: 15
      },

      // if you set the value of text to an array instead of a string, you'll be able
      // to style any part individually
      {
        text: [
          'This paragraph is defined as an array of elements to make it possible to ',
          {
            text: 'restyle part of it and make it bigger ',
            fontSize: 15
          },
          'than the rest.'
        ]
      }
    ]
  };
  pdfMake.createPdf(docDefinition).download();
</script>