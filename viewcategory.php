<?php include('1connection.php'); ?>
<?php include('1session.php'); ?>

<?php
if (isset($_GET['id']) ? $_GET['id'] : '') {
    $id = $_GET['id'];
    $response = mysqli_query($con, "SELECT * from category where categoryID = '$id'") or die(mysqli_error($con));
    $category = mysqli_fetch_object($response);
} else {
    echo "<script>window.location.replace('errors-404.php');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- layout-top-navigation.html -->
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
                    <h2 class="section-title">Category: <?= $category->categoryNAME ?></h2>

                    <div class="row">
                        <?php
                        $item = mysqli_query($con, "SELECT *  from item WHERE itemCATEGORY='$category->categoryNAME'") or die(mysqli_error($con));
                        while ($rowitem = mysqli_fetch_object($item)) {
                        ?>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                <article class="article article-style-b">
                                    <div class="article-header">
                                        <div class="article-image" data-background="img/product/<?= $rowitem->itemIMG; ?>">
                                        </div>
                                    </div>
                                    <div class="article-details">
                                        <div class="article-title">
                                            <h2><a href="#"><?= $rowitem->itemNAME; ?></a></h2>
                                        </div>
                                        <p><B>PRICE: </B><?= $rowitem->itemPRICE; ?> </p>
                                        <div class="article-cta">
                                            <a href="viewproduct.php?itemid=<?= $rowitem->itemID; ?>" class="btn btn-success">View Product <i class="fas fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        <?php } ?>
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

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="js/scripts.js"></script>
    <script src="js/custom.js"></script>

    <?php include('./knplfy/backtotop.php'); ?>
    <?php include('./knplfy/footer.php'); ?>

</body>

<!-- layout-top-navigation.html  Tue, 07 Jan 2020 03:35:42 GMT -->

</html>