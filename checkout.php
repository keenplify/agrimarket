<?php include('1connection.php'); ?>
<?php include('1sessionrequired.php'); ?>
<!DOCTYPE html>
<html lang="en">

<!--  -->
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

                    <h2 class="section-title" style="margin-top: 50PX;">Checkout</h2>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-6 p-0">
                                <div class="card-header">
                                    <h4>Account Info</h4>
                                </div>
                                <div class="card-body">
                                    <div class="alert alert-warning">
                                        <b>Note!</b>You cant change any info here. Please update it in your profile.
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" value="<?= $row->name; ?>" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <input type="text" class="form-control" value="<?= $row->mobilenumber; ?>" readonly="">
                                    </div>
                                    <!-- <div class="form-group">
                                        <label>Birth Date</label>
                                        <input type="text" class="form-control" value="<?= $row->birthday; ?>" readonly="">
                                    </div> -->
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <input type="text" class="form-control" value="<?= $row->gender; ?>" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label>Full Address</label>
                                        <input type="text" class="form-control" value="<?= $row->addresshead; ?>" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label>Geolocation Address</label>
                                        <center>
                                            <div id="leaflet_map" style="opacity: 100%; min-height: 300px;border: solid 1px"></div>
                                        </center>
                                    </div>

                                </div>
                                <div class="card-footer text-right bg-light">

                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 p-0">
                                <div class="card-header">
                                    <h4>Order Summary</h4>
                                </div>
                                <div class="card-body p-0 ">
                                    <div class="table-responsive">
                                        <table class="table table-striped v_center">
                                            <tr class="bg-light">

                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>

                                            </tr>
                                            <?php
                                            $countthis = 0;
                                            $sumtotal = 0;
                                            $carttt = mysqli_query($con, "SELECT cart.*,account.*,item.* from cart,account,item where account.accountID = cart.accountID and  cart.itemID = item.itemID  ") or die(mysqli_error($con));
                                            while ($rowlastestfeaturedslidecarttt = mysqli_fetch_object($carttt)) {
                                                if ($rowlastestfeaturedslidecarttt->accountID == $accountID && $rowlastestfeaturedslidecarttt->orderID == '1') {
                                                    $countthis++;

                                            ?>
                                                    <tr>
                                                        <!-- <td class="p-0 text-center">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                                    <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                                </div>
                                                </td> -->

                                                        <td>
                                                            <?php echo $rowlastestfeaturedslidecarttt->itemNAME; ?>
                                                        </td>
                                                        <td class="align-middle">
                                                            P <?php echo $rowlastestfeaturedslidecarttt->itemPRICE; ?>.00
                                                        </td>
                                                        <td>
                                                            <?php echo $rowlastestfeaturedslidecarttt->cartCOUNT; ?><a href="" class=""></a>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $total = $rowlastestfeaturedslidecarttt->cartCOUNT * $rowlastestfeaturedslidecarttt->itemPRICE;
                                                            $sumtotal = $sumtotal + $total;
                                                            ?>
                                                            <b>₱<?php echo  $total; ?></b>

                                                        </td>


                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                            <tr class="bg-light">
                                                <td colspan="2">Total</td>
                                                <td></td>
                                                <td colspan="">
                                                    <h4>₱<?= $sumtotal; ?></h4>
                                                </td>
                                            </tr>
                                            <form method="post" action="query.php">
                                                <tr class="">
                                                    <td colspan=""><b>Type</b></td>
                                                    <td colspan="2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="type" id="delivery" value="Delivery" required>
                                                            <label class="form-check-label" for="delivery">Delivery</label>
                                                        </div>
                                                    </td>
                                                    <td colspan="">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="type" id="pick-up" value="Pick-Up" required>
                                                            <label class="form-check-label" for="pick-up">Pick-Up</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="bg-light">
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <input type="" name="iddd" value="<?php echo $row->accountID; ?>" hidden>
                                                    <td colspan="">
                                                        <?php
                                                        $name = $row->name;
                                                        $mobilenumber = $row->mobilenumber;
                                                        $addresshead = $row->addresshead;
                                                        $long = $row->longi;
                                                        $lat = $row->lat;
                                                        if (empty($name) || empty($mobilenumber) || empty($addresshead) || empty($long) || empty($lat)) { ?>
                                                            <button type="submit" class="btn btn-primary" name="btncomfirm2">Update your Profile</button>
                                                        <?php } else if ($countthis >= 1) { ?>
                                                            <button type="submit" class="btn btn-primary" name="btncomfirm2">Place Order</button>
                                                        <?php } else {  ?>
                                                            <a href="shop.php" class="btn btn-primary" name="">Continue Shop</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            </form>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Start app Footer part -->
            <?php include('1footer.php') ?>
        </div>
    </div>

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

<script src="/knplfy/readonly.js"></script>
    <script>
        initializeLeaflet({
            latitude: <?php echo $row->lat;  ?>,
            longitude: <?php echo $row->longi;  ?>
        })
    </script>

<script type="text/javascript">
    //    "use strict";

    // var input_lat = $("#input-lat"), // latitude input text
    //   input_lng = $("#input-lng"), // longitude input text
    //   map = new GMaps({ // init map
    //     div: '#map',
    //     lat: <?php echo $row->lat;  ?>,
    //     lng: <?php echo $row->longi;  ?>
    //   });

    // // add marker
    // var marker = map.addMarker({
    //   lat: <?php echo $row->lat;  ?>,
    //   lng: <?php echo $row->longi;  ?>,
    //   draggable: false,
    // });

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
    <?php include('./knplfy/footer.php'); ?>
</script>