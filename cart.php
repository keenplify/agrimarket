<?php include('1connection.php'); ?>
<?php include('1sessionrequired.php'); ?>
<!DOCTYPE html>
<html lang="en">

<!--  -->
<?php include('1head.php') ?>

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

                    <h2 class="section-title" style="margin-top: 50PX;">Cart</h2>
                    <div class="section-body">

                        <div class="card-body p-0 ">
                            <div class="table-responsive">
                                <table class="table table-striped v_center">
                                    <tr class="bg-light">
                                        <th>
                                            <!-- <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                </div> -->
                                        </th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th class="text-center" colspan="2">Action</th>
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
                                                    <img alt="image" src="img/product/<?= $rowlastestfeaturedslidecarttt->itemIMG; ?>" class="" width="100" data-toggle="tooltip" title="product" style="margin-top: 10px;">
                                                </td>
                                                <td>
                                                    <?php echo $rowlastestfeaturedslidecarttt->itemNAME; ?>
                                                </td>
                                                <td class="align-middle">
                                                    P <?php echo $rowlastestfeaturedslidecarttt->itemPRICE; ?>.00
                                                </td>
                                                <td>
                                                    <a href="" class=""></a>

                                                    <div class="center" style="width:200px;">
                                                        <p>
                                                        <form method="post" action="query.php">
                                                            </p>
                                                            <div class="input-group">

                                                                <input type="text" name="cartID" value="<?php echo $rowlastestfeaturedslidecarttt->cartID; ?>" hidden>
                                                                <span class="input-group-btn">
                                                                    <button type="submit" class="btn btn-danger btn-number" style="border: solid 4px black;" name="btnsubquant">
                                                                        <i class="fa fa-minus"></i>
                                                                    </button>
                                                                </span>

                                                                <input type="text" name="quant" class="form-control input-number" value="<?php echo $rowlastestfeaturedslidecarttt->cartCOUNT; ?>" min="1" max="10" style="border: solid 4px black;">

                                                                <span class="input-group-btn">
                                                                    <button type="submit" class="btn btn-success btn-number" style="border: solid 4px black;" name="btnaddquant">

                                                                        <i class="fa fa-plus"></i>
                                                                    </button>
                                                                </span>

                                                            </div>
                                                        </form>
                                                        <p></p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php
                                                    $total = $rowlastestfeaturedslidecarttt->cartCOUNT * $rowlastestfeaturedslidecarttt->itemPRICE;
                                                    $sumtotal = $sumtotal + $total;
                                                    ?>
                                                    <h5>P <?php echo  $total; ?></h5>
                                                </td>
                                                <!--  <td>
                                          <button class="btn btn-primary" style="width: 110px;"><i class="far fa-edit"></i></button>
                                        </td> -->
                                                <td class="align-middle" colspan="2">

                                                    <form action="query.php" method="post">
                                                        <input type="" name="itemno" value="<?php echo $rowlastestfeaturedslidecarttt->cartID; ?>" hidden="" style="width: 20px;">
                                                        <input type="text" name="id" value="<?php echo $rowlastestfeaturedslidecarttt->itemID; ?>" hidden="">
                                                        <input type="text" name="count" value="<?php echo $rowlastestfeaturedslidecarttt->cartCOUNT; ?>" hidden="">
                                                        <button class="btn btn-danger" name="deletecartitem" style="width: 100%;"><i class="far fa-trash-alt"></i></button>
                                                    </form>
                                                </td>

                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <tr class="text-center">
                                        <?php if ($countthis < 1) { ?>
                                            <td colspan="6">
                                                <h1>Empty Cart</h1>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                        <td colspan="2"><a href="shop.php" class="btn btn-primary" style="width: 100%;">Continue Shopping</a></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td colspan="2">
                                            <?php if ($countthis > 0) { ?>
                                                <a href="checkout.php" class="btn btn-success" style="width: 100%;">
                                                    Proceed to Checkout
                                                </a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                </table>
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
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCnT63XUjqjPgXZ0lFTU_pdpfUX7swzTTM&amp;sensor=true"></script>
    <script src="assets/modules/gmaps.js"></script>
    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="js/scripts.js"></script>
    <script src="js/custom.js"></script>
    <?php include('./knplfy/footer.php'); ?>

</body>

<!-- layout-top-navigation.html  Tue, 07 Jan 2020 03:35:42 GMT -->

</html>