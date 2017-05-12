
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
  $result=$connect->query("SELECT views,DATE_FORMAT(date,'%m') as dateF FROM posts WHERE date like '".date('Y')."%' ORDER BY date ASC");
  $strD="";
  $strV="";
  while ($resultFet = $result->fetch_assoc()){
    $strD.=$resultFet['dateF'].",";
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
      data: {
          labels: [<?php echo $strD;  ?> ],
          datasets: [{
              label: 'View of month',
              data: [<?php echo $strV;  ?>],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255,99,132,1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
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

  var ctx = document.getElementById("myChart1");
  var myChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
          datasets: [{
              label: '# of Votes',
              data: [12, 19, 3, 5, 2, 3],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255,99,132,1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
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
