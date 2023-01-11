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
                            <div class="breadcrumb-item active"><a href="#">Farmers Masterlist</a></div>
                        </div>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Farmers Masterlist</h2>
                        <div class="row">
                            <div class="col-12">

                                <div class="card">
                                    <div class="card-header">
                                        <h4></h4>
                                        <div class="card-header-form">
                                            <form class="d-flex" method="get">
                                                <select
                                                    class="form-select rounded mr-3"
                                                    onchange="this.form.submit()"
                                                    id="municipality-filter"
                                                    name="city"
                                                >
                                                    <option value="all">No Municipality Filter</option>
                                                    <?php
                                                    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
                                                    include "$root/components/municipalities-options.php";
                                                    ?>
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-striped v_center">
                                                <thead>
                                                    <tr>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Municipality</th>
                                                        <th>Gender</th>
                                                        <th>Primary Produce Category</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $count1 = 0;
                                                    $query = "SELECT * from farmers_masterlist LEFT JOIN category ON category.categoryID=farmers_masterlist.categoryId";
                                                    $city = $_GET['city'];
                                                    if (isset($city) && $city !== 'all  ') $query = $query . " WHERE municipality='". $city ."'";
                                                    $user = mysqli_query($con, $query) or die(mysqli_error($con));
                                                    while ($rowuser = mysqli_fetch_object($user)) {
                                                        if (empty($rowuser->sellerId)) $status = "UNUSED";
                                                        else $status = "<a href='/Admin/viewseller.php?sellerID=$rowuser->sellerId'>USED</a>";
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $rowuser->firstName; ?></td>
                                                            <td><?php echo $rowuser->lastName; ?></td>
                                                            <td><?php echo $rowuser->municipality; ?></td>
                                                            <td><?php echo $rowuser->gender; ?></td>
                                                            <td><?php echo $rowuser->categoryNAME; ?></td>
                                                            <td><?php echo $status; ?></td>
                                                            <td>
                                                                <form action="query.php" method="post">
                                                                <button 
                                                                    class="btn btn-secondary w-100"
                                                                    name="deletemasterlist"
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
                                                            <td>
                                                                <input class="form-control w-100" placeholder="First Name" name="firstName" required>
                                                            </td>
                                                            <td>
                                                                <input class="form-control w-100" placeholder="Last Name" name="lastName" required>
                                                            </td>
                                                            <td>
                                                                <select id="city" class="form-control" name="city" required>
                                                                    <?php
                                                                        $root = realpath($_SERVER["DOCUMENT_ROOT"]);
                                                                        include "$root/components/municipalities-options.php";
                                                                    ?>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select id="gender" class="form-control" name="gender" required>
                                                                    <option>Male</option>
                                                                    <option>Female</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="form-control" name="categoryId" required>
                                                                    <?php
                                                                        $categories = mysqli_query($con, "SELECT *  from category ") or die(mysqli_error($con));
                                                                        while ($category = mysqli_fetch_object($categories)) {
                                                                    ?>
                                                                        <option value="<?= $category->categoryID; ?>"><?= $category->categoryNAME; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                            <td colspan="2">
                                                                <button type="submit" class="btn btn-primary w-100" name="addmasterlist">
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
    
    <script defer>
        document.querySelector("#municipality-filter").value = `<?= $_GET["city"] ?>`
    </script>
</body>

</html>