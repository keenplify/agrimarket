<!DOCTYPE html>
<html>
<?php 
include('../1connection.php');
include('1head.php'); 
$sellerID=$_GET['sellerid'];
 $seller=mysqli_query($con,"SELECT seller.* from seller where sellerID = '$sellerID'")or die(mysqli_error($con));
            $rowseller=mysqli_fetch_object($seller); 
?>
<body>
<center>
  <form method="post" action="query.php">
        <div class="card-body" style="width: 50%;">
                                 <div class="row mb-4">
                                        
                                            <div class="input-group">
                                                <input type="text" name="lat" class="form-control" id="input-lat" placeholder="Latitude" readonly="">
                                                <input type="text" name="long" class="form-control" id="input-lng" placeholder="Longitude" readonly="">
                                                <input type="text" name="sellerid" class="form-control" readonly="" value="<?= $sellerID; ?>" >
                                            
                                        </div>
                                    </div>
                                    <div class="alert alert-info">
                                        You can drag the marker, change the value of longitude and latitude at the above input and click on the desired position on the map to change the position of the marker.
                                    </div>
                                
                                    <div id="map" data-height="400"></div>  
                                    <hr>
                                    <a href="viewprofile.php" class="btn btn-primary" style="color:white;">Close</a>
                                    <a data-toggle="modal" data-target="#Add" class="btn btn-primary" style="color:white;">Update Shop Location</a>

                                      <div class="modal fade" id="Add" tabindex="-1" role="dialog">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h4 class="title" id="defaultModalLabel"></h4>
                                              </div>
                                              <form id="" action="query.php" method="post" enctype="multipart/form-data">
                                              
                                              <div class="modal-body ">
                                                                  
                                                                         Are you sure to change your shop address?
                                                                      
                                              </div>
                                             
                                              <div class="modal-footer text-center">
                                                 
                                                      
                                                  <button type="submit" name="btnupdateaddress" class="btn btn-success btn-lg  waves-effect">Update</button>
                                                  
                                                  <a href="profile.php"  class="btn btn-danger btn-lg waves-effect" data-dismiss="modal">No</a>
                                              </div>
                                              </form>
                                          </div>
                                      </div>
                                  </div>

                                    

            </div>
        </form>
</center>
</body>
</html>

<!-- General JS Scripts -->
<script src="assets/bundles/lib.vendor.bundle.js"></script>
<script src="js/CodiePie.js"></script>

<!-- JS Libraies -->
<script src="http://maps.google.com/maps/api/js?key=AIzaSyCnT63XUjqjPgXZ0lFTU_pdpfUX7swzTTM&amp;sensor=true"></script>
<script src="assets/modules/gmaps.js"></script>

<!-- Page Specific JS File -->
<!-- <script src="js/page/gmaps-draggable-marker.js"></script> -->

<!-- JS Libraies -->

<script src="assets/modules/summernote/summernote-bs4.js"></script>
<script src="assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
<script src="assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
<script src="assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

<!-- Page Specific JS File -->
<script src="js/page/features-post-create.js"></script>

<!-- JS Libraies -->
<script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
<script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>

<!-- Template JS File -->
<script src="js/scripts.js"></script>
<script src="js/custom.js"></script>

<script type="text/javascript">
  "use strict";

var input_lat = $("#input-lat"), // latitude input text
  input_lng = $("#input-lng"), // longitude input text
  map = new GMaps({ // init map
    div: '#map',
    lat:  <?php echo $rowseller->sellerlatitude;  ?>,
    lng: <?php echo $rowseller->sellerlongitude;  ?>
  });

// add marker
var marker = map.addMarker({
  lat:  <?php echo $rowseller->sellerlatitude;  ?>,
  lng: <?php echo $rowseller->sellerlongitude;  ?>,
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
  var lat = marker.getPosition().lat(), lng = marker.getPosition().lng();
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
</script>