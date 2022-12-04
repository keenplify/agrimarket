<?php include('../1connection.php'); ?>
<?php include('1session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<!-- -->
<?php include('1head.php'); ?>
<!-- CSS Libraries -->
<link rel="stylesheet" href="assets/modules/datatables/datatables.min.css">
<link rel="stylesheet" href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

<body class="layout-4">
  <!-- Page Loader -->
  <?php include('1loader.php'); ?>
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

            <h2 class="section-title">Dashboard</h2>


            <div class="row row-deck" style="margin-top: 50px;">
              <div class="col-lg-4 col-md-4 col-sm-12">

                <div class="card card-hero ">
                  <div class="card-header" style="height: 196px; width: 100%;">
                    <div class="card-icon">
                      <i class="fas fa-archive "></i>
                    </div>
                    <?php include('../autoload/admin/4autoloadadmindashboard1.php'); ?>

                    <h4><?php echo $Completed; ?></h4>
                    <div class="card-description">Completed Order</div>

                  </div>
                </div>



              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">

                <div class="card card-hero ">
                  <div class="card-header" style="height: 196px; width: 100%;">
                    <div class="card-icon">
                      <i class="fas fa-user"></i>
                    </div>
                    <?php include('../autoload/admin/4autoloadadmindashboard3.php'); ?>
                    <h4><?php echo $usertotal; ?></h4>
                    <div class="card-description">Total User</div>

                  </div>
                </div>



              </div>

              <div class="col-lg-4 col-md-4 col-sm-12">

                <div class="card card-hero ">
                  <div class="card-header" style="height: 196px;">
                    <div class="card-icon">
                      <i class="fas fa-shopping-bag"></i>
                    </div>
                    <?php include('../autoload/admin/4autoloadadmindashboard4.php'); ?>
                    <h4><?php echo $sumqt; ?></h4>
                    <div class="card-description">Total Sales</div>

                  </div>
                </div>



              </div>
            </div>
            <div class="row ">
              <div class="col-lg-8">
                <div class="card">
                  <div class="card-header">
                    <h4>Total Orders</h4>
                  </div>
                  <div class="card-body">
                    <canvas id="orders-chart" height="158"></canvas>

                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.6/dayjs.min.js" integrity="sha512-hcV6DX35BKgiTiWYrJgPbu3FxS6CsCjKgmrsPRpUPkXWbvPiKxvSVSdhWX0yXcPctOI2FJ4WP6N1zH+17B/sAA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                    
                    <?php 
                      $cartQuery = "SELECT * from cart LEFT JOIN item ON item.itemID = cart.itemID";
                      $cartJSON = json_encode(mysqli_fetch_all(mysqli_query($con, $cartQuery), MYSQLI_ASSOC));
                    ?>
                    <script>
                      const cartResults = JSON.parse(`<?= $cartJSON ?>`);
                      const startAt = dayjs().startOf('year');
                      const endAt = dayjs().endOf('year');

                      function insertGroup(groups, group) {
                        const oldGroup = groups.find(v => v.title == group.title);

                        if (!oldGroup) groups.push(group);
                        else oldGroup.value = oldGroup.value + group.value;

                        return groups
                      }

                      const orderGroups = [];
                      const format = 'MMMM YYYY'

                      for (let day = dayjs(startAt); day.isBefore(endAt); day = day.add(1, 'month')) {
                        this.insertGroup(orderGroups, {
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
                      }

                      new Chart(document.getElementById('orders-chart'), {
                        type: 'line',
                        data: {
                          labels: orderGroups.map(g => g.title),
                          datasets: [
                            {
                              label: 'Orders',
                              data: orderGroups.map(g => g.value),
                              borderWidth: 1
                            }
                          ]
                        },
                      });
                    </script>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card gradient-bottom">
                  <div class="card-header">
                    <h4>Top 5 Products</h4>
                    <!--  <div class="card-header-action dropdown">
                                <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Month</a>
                                <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <li class="dropdown-title">Select Period</li>
                                <li><a href="#" class="dropdown-item">Today</a></li>
                                <li><a href="#" class="dropdown-item">Week</a></li>
                                <li><a href="#" class="dropdown-item active">Month</a></li>
                                <li><a href="#" class="dropdown-item">This Year</a></li>
                                </ul>
                            </div> -->
                  </div>
                  <div class="card-body" id="top-5-scroll">
                    <ul class="list-unstyled list-unstyled-border">
                      <?php
                      $item = mysqli_query($con, "SELECT *  from item where itemTOTALSELL > 0  order by itemTOTALSELL desc limit 5 ") or die(mysqli_error($con));
                      while ($rowitem = mysqli_fetch_object($item)) {
                      ?>
                        <li class="media">
                          <img class="mr-3 rounded" width="55" src="../img/product/<?php echo $rowitem->itemIMG;  ?>" alt="product">
                          <div class="media-body">
                            <div class="float-right">
                              <div class="font-weight-600 text-muted text-small"><?php echo $rowitem->itemTOTALSELL;  ?> Sales</div>
                            </div>
                            <div class="media-title"><?php echo substr($rowitem->itemNAME, 0, 25);  ?></div>
                            <div class="mt-1">
                              <div class="budget-price">
                                <div class="budget-price-square bg-primary" data-width="64%"></div>
                                <div class="budget-price-label">P <?php echo $rowitem->itemTOTALSELL * $rowitem->itemPRICE;  ?></div>
                              </div>

                            </div>
                          </div>
                        </li>
                      <?php } ?>
                    </ul>
                  </div>
                  <div class="card-footer pt-3 d-flex justify-content-center">
                    <div class="budget-price justify-content-center">
                      <div class="budget-price-square bg-primary" data-width="20"></div>
                      <div class="budget-price-label">Selling Price</div>
                    </div>
                    <div class="budget-price justify-content-center">
                      <div class="budget-price-square bg-danger" data-width="20"></div>
                      <div class="budget-price-label">Budget Price</div>
                    </div>
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