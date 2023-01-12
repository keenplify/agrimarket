<?php 
    if (is_null($_GET["id"])) {
        header("Location: ./auth-forgot-password.php");
    }
?>
<?php include('../1connection.php'); ?>
<?php
if (isset($_SESSION['seller'])) {
    //unset($_SESSION['cid']);
    unset($_SESSION['seller']);
}

?>
<!DOCTYPE html>
<html lang="en">

<?php include('addson/1head.php'); ?>

<body class="layout-4 bg-dark">

    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <a href="/Seller/login.php">
                                <img src="/img/banner/logo-white.png" class="mr-3 rounded" style="height:48px; width:auto" src="" alt="product img"></a>
                        </div>
                        <div class="card card-primary" style="border: 1px solid;">
                            <div class="card-header">
                                <h4>Seller Forgot Password</h4>
                            </div>
                            <span id="error"></span>
                            <div class="card-body">
                                <form id="myFormss" action="query.php" method="post">
                                    <input id="sellerId" type="hidden" name="sellerId" value="<?= $_GET["id"]?>" required>
                                    <div class="form-group">
                                        <label for="password">New Password</label>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmPassword">Confirm New Password</label>
                                        <input id="confirmPassword" type="password" class="form-control" name="confirmPassword" tabindex="2" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="btnforgotpasswordfinalize" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Change Password
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                            Don't have an account? <a href="register.php">Create One</a>
                        </div>
                        <div class="simple-footer" style="color:white">
                            Copyright &copy; 2022
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- General JS Scripts -->
    <script src="assets/bundles/lib.vendor.bundle.js"></script>
    <script src="js/CodiePie.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="js/scripts.js"></script>
    <script src="js/custom.js"></script>
</body>

<!-- auth-login.html  Tue, 07 Jan 2020 03:39:47 GMT -->

</html>