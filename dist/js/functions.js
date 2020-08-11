$.ajax({
  url:
    "http://api.sidra.ibge.gov.br/values/t/1419/n1/all/v/all/p/all/c315/7169,7170,7445,7486,7558,7625,7660,7712,7766,7786/d/v63%202,v66%204,v69%202,v2265%202?formato=json",
  type: "GET",
  dataType: "json",
  success: function (data) {
    for (let a = 0; a < data.length; a++) {
      if ((data[a].D4N = "Índice geral")) {
        console.log(data[a]);
        console.log(data[a].V);
      }
    }
  },
  error: function () {
    console.log("Erro na requisição");
  },
});
