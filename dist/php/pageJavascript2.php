<script src="plugins/jquery/jquery.min.js"></script>
<script src="dist/js/adminlte.js"></script>
<script src="plugins/jquery-mask/dist/jquery.mask.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<script src="dist/js/validation.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="plugins/select2/js/select2.full.min.js"></script>
<script src="plugins/bootstrap-4.1.3/js/bootstrap.bundle.min.js"></script>
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="dist/js/myCharts.js"></script>
<script src="plugins/jquery-quicksearch/jquery.quicksearch.min.js"></script>
<script>
  $(document).ready(function() {
    $('#txtsaram').mask('000.000-0', {
      reverse: true
    });
    $('#txtcpf').mask('000.000.000-00', {
      reverse: true
    });
    $('#txtnup').mask('00000.000000/0000-00', {
      reverse: true
    });
    $('#txtsaram2').mask('000.000-0', {
      reverse: true
    });
    $('#txtcpf2').mask('000.000.000-00', {
      reverse: true
    });
    $('#txtnup2').mask('00000.000000/0000-00', {
      reverse: true
    });
    $('#txtsaram3').mask('000.000-0', {
      reverse: true
    });
    $('#txtcpf3').mask('000.000.000-00', {
      reverse: true
    });
    $('#txtdtnascimento').mask('00/00/0000', {
      reverse: true
    });
    $('#txtdtnascimento2').mask('00/00/0000', {
      reverse: true
    });
  });
</script>
<script>
  $(function() {
    $("#datepicker").datepicker({

      dateFormat: 'dd/mm/yy',
      dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
      dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
      dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
      monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
      monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
      nextText: 'Próximo',
      prevText: 'Anterior',
      changeMonth: true,
      changeYear: true,
      showOtherMonths: true,
      selectOtherMonths: true
    });
  });
</script>
<script>
  $('[data-toggle="popover"]').popover({
    placement: 'auto',
    trigger: 'hover'
  });
</script>
<script>
  $("[data-tt=tooltip]").tooltip({
    placement: 'auto'
  });
  $("[data-toggle=tooltip]").tooltip({
    placement: 'auto'
  });
</script>
<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Initialize Select2 Elements
    $('.select2').select2()
  });
</script>