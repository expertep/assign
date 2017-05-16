
  <div class="panel panel-default view">
    <div class="panel-heading">
      <h3 class="panel-title">ยอดวิว</h3>
    </div>
    <div class="panel-body">
      <canvas id="myChart" width="400" height="400"></canvas>
    </div>
  </div>
  <div class="panel panel-default view">
    <div class="panel-heading">
      <h3 class="panel-title">ยอดขาย</h3>
    </div>
    <div class="panel-body">
      <canvas id="myChart1" width="400" height="400"></canvas>
    </div>
  </div>

<?php
  $result=$connect->query("SELECT views,DATE_FORMAT(date,'%b-%y') as dateF FROM posts WHERE date like '".date('Y')."%' ORDER BY date ASC");
  $strD="";
  $strV="";
  while ($resultFet = $result->fetch_assoc()){
    $strD.="'".$resultFet['dateF']."',";
    $strV.=$resultFet['views'].",";
  }
  $strD=rtrim($strD,',');
  $strV=rtrim($strV,',');

 ?>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.bundle.min.js"></script>
  <script type="text/javascript">
  //กราฟวิว
  var ctx = document.getElementById("myChart");
  var myChart = new Chart(ctx, {
      type: 'line',
      data :{
          labels: [<?php echo $strD; ?>],
          datasets: [
              {
                  label: "count views",
                  fill: false,
                  lineTension: 0.1,
                  backgroundColor: "rgba(75,192,192,0.4)",
                  borderColor: "rgba(75,192,192,1)",
                  borderCapStyle: 'butt',
                  borderDash: [],
                  borderDashOffset: 0.0,
                  borderJoinStyle: 'miter',
                  pointBorderColor: "rgba(75,192,192,1)",
                  pointBackgroundColor: "#fff",
                  pointBorderWidth: 1,
                  pointHoverRadius: 5,
                  pointHoverBackgroundColor: "rgba(75,192,192,1)",
                  pointHoverBorderColor: "rgba(220,220,220,1)",
                  pointHoverBorderWidth: 2,
                  pointRadius: 1,
                  pointHitRadius: 10,
                  data: [<?php echo $strV; ?>],
                  spanGaps: false,
              }
          ]
      },
      options: {
             responsive: true,
             maintainAspectRatio: false,
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero:true
                      }
                  }]
              }
          }
  });

  var ctx = document.getElementById("myChart1");
  var myChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
          datasets: [{
              label: '# of Votes',
              data: [12, 19, 3, 5, 2, 3],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)'
              ],
              borderColor: [
                  'rgba(255,99,132,1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
             responsive: true,
             maintainAspectRatio: false,
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero:true
                      }
                  }]
              }
          }
  });
  </script>
