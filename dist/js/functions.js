$(document).ready(function () {
  $("#txtsaram").mask("000.000-0", {
    reverse: true,
  });
  $("#txtcpf").mask("000.000.000-00", {
    reverse: true,
  });
  $("#txtnup").mask("00000.000000/0000-00", {
    reverse: true,
  });
  $("#txtsaram2").mask("000.000-0", {
    reverse: true,
  });
  $("#txtcpf2").mask("000.000.000-00", {
    reverse: true,
  });
  $("#txtnup2").mask("00000.000000/0000-00", {
    reverse: true,
  });
  $("#txtsaram3").mask("000.000-0", {
    reverse: true,
  });
  $("#txtcpf3").mask("000.000.000-00", {
    reverse: true,
  });
  $("#txtdtnascimento").mask("00/00/0000", {
    reverse: true,
  });
  $("#txtdtnascimento2").mask("00/00/0000", {
    reverse: true,
  });
  $(function () {
    $("#datepicker").datepicker({
      dateFormat: "dd/mm/yy",
      dayNames: [
        "Domingo",
        "Segunda",
        "Terça",
        "Quarta",
        "Quinta",
        "Sexta",
        "Sábado",
      ],
      dayNamesMin: ["D", "S", "T", "Q", "Q", "S", "S", "D"],
      dayNamesShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb", "Dom"],
      monthNames: [
        "Janeiro",
        "Fevereiro",
        "Março",
        "Abril",
        "Maio",
        "Junho",
        "Julho",
        "Agosto",
        "Setembro",
        "Outubro",
        "Novembro",
        "Dezembro",
      ],
      monthNamesShort: [
        "Jan",
        "Fev",
        "Mar",
        "Abr",
        "Mai",
        "Jun",
        "Jul",
        "Ago",
        "Set",
        "Out",
        "Nov",
        "Dez",
      ],
      nextText: "Próximo",
      prevText: "Anterior",
      changeMonth: true,
      changeYear: true,
      showOtherMonths: true,
      selectOtherMonths: true,
    });
  });
  $('[data-toggle="popover"]').popover({
    placement: "auto",
    trigger: "hover",
  });
  $("[data-tt=tooltip]").tooltip({
    placement: "auto",
  });
  $("[data-toggle=tooltip]").tooltip({
    placement: "auto",
  });
  $(function () {
    $(".select2bs4").select2({
      theme: "bootstrap4",
    });
    $(".select2").select2();
  });
  $(".nav-link").on("click", function (e) {
    $(".nav-link").removeClass("active");
    $(this).addClass("active");
  });
});
