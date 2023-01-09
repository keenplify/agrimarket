<?php include('../1connection.php'); ?>
<?php include('1session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<?php
date_default_timezone_set("Asia/Hong_Kong");
$startAt = !empty($_GET["startAt"]) ? date_create($_GET["startAt"]) : date_create()->modify('-7 days');
$endAt = !empty($_GET["endAt"]) ? date_create($_GET["endAt"]) : date_create();
?>

<!-- -->
<?php include('1head.php'); ?>
<!-- CSS Libraries -->
<link rel="stylesheet" href="assets/modules/datatables/datatables.min.css">
<link rel="stylesheet" href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

<body class="layout-4">
  <!-- Page Loader -->
  <!-- <?php include('1loader.php'); ?> -->
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      <!-- Start app top navbar -->
      <?php include('1topnav.php'); ?>

      <!-- Start main left sidebar menu -->
      <?php include('1leftnav.php'); ?>

      <!-- Start app main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <!--  <h1>Pending Order</h1> -->
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            </div>
          </div>
          <div class="section-body">
            <div>
              <?php
              $notificationQuery = mysqli_query($con, "SELECT *  from notifications WHERE expire_at > NOW()") or die(mysqli_error($con));
              while ($notification = mysqli_fetch_object($notificationQuery)) {
              ?>
                <div class="alert alert-primary">
                  <?= $notification->text ?>
                </div>
              <?php } ?>
            </div>
            <div class="alert alert-info">
              <p>Please update your product prices daily to stay up to date with the suggested prices.</p>
              <hr>
              <a href="./product.php" class="btn btn-secondary" style="color:black">Go to Products</a>
            </div>
            <form class="row">
              <div class="col-md-6">
                <h2 class="section-title">Dashboard</h2>
              </div>
              <div class="form-group col-md-3">
                <label class="form-label" for="startAt">Analytics Start At</label>
                <input class="form-control" id="startAt" type="datetime-local" name="startAt" value="<?= $startAt->format('Y-m-d\TH:i:s') ?>" max="<?= $endAt->format('Y-m-d\TH:i:s') ?>" onchange="this.form.submit()">
              </div>
              <div class="form-group col-md-3">
                <label class="form-label" for="endAt">Analytics End At</label>
                <input class="form-control" id="endAt" type="datetime-local" name="endAt" value="<?= $endAt->format('Y-m-d\TH:i:s') ?>" min="<?= $startAt->format('Y-m-d\TH:i:s') ?>" onchange="this.form.submit()">
              </div>
            </form>
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-success">
                    <i class="fa-solid fa-money-bill" style="font-size: 2em; color: white"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Sales</h4>
                    </div>
                    <?php
                    $totalSales = 0;
                    $startAtFormatted = date_format($startAt, "Y-m-d H:i:s");
                    $endAtFormatted = date_format($endAt, "Y-m-d H:i:s");
                    $cartQuery = "SELECT * from cart LEFT JOIN item ON item.itemID = cart.itemID WHERE orderSELLER='$sellerID' AND cartCREATEDAT >= '$startAtFormatted' AND cartCREATEDAT <= '$endAtFormatted'";
                    $cartResults = mysqli_query($con, $cartQuery) or die(mysqli_error($con));
                    $cartResultsJSON = json_encode(mysqli_fetch_all(mysqli_query($con, $cartQuery), MYSQLI_ASSOC));
                    while ($cart = mysqli_fetch_array($cartResults, MYSQLI_ASSOC)) {
                      if ((int)$cart['cartSTATUS'] >= 5) {
                        $totalSales = (float)$totalSales + ((float)$cart['cartCOUNT'] * (float)$cart['itemPRICE']);
                      }
                    } ?>
                    <div class="card-body">
                      ₱<?= $totalSales; ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-success">
                    <i class="fa-solid fa-box" style="font-size: 2em; color: white"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Orders</h4>
                    </div>
                    <?php
                    $totalOrders = (int)0;
                    $cartQuery = "SELECT * from cart WHERE orderSELLER='$sellerID' AND cartCREATEDAT >= '$startAtFormatted' AND cartCREATEDAT <= '$endAtFormatted'";
                    $cartResults = mysqli_query($con, $cartQuery) or die(mysqli_error($con));
                    while ($cart = mysqli_fetch_object($cartResults)) {
                      $totalOrders += (int)$cart->cartCOUNT;
                    } ?>
                    <div class="card-body">
                      <?= $totalOrders; ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-success">
                    <i class="fa-solid fa-eye" style="font-size: 2em; color: white"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Visitors</h4>
                    </div>
                    <?php
                    $totalVisitors = (int)0;
                    $visitorQuery = "SELECT * from visitors WHERE visitor_seller_id='$sellerID' AND visitor_created_at >= '$startAtFormatted' AND visitor_created_at <= '$endAtFormatted'";
                    $visitorResults = mysqli_query($con, $visitorQuery) or die(mysqli_error($con));
                    $visitorResultsJSON = json_encode(mysqli_fetch_all(mysqli_query($con, $visitorQuery), MYSQLI_ASSOC));
                    while ($visitor = mysqli_fetch_object($visitorResults)) {
                      $totalVisitors += 1;
                    }
                    ?>
                    <div class="card-body">
                      <?= $totalVisitors; ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-success">
                    <i class="fa-solid fa-comments-dollar" style="font-size: 2em; color: white"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Conversion Rate</h4>
                    </div>
                    <?php
                    $totalConverted = (int)0;
                    $visitorConvertedQuery = "SELECT * from visitors WHERE visitor_seller_id='$sellerID' AND visitor_is_converted=1";
                    $visitorConvertedResults = mysqli_query($con, $visitorConvertedQuery) or die(mysqli_error($con));
                    while ($visitorConverted = mysqli_fetch_object($visitorConvertedResults)) {
                      $totalConverted += 1;
                    }
                    $conversionRate = 0;

                    if ($totalVisitors > 0) {
                      $conversionRate = ($totalConverted / $totalVisitors) * 100;
                    }
                    ?>
                    <div class="card-body">
                      <?= $conversionRate ?>%
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <div>
                <h4>Trend Chart of Each Metric</h4>
                <canvas id="trend-chart" height="64" class="my-4"></canvas>
              </div>

              <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.6/dayjs.min.js" integrity="sha512-hcV6DX35BKgiTiWYrJgPbu3FxS6CsCjKgmrsPRpUPkXWbvPiKxvSVSdhWX0yXcPctOI2FJ4WP6N1zH+17B/sAA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

              <script>
                const startAt = dayjs(`<?= $startAt->format(DateTime::ISO8601) ?>`);
                const endAt = dayjs(`<?= $endAt->format(DateTime::ISO8601) ?>`);

                function insertGroup(groups, group) {
                  const oldGroup = groups.find(v => v.title == group.title);

                  if (!oldGroup) groups.push(group);
                  else oldGroup.value = oldGroup.value + group.value;

                  return groups
                }

                const cartResults = JSON.parse(`<?= $cartResultsJSON ?>`);

                const cartGroups = [];
                const orderGroups = [];
                const visitorGroups = [];
                const convertedGroups = [];
                const format = 'MMM DD YYYY'

                for (let day = dayjs(startAt).add(1, 'day'); day.isBefore(endAt); day = day.add(1, 'day')) {
                  this.insertGroup(cartGroups, {
                    title: day.format(format),
                    value: 0
                  })
                }

                for (const cart of cartResults) {
                  const day = dayjs(cart.cartCREATEDAT);

                  insertGroup(orderGroups, {
                    title: day.format(format),
                    value: 1
                  });

                  if (cart.cartSTATUS != '6') continue;
                  insertGroup(cartGroups, {
                    title: day.format(format),
                    value: Number.parseFloat(cart.cartCOUNT) * Number.parseFloat(cart.itemPRICE)
                  });
                }
                const visitorResults = JSON.parse(`<?= $visitorResultsJSON ?>`);

                for (const visitor of visitorResults) {
                  const day = dayjs(visitor.visitor_created_at);
                  insertGroup(visitorGroups, {
                    title: day.format(format),
                    value: 1
                  });

                  if (visitor.visitor_is_converted == '1') {
                    insertGroup(convertedGroups, {
                      title: day.format(format),
                      value: 1
                    });
                  }
                }

                new Chart(document.getElementById('trend-chart'), {
                  type: 'bar',
                  data: {
                    labels: cartGroups.map(g => g.title),
                    datasets: [{
                        label: 'Sales',
                        data: cartGroups.map(g => g.value),
                        borderWidth: 1
                      },
                      {
                        label: 'Orders',
                        data: orderGroups.map(g => g.value),
                        borderWidth: 1
                      },
                      {
                        label: 'Visitors',
                        data: visitorGroups.map(g => g.value),
                        borderWidth: 1
                      },
                      {
                        label: 'Conversion Rate',
                        data: convertedGroups.map(g => g.value),
                        borderWidth: 1
                      }
                    ]
                  },
                  options: {
                    scales: {
                      y: {
                        beginAtZero: true
                      }
                    }
                  }
                });
              </script>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-primary">
                    <i class="fa-solid fa-bars"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Total Item</h4>
                    </div>
                    <?php
                    $totalitem = 0;
                    $item = mysqli_query($con, "SELECT *  from item ") or die(mysqli_error($con));
                    while ($rowitem = mysqli_fetch_object($item)) {
                      if ($sellerID == $rowitem->itemSELLER) {
                        $totalitem = $totalitem + 1;
                      }
                    } ?>
                    <div class="card-body">
                      <?= $totalitem; ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-danger">
                    <i class="fa-solid fa-cart-shopping"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Pending Order</h4>
                    </div>
                    <?php
                    $pending = 0;
                    $pending1 = mysqli_query($con, "SELECT *  from cart ") or die(mysqli_error($con));
                    while ($rowpending1 = mysqli_fetch_object($pending1)) {
                      if ($rowpending1->orderID != 1 && $rowpending1->cartSTATUS == '2' && $rowpending1->orderSELLER == $rowseller->sellerID) {
                        $pending = $pending + 1;
                      }
                    } ?>
                    <div class="card-body">
                      <?= $pending; ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-warning">
                    <i class="fa-solid fa-check"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Accepted Order</h4>
                    </div>
                    <?php
                    $accepted = 0;
                    $accepted1 = mysqli_query($con, "SELECT *  from cart ") or die(mysqli_error($con));
                    while ($rowaccepted1 = mysqli_fetch_object($accepted1)) {
                      if ($rowaccepted1->orderID != 1 && $rowaccepted1->cartSTATUS == '3' && $rowaccepted1->orderSELLER == $rowseller->sellerID) {
                        $accepted = $accepted + 1;
                      }
                    } ?>
                    <div class="card-body">
                      <?= $accepted; ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-success">
                    <i class="fa-solid fa-truck"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Delivered Order</h4>
                    </div>
                    <?php
                    $delivered = 0;
                    $delivered1 = mysqli_query($con, "SELECT *  from cart ") or die(mysqli_error($con));
                    while ($rowdelivered1 = mysqli_fetch_object($delivered1)) {
                      if ($rowdelivered1->orderID != 1 && $rowdelivered1->cartSTATUS == '5'  && $rowdelivered1->orderSELLER == $rowseller->sellerID) {
                        $delivered = $delivered + 1;
                      }
                    } ?>
                    <?php
                    $pickup = 0;
                    $pickup1 = mysqli_query($con, "SELECT *  from cart ") or die(mysqli_error($con));
                    while ($rowpickup1 = mysqli_fetch_object($pickup1)) {
                      if ($rowpickup1->orderID != 1 && $rowpickup1->cartSTATUS == '7' && $rowpickup1->orderSELLER == $rowseller->sellerID) {
                        $pickup = $pickup + 1;
                      }
                    } ?>


                    <div class="card-body">
                      <?= $delivered + $pickup; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="summary">
              <div class="summary-info bg-success">

                <div class="">Sold <?= $delivered + $pickup; ?> items </div>
                <!-- <div class="d-block mt-2"><a href="#">View All</a></div> -->
              </div>
              <div class="summary-item">
                <h6>Item List <span class="text-muted">(3 Items)</span></h6>


                <?php
                $total = 0;
                $dashboard = mysqli_query($con, "SELECT cart.*,item.*  from cart, item where cart.orderSELLER=$rowseller->sellerID and cart.itemID=item.itemID ") or die(mysqli_error($con));
                while ($rowdashboard = mysqli_fetch_object($dashboard)) {
                  if ($rowdashboard->orderSELLER == $rowseller->sellerID) {


                    if ($rowdashboard->cartSTATUS == '5' || $rowdashboard->cartSTATUS == '7') {

                      $total = $total + $rowdashboard->itemPRICE;



                ?>

                      <ul class="list-unstyled list-unstyled-border">
                        <li class="media">
                          <a href="#"><img src="../img/product/<?= $rowdashboard->itemIMG; ?>" class="mr-3 rounded" width="50" src="" alt="product img"></a>
                          <div class="media-body">
                            <div class="media-right"><?= $rowdashboard->itemPRICE;  ?></div>
                            <div class="media-title"><a href="#">

                                <?= $rowdashboard->itemNAME;  ?><br>

                              </a></div>
                            <div class="text-muted text-small">by <a href="#">Me</a>
                              <div class="bullet"></div> <?= $rowdashboard->cartRECIEVED;  ?>
                            </div>
                          </div>
                        </li>

                      </ul>

                <?php }
                  }
                } ?>

              </div>
              <div class="text-center bg-light" style="padding: 20px;">
                <h4>P <?= $total ?></h4>

              </div>
            </div>
          </div>
      </div>
      </section>
    </div>

    <!-- Start app Footer part -->
    <?php include('1footer.php'); ?>
  </div>
  </div>

  <!-- General JS Scripts -->
  <script src="assets/bundles/lib.vendor.bundle.js"></script>
  <script src="js/CodiePie.js"></script>

  <!-- JS Libraies -->
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyCnT63XUjqjPgXZ0lFTU_pdpfUX7swzTTM&amp;sensor=true"></script>
  <script src="assets/modules/gmaps.js"></script>

  <!-- Page Specific JS File -->
  <script src="js/page/gmaps-draggable-marker.js"></script>
  <!-- JS Libraies -->
  <script src="assets/modules/datatables/datatables.min.js"></script>
  <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="js/page/modules-datatables.js"></script>
  <!-- JS Libraies -->
  <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>
  <script src="assets/modules/jquery.sparkline.min.js"></script>
  <script src="assets/modules/chart.min.js"></script>
  <script src="assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
  <script src="assets/modules/summernote/summernote-bs4.js"></script>
  <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <!-- Template JS File -->
  <script src="js/scripts.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>

<!-- <script type="text/javascript">
  "use strict";

  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["January", "February", "March", "April", "May", "June", "July", "August"],
      datasets: [{
          label: 'Sales',
          data: [3200, 1800, 4305, 3022, 6310, 5120, 5880, 6154],
          borderWidth: 2,
          backgroundColor: 'rgba(63,82,227,.8)',
          borderWidth: 0,
          borderColor: 'transparent',
          pointBorderWidth: 0,
          pointRadius: 3.5,
          pointBackgroundColor: 'transparent',
          pointHoverBackgroundColor: 'rgba(63,82,227,.8)',
        },
        {
          label: 'Budget',
          data: [2207, 3403, 2200, 5025, 2302, 4208, 3880, 4880],
          borderWidth: 2,
          backgroundColor: 'rgba(254,86,83,.7)',
          borderWidth: 0,
          borderColor: 'transparent',
          pointBorderWidth: 0,
          pointRadius: 3.5,
          pointBackgroundColor: 'transparent',
          pointHoverBackgroundColor: 'rgba(254,86,83,.8)',
        }
      ]
    },
    options: {
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          gridLines: {
            // display: false,
            drawBorder: false,
            color: '#f2f2f2',
          },
          ticks: {
            beginAtZero: true,
            stepSize: 1500,
            callback: function(value, index, values) {
              return '$' + value;
            }
          }
        }],
        xAxes: [{
          gridLines: {
            display: false,
            tickMarkLength: 15,
          }
        }]
      },
    }
  });

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

  var sales_chart = document.getElementById("sales-chart").getContext('2d');

  var sales_chart_bg_color = sales_chart.createLinearGradient(0, 0, 0, 80);
  balance_chart_bg_color.addColorStop(0, 'rgba(63,82,227,.2)');
  balance_chart_bg_color.addColorStop(1, 'rgba(63,82,227,0)');

  new Chart(sales_chart, {
    type: 'line',
    data: {
      labels: ['16-07-2018', '17-07-2018', '18-07-2018', '19-07-2018', '20-07-2018', '21-07-2018', '22-07-2018', '23-07-2018', '24-07-2018', '25-07-2018', '26-07-2018', '27-07-2018', '28-07-2018', '29-07-2018', '30-07-2018', '31-07-2018'],
      datasets: [{
        label: 'Sales',
        data: [70, 62, 44, 40, 21, 63, 82, 52, 50, 31, 70, 50, 91, 63, 51, 60],
        borderWidth: 2,
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

  $("#products-carousel").owlCarousel({
    items: 3,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 5000,
    loop: true,
    responsive: {
      0: {
        items: 2
      },
      768: {
        items: 2
      },
      1200: {
        items: 3
      }
    }
  });
</script> -->