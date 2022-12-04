<?php include('../../1connection.php'); ?>
<?php 
$count=0;
$Pending=0;
$Shipping=0;
$Completed=0;
$slide12=mysqli_query($con,"SELECT cart.*,item.*,account.* from cart,item,account where cart.itemID = item.itemID  and cart.accountID = account.accountID group by cart.orderID order by cart.cartID desc ")or die(mysqli_error($con));
              while($rowslide12=mysqli_fetch_object($slide12))
              {
                if ($rowslide12->cartSTATUS=='1') {
                      $Pending++;
                  }
                  if ($rowslide12->cartSTATUS=='4') {
                       $Shipping++;
                  }
                  if ($rowslide12->cartSTATUS=='5') {
                        $Completed++;
                  }
               $count++;   
              }
?>

                    <div class="card card-statistic-2">
                          <div class="card-chart">
                          <canvas id="balance-chart" height="80"></canvas>
                          </div>
                          <div class="card-icon shadow-primary bg-primary">
                          <i class="fas fa-dollar-sign"></i>
                          </div>
                        <div class="card-wrap">
                          <div class="card-header">
                              <h4>Balance</h4>
                          </div>
                          <div class="card-body">
                              P187,13
                          </div>
                        </div>
                    </div>

<script type="text/javascript">
  var balance_chart = document.getElementById("balance-chart").getContext('2d');

var balance_chart_bg_color = balance_chart.createLinearGradient(0, 0, 0, 70);
balance_chart_bg_color.addColorStop(0, 'rgba(63,82,227,.2)');
balance_chart_bg_color.addColorStop(1, 'rgba(63,82,227,0)');

var myChart = new Chart(balance_chart, {
  type: 'line',
  data: {
    labels: ['16-07-2018', '17-07-2018', '18-07-2018', '19-07-2018', '20-07-2018', '21-07-2018', '22-07-2018', '23-07-2018', '24-07-2018', '25-07-2018', '26-07-2018', '27-07-2018', '28-07-2018', '29-07-2018', '30-07-2018', '31-07-2018'],
    datasets: [{
      label: 'Balance',
      data: [50, 61, 80, 50, 72, 52, 60, 41, 30, 45, 70, 40, 93, 63, 50, 62],
      backgroundColor: balance_chart_bg_color,
      borderWidth: 3,
      borderColor: 'rgba(63,82,227,1)',
      pointBorderWidth: 0,
      pointBorderColor: 'transparent',
      pointRadius: 3,
      pointBackgroundColor: 'transparent',
      pointHoverBackgroundColor: 'rgba(63,82,227,1)',
    }]
  },
  options: {
    layout: {
      padding: {
        bottom: -1,
        left: -1
      }
    },
    legend: {
      display: false
    },
    scales: {
      yAxes: [{
        gridLines: {
          display: false,
          drawBorder: false,
        },
        ticks: {
          beginAtZero: true,
          display: false
        }
      }],
      xAxes: [{
        gridLines: {
          drawBorder: false,
          display: false,
        },
        ticks: {
          display: false
        }
      }]
    },
  }
});

  
</script>