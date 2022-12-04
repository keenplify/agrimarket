
<?php include('1connection.php'); ?>
<?php include('1sessionrequired.php'); ?>
<!DOCTYPE html>
<html lang="en">

<!--  -->
<?php include('1head.php') ?>
<link rel="stylesheet" href="assets/css/components.min.css">

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

            <section class="section" >
                            
             <div class="section-body">
                    <h2 class="section-title">Notification</h2>
                   

                    <div class="row">
                       <!--  <div class="col-12 col-sm-12 col-lg-4">
                            <div class="card author-box card-primary">
                                <div class="card-body">
                                 
                                </div>
                            </div>
                            <div class="card card-danger">
                                
                               
                            </div>
                        </div> -->

                        <div class="col-12 col-sm-12 col-lg-2">
                        </div>
                        <div class="col-12 col-sm-12 col-lg-8">
                            
                            
                            <div class="card ">
                                <div class="card-header">
                                    <h4>Notification </h4>
                                </div>
                                <div class="card-body pb-0">
                                    <div class="row">
                                    	<div class="activities">

<?php
 $activity=mysqli_query($con,"SELECT *  from notification where notificationCLIENTTYPE ='customer' and notificationCLIENTID ='$row->accountID' order by  notificationID desc ")or die(mysqli_error($con));
              while($rowactivity=mysqli_fetch_object($activity))
              {
?>
                                <div class="activity">
                                    <div class="activity-icon bg-primary text-white shadow-primary"><i class="fas fa-bell"></i></div>
                                    <div class="activity-detail">
                                        <div class="mb-2">
                                            <span class="text-job text-primary"><?= $rowactivity->notificationDATE; ?></span>
                                            <span class="bullet"></span>
                                           
                                        </div>
                                        <p><?= $rowactivity->notificationMESSAGE; ?></p>
                                    </div>
                                </div>
<?php } ?>                                   

                            </div>
                                     </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-lg-2">
                        </div>

                    </div>
                   
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
<!-- JS Libraies -->
<script src="http://maps.google.com/maps/api/js?key=AIzaSyCnT63XUjqjPgXZ0lFTU_pdpfUX7swzTTM&amp;sensor=true"></script>
<script src="assets/modules/gmaps.js"></script>
<!-- Page Specific JS File -->
<script src="js/page/components-user.js"></script>
<!-- Template JS File -->
<script src="js/scripts.js"></script>
<script src="js/custom.js"></script>

<?php include('./knplfy/footer.php'); ?>
</body>

<!-- layout-top-navigation.html  Tue, 07 Jan 2020 03:35:42 GMT -->
</html>

