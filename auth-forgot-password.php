<?php 
      include('1connection.php');

?>

<?php 
if(isset($_SESSION['account']))
{
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
    LOWER(securityanswer) LIKE '%$securityAnswer%'
    ";
    echo $query;
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $account = mysqli_fetch_assoc($result);

    if ($account) {
        $id = $account['accountID'];
        header("Location: ./auth-forgot-password-step-2.php?id=$id");
    } else {
        echo "<script>alert('User not found')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- -->
<?php include('1head.php') ?>

<body class="layout-4" >
  <div id="app"  >
    <section class="section"  >
      <div class="container mt-5" >
        <div class="row">
          <div class="col-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1">
            <div class="login-brand">
              <a href="/">
                <img src="img/banner/LOGO2-removebg-preview.png" style="width: 200px;">
              </a>
            </div>

            <div class="card card-primary" >
              <div class="row m-0">
                <div class="col-12 col-md-12 col-lg-5 p-0" style="border:solid 1px;">
                  <div class="card-header text-center"><h4>Forgot Password</h4></div>
                  <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="user">Username</label>
                            <input type="text" class="form-control" id="user" name="user" tabindex="1" required autofocus>
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
                <div class="col-12 col-md-12 col-lg-7 p-0"  >
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