<?php include('../1connection.php'); ?>
<?php include('1session.php'); ?>
<?php
if (isset($_GET['orderid']) ? $_GET['orderid'] : '') {
    $orderid = $_GET['orderid'];
    $accountID2 = $_GET['accountID'];
} else {
    echo "<script type='text/javascript'>window.location.replace('errors-404.php');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- -->
<?php 
include('1head.php'); 
include('../knplfy/includes.php');
?>

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
                <section class="section" id="printableArea">
                    <div class="section-header">

                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Invoice</a></div>

                        </div>
                    </div>

                    <div class="section-body">
                        <h2 class="section-title">Invoice</h2>
                        <?php

                        $slide12 = mysqli_query($con, "SELECT cart.*,item.*,account.* from cart,item,account where cart.itemID = item.itemID and cart.accountID = account.accountID group by cart.orderID order by cart.cartID desc ") or die(mysqli_error($con));
                        while ($rowslide12 = mysqli_fetch_object($slide12)) {
                            if ($rowslide12->orderID == $orderid) {


                                $od = $rowslide12->orderID;
                                $ad = $rowslide12->name;
                                $as = $rowslide12->accountID;

                        ?>
                                <div class="invoice">
                                    <div class="invoice-print">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="invoice-title">
                                                    <h2>Invoice</h2>
                                                    <div class="invoice-number">Order #: <?php echo $od; ?></div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <address>
                                                            <strong>Billed To:</strong><br>
                                                            You
                                                        </address>
                                                    </div>
                                                    <div class="col-md-6 text-md-right">
                                                        <address>
                                                            <strong>Shipped To:</strong><br>

                                                            <?php echo $rowslide12->name; ?><br>
                                                            <?php echo $rowslide12->addresshead; ?><br>
                                                            <?php echo $rowslide12->mobilenumber; ?><br>

                                                        </address>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <address>
                                                            <strong>Type:</strong><br>
                                                            <?= $rowslide12->cartTYPE ?>
                                                        </address>
                                                    </div>
                                                    <div class="col-md-6 text-md-right">
                                                        <address>
                                                            <strong>Order Date:</strong><br>
                                                            <?php echo $rowslide12->cartACCEPTED; ?><br><br>
                                                            <p class="mb-0"><strong>Order Status: </strong> <br>
                                                                <?php if ($rowslide12->cartSTATUS == 1) { ?>
                                                                    <span class="badge badge-default">Ordered</span>
                                                                <?php } elseif ($rowslide12->cartSTATUS == 2) {  ?>
                                                                    <span class="badge badge-primary">Pending</span>
                                                                <?php } elseif ($rowslide12->cartSTATUS == 3) {   ?>
                                                                    <span class="badge badge-info">Accepted</span>
                                                                <?php } elseif ($rowslide12->cartSTATUS == 4) {  ?>
                                                                    <span class="badge badge-warning">
                                                                        <?= $rowslide12->cartTYPE == 'Delivery' ? 'Shipped' : 'To Pick-Up' ?>
                                                                    </span>
                                                                <?php } elseif ($rowslide12->cartSTATUS == 5) {  ?>
                                                                    <span class="badge badge-success">Delivered</span>
                                                                <?php } elseif ($rowslide12->cartSTATUS == 6) {  ?>
                                                                    <span class="badge badge-danger">Cancelled</span>
                                                                <?php } elseif ($rowslide12->cartSTATUS == 7) {  ?>
                                                                    <span class="badge badge-success">Pick-Up</span>
                                                                <?php } ?>
                                                            </p>
                                                        </address>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-md-12">
                                                <div class="section-title">Order Summary</div>
                                                <p class="section-lead">All items here cannot be deleted.</p>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover table-md">
                                                        <tr>
                                                            <th data-width="40">#</th>
                                                            <th>Item</th>
                                                            <th class="text-center">Quantity</th>
                                                            <th class="text-center">Price</th>
                                                            <th class="text-right">Totals</th>
                                                        </tr>
                                                        <?php
                                                        $sumq = 0;
                                                        $sumqt = 0;
                                                        $i = 0;
                                                        $slide1 = mysqli_query($con, "SELECT cart.*,item.* from cart,item where cart.itemID = item.itemID and cart.accountID='$accountID2' ") or die(mysqli_error($con));
                                                        while ($rowslide1 = mysqli_fetch_object($slide1)) {
                                                            if ($rowslide1->orderID == $od && $rowslide1->orderSELLER == $sellerID) {
                                                                $i++;
                                                                $sumq = $rowslide1->itemPRICE * $rowslide1->cartCOUNT;
                                                                $sumqt = $sumqt + $sumq;
                                                        ?>
                                                                <tr>
                                                                    <td><?php echo $i; ?></td>
                                                                    <td><?php echo $rowslide1->itemNAME; ?></td>
                                                                    <td class="text-center">x<?php echo $rowslide1->cartCOUNT; ?></td>
                                                                    <td class="text-center"> <?php echo $rowslide1->itemPRICE; ?></td>

                                                                    <td class="text-right"> <?php echo $sumq; ?></td>
                                                                </tr>
                                                        <?php
                                                            }
                                                        }
                                                        ?>

                                                    </table>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-lg-8">
                                                        <div class="section-title">Customer Review</div>
                                                        <?php if (is_null($rowslide12->cartRECIEVED)) { ?>
                                                            <p>The product has not arrived yet.</p>
                                                        <?php } else if (is_null($rowslide12->cartREVIEW)) { ?>
                                                            <p>The customer has not made any reviews yet.</p>
                                                        <?php } else { ?>
                                                            <div class="alert alert-dark" role="alert">
                                                                <div class="d-flex align-items-center mb-2" style="pointer-events: none;">
                                                                    <b class="mr-1">Rating:</b> 
                                                                    <span class="mr-2"><?= $rowslide12->cartREVIEWRATING?>/5</span>
                                                                    <div id='rating-view'></div>
                                                                </div>
                                                                
                                                                <script>
                                                                var myRating = jSuites.rating(document.getElementById('rating-view'), {
                                                                    value: <?= $rowslide12->cartREVIEWRATING?>,
                                                                    tooltip: [ 'Very bad', 'Bad', 'Average', 'Good', 'Very good' ],
                                                                });
                                                                </script>
                                                                <?php echo ($rowslide12->cartREVIEW) ?>
                                                            </div>
                                                        <?php } ?>
                                                    </div>

                                                    <div class="col-lg-4 text-right">
                                                        <div class="invoice-detail-item">
                                                            <div class="invoice-detail-name">Subtotal</div>
                                                            <div class="invoice-detail-value">P<?php echo $sumqt; ?>.00</div>
                                                        </div>
                                                        <hr class="mt-2 mb-2">
                                                        <div class="invoice-detail-item">
                                                            <div class="invoice-detail-name">Total</div>
                                                            <div class="invoice-detail-value invoice-detail-value-lg">P<?php echo $sumqt; ?>.00</div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="text-md-right">
                                        <div class="float-lg-left mb-lg-0 mb-3">
                                            <?php if ($rowslide12->cartSTATUS == 3) {
                                            ?>
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#update-status-from-3">
                                                    <?= ($rowslide12->cartTYPE == 'Delivery') ? 'Mark as Delivering' : 'Mark as To Pick-Up' ?>
                                                </button>
                                            <?php } ?>
                                            <!--  <button class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Process Payment</button>
                                        <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Cancel</button> -->
                                        </div>
                                        <button class="btn btn-warning btn-icon icon-left" onclick="printDiv('printableArea')"><i class="fas fa-print"></i> Print</button>
                                    </div>

                                </div>
                        <?php
                            }
                        }
                        ?>

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
    <!-- <script src="js/page/gmaps-draggable-marker.js"></script> -->

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
    lat: <?php echo $row->itemLATITUDE;  ?>,
    lng: <?php echo $row->itemLONGITUTE;  ?>
  });

// add marker
var marker = map.addMarker({
  lat: <?php echo $row->itemLATITUDE;  ?>,
  lng: <?php echo $row->itemLONGITUTE;  ?>,
  draggable: true,
});

</script> -->

<!-- Default Size -->
<div class="modal fade" id="Delivery" tabindex="" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel"></h4>
            </div>
            <div class="modal-body"> Do You Want To Change Status This Order To Shipped? </div>
            <div class="modal-footer text-center">
                <form method="post" action="query.php">
                    <input type="" name="orderID" value="<?= $orderid; ?>" hidden>
                    <input type="" name="sellerID" value="<?= $sellerID; ?>" hidden>
                    <input type="" name="accountID" value="<?= $accountID2; ?>" hidden>
                    <button type="submit" name="btndelivery" class="btn btn-success btn-lg  waves-effect">Shipped</button>
                </form>
                <a href="" class="btn btn-danger btn-lg waves-effect" data-dismiss="modal">No</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Recieved" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel"></h4>
            </div>
            <div class="modal-body"> Do You Want To Change Status This Order To Recieved? </div>
            <div class="modal-footer text-center">
                <form method="post" action="query.php">
                    <input type="" name="orderID" value="<?= $orderid; ?>" hidden>
                    <input type="" name="sellerID" value="<?= $sellerID; ?>" hidden>
                    <input type="" name="accountID" value="<?= $accountID2; ?>" hidden>
                    <button type="submit" name="btnrecieved" class="btn btn-success btn-lg  waves-effect">Recieved</button>
                </form>
                <a href="" class="btn btn-danger btn-lg waves-effect" data-dismiss="modal">No</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="update-status-from-3" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel"></h4>
            </div>
            <form method="post" action="query.php" enctype="multipart/form-data">

                <div class="modal-body">
                    <p>Please upload a picture of the product to change the order status.</p>
                    <input type="file" name="image" required>
                </div>
                <div class="modal-footer text-center">
                    <input type="" name="orderID" value="<?= $orderid; ?>" hidden>
                    <input type="" name="sellerID" value="<?= $sellerID; ?>" hidden>
                    <input type="" name="accountID" value="<?= $accountID2; ?>" hidden>
                    <button type="submit" name="btnupdatestatusfrom3" class="btn btn-success btn-lg  waves-effect">Confirm</button>
                    <a href="" class="btn btn-danger btn-lg waves-effect" data-dismiss="modal">No</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>