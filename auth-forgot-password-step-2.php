<?php
include('1connection.php');
if (is_null($_GET["id"])) {
    header("Location: ./auth-forgot-password.php");
}
?>

<?php
if (isset($_SESSION['account'])) {
    //unset($_SESSION['cid']);
    unset($_SESSION['account']);
}

if (isset($_POST["user"]) && isset($_POST["securityQuestion"]) && isset($_POST["securityAnswer"])) {
    $user = $_POST["user"];
    $securityQuestion = strtolower($_POST["securityQuestion"]);
    $securityAnswer = strtolower($_POST["securityAnswer"]);

    $query = "
    SELECT * FROM account WHERE
    user = '$user' AND
    LOWER(securityquestion) LIKE '%$securityQuestion%' AND
    securityanswer LIKE '%$securityAnswer%'
    ";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $account = mysqli_fetch_assoc($result);

    if ($account) {
        $id = $account['accountID'];
        header("Location: /");
    } else {
        echo "<script>alert('User not found')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- -->
<?php include('1head.php') ?>

<body class="layout-4">
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1">
                        <div class="login-brand">
                            <a href="/">
                                <img src="img/banner/LOGO2-removebg-preview.png" style="width: 200px;">
                            </a>
                        </div>

                        <div class="card card-primary">
                            <div class="row m-0">
                                <div class="col-12 col-md-12 col-lg-5 p-0" style="border:solid 1px;">
                                    <div class="card-header text-center">
                                        <h4>Forgot Password - Change Password</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="query.php">
                                            <input id="accountId" type="hidden" name="accountId" value="<?= $_GET["id"] ?>" required>
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
                                <div class="col-12 col-md-12 col-lg-7 p-0">
                                    <div class="contact-map"><img src="img/banner/image_674c64eb-be1f-4ff1-9510-69889e4f1717_540x.jpg" style="width: 100%;"></div>
                                </div>
                            </div>
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
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyB55Np3_WsZwUQ9NS7DP-HnneleZLYZDNw&amp;sensor=true"></script>
    <script src="assets/modules/gmaps.js"></script>

    <!-- Page Specific JS File -->
    <script src="js/page/utilities-contact.js"></script>

    <!-- Template JS File -->
    <script src="js/scripts.js"></script>
    <script src="js/custom.js"></script>

    <?php include('./knplfy/footer.php'); ?>

</body>

<!-- utilities-contact.html  Tue, 07 Jan 2020 03:39:50 GMT -->

</html>