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
                            <div class="breadcrumb-item active"><a href="#">Product Suggestions</a></div>
                        </div>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Product Suggestions</h2>
                        <div class="row">
                            <div class="col-12">

                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-striped v_center">
                                                <thead>
                                                    <tr>
                                                        <th>Product Name</th>
                                                        <th>Product Category</th>
                                                        <th>Price</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $count1 = 0;
                                                    $user = mysqli_query($con, "SELECT * from product_suggestions LEFT JOIN category ON product_suggestion_category_id = categoryID") or die(mysqli_error($con));
                                                    while ($suggestion = mysqli_fetch_object($user)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $suggestion->product_suggestion_name; ?></td>
                                                            <td>
                                                                <?php echo $suggestion->categoryNAME?>
                                                            </td>
                                                            <td>₱<?php echo $suggestion->product_suggestion_price; ?></td>
                                                            <td>
                                                                <form action="query.php" method="post">
                                                                    <button type="button" class="btn btn-info" data-toggle="modal"   onclick="handleEditModal(`<?= base64_encode(json_encode($suggestion)) ?>`)">
                                                                        Edit
                                                                    </button>
                                                                    <button 
                                                                        class="btn btn-secondary"
                                                                        name="deletesuggestion"
                                                                        type="submit"
                                                                    >Delete</button>
                                                                    <input type="hidden" value="<?php echo $suggestion->product_suggestion_id; ?>" name="id">
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr class="bg-success">
                                                        <form action="query.php" method="post">
                                                            <td>
                                                                <input class="form-control w-100" placeholder="Product Suggestion Name" name="name" required>
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
                                                            <td>
                                                                <input class="form-control w-100" placeholder="Product Suggestion Price (in Peso)" name="price" step=".01" type="number" min="0" required>
                                                            </td>
                                                            <td>
                                                                <button type="submit" class="btn btn-primary w-100" name="addproductsuggestions">
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

    <script>
        function handleEditModal(json) {
            const suggestion = JSON.parse(atob(json));

            $('#edit-name').val(suggestion.product_suggestion_name);
            $('#edit-categoryId').val(suggestion.product_suggestion_category_id);
            $('#edit-price').val(suggestion.product_suggestion_price);
            $('#edit-id').val(suggestion.product_suggestion_id);

            $('#editModal').modal()
        }
    </script>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Edit Product Suggestion</h5>
            </div>
            <form method="post" action="query.php">
                <input type="hidden" name="id" id="edit-id">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label" for="edit-name">Name</label>
                        <input type="text" class="form-control" id="edit-name" name="name">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="edit-name">Name</label>
                        <select class="form-control" id="edit-categoryId" name="categoryId" required>
                            <?php
                                $categories = mysqli_query($con, "SELECT *  from category") or die(mysqli_error($con));
                                while ($category = mysqli_fetch_object($categories)) {
                            ?>
                                <option value="<?= $category->categoryID; ?>"><?= $category->categoryNAME; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="edit-price">Price</label>
                        <input type="number" class="form-control" step=".01" min="0" id="edit-price" name="price">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="$('#editModal').modal('hide')">Close</button>
                    <button type="submit" class="btn btn-primary" name="btneditsuggestion">Save changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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