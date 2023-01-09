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
                            <div class="breadcrumb-item active"><a href="#">New Seller</a></div>
                        </div>
                    </div>

                    <div class="section-body">

                        <h2 class="section-title">New Seller</h2>
                        <div class="row">
                            <div class="col-12">

                                <div class="card">
                                    <div class="card-header">
                                        <h4></h4>
                                        <div class="card-header-form">
                                            <form method="get" class="d-flex">
                                                <select class="form-select rounded mr-3" onchange="municipalityFilter()" id="municipality-filter">
                                                    <option value="all">No Municipality Filter</option>
                                                    <?php
                                                    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
                                                    include "$root/components/municipalities-options.php";
                                                    ?>
                                                </select>
                                                <div class="input-group h-100">
                                                    <input type="text" class="form-control" placeholder="Search">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-striped v_center">
                                                <tr>

                                                    <th>Name</th>
                                                    <th>Image</th>
                                                    <th>Joined Date</th>
                                                    <th>longitude</th>
                                                    <th>latitude</th>
                                                    <th>Action</th>
                                                </tr>
                                                <?php
                                                $count1 = 0;
                                                $query = "SELECT *  from seller ";
                                                $filter = $_GET["filter"];

                                                if (!is_null($filter) && $filter !== "all") $query = $query . "WHERE selleraddress LIKE '%$filter%'";
                                                $user = mysqli_query($con, $query) or die(mysqli_error($con));
                                                while ($rowuser = mysqli_fetch_object($user)) {
                                                    if ($rowuser->sellerSTATUS == 'new') {


                                                        $count1++;
                                                ?>
                                                        <tr>
                                                            <td><?php echo $rowuser->sellerfirstname;  ?> <?php echo $rowuser->sellerlastname;  ?></td>
                                                            <td>
                                                                <img alt="image" src="../img/user/<?php if ($rowuser->sellerimage == NULL) { ?>null.png<?php } else {
                                                                                                                                                    echo $rowuser->sellerimage; ?><?php } ?>" class="ratio-1x1 rounded-circle" width="35" 
                                                                                                                                                    style="aspect-ratio: 1" data-toggle="tooltip" title="Wildan Ahdian">
                                                            </td>
                                                            <td><?php echo $rowuser->sellerdatecreated; ?></td>
                                                            <td><?php echo $rowuser->sellerlatitude; ?></td>
                                                            <td><?php echo $rowuser->sellerlongitude; ?></td>
                                                            <td><a href="viewnewseller.php?sellerID=<?php echo $rowuser->sellerID; ?>" class="btn btn-secondary">View</a></td>
                                                        </tr>
                                                <?php }
                                                } ?>
                                            </table>
                                            <?php
                                            if ($count1 == 0) {

                                                echo "<center>";
                                                echo "<h1>No Data Available</h1>";
                                                echo "</center>";
                                            }

                                            ?>
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
    <script>
        window.onload = () => {
            let activeFilter = '<?php echo $_GET["filter"] ?>';
            if (activeFilter?.length > 0) {
                document.querySelector("#municipality-filter").value = activeFilter;
            }
        }

        let municipalityFilter = () => {
            const value = document.querySelector("#municipality-filter").value;
            window.location.href = `./sellernew.php?filter=${value}`;
        }
    </script>

</body>

</html>