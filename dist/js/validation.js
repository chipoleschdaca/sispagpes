$(function () {
  /*$.validator.setDefaults({
    submitHandler: function () {
      alert("Form successful submitted!");
    },
  });*/
  $("#cadastrarRequerente").validate({
    rules: {
      txtsaram: {
        required: true,
        rangelength: [9, 9],
      },
      txtcpf: {
        required: true,
        rangelength: [14, 14],
      },
      txtposto: {
        required: true,
      },
      txtsituacao: {
        required: true,
      },
      txtnome: {
        required: true,
      },
      txtemail: {
        required: false,
        email: true,
      },
    },
    messages: {
      txtsaram: {
        required: "O campo SARAM é obrigatório",
        rangelength: "Preencha corretamente o SARAM",
      },
      txtcpf: {
        required: "O campo CPF é obrigatório",
        rangelength: "Preencha corretamente o CPF",
      },
      txtposto: {
        required: "O campo POSTO é obrigatório",
      },
      txtsituacao: {
        required: "O campo SITUAÇÃO é obrigatório",
      },
      txtnome: {
        required: "É necessário informar o nome completo",
      },
      txtemail: {
        email: "Insira um e-mail válido",
      },
    },
    errorElement: "span",
    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      element.closest(".form-group").append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass("is-invalid");
    },
  });
  $("#editarRequerente").validate({
    rules: {
      txtsaram2: {
        required: true,
        rangelength: [9, 9],
      },
      txtcpf2: {
        required: true,
        rangelength: [14, 14],
      },
      txtposto2: {
        required: true,
      },
      txtsituacao2: {
        required: true,
      },
      txtnome2: {
        required: true,
      },
      txtemail2: {
        required: false,
        email: true,
      },
    },
    messages: {
      txtsaram2: {
        required: "O campo SARAM é obrigatório",
        rangelength: "Preencha corretamente o SARAM",
      },
      txtcpf2: {
        required: "O campo CPF é obrigatório",
        rangelength: "Preencha corretamente o CPF",
      },
      txtposto2: {
        required: "O campo POSTO é obrigatório",
      },
      txtsituacao2: {
        required: "O campo SITUAÇÃO é obrigatório",
      },
      txtnome2: {
        required: "É necessário informar o nome completo",
      },
      txtemail2: {
        email: "Insira um e-mail válido",
      },
    },
    errorElement: "span",
    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      element.closest(".form-group").append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass("is-invalid");
    },
  });
  $("#inserirProcesso").validate({
    rules: {
      txtcpf: {
        required: true,
      },
      txtnup: {
        required: true,
        rangelength: [20, 20],
      },
      txtdatacriacao: {
        required: true,
        date: true,
      },
      txtdireitopleiteado: {
        required: true,
      },
      txtsecaoorigem: {
        required: true,
      },
    },
    messages: {
      txtcpf: {
        required: "O campo REQUERENTE é obrigatório",
      },
      txtnup: {
        required: "O campo NUP é obrigatório",
        rangelength: "Preencha corretamente o campo NUP",
      },
      txtdatacriacao: {
        required: "O campo Data de Abertura é obrigatório",
        date: "Insira uma data válida",
      },
      txtdireitopleiteado: {
        required: "É necessário selecionar o Direito Pleiteado",
      },
      txtsecaoorigem: {
        required: "É necessário selecionar a Seção de Origem",
      },
    },
    errorElement: "span",
    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      element.closest(".form-group").append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass("is-invalid");
    },
  });
  $("#editarProcesso").validate({
    rules: {
      txtcpf2: {
        required: true,
      },
      txtnup2: {
        required: true,
        rangelength: [20, 20],
      },
      txtdatacriacao2: {
        required: true,
        date: true,
      },
      txtdireitopleiteado2: {
        required: true,
      },
      txtsecaoorigem2: {
        required: true,
      },
    },
    messages: {
      txtcpf2: {
        required: "O campo REQUERENTE é obrigatório",
      },
      txtnup2: {
        required: "O campo NUP é obrigatório",
        rangelength: "Preencha corretamente o campo NUP",
      },
      txtdatacriacao2: {
        required: "O campo Data de Abertura é obrigatório",
        date: "Insira uma data válida",
      },
      txtdireitopleiteado2: {
        required: "É necessário selecionar o Direito Pleiteado",
      },
      txtsecaoorigem2: {
        required: "É necessário selecionar a Seção de Origem",
      },
    },
    errorElement: "span",
    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      element.closest(".form-group").append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass("is-invalid");
    },
  });
  $("#alterarEstadoProcesso").validate({
    rules: {
      txtdataatual: {
        required: true,
        date: true,
      },
      txtnovasecao: {
        required: true,
      },
      txtnovoestado: {
        required: true,
      },
    },
    messages: {
      txtdataatual: {
        required: "O campo DATA é obrigatório",
      },
      txtnovasecao: {
        required: "Selecione a seção de destino",
      },
      txtnovoestado: {
        required: "Selecione o novo estado do processo",
      },
    },
    errorElement: "span",
    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      element.closest(".form-group").append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass("is-invalid");
    },
  });
});
