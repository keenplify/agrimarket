<?php include('1connection.php'); ?>
<?php include('1session.php'); ?>

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
                    <!-- <div>
                        <?php
                        $notificationQuery = mysqli_query($con, "SELECT *  from notifications WHERE expire_at > NOW()") or die(mysqli_error($con));
                        while ($notification = mysqli_fetch_object($notificationQuery)) {
                        ?>
                        <div class="alert alert-primary">
                            <?= $notification->text?>
                        </div>
                        <?php }?>
                    </div> -->

                    <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                        <!-- <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                                    </ol> -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="img/banner/307086190_2269673193189288_6168865862458663608_n.png" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5><a href="shop.php" class="btn btn-success">Shop Now</a></h5>

                                </div>
                            </div>


                        </div>
                        <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a> -->
                    </div>





                    <!-- <div class="row">
                        <div class="col-lg-6">

                            <div class="card-body">
                                <img class="" src="img/banner/Suamei_540x.jpg" alt="Generic placeholder image" style="width: 100%;">
                            </div>

                        </div>
                        <div class="col-lg-6">

                            <div class="card-body">
                                <div style="margin-bottom: 60%;"></div>
                                <h5 class="mt-0 mb-1">The Minimalist Tree</h5>
                                <p>
                                    Suamei, also known as Water Jasmine Tree and Shui Mei, is an ornamental tree with twiggy branches that grows thin leaves. It produces small, pendulous white flowers with fragrance similar to true jasmine.

                                    It's easy to maintain and requires minimum supervision. Place it in a bright spot indoors or outdoors shaded to full sun to thrive.</p>
                                <a href="login.php" class="btn btn-success">Login Now</a>
                            </div>
                        </div>
                    </div> -->

                    <h2 class="section-title">Products Gallery</h2>


                    <div class="row">
                        <?php
                        $item = mysqli_query($con, "SELECT *  from category") or die(mysqli_error($con));
                        while ($rowitem = mysqli_fetch_object($item)) {
                        ?>
                            <a 
                                class="col-12 col-sm-6 col-md-6 col-lg-3"
                                href="viewcategory.php?id=<?= $rowitem->categoryID ?>"
                            >
                                <article class="article article-style-b">
                                    <div class="article-header">
                                        <div class="article-image" data-background="<?= $rowitem->categoryIMAGE; ?>">
                                        </div>
                                    </div>
                                    <div class="article-details">
                                        <div class="article-title text-capitalize">
                                            <h3><?= $rowitem->categoryNAME; ?></h3>
                                        </div>
                                    </div>
                                </article>
                        </a>
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