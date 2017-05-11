<?php



 ?>

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
  $date=$connect->query("SELECT DATE_FORMAT(date,'%m-%Y') as dateF FROM posts WHERE 1 LIMIT 5;");
  $view=$connect->query("SELECT views FROM posts WHERE 1 LIMIT 5");
 ?>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.bundle.min.js"></script>
  <script type="text/javascript">
  //กราฟวิว
  var ctx = document.getElementById("myChart");
  var myChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: [<?php while ($resultD = $date->fetch_assoc()){ echo "'".$resultD['dateF']."',";}  ?> "Orange"],
          datasets: [{
              label: '# of Votes',
              data: [<?php while ($resultV = $view->fetch_assoc()){ echo $resultV['views'].","; } ?> 0],
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
