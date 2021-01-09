<script>
    var donutChartCanvas = document.getElementById('pieChart');
    var donutData = {
      labels: [
        <?= $direito_pleiteado ?>
      ],
      datasets: [{
        data: [<?= $count_direito ?>],
        backgroundColor: ['#f56954', '#00a65a', 'red', '#f39c12', 'green', '#00c0ef', 'orange', '#3c8dbc', 'blue', '#9C0060', 'yellow', 'pink', '#4b0082', '#00ffff', '#2d3852', '#765536', '#fefed2', '#27283f'],
      }]
    }
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
          padding: 10,
          position: 'top',
          fontColor: '#000000',
          fontSize: 14,
          text: 'QUANTIDADE vs. DIREITO PLEITEADO'
        },
        legend: {
          display: true,
          position: 'right',
          labels: {
            fontColor: '#000000',
            fontSize: 8,
            boxWidth: 30
          }
        }
      }
    })
  </script>
  <script>
    var donutChartCanvas1 = document.getElementById('donutChart');
    var donutData1 = {
      labels: [
        <?= $estado ?>
      ],
      datasets: [{
        data: [<?= $count_estado ?>],
        backgroundColor: ['#f56954', '#00a65a', 'red', '#f39c12', 'green', '#00c0ef', 'orange', 'blue', '#3c8dbc', '#9C0060', 'yellow', 'pink', '#4b0082', '#00ffff', '#2d3852', '#765536', '#fefed2', '#27283f'],
      }]
    }
    var donutChart1 = new Chart(donutChartCanvas1, {
      type: 'doughnut',
      data: donutData1,
      options: {
        title: {
          display: true,
          padding: 10,
          position: 'top',
          fontColor: '#000000',
          fontSize: 14,
          text: 'QUATIDADE vs. ESTADO'
        },
        legend: {
          display: true,
          position: 'right',
          labels: {
            fontColor: 'rgb(0,0,0)',
            fontSize: 8,
            boxWidth: 30
          }
        }
      }
    })
  </script>
  <script>
    var barChartCanvas1 = document.getElementById('myChart2');
    var barData1 = {
      labels: [
        <?= $secao ?>
      ],
      datasets: [{
        data: [<?= $count_secao ?>],
        backgroundColor: ['#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd'],
      }]
    }
    var barChart1 = new Chart(barChartCanvas1, {
      type: 'horizontalBar',
      data: barData1,
      options: {
        scales: {
          xAxes: [{
            ticks: {
              beginAtZero: true
            },
            gridLines: {
              drawOnChartArea: false
            }
          }],
          yAxes: [{
            ticks: {
              beginAtZero: true
            },
            gridLines: {
              drawOnChartArea: false
            }
          }]
        },
        title: {
          display: true,
          padding: 10,
          position: 'top',
          fontColor: '#000000',
          fontSize: 14,
          text: 'SEÇÃO ATUAL'
        },
        legend: {
          display: false,
          position: 'right',
          labels: {
            fontColor: '#000000',
            fontSize: 14
          }
        }
      }
    })
  </script>
  <script>
    var barChartCanvas = document.getElementById('myChart');
    var barData = {
      labels: [
        <?= $posto ?>
      ],
      datasets: [{
        data: [<?= $count_posto ?>],
        backgroundColor: ['#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd']
      }]
    }
    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: barData,
      options: {
        animation: {
          duration: 2000
        },
        scales: {
          xAxes: [{
            ticks: {
              beginAtZero: true
            },
            gridLines: {
              drawOnChartArea: false
            }
          }],
          yAxes: [{
            ticks: {
              beginAtZero: true
            },
            gridLines: {
              drawOnChartArea: false
            }
          }]
        },
        title: {
          display: true,
          padding: 10,
          position: 'top',
          fontColor: '#000000',
          fontSize: 14,
          text: 'QUANTIDADE vs. POSTO'
        },
        legend: {
          display: false,
          position: 'right',
          labels: {
            fontColor: '#000000',
            fontSize: 14
          }
        }
      }
    })
  </script>  