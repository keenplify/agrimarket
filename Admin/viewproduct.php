<?php include('../1connection.php'); ?>
<?php include('1session.php'); ?>
<?php 
 if(isset($_GET['itemid']) ? $_GET['itemid'] : ''){
    $itemid = $_GET['itemid'];
$itemlist=mysqli_query($con,"SELECT * from item where itemID = '$itemid'")or die(mysqli_error($con));
      $row=mysqli_fetch_object($itemlist);
 }else{
         echo"<script type='text/javascript'>window.location.replace('errors-404.php');</script>";
      }
?>
<!DOCTYPE html>
<html lang="en">

<!-- -->
<?php include('1head.php'); ?>

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
                    <h1>Product Info</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Product List</a></div>
                        <div class="breadcrumb-item">Product Info</div>
                    </div>
                </div>

                <div class="section-body">

                    <h2 class="section-title">Product Images & Info</h2>
                    <div class="row">
                        <div class="col-12">
                            <div class="card bg-light">
                                 <div class="row">
                                  
                                <div class="col-6 " style="">
                                   <center>
                                    <div class="chocolat-parent">
                                        
                                        <a href="../img/product/<?php  if($row->itemIMG==NULL){ ?>null.png<?php } else { echo $row->itemIMG;?><?php } ?>" class="chocolat-image" title="Just an example">
                                            <div data-crop-image="">
                                                <img alt="image" src="../img/product/<?php echo $row->itemIMG;  ?>" style="border:black solid  2px; width: 80%; height: auto;margin-top: 10px;" class="img-fluid" >
                                            </div>
                                        </a>

                                    </div>
                                    </center>
                                    <hr>
                                            <!-- <div class="gallery " style=" margin:10px;">
                                                 <center>
                                                <div class="gallery-item" data-image="assets/img/example-image.jpg" data-title="Image 1"  style="border:solid black 1px;"></div>
                                                <div class="gallery-item" data-image="assets/img/example-image.jpg" data-title="Image 2" style="border:solid black 1px;"></div>
                                                <div class="gallery-item" data-image="assets/img/example-image.jpg" data-title="Image 3" style="border:solid black 1px;"></div>
                                                <div class="gallery-item" data-image="assets/img/example-image.jpg" data-title="Image 4" style="border:solid black 1px;"></div>
                                                <div class="gallery-item" data-image="assets/img/example-image.jpg" data-title="Image 5" style="border:solid black 1px;"></div>
                                                <div class="gallery-item" data-image="assets/img/example-image.jpg" data-title="Image 6" style="border:solid black 1px;"></div>
                                                <div class="gallery-item" data-image="assets/img/example-image.jpg" data-title="Image 7" style="border:solid black 1px;"></div>
                                                <div class="gallery-item" data-image="assets/img/example-image.jpg" data-title="Image 8"  style="border:solid black 1px;"></div>
                                                 </center>
                                            </div> -->

                                    </div>
                                    

                                    <div class="col-6">
                                        <h5 style="margin-top: 20px"><?php echo $row->itemNAME;  ?></h5>
                                        <p>

                                            <b>Category:</b> <?php echo $row->itemCATEGORY;  ?><br>
                                            <b>Quantity Left:</b> <?php echo $row->itemQUANTITY;  ?><br>
                                            <b>Price:</b> <?php echo $row->itemPRICE;  ?><br>
                                            <b>Seller:</b> <?php echo $row->itemTOTALSELL;  ?><br>
                                            <b>Item Sell:</b> <?php echo $row->itemSELLER;  ?><br>
                                            <b>Description:</b> <?php echo $row->itemDESCRIPTION;  ?><br>


                                        </p>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 class="section-title">Product Location</h2>
                    <div class="row">
                        <div class="col-12">
                            <div class="card bg-light">
                                
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="input-lat" value="<?php echo $row->itemLATITUDE;  ?>" placeholder="Latitude" readonly>
                                                <input type="text" class="form-control" id="input-lng" value="<?php echo $row->itemLONGITUTE;  ?>" placeholder="Longitude" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="alert alert-info">
                                        You can drag the marker, change the value of longitude and latitude at the above input and click on the desired position on the map to change the position of the marker.
                                    </div> -->
                                    <!-- <div id="map" data-height="400"></div> -->
                                    <div id="leaflet_map" style="opacity: 100%; min-height: 300px;border: solid 1px"></div>
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
<!-- <script src="js/page/gmaps-draggable-marker.js"></script> -->

<!-- JS Libraies -->
<script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
<script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>

<!-- Template JS File -->
<script src="js/scripts.js"></script>
<script src="js/custom.js"></script>
</body>
</html>

<?php 
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    include_once("$root/knplfy/includes.php");
?>
<script src="/knplfy/readonly.js"></script>
<script>
    initializeLeaflet({
        latitude: <?php echo $row->itemLATITUDE;  ?>,
        longitude: <?php echo $row->itemLONGITUTE;  ?>
    })
</script>

<!-- <script type="text/javascript">
   "use strict";

var input_lat = $("#input-lat"), // latitude input text
  input_lng = $("#input-lng"), // longitude input text
  map = new GMaps({ // init map
    div: '#map',
    lat: <?php echo $row->itemLATITUDE;  ?>,
    lng: <?php echo $row->itemLONGITUTE;  ?>
  });

// add marker
var marker = map.addMarker({
  lat: <?php echo $row->itemLATITUDE;  ?>,
  lng: <?php echo $row->itemLONGITUTE;  ?>,
  draggable: true,
});

// when the map is clicked
// map.addListener("click", function(e) {
//   var lat = e.latLng.lat(), 
//     lng = e.latLng.lng();

//   // move the marker position
//   marker.setPosition({
//     lat: lat,
//     lng: lng
//   });
//   update_position();       
// });

// // when the marker is dragged
// marker.addListener('drag', function(e) {
//   update_position();
// });

// set the value to latitude and longitude input
// update_position();
// function update_position() {
//   var lat = marker.getPosition().lat(), lng = marker.getPosition().lng();
//   input_lat.val(lat);
//   input_lng.val(lng);
// }

// move the marker when the latitude and longitude inputs change in value
// $("#input-lat,#input-lng").blur(function() {
//   var lat = parseInt(input_lat.val()), 
//     lng = parseInt(input_lng.val());

//   marker.setPosition({
//     lat: lat,
//     lng: lng
//   });
//   map.setCenter({
//     lat: lat,
//     lng: lng
//   });
// }); 

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