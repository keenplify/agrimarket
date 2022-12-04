<?php include('../1connection.php'); ?>
<?php include('1session.php'); ?>
<?php
if (isset($_GET['itemid']) ? $_GET['itemid'] : '') {
    $itemid = $_GET['itemid'];
    $itemlist = mysqli_query($con, "SELECT * from item LEFT JOIN product_suggestions ON product_suggestion_id = itemPRODUCTTYPE where itemID = '$itemid'") or die(mysqli_error($con));
    $row = mysqli_fetch_object($itemlist);
} else {
    echo "<script type='text/javascript'>window.location.replace('errors-404.php');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- -->
<?php include('1head.php'); ?>

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

                                                    <a href="../img/product/<?php if ($row->itemIMG == NULL) { ?>null.png<?php } else {
                                                                                                                            echo $row->itemIMG; ?><?php } ?>" class="chocolat-image" title="Just an example">
                                                        <div data-crop-image="">
                                                            <img alt="image" src="../img/product/<?php echo $row->itemIMG;  ?>" style="border:black solid  2px; width: 80%; height: auto;margin-top: 10px;" class="img-fluid">
                                                        </div>
                                                    </a>

                                                </div>
                                            </center>
                                            <div class="text-md-right" style="margin-top: 20px; margin-right: 30px;">
                                                <button data-toggle="modal" data-target="#ImageUp" class="btn btn-primary">Update Featured Image</button>
                                            </div>

                                            <hr>
                                            <!--  <div class="gallery " style=" margin:10px;">
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
                                            </div>
                                                 <div class="text-md-right" style="margin-top: 10px; margin-right: 30px; margin-bottom: 10px; " >
                                      <button class="btn btn-primary">Update Other Image</button>   
                                    </div> -->
                                        </div>


                                        <div class="col-6">
                                            <h5 style="margin-top: 20px"><?php echo $row->itemNAME;  ?></h5>
                                            <p>

                                                <b>Category:</b> <?php echo $row->itemCATEGORY;  ?><br>
                                                <b>Quantity Left:</b> <?php echo $row->itemQUANTITY;  ?><br>
                                                <b>Price:</b> ₱<?php echo $row->itemPRICE;  ?><br>
                                                <b>Seller:</b> <?php echo $row->itemTOTALSELL;  ?><br>
                                                <b>Item Sell:</b> <?php echo $row->itemSELLER;  ?><br>
                                                <b>Minimum Order Quantity:</b> <?php echo $row->itemMOQ;  ?><br>
                                                <b>Maximum Order Quantity:</b> <?= empty($row->itemMAXOQ) ? 'None' : $row->itemMAXOQ;  ?><br>

                                                <b>Description:</b> <?php echo $row->itemDESCRIPTION;  ?><br>


                                            </p>
                                            <div class="text-md-right" style="margin-top: 20px; margin-right: 30px;">
                                                <button data-toggle="modal" data-target="#Details" class="btn btn-primary">Update Details</button>
                                            </div>
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
                                                    <input type="text" class="form-control" id="input-lat" value="<?php echo $rowseller->sellerlatitude;  ?>" placeholder="Latitude" readonly>
                                                    <input type="text" class="form-control" id="input-lng" value="<?php echo $rowseller->sellerlongitude;  ?>" placeholder="Longitude" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="alert alert-info">
                                            You can update the item location by updating your store location. Thank You!.
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
    <!-- <script src="js/page/gmaps-draggable-marker.js"></script> -->

    <!-- JS Libraies -->
    
    <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
    <script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/modules/summernote/summernote-bs4.js"></script>
    
    <!-- Template JS File -->
    <script src="js/scripts.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>
<!-- 
<script type="text/javascript">
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
<div class="modal fade" id="ImageUp" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel"></h4>
            </div>
            <form id="" action="query.php" method="post" enctype="multipart/form-data">

                <div class="modal-body bg-light">

                    <h2 class="section-title">Update Product Image</h2>


                    <input type="text" name="id" value="<?php echo $row->itemID;  ?>" hidden>
                    <input type="files" accept="image/*" name="iamgedefault" value="<?php echo $row->itemIMG;  ?>" hidden>
                    <img alt="image" src="../img/product/<?php echo $row->itemIMG;  ?>" style="border:black solid  2px; width: 80%; height: auto;margin-top: 10px;" class="img-fluid">
                    <hr>
                    <input type="file" accept="image/*" name="imageupload" id="image-upload" />






                </div>

                <div class="modal-footer text-center">


                    <button type="submit" name="btnupdatesproductsimg" class="btn btn-success btn-lg  waves-effect">Update</button>

                    <a href="" class="btn btn-danger btn-lg waves-effect" data-dismiss="modal">No</a>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="Details" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel"></h4>
            </div>
            <form id="" action="query.php" method="post" enctype="multipart/form-data">

                <div class="modal-body bg-light">

                    <h2 class="section-title">Update Product Details</h2>

                    <div class="card-body">
                        <input type="text" name="id" value="<?php echo $row->itemID;  ?>" hidden>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Item Name</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="name" value="<?php echo $row->itemNAME;  ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Quantity</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="quantity" value="<?php echo $row->itemQUANTITY;  ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Minimum Order Quantity</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="moq" value="<?php echo $row->itemMOQ;  ?>">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Maximum Order Quantity</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="maxoq" value="<?php echo $row->itemMAXOQ;  ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Price</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="number" class="form-control" name="price" value="<?php echo $row->itemPRICE;  ?>">
                                <small id="price-suggestion">The suggested price for this product is <b>₱<?= $row->product_suggestion_price ?></b></small>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control selectric" name="category" id="categorySelect" onchange="handleCategoryChange()">
                                    <option><?php echo $row->itemCATEGORY;  ?></option>
                                    <?php
                                    $category = mysqli_query($con, "SELECT *  from category ") or die(mysqli_error($con));
                                    while ($rowcategory = mysqli_fetch_object($category)) {
                                        if ($row->itemCATEGORY !== $rowcategory->categoryNAME){
                                            ?> <option><?php echo $rowcategory->categoryNAME; ?></option> <?php
                                        }
                                    } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Type</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control selectric" name="suggestion" id="suggestionSelect" onchange="handleSuggestionChange()" required>
                                <?php if (!is_null($row->itemPRODUCTTYPE)) {?>
                                    <option value="<?=$row->itemPRODUCTTYPE ?>"><?= $row->product_suggestion_name?></option>
                                <?php }?>
                            </select>
                            </div>
                        </div>

                        <script defer>
                            let categoriesSelect;
                            let suggestionsSelect;
                            let priceSuggestionElement;
                            let suggestions;

                            async function handleCategoryChange() {
                                const suggestionsJSON = await $.ajax(`/knplfy/api/suggestions.php?categoryName=${categoriesSelect.value}`).promise();

                                suggestions = JSON.parse(suggestionsJSON);

                                let html = "";
                                for (const suggestion of suggestions) {
                                    html += `<option value="${suggestion.product_suggestion_id}">${suggestion.product_suggestion_name}</option>`;
                                }

                                // suggestionsSelect.innerHTML = html;
                                $("#suggestionSelect").html(html);

                                handleSuggestionChange();
                            }

                            async function handleSuggestionChange() {
                                const suggestion = suggestions.find(v => v.product_suggestion_id == suggestionsSelect.value);

                                priceSuggestionElement.innerHTML = `The suggested price for this product is <b>₱${suggestion.product_suggestion_price}</b>`;
                            }

                            $(document).ready(() => {
                                categoriesSelect = document.querySelector("#categorySelect");
                                suggestionsSelect = document.querySelector("#suggestionSelect");
                                priceSuggestionElement = document.querySelector("#price-suggestion");
                            })
                        </script>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="summernote-simple" id="description" style="border: solid 1px black;" name="description">
                                    <?= $row->itemDESCRIPTION;  ?>
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer text-center">


                    <button type="submit" name="btnupdatesproducts" class="btn btn-success btn-lg  waves-effect">Update</button>

                    <a href="" class="btn btn-danger btn-lg waves-effect" data-dismiss="modal">No</a>
                </div>
            </form>
        </div>
    </div>
</div>