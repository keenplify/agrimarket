<?php 
      include('1connection.php');

?>

<?php 
if(isset($_SESSION['account']))
{
//unset($_SESSION['cid']);
unset($_SESSION['account']);
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
                  <div class="card-header text-center"><h4>Sign In</h4></div>
                  <div class="card-body">
                    <form method="POST" action="query.php">
                      <div class="form-group floating-addon">
                        <label>Username</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="far fa-user"></i>
                            </div>
                          </div>
                          <input id="name" type="text" class="form-control" name="username" autofocus placeholder="Username">
                        </div>
                      </div>

                      <div class="form-group floating-addon">
                        <label>Password</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-key"></i>
                            </div>
                          </div>
                          <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                      </div>

                      
                      <a href="/auth-forgot-password.php">Forgot Password?</a>
                      <div class="form-group text-right">
                        <button type="submit" class="btn btn-round btn-lg btn-primary" name="btnlogin">
                          Login
                        </button>
                      </div>
                            <div class="text-center mt-4 mb-3">
                                <div class="text-job text-muted">or</div>
                            </div>
                            <div class=" text-muted text-center">
                        Don't have an account? <a href="register.php">Create One</a>
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