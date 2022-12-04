<?php include('1connection.php'); ?>
<?php include('1sessionrequired.php');
if (isset($_GET['sellerID']) ? $_GET['sellerID'] : '') {
    $sellerID = $_GET['sellerID'];
} else {
    echo "<script type='text/javascript'>window.location.replace('errors-404.php');</script>";
}
if (isset($_GET['orderid']) ? $_GET['orderid'] : '') {

    $orderid = $_GET['orderid'];
} else {
    echo "<script type='text/javascript'>window.location.replace('errors-404.php');</script>";
}
$accountID2 = $row->accountID;
?>


<!DOCTYPE html>
<html lang="en">

<!--  -->
<?php include('1head.php') ?>
<?php include('./knplfy/includes.php') ?>
<style>
    .multi-steps>li.is-active~li {
        color: #6c757d;
    }

    .multi-steps>li {
        counter-increment: stepNum;
        text-align: center;
        display: table-cell;
        position: relative;
        color: #727cf5;
    }

    li {
        list-style: none;
        padding-right: 25px;
        padding-left: 25px;
        margin-right: 0px;
    }

    * {
        outline: none;
        box-sizing: inherit;
        margin: 0;
        padding: 0;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }

    user agent stylesheet li {
        display: list-item;
        text-align: -webkit-match-parent;
    }

    .list-unstyled {
        padding-left: 0;
        list-style: none;
    }

    user agent stylesheet ul {
        list-style-type: disc;
    }


    .multi-steps>li:before {
        content: '\2713';
        display: block;
        margin: 0 auto 4px;
        background-color: #fff;
        width: 25px;
        height: 25px;
        line-height: 22px;
        text-align: center;
        font-weight: bold;
        position: relative;
        z-index: 1;
        border-width: 2px;
        border-style: solid;
        border-color: #05ffa1;
        border-radius: 5px;
    }

    *::before {
        margin: 0;
        padding: 0;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }

    .multi-steps>li.is-active:after,
    .multi-steps>li.is-active~li:after {
        background-color: red;
    }

    .multi-steps>li:last-child:after {
        display: none;
    }

    .multi-steps>li:after {
        content: '';
        height: 2px;
        width: 100%;
        background-color: #05ffa1;
        position: absolute;
        top: 12px;
        left: 50%;
    }

    *::after {
        margin: 0;
        padding: 0;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }

    .multi-steps>li {
        font-size: 0.75rem;
    }

    .multi-steps>li {
        counter-increment: stepNum;
        text-align: center;
        display: table-cell;
        position: relative;
        color: #727cf5;
    }

    li {
        list-style: none;
    }

    * {
        outline: none;
        box-sizing: inherit;
        margin: 0;
        padding: 0;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }

    user agent stylesheet li {
        display: list-item;
        text-align: -webkit-match-parent;
    }

    .list-unstyled {
        padding-left: 0;
        list-style: none;
    }

    user agent stylesheet ul {
        list-style-type: disc;
    }


    .multi-steps>li.is-active~li:before {
        background-color: #ffbaba;
        border-color: #e3eaef;
    }

    .multi-steps>li.is-active:before,
    .multi-steps>li.is-active~li:before {
        content: counter(stepNum);
        font-family: inherit;
        font-weight: 400;
    }

    @media (max-width: 575.98px) {}

    .multi-steps>li:before {
        width: 25px;
        height: 25px;
        line-height: 21px;
    }
</style>

<body class="layout-3">
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

                    <h2 class="section-title" style="margin-top: 50PX;">View Order</h2>
                    <div class="section-body">
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
                                        <div class="steps" style="width: 100%;">
                                            <ul class="list-unstyled multi-steps">
                                                <li style="color: black;">
                                                    Ordered<br><span><?php echo $rowslide12->cartDATE; ?></span>
                                                </li>
                                                <li style="color: black; " <?= $rowslide12->cartSTATUS == '2' ? 'class="is-active"' : '' ?>>
                                                    Pending<br><span><?php echo $rowslide12->cartPENDING; ?></span>
                                                </li>
                                                
                                                <?php if ($rowslide12->cartSTATUS == '6') {?>
                                                    <li style="color: black;" class="is-active">
                                                        Cancelled
                                                    </li>
                                                <?php } else {?>
                                                    <li style="color: black;" <?= $rowslide12->cartSTATUS == '3' ? 'class="is-active"' : '' ?>>
                                                        Accepted<br><span><?php echo $rowslide12->cartACCEPTED; ?></span>
                                                    </li>
                                                <?php }?>
                                                <li style="color: black;" <?= $rowslide12->cartSTATUS == '4' ? 'class="is-active"' : '' ?>>
                                                    <?= ($rowslide12->cartTYPE == 'Delivery' ? 'To Deliver' : 'Delivered') ?>
                                                    <br><span><?php echo $rowslide12->cartDELIVERY; ?>
                                                </li>
                                                <li style="color: black;" <?= $rowslide12->cartSTATUS == '5' ? 'class="is-active"' : '' ?>>
                                                    <?= ($rowslide12->cartTYPE == 'Delivery' ? 'Delivered' : 'Picked-Up') ?>
                                                    <br><span><?php echo $rowslide12->cartDELIVERY; ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="d-flex">
                                            <?php if (!is_null($rowslide12->cartDELIVERYIMAGE)) { ?>
                                                <div class="card p-2 mx-2"  style="width: 19rem; background-color: white;">
                                                    <img class="card-img-top" src="/img/deliveryproof/<?= $rowslide12->cartDELIVERYIMAGE?>" style="object-fit: cover;width: 18rem;height: 18rem;">
                                                    <div class="card-body">
                                                        <h6 class="card-title">Proof of Delivery from Seller</h6>
                                                    </div>
                                                </div>
                                            <?php }?>
                                            <?php if (!is_null($rowslide12->cartRECEIVEDIMAGE)) { ?>
                                                <div class="card p-2 mx-2"  style="width: 19rem; background-color: white;">
                                                    <img class="card-img-top" src="/img/deliveredproof/<?= $rowslide12->cartRECEIVEDIMAGE?>" style="object-fit: cover;width: 18rem;height: 18rem;">
                                                    <div class="card-body">
                                                        <h6 class="card-title">Proof of Received/Delivered</h6>
                                                    </div>
                                                </div>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    <div>
                        <?php if ($rowslide12->cartSTATUS == 4) { ?>
                            <button class="btn btn-success" data-toggle="modal" data-target="#Recieved" style="float:right;">
                                Order Received
                            </button>
                        <?php }  ?>
                        <?php if ($rowslide12->cartSTATUS == 2 || $rowslide12->cartSTATUS == 3) { ?>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#Cancel" style="float:right;">
                                Cancel Order
                            </button>
                        <?php }  ?>
                    </div>
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
                                <div class="col-12 text-md-right">
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
                                                <span class="badge badge-warning">Shipped</span>
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
                            <div class="text-right">
                                <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Total</div>
                                    <div class="invoice-detail-value invoice-detail-value-lg">P<?= $sumqt ?>.00</div>
                                </div>
                            </div>
                            <div class="my-4">
                                <div class="section-title">Your Review</div>
                                <?php if (is_null($rowslide12->cartRECIEVED)) { ?>
                                    <p>You can make review on this product when it has arrived.</p>
                                <?php } else if (is_null($rowslide12->cartREVIEWRATING)) { ?>
                                    <form method="post" action="query.php">
                                        <p>You can help the seller improve their products by reviewing.</p>
                                        
                                        <div class="d-flex align-items-center mb-2">
                                            <b class="mr-2">Your Rating:</b> 
                                            <input type="number" id="rating" min="0" max="5" name="rating" value="3" class="form-control-sm mr-2" readonly>
                                            <div id='rating-view'></div>
                                        </div>
                                        
                                        <script>
                                        var myRating = jSuites.rating(document.getElementById('rating-view'), {
                                            value: 3,
                                            tooltip: [ 'Very bad', 'Bad', 'Average', 'Good', 'Very good' ],
                                            onchange: function() {
                                                document.querySelector("#rating").value = this.value
                                            }
                                        });
                                        </script>
                                        <input type="" name="cartID" value="<?= $rowslide12->cartID; ?>" hidden>
                                        <textarea class="form-control mb-2" name="review" required></textarea>
                                        <button type="submit" name="btnAddReview" class="btn btn-success btn-lg  waves-effect">Add Review</button>
                                    </form>
                                <?php } else { ?>
                                    <div class="alert alert-dark" role="alert">
                                        <div class="d-flex align-items-center mb-2" style="pointer-events: none;">
                                            <b class="mr-1">Your Rating:</b> 
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
                        </div>
                    </div>
            </div>
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
<?php include('1footer.php') ?>
</div>
</div>

<!-- General JS Scripts -->
<script src="assets/bundles/lib.vendor.bundle.js"></script>
<script src="js/CodiePie.js"></script>

<!-- JS Libraies -->
<!-- JS Libraies -->
<script src="http://maps.google.com/maps/api/js?key=AIzaSyCnT63XUjqjPgXZ0lFTU_pdpfUX7swzTTM&amp;sensor=true"></script>
<script src="assets/modules/gmaps.js"></script>
<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="js/scripts.js"></script>
<script src="js/custom.js"></script>
</body>

<!-- layout-top-navigation.html  Tue, 07 Jan 2020 03:35:42 GMT -->

</html>
<div class="modal fade" id="Recieved" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel"></h4>
            </div>
            <form method="post" action="query.php" enctype="multipart/form-data">

                <div class="modal-body">
                    <p>Please upload a image of the product you received to confirm.</p>
                    <input type="file" name="image" required>
                </div>
                <div class="modal-footer text-center">
                    <input type="" name="orderID" value="<?= $orderid; ?>" hidden>
                    <input type="" name="sellerID" value="<?= $sellerID; ?>" hidden>
                    <input type="" name="accountID" value="<?= $accountID2; ?>" hidden>
                    <button type="submit" name="btnrecieved" class="btn btn-success btn-lg  waves-effect">Confirm</button>
                    <a href="" class="btn btn-danger btn-lg waves-effect" data-dismiss="modal">No</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="Cancel" tabindex="-1" role="dialog">
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
                    <button type="submit" name="btncancel" class="btn btn-danger btn-lg  waves-effect">Cancelled</button>
                </form>
                <a href="" class="btn btn-success btn-lg waves-effect" data-dismiss="modal">No</a>
            </div>
        </div>
    </div>
</div>

<?php include('./knplfy/footer.php'); ?>