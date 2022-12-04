<?php include('../1connection.php'); ?>
<?php include('session/1session.php'); ?>
<!DOCTYPE html>
<html lang="en">


<!-- -->
<?php include('addson/1head.php'); ?>
<!-- CSS Libraries -->
<link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">
<link rel="stylesheet" href="assets/modules/jquery-selectric/selectric.css">
<link rel="stylesheet" href="assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">


<body>
    <?php include_once('../knplfy/includes.php') ?>

    <!-- Page Loader -->
    <?php include('addson/1loader.php'); ?>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <!-- Start app top navbar -->
            <?php include('addson/1topnav.php'); ?>

            <!-- Start main left sidebar menu -->
            <?php include('addson/1leftnav.php'); ?>

            <!-- Start app main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item"><a href="product.php">Products</a></div>
                            <div class="breadcrumb-item">Add New Product</div>
                        </div>
                    </div>

                    <div class="section-body">
                        <h2 class="section-title">Add New Product</h2>
                        <p class="section-lead">On this page you can create a new product and fill in all fields.</p>

                        <div class="row">
                            <div class="col-12">
                                <div class="card" style="background-color: #bcd4ba;">
                                    <div class="card-header">
                                        <h4>Write Your Products</h4>
                                    </div>
                                    <form method="post" action="query.php" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Item Name</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="name">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Quantity</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="number" class="form-control" name="quantity">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Price</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="number" class="form-control" name="price">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Minimum Order Quantity</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="number" class="form-control" name="moq" min="1" value="1">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Maximum Order Quantity</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="number" class="form-control" name="maxoq">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Total Sell</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="number" class="form-control" name="sell" readonly="" value="0">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <select class="form-control selectric" name="category">
                                                        <?php
                                                        $category = mysqli_query($con, "SELECT *  from category ") or die(mysqli_error($con));
                                                        while ($rowcategory = mysqli_fetch_object($category)) {
                                                        ?>
                                                            <option><?php echo $rowcategory->categoryNAME; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <textarea class="summernote-simple" style="border: solid 1px;" name="description"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <div id="image-preview" class="image-preview">
                                                        <label for="image-upload" id="image-label">Choose File</label>
                                                        <input type="file" name="imageupload" accept="image/*" id="image-upload" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tags</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control inputtags">
                                        </div>
                                    </div> -->
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Seller ID</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="sellerID" readonly="" value="<?= $rowseller->sellerID ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Longitude</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="long" readonly="" value="<?= $rowseller->sellerlongitude ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Latitude</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="lat" readonly="" value="<?= $rowseller->sellerlatitude ?>">
                                                </div>
                                            </div>

                                            <div class="alert alert-warning">
                                                You cant drag the marker, the location of the item is based on your store location. Thank You.
                                            </div>
                                            <div id="leaflet_map" style="height:400px"></div>
                                            <hr>
                                            <div class="form-group row mb-4 text-md-right">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                                <div class="col-sm-12 col-md-7">
                                                    <a href="product.php" class="btn btn-danger">Cancel</a>
                                                    <button type="submit" name="btnitemadds" class="btn btn-primary">Add Product</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Start app Footer part -->
            <?php include('addson/1footer.php'); ?>
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

    <!-- JS Libraies -->
    <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
    <script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/modules/datatables/datatables.min.js"></script>
    <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/modules/summernote/summernote-bs4.js"></script>
    <script src="assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
    <script src="assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
    <script src="assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="js/page/features-post-create.js"></script>
    <!-- Page Specific JS File -->
    <script src="js/page/modules-datatables.js"></script>
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
    lat: <?php echo $rowseller->sellerlatitude;  ?>,
    lng: <?php echo $rowseller->sellerlongitude;  ?>
  });

// add marker
var marker = map.addMarker({
  lat: <?php echo $rowseller->sellerlatitude;  ?>,
  lng: <?php echo $rowseller->sellerlongitude;  ?>,
  draggable: false,
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

<script src="/knplfy/readonly.js"></script>
<script>
    initializeLeaflet({
        latitude: <?php echo $rowseller->sellerlatitude;  ?>,
        longitude: <?php echo $rowseller->sellerlongitude;  ?>
    })
</script>