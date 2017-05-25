
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
  $result=$connect->query("SELECT views,DATE_FORMAT(date,'%b-%y') as dateF FROM posts ORDER BY date ASC LIMIT 0,8");
  $strD="";
  $strV="";
  while ($resultFet = $result->fetch_assoc()){
    $strD.="'".$resultFet['dateF']."',";
    $strV.=$resultFet['views'].",";
  }
  $strD=rtrim($strD,',');
  $strV=rtrim($strV,',');

  $result=$connect->query("SELECT count(order_id) as count,DATE_FORMAT(date,'%b-%y') as dateF FROM table_order WHERE pay='s' GROUP BY DATE_FORMAT(date,'%m-%y') ASC LIMIT 0,8");
  $strD1="";
  $strV1="";
  while ($resultFet = $result->fetch_assoc()){
    $strD1.="'".$resultFet['dateF']."',";
    $strV1.=$resultFet['count'].",";
  }
  $strD1=rtrim($strD1,',');
  $strV1=rtrim($strV1,',');
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
                  label: "view month",
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
  var myChart1 = new Chart(ctx, {
      type: 'line',
      data :{
          labels: [<?php echo $strD1; ?>],
          datasets: [
              {
                  label: "sell month",
                  fill: false,
                  lineTension: 0.1,
                  backgroundColor: "rgba(170, 84, 84, 0.4)",
                  borderColor: "rgba(221, 106, 106, 1)",
                  borderCapStyle: 'butt',
                  borderDash: [],
                  borderDashOffset: 0.0,
                  borderJoinStyle: 'miter',
                  pointBorderColor: "rgba(221, 106, 106, 1)",
                  pointBackgroundColor: "#fff",
                  pointBorderWidth: 1,
                  pointHoverRadius: 5,
                  pointHoverBackgroundColor: "rgba(221, 106, 106, 1)",
                  pointHoverBorderColor: "rgba(220,220,220,1)",
                  pointHoverBorderWidth: 2,
                  pointRadius: 1,
                  pointHitRadius: 10,
                  data: [<?php echo $strV1; ?>],
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
  </script>
