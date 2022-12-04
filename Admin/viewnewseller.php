<?php include('../1connection.php'); ?>
<?php include('1session.php'); ?>
<?php
if (isset($_GET['sellerID']) ? $_GET['sellerID'] : '') {
  $sellerID = $_GET['sellerID'];
  $user = mysqli_query($con, "SELECT * from seller where sellerID = '$sellerID'") or die(mysqli_error($con));
  $rowuser = mysqli_fetch_object($user);
} else {
  echo "<script type='text/javascript'>window.location.replace('errors-404.php');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- -->
<?php include('1head.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<body class="layout-4">
  <?php include_once('../knplfy/includes.php') ?>
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
              <div class="breadcrumb-item active"><a href="customer.php">Seller</a></div>
              <div class="breadcrumb-item ">View Seller</div>
            </div>
          </div>

          <div class="section-body">
            <span id="error"></span>
            <h2 class="section-title">View Seller</h2>
            <div class="row">
              <div class="col-md-8">
                <div class="card author-box card-primary">
                  <div class="card-body">
                    <div class="author-box-left">
                      <img alt="image" src="../img/user/<?php if ($rowuser->sellerimage == NULL) { ?>null.png<?php } else {
                                                                                                              echo $rowuser->sellerimage; ?><?php } ?>" class="rounded-circle author-box-picture">
                      <div class="clearfix"></div>
                      <a href="#" class="btn btn-primary mt-3"><?php echo $rowuser->sellerSTATUS; ?></a>
                    </div>
                    <div class="author-box-details">
                      <div class="author-box-name">
                        <?php echo $rowuser->sellerfirstname;  ?> <?php echo $rowuser->sellerlastname;  ?>
                      </div>
                      <div class="author-box-job">Seller</div>
                      <div class="author-box-description">

                        <p>
                          <b>User ID: </b><?php echo $rowuser->sellerID; ?><br>
                          <b>Address: </b><?php echo $rowuser->sellerlatitude . ", " . $rowuser->sellerlongitude; ?><br>
                          <b>Mobile Number: </b><?php echo $rowuser->sellermobilenumber; ?><br>
                          <b>Email: </b><?php echo $rowuser->selleremail; ?><br>
                          <b>Date Joined: </b><?php echo $rowuser->sellerdatecreated ?><br>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card ">
                  <div class="card-header">
                    <h4>Settings</h4>
                  </div>
                  <div class="card-body pb-0">
                    <div class="row">
                      <div id="accordion">
                        <div class="accordion">

                          <button type="submit" data-toggle="modal" data-target="#exampleModal" class="btn btn-success" style="">Active</button>
                          <button type="submit" data-toggle="modal" data-target="#exampleModal2" class="btn btn-danger" style="">Disabled</button>

                        </div>





                      </div>

                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-12 col-lg-7">
                <div class="card author-box card-primary">
                  <div class="card-body">
                    <div class="input-group">
                      <!--   <input type="text" name="lat" class="form-control" id="input-lat" placeholder="Latitude" readonly="">
                                                <input type="text" name="long" class="form-control" id="input-lng" placeholder="Longitude" readonly=""> -->


                    </div>
                    <div id="leaflet_map" style="height:400px"></div>
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
  <!-- <script src="http://maps.google.com/maps/api/js?key=AIzaSyCnT63XUjqjPgXZ0lFTU_pdpfUX7swzTTM&amp;sensor=true"></script>
  <script src="assets/modules/gmaps.js"></script> -->

  <!-- Page Specific JS File -->


  <!-- JS Libraies -->
  <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>

  <!-- Template JS File -->
  <script src="js/scripts.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>
<!-- <script type="text/javascript">
  "use strict";

  var input_lat = $("#input-lat"), // latitude input text
    input_lng = $("#input-lng"), // longitude input text
    map = new GMaps({ // init map
      div: '#map',
      lat: <?= $rowuser->sellerlatitude ?>,
      lng: <?= $rowuser->sellerlongitude ?>
    });

  // add marker
  var marker = map.addMarker({
    lat: <?= $rowuser->sellerlatitude ?>,
    lng: <?= $rowuser->sellerlongitude ?>,
    draggable: false,
  });

  // when the map is clicked
  map.addListener("click", function(e) {
    var lat = e.latLng.lat(),
      lng = e.latLng.lng();

    // move the marker position
    marker.setPosition({
      lat: lat,
      lng: lng
    });
    update_position();
  });

  // when the marker is dragged
  marker.addListener('drag', function(e) {
    update_position();
  });

  // set the value to latitude and longitude input
  update_position();

  function update_position() {
    var lat = marker.getPosition().lat(),
      lng = marker.getPosition().lng();
    input_lat.val(lat);
    input_lng.val(lng);
  }

  // move the marker when the latitude and longitude inputs change in value
  $("#input-lat,#input-lng").blur(function() {
    var lat = parseInt(input_lat.val()),
      lng = parseInt(input_lng.val());

    marker.setPosition({
      lat: lat,
      lng: lng
    });
    map.setCenter({
      lat: lat,
      lng: lng
    });
  });
</script> -->
<script src="/knplfy/readonly.js"></script>
<script>
  initializeLeaflet({
    latitude: <?php echo $rowuser->sellerlatitude;  ?>,
    longitude: <?php echo $rowuser->sellerlongitude;  ?>
  })
</script>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Active This User?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you want to continue?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form id="" action="query.php" method="post">
          <input type="text" name="sellerid" value="<?php echo $sellerID; ?>" hidden>
          <button type="submit" name="activethisseller" class="btn btn-success">Yes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deactive This User?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you want to continue?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form id="" action="query.php" method="post">
          <input type="text" name="sellerid" value="<?php echo $sellerID; ?>" hidden>
          <button type="submit" name="deactivethisseller" class="btn btn-danger">Yes</button>
        </form>
      </div>
    </div>
  </div>
</div>