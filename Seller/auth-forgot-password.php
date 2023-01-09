<?php include('../1connection.php'); ?>
<?php
if (isset($_SESSION['seller'])) {
    //unset($_SESSION['cid']);
    unset($_SESSION['seller']);
}

if (isset($_POST["email"]) && isset($_POST["securityQuestion"]) && isset($_POST["securityAnswer"])) {
    $email = $_POST["email"];
    $securityQuestion = strtolower($_POST["securityQuestion"]);
    $securityAnswer = strtolower($_POST["securityAnswer"]);

    $query = "
    SELECT * FROM seller WHERE
    selleremail = '$email' AND
    LOWER(sellersecurityquestion) LIKE '%$securityQuestion%' AND
    sellersecurityanswer LIKE '%$securityAnswer%'
    ";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $seller = mysqli_fetch_assoc($result);

    if ($seller) {
        $id = $seller['sellerID'];
        header("Location: ./auth-forgot-password-step-2.php?id=$id");
    } else {
        echo "<script>alert('User not found')</script>";
    }
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
                                <img src="/img/banner/logo-white.png" class="mr-3 rounded" style="height:48px; width:auto" src="" alt="product img">
                                </a>
                        </div>
                        <div class="card card-primary" style="border: 1px solid;">
                            <div class="card-header">
                                <h4>Seller Forgot Password</h4>
                            </div>
                            <span id="error"></span>
                            <div class="card-body">
                                <form id="myFormss" action="" method="post">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your email
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="#security-question">Security Question</label>
                                        <select class="form-control mb-2" name="securityQuestion" id="security-question" required>
                                            <option>In what city were you born?</option>
                                            <option>What is the name of your favorite pet?</option>
                                            <option>What is your mothers maiden name?</option>
                                            <option>What high school did you attend?</option>
                                            <option>What was the name of your elementary school?</option>
                                            <option>What was the make of your first car?</option>
                                            <option>What was your favorite food as a child?</option>
                                        </select>
                                        <input class="form-control" name="securityAnswer" required placeholder="Your answer">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="button" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Verify
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