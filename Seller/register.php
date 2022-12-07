<?php include('../1connection.php'); ?>
<?php
if (isset($_SESSION['seller'])) {
  //unset($_SESSION['cid']);
  unset($_SESSION['seller']);
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- auth-login.html  Tue, 07 Jan 2020 03:39:47 GMT -->
<?php include('addson/1head.php'); ?>

<body class="layout-4 bg-dark" style="">
  <?php include_once('../knplfy/includes.php') ?>
  <script src="/knplfy/draggable.js" defer></script>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <a href="/">
                <img src="/img/banner/logo-white.png" class="mr-3 rounded" style="height:48px; width:auto" src="" alt="product img">
                < </a>
            </div>
            <div class="card card-primary" style="border: 1px solid;">
              <div class="card-header">
                <h4>Create Account</h4>
              </div>
              <span id="error"></span>
              <div class="card-body">

                <div class="card-body">
                  <form method="POST" action="query.php" enctype="multipart/form-data">
                    <div class="form-divider">Personal Information</div>
                    <div class="row">
                      <div class="form-group col-6">
                        <label for="frist_name">Profile Image</label><br>
                        <input type="file" accept="image/*" name="imageupload" id="image-upload" required="" />
                      </div>
                      <div class="form-group col-6">
                        <input type="checkbox" id="is-seasonal" name="isSeasonal">
                        <label for="is-seasonal"> I am a seasonal farmer</label><br>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-6">
                        <label for="first_name">First Name</label>
                        <input id="first_name" type="text" class="form-control" name="firstName" required="" autofocus>
                      </div>
                      <div class="form-group col-6">
                        <label for="last_name">Last Name</label>
                        <input id="last_name" type="text" class="form-control" name="lastName" required="" autofocus>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-6">
                        <label for="frist_name">Mobile Number</label>
                        <input id="" type="tel" class="form-control" name="number" required="" placeholder="09575214954" pattern="[0]{1}[9]{1}[0-9]{9}" autofocus>
                      </div>
                      <div class="form-group col-6">
                        <label for="frist_name">Email</label>
                        <input id="" type="email" class="form-control" name="email" required="" autofocus>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-6">
                        <label for="frist_name">Gender</label>
                        <select class="form-control" name="gender" required>
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                      </div>
                      <div class="form-group col-6">
                        <label for="frist_name">Primary Produce Category</label>
                        <select class="form-control" name="categoryId" required>
                          <?php
                          $categories = mysqli_query($con, "SELECT *  from category ") or die(mysqli_error($con));
                          while ($category = mysqli_fetch_object($categories)) {
                          ?>
                            <option value="<?= $category->categoryID; ?>"><?= $category->categoryNAME; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="frist_name">Security Question</label>
                      <select class="form-control mb-2" name="securityQuestion" required>
                        <option>In what city were you born?</option>
                        <option>What is the name of your favorite pet?</option>
                        <option>What is your mothers maiden name?</option>
                        <option>What high school did you attend?</option>
                        <option>What was the name of your elementary school?</option>
                        <option>What was the make of your first car?</option>
                        <option>What was your favorite food as a child?</option>
                      </select>
                      <input class="form-control" name="securityAnswer" required placeholder="Your answer">
                    </div>
                </div>
                <div class="form-divider">Security</div>
                <div class="row">
                  <div class="form-group col-6">
                    <label for="password" class="d-block">Username</label>
                    <input id="password" type="text" class="form-control pwstrength" data-indicator="" name="username" required>
                  </div>
                  <div class="form-group col-6">
                    <label for="password2" class="d-block">Password</label>
                    <input id="password2" type="password" class="form-control" name="password">
                  </div>
                </div>
                <div class="form-divider">Address</div>
                <!-- <label>House No.</label>
                    <input type="text" class="form-control" id="" name="no" required="">
                    <div class="form-group">
                      <label>Region</label>
                      <input id="region" class="form-control" name="region" required=""></input>
                    </div>
                    <div class="form-group">
                      <label>Province</label>
                      <input id="province" class="form-control" name="province" required=""></input>
                    </div>
                    <div class="form-group">
                      <label>City</label>
                      <input id="city" class="form-control" name="city" required=""></input>
                    </div>
                    <div class="form-group">
                      <label>Barangay</label>
                      <input id="barangay" class="form-control" name="barangay" required=""></input>
                    </div> -->
                <?php include "../components/address-fields.php" ?>
                <!-- <input type="text" class="form-control" id="accountID" name="accountID" value="<?php echo $row->accountID; ?>" hidden> -->
                <!-- <input type="text" name="region2" hidden >
                    <input type="text" name="province2" hidden >
                    <input type="text" name="city2" hidden>
                    <input type="text" name="barangay2" hidden required=""> -->
                <div class="row">
                  <div class="form-group col-6">
                    <label>Latitude</label>
                    <input type="text" id="input-lat" class="form-control" name="lat" readonly="">
                  </div>
                  <div class="form-group col-6">
                    <label>Longitude</label>
                    <input type="text" id="input-lng" class="form-control" name="lng" readonly="">
                  </div>
                </div>
                <div class="alert alert-info">
                  You can drag the marker, change the value of longitude and latitude at the above input and click on the desired position on the map to change the position of the marker.
                </div>

                <div id="map" data-height="400" style="display:none"></div>
                <div id="leaflet_map" style="height:400px"></div>
                <div class="form-divider">Terms and Conditions</div>
                <div class="form-group">
                  <div class="">
                    <input type="checkbox" id="myCheck" onclick="myFunction()" required="">
                    <label class="" for="agree">I agree with the terms and conditions</label>
                  </div>
                  <div class="alert alert-success" id="text" style="display:none">
                    I agree that all info here is valid or true. Any wrong information or misused of the system will be block by tehe admin. I agree that the admin will check all the info and wait for few hours for my account to be active.
                  </div>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" name="btncreateaccount">Register</button>
                </div>
                </form>
              </div>


            </div>
          </div>
        </div>
      </div>
  </div>
  </section>
  <div class="text-white text-center">
            You have an account? <a href="login.php">Login</a>
          </div>
          <div class="simple-footer text-white">
            Copyright &copy; 2022
          </div>
  </div>

  <!-- General JS Scripts -->
  <script src="assets/bundles/lib.vendor.bundle.js"></script>
  <script src="js/CodiePie.js"></script>

  <!-- JS Libraies -->
  <!-- <script src="http://maps.google.com/maps/api/js?key=AIzaSyCnT63XUjqjPgXZ0lFTU_pdpfUX7swzTTM&amp;sensor=true"></script> -->
  <!-- <script src="assets/modules/gmaps.js"></script> -->

  <!-- Page Specific JS File -->
  <!-- <script src="js/page/gmaps-draggable-marker.js"></script> -->
  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="js/scripts.js"></script>
  <script src="js/custom.js"></script>
</body>

<!-- auth-login.html  Tue, 07 Jan 2020 03:39:47 GMT -->

</html>
<!-- 
<script type="text/javascript">
  "use strict";

  var input_lat = $("#input-lat"), // latitude input text
    input_lng = $("#input-lng"), // longitude input text
    map = new GMaps({ // init map
      div: '#map',
      lat: 14.543068553465336,
      lng: 121.0164794921875
    });

  // add marker
  var marker = map.addMarker({
    lat: 14.543068553465336,
    lng: 121.0164794921875,
    draggable: true,
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
  GMaps.geolocate({
    // when geolocation is allowed by user
    success: function(position) {
      // set center map according to user position
      map.setCenter(position.coords.latitude, position.coords.longitude);

    },
    // when geolocation is blocked by the user
    error: function(error) {
      toastr.error('Geolocation failed: ' + error.message);
    },
    // when the user's browser does not support
    not_supported: function() {
      toastr.error("Your browser does not support geolocation");
    }
  });
</script> -->
<script type="text/javascript">
  function myFunction() {
    // Get the checkbox
    var checkBox = document.getElementById("myCheck");
    // Get the output text
    var text = document.getElementById("text");

    // If the checkbox is checked, display the output text
    if (checkBox.checked == true) {
      text.style.display = "block";
    } else {
      text.style.display = "none";
    }
  }
</script>

<!-- <script type="text/javascript" src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations.js"></script> -->

<!-- 

<script type="text/javascript">
  var my_handlers = {

    fill_provinces: function() {

      var region_code = $(this).val();
      $('#province').ph_locations('fetch_list', [{
        "region_code": region_code
      }]);

    },

    fill_cities: function() {

      var province_code = $(this).val();
      $('#city').ph_locations('fetch_list', [{
        "province_code": province_code
      }]);
    },


    fill_barangays: function() {

      var city_code = $(this).val();
      $('#barangay').ph_locations('fetch_list', [{
        "city_code": city_code
      }]);
    }
  };

  $(function() {
    $('#region').on('change', my_handlers.fill_provinces);
    $('#province').on('change', my_handlers.fill_cities);
    $('#city').on('change', my_handlers.fill_barangays);

    $('#region').ph_locations({
      'location_type': 'regions'
    });
    $('#province').ph_locations({
      'location_type': 'provinces'
    });
    $('#city').ph_locations({
      'location_type': 'cities'
    });
    $('#barangay').ph_locations({
      'location_type': 'barangays'
    });

    $('#region').ph_locations('fetch_list');


    $('#region').on('change', function() {


      var selected_caption = $("#region option:selected").text();


      $('input[name=region2]').val(selected_caption);

    }).ph_locations('fetch_list');
    $('#province').on('change', function() {


      var selected_province = $("#province option:selected").text();


      $('input[name=province2]').val(selected_province);

    }).ph_locations('fetch_list');
    $('#city').on('change', function() {


      var selected_city = $("#city option:selected").text();


      $('input[name=city2]').val(selected_city);

    }).ph_locations('fetch_list');
    $('#barangay').on('change', function() {


      var selected_barangay = $("#barangay option:selected").text();


      $('input[name=barangay2]').val(selected_barangay);

    }).ph_locations('fetch_list');
  });
</script> -->