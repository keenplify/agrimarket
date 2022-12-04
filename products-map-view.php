<?php include('1connection.php'); ?>
<?php include('1sessionrequired.php'); ?>

<!DOCTYPE html>
<html lang="en">

<!-- layout-top-navigation.html -->
<?php include('1head.php') ?>
<?php include_once('knplfy/includes.php') ?>

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
                <div class="d-flex my-2" style="height: 100vh">
                    <div id="leaflet_map" style="opacity: 100%; height: 100%; width: 100%"></div>
                </div>
            </div>

            <!-- Start app Footer part -->
            <?php include('1footer.php') ?>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="assets/bundles/lib.vendor.bundle.js"></script>
    <script src="js/CodiePie.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="js/scripts.js"></script>
    <script src="js/custom.js"></script>
    <script src="/knplfy/products-map.js"></script>
    <style>
        .leaflet-product-icon {
            border-radius: 100%;
            box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.5);
        }
    </style>
    <script>
        const items = JSON.parse(`
            <?php
            $result = array();

            $item = mysqli_query($con, "SELECT * FROM seller") or die(mysqli_error($con));
            while ($itemRow = $item ->fetch_assoc()) {
                $result[] = $itemRow;
            }

            echo json_encode($result);
            ?>
        `)
        const defaultCenter = ({
            latitude: <?php echo $row->lat;  ?>,
            longitude: <?php echo $row->longi;;  ?>
        })
    </script>

    <?php include('./knplfy/backtotop.php'); ?>
    <?php include('./knplfy/footer.php'); ?>

</body>

<!-- layout-top-navigation.html  Tue, 07 Jan 2020 03:35:42 GMT -->

</html>