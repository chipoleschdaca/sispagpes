function grafico(phpDireito, countDireito) {
  var donutChartCanvas = document.getElementById('pieChart');
  var donutData = {
    //<?= $direito_pleiteado ?>
    labels: [phpDireito],
  datasets: [{
      //<?= $count_direito ?>
    data: [countDireito],
      backgroundColor: ['#f56954', '#00a65a', 'red', '#f39c12', 'green', '#00c0ef', 'orange', '#3c8dbc', 'blue', '#d2d6de', '#9C0060', 'yellow', 'pink'],
}]
};
  var donutOptions = {
    maintainAspectRatio: false,
    responsive: true,
  };
  var donutChart = new Chart(donutChartCanvas, {
    type: 'doughnut',
    data: donutData,
    options: {
      tooltips: {
        callbacks: {
          title: function(tooltipItem, data) {
            return data['labels'][tooltipItem[0]['index']];
          },
          label: function(tooltipItem, data) {
            return data['datasets'][0]['data'][tooltipItem['index']];
          },
          afterLabel: function(tooltipItem, data) {
            var dataset = data['datasets'][0];
            var percent = Math.round((dataset['data'][tooltipItem['index']] / dataset["_meta"][0]['total']) * 100);
            return '(' + percent + '%)';
          }
        },
        //backgroundColor: '#FFF',

        cornerRadius: 5,
        titleFontSize: 12,
        titleFontColor: '#FFF',
        bodyFontColor: '#FFF',
        bodyFontSize: 10,
        displayColors: false
      },
      title: {
        display: true,
        padding: 20,
        position: 'top',
        fontColor: '#000000',
        fontSize: 16,
        text: 'QUANTIDADE vs. DIREITO PLEITEADO'
      },
      legend: {
        display: true,
        position: 'right',
        labels: {
          fontColor: '#000000',
          fontSize: 10,
          boxWidth: 40
        }
      }
    }
  });
}