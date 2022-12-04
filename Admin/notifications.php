<?php include('../1connection.php'); ?>
<?php include('1session.php'); ?>
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
                        <!--  <h1>Pending Order</h1> -->
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Global Notifications</a></div>
                        </div>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Global Notifications</h2>
                        <div class="row">
                            <div class="col-12">

                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-striped v_center">
                                                <thead>
                                                    <tr>
                                                        <th colspan='3'>Text</th>
                                                        <th>Expire At</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $count1 = 0;
                                                    $user = mysqli_query($con, "SELECT *  from notifications") or die(mysqli_error($con));
                                                    while ($rowuser = mysqli_fetch_object($user)) {
                                                    ?>
                                                        <tr>
                                                            <td colspan='3'><?php echo $rowuser->text; ?></td>
                                                            <td><?php echo date("F jS, Y", strtotime($rowuser->expire_at)); ?></td>
                                                            <td>
                                                                <?php 
                                                                    echo date_create($rowuser->expire_at) > date_create() ? 'Active' : 'Expired'
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <form action="query.php" method="post">
                                                                <button 
                                                                    class="btn btn-secondary w-100"
                                                                    name="deletenotification"
                                                                    type="submit"
                                                                >Delete</button>
                                                                <input type="hidden" value="<?php echo $rowuser->id; ?>" name="id">
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr class="bg-success">
                                                        <form action="query.php" method="post">
                                                            <td colspan='3'>
                                                                <input class="form-control w-100" placeholder="Notification Text" name="text" required>
                                                            </td>
                                                            <td>
                                                                <input class="form-control w-100" placeholder="Notification Expiration" name="expire_at" type="datetime-local" value="<?=date_create()->modify('7 days')->format('Y-m-d\TH:i:s')?>" min="<?=date_create()->format('Y-m-d\TH:i:s')?>" required>
                                                            </td>
                                                            <td></td>
                                                            <td colspan="2">
                                                                <button type="submit" class="btn btn-primary w-100" name="addnotifications">
                                                                    Add
                                                                </button>
                                                            </td>
                                                        </form>
                                                    </tr>
                                                </tfoot>
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
    <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
    <script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>

    <!-- Template JS File -->
    <script src="js/scripts.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>