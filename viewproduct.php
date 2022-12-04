<?php include('1connection.php'); ?>
<?php include('1sessionrequired.php'); ?>
<?php
if (isset($_GET['itemid']) ? $_GET['itemid'] : '') {
    $itemid = $_GET['itemid'];
    $itemlist = mysqli_query($con, "SELECT * from item where itemID = '$itemid'") or die(mysqli_error($con));
    $rows = mysqli_fetch_object($itemlist);

    $sellerId = $rows->itemSELLER;
    $accountId = $row->accountID;

    mysqli_query($con, "INSERT INTO visitors (visitor_seller_id, visitor_account_id) VALUES ('$sellerId', '$accountId')");
    $visitorId = $con->insert_id;
} else {
    echo "<script type='tex  <?php include_once('knplfy/includes.php') ?>
         /javascript'>window.location.replace('errors-404.php');</script>";
}

?>
<?php
$sellers = mysqli_query($con, "SELECT * from seller where sellerID = '$rows->itemSELLER'") or die(mysqli_error($con));
$rowseller = mysqli_fetch_object($sellers);
?>
<!DOCTYPE html>
<html lang="en">

<!-- layout-top-navigation.html -->
<?php include('1head.php') ?>

<body class="layout-3">
    <?php include_once('knplfy/includes.php') ?>
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>
    <div id="app">
        <div class="main-wrapper container">
            <div class="navbar-bg"></div>

            <!-- Start app top navbar -->

            <?php include('1nav.php'); ?>
            <!-- Start top menu -->


            <!-- Start app main Content -->
            <div class="main-content">

                <section class="section">

                    <h2 class="section-title" style="margin-top: 50PX;">Product Images & Info</h2>
                    <div class="section-body">

                        <div class="row">

                            <div class="col-12 col-md-12 col-lg-7 p-0">
                                <!-- style="background-color: #bcd4ba;" -->

                                <center>
                                    <div class="chocolat-parent">

                                        <a href="img/product/<?php if ($rows->itemIMG == NULL) { ?>null.png<?php } else {
                                                                                                            echo $rows->itemIMG; ?><?php } ?>" class="chocolat-image" title="Just an example">
                                            <div data-crop-image="">
                                                <img alt="image" src="img/product/<?php echo $rows->itemIMG;  ?>" style="border:black solid  2px; width: 80%; height: auto;margin-top: 10px;" class="img-fluid">
                                            </div>
                                        </a>

                                    </div>
                                </center>
                                <div class="text-md-right" style="margin-top: 20px; margin-right: 30px;">

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
                                            </div> -->
                            </div>
                            <div class="col-12 col-md-12 col-lg-5 p-0">
                                <!-- style="background-color: #bcd4ba;" -->

                                <h5 style="margin-top:5px"><?php echo $rows->itemNAME;  ?></h5>

                                <b>Product Location</b>
                                <center>
                                    <div id="leaflet_map" style="opacity: 100%; min-height: 300px;border: solid 1px"></div>
                                </center>

                                <form method="post" action="query.php" id="form">
                                    <input type="hidden" name="visitorId" value="<?= $visitorId ?>">
                                    <p>
                                        <b>Full Address:</b> <?php echo $rowseller->selleraddress;  ?><br>
                                        <b>Category:</b> <?php echo $rows->itemCATEGORY;  ?><br>
                                        <b>Quantity Left:</b> <?php echo $rows->itemQUANTITY;  ?><br>
                                        <b>Price:</b> <?php echo $rows->itemPRICE;  ?><br>
                                        <b>Item Sell:</b> <?php echo $rows->itemTOTALSELL;  ?><br>
                                        <b>Minimum order Quantity:</b> <?php echo $rows->itemMOQ;  ?><br>
                                        <?php if (!is_null($rows->itemMAXOQ)) {?>
                                            <b>Maximum order Quantity:</b> <?php echo $rows->itemMAXOQ;  ?><br>
                                        <?php } ?>

                                        <b>Seller:</b><?php echo $rowseller->sellerfirstname;  ?> <?php echo $rowseller->sellerlastname;  ?><br>
                                        <b>Description:</b> <?php echo $rows->itemDESCRIPTION;  ?><br>

                                        <hr>
                                        <b>Quantity:</b>
                                        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                                        <!------ Include the above in your HEAD tag ---------->

                                    <div class="center" style="width:200px;">
                                        <p>
                                        </p>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" id="subtract-quantity" class="btn btn-danger btn-number" data-type="minus" data-field="quant" style="border: solid 4px black;">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </span>
                                            <input type="text" name="quant" id="quantity" class="form-control input-number" value="<?php echo $rows->itemMOQ ?>" min="<?php echo $rows->itemMOQ ?>" max="<?php echo max(0, min($rows->itemQUANTITY, $rows->itemMAXOQ));  ?>" style="border: solid 4px black;">
                                            <span class="input-group-btn">
                                                <button type="button" id="add-quantity" class="btn btn-success btn-number" data-type="plus" data-field="quant" style="border: solid 4px black;">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </span>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="text-md-right" style="margin-top: 10px; margin-right: 30px; margin-bottom: 10px; ">
                                        <?php if (!isset($_SESSION['account'])) {
                                        } else { ?>
                                            <input type="hidden" name="accountID" value="<?php echo $accountID; ?>" hidden>
                                            <input type="hidden" name="itemID" value="<?php echo $itemid; ?> " hidden>
                                            <input type="hidden" name="sellerID" value="<?php echo $rows->itemSELLER; ?>" hidden>
                                            <button type="submit" class="btn btn-primary" name="btnaddtocart">Add To Cart</button>
                                        <?php } ?>
                                    </div>
                                </form>
                                <section id="reviews" class="container">
                                    <h2>Reviews</h2>
                                    <?php
                                    $reviewsQuery = mysqli_query(
                                        $con,
                                        "SELECT * FROM cart LEFT JOIN account ON account.accountID = cart.accountID WHERE cart.itemID='$itemid' AND cart.CARTREVIEW IS NOT NULL ORDER BY cart.cartREVIEWRATING DESC"
                                    ) or die(mysqli_error($con));
                                    $total = 0;
                                    while ($cart = mysqli_fetch_object($reviewsQuery)) {
                                        $total++;
                                    ?>
                                        <div class="alert alert-light" role="alert">
                                            <div class="d-flex align-items-center mb-2 alert-heading" style="pointer-events: none;">
                                                <b class="mr-1"><?= $cart->name ?>'s Rating:</b> 
                                                <span class="mr-2"><?= $cart->cartREVIEWRATING?>/5</span>
                                                <div id='rating-view-<?=$cart->cartID ?>'></div>
                                            </div>
                                            
                                            <script>
                                            var myRating = jSuites.rating(document.getElementById('rating-view-<?=$cart->cartID ?>'), {
                                                value: <?= $cart->cartREVIEWRATING?>,
                                                tooltip: [ 'Very bad', 'Bad', 'Average', 'Good', 'Very good' ],
                                            });
                                            </script>
                                            <p><?= $cart->cartREVIEW ?></p>
                                        </div>
                                    <?php
                                    }

                                    if ($total == 0) {
                                    ?>
                                        <p>No reviews found.</p>
                                    <?php
                                    }
                                    ?>
                                    </table>
                                </section>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Start app Footer part -->
            <?php include('1footer.php') ?>
        </div>
    </div>

    <script src="/knplfy/readonly.js"></script>
    <script>
        initializeLeaflet({
            latitude: <?php echo $rows->itemLATITUDE;  ?>,
            longitude: <?php echo $rows->itemLONGITUTE;  ?>
        })
    </script>

    <!-- General JS Scripts -->
    <script src="assets/bundles/lib.vendor.bundle.js"></script>
    <script src="js/CodiePie.js"></script>

    <!-- JS Libraies -->
    <!-- JS Libraies -->
    <!-- <script src="http://maps.google.com/maps/api/js?key=AIzaSyCnT63XUjqjPgXZ0lFTU_pdpfUX7swzTTM&amp;sensor=true"></script>
<script src="assets/modules/gmaps.js"></script> -->
    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="js/scripts.js"></script>
    <script src="js/custom.js"></script>
</body>

<!-- layout-top-navigation.html  Tue, 07 Jan 2020 03:35:42 GMT -->

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
<script type="text/javascript">
    $('.btn-number').click(function(e) {
        e.preventDefault();

        fieldName = $(this).attr('data-field');
        type = $(this).attr('data-type');
        var input = $("input[name='" + fieldName + "']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if (type == 'minus') {

                if (currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                }
                if (parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if (type == 'plus') {

                if (currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if (parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function() {
        $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function() {

        minValue = parseInt($(this).attr('min'));
        maxValue = parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        name = $(this).attr('name');
        if (valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if (valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }
    });
    $(".input-number").keydown(function(e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>

<?php include('./knplfy/footer.php'); ?>