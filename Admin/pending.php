<?php include('../1connection.php'); ?>
<?php include('1session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<!-- -->
<?php include('1head.php'); ?>
<!-- CSS Libraries -->
<link rel="stylesheet" href="assets/modules/datatables/datatables.min.css">
<link rel="stylesheet" href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

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
                        <!--  <h1>Pending Order</h1> -->
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Pending Order</a></div>
                        </div>
                    </div>

                    <div class="section-body">

                        <h2 class="section-title">Pending Order</h2>



                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped v_center" id="table-1">

                                                <thead>
                                                    <tr>
                                                        <th>Order ID</th>
                                                        <th>Order Date</th>
                                                        <th>Order Type</th>
                                                        <th>Item Name</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                        <TH>Total Price</TH>
                                                        <th>Customer Name</th>
                                                        <th>Seller Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $slide12 = mysqli_query($con, "SELECT cart.*,item.*,account.* from cart,item,account where cart.itemID = item.itemID  and cart.accountID = account.accountID order by cart.cartID desc ") or die(mysqli_error($con));
                                                    while ($rowdashboard = mysqli_fetch_object($slide12)) {
                                                        if ($rowdashboard->orderID != 1 && $rowdashboard->cartSTATUS == '2') {
                                                            # code...
                                                    ?>
                                                            <tr>
                                                                <td><?= $rowdashboard->orderID;  ?></td>
                                                                <td><?= $rowdashboard->cartDATE;  ?></td>
                                                                <td><?= $rowdashboard->cartTYPE;  ?></td>
                                                                <td><?= $rowdashboard->itemNAME;  ?></td>
                                                                <td><?= $rowdashboard->itemQUANTITY;  ?></td>
                                                                <td><?= $rowdashboard->itemPRICE;  ?></td>
                                                                <td><b><?= $rowdashboard->itemPRICE * $rowdashboard->itemQUANTITY;  ?></b></td>
                                                                <td><?= $rowdashboard->name;  ?></td>
                                                                <td><?= $rowdashboard->orderSELLER;  ?></td>
                                                                <td class="text-center">
                                                                    <form action="query.php" method="post">
                                                                        <input type="text" name="cartID" value="<?= $rowdashboard->cartID; ?>" hidden>
                                                                        <input type="text" name="orderID" value="<?= $rowdashboard->orderID; ?>" hidden>
                                                                        <input type="text" name="sellerID" value="<?= $rowdashboard->orderSELLER;  ?>" hidden>
                                                                        <input type="text" name="accountID" value="<?= $rowdashboard->accountID;  ?>" hidden>
                                                                        <input type="text" name="itemID" value="<?= $rowdashboard->itemID;  ?>" hidden>
                                                                        <button type="submit" name="btnacceptorder" class="btn btn-success" disabled="">Accept</button>
                                                                    </form>
                                                                </td>
                                                            </tr>


                                                            <!--    <?= $rowdashboard->orderSELLER;  ?>   <?= $rowdashboard->accountID;  ?> <BR>       -->
                                                    <?php }
                                                    } ?>
                                                </tbody>
                                            </table>

                                        </div>
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
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCnT63XUjqjPgXZ0lFTU_pdpfUX7swzTTM&amp;sensor=true"></script>
    <script src="assets/modules/gmaps.js"></script>

    <!-- Page Specific JS File -->
    <script src="js/page/gmaps-draggable-marker.js"></script>
    <!-- JS Libraies -->
    <script src="assets/modules/datatables/datatables.min.js"></script>
    <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="js/page/modules-datatables.js"></script>
    <!-- JS Libraies -->
    <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
    <script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>

    <!-- Template JS File -->
    <script src="js/scripts.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>