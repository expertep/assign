<center>
  <div class="panel panel-default view">
    <div class="panel-heading">
      <h3 class="panel-title"><b>ยอดวิว</b></h3>
    </div>
    <div class="panel-body">
      <canvas id="myChart"  height="250px"></canvas>
    </div>
  </div>
  <div class="panel panel-default view">
    <div class="panel-heading">
      <h3 class="panel-title"><b>รายได้</b></h3>
    </div>
    <div class="panel-body">
      <canvas id="myChart2" height="300px"></canvas>
    </div>
  </div>
  <div class="panel panel-default view">
    <div class="panel-heading">
      <h3 class="panel-title"><b>ยอดขาย</b></h3>
    </div>
    <div class="panel-body">
      <canvas id="myChart1"></canvas>
    </div>
  </div>
</center>

<?php
  $result=$connect->query("SELECT views,DATE_FORMAT(date,'%b-%y') as dateF FROM posts ORDER BY date ASC LIMIT 0,10");
  $strD="";
  $strV="";
  while ($resultFet = $result->fetch_assoc()){
    $strD.="'".$resultFet['dateF']."',";
    $strV.=$resultFet['views'].",";
  }
  $strD=rtrim($strD,',');
  $strV=rtrim($strV,',');

  $result=$connect->query("SELECT count(order_id) as count,DATE_FORMAT(date,'%b-%y') as dateF FROM table_order WHERE pay='s' GROUP BY DATE_FORMAT(date,'%m-%y') ASC LIMIT 0,10");
  $strD1="";
  $strV1="";
  while ($resultFet = $result->fetch_assoc()){
    $strD1.="'".$resultFet['dateF']."',";
    $strV1.=$resultFet['count'].",";
  }
  $strD1=rtrim($strD1,',');
  $strV1=rtrim($strV1,',');

  $sql="SELECT (SUM(p.product_price)*b.amount) as sum,DATE_FORMAT(date,'%b-%y') as dateF FROM table_order o
INNER JOIN table_bill b ON o.order_id=b.order_id
INNER JOIN table_product p ON b.product_id=p.product_id
WHERE o.pay='s' GROUP BY DATE_FORMAT(o.date,'%m-%y') ASC LIMIT 0,10";
  $result=$connect->query($sql);
  $strD2="";
  $strV2="";
  while ($resultFet = $result->fetch_assoc()){
    $strD2.="'".$resultFet['dateF']."',";
    $strV2.=$resultFet['sum'].",";
  }
  $strD2=rtrim($strD2,',');
  $strV2=rtrim($strV2,',');
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
                  pointBorderColor: "rgba(255, 226, 105, 1)",
                  pointBackgroundColor: "#fff",
                  pointBorderWidth: 1,
                  pointHoverRadius: 5,
                  pointHoverBackgroundColor: "rgba(255, 226, 105, 1)",
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
                  backgroundColor: "rgba(255, 226, 105, 0.4)",
                  borderColor: "rgba(255, 226, 105, 1)",
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

  var ctx = document.getElementById("myChart2");
  var myChart2 = new Chart(ctx, {
      type: 'bar',
      data :{
          labels: [<?php echo $strD2; ?>],
          datasets: [
              {
                  label: "Recipe",
                  fill: false,
                  lineTension: 0.1,
                  backgroundColor: "rgba(246, 146, 54, 0.4)",
                  borderColor: "rgba(246, 146, 54, 1)",
                  borderCapStyle: 'butt',
                  borderWidth:2,
                  borderDash: [],
                  borderDashOffset: 0.0,
                  borderJoinStyle: 'miter',
                  data: [<?php echo $strV2; ?>],
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
