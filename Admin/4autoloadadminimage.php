<?php include('../1connection.php'); ?>
<?php
$adminID = $_SESSION['admin'];
          $admin=mysqli_query($con,"SELECT admin.* from admin where adminID = '$adminID'")or die(mysqli_error($con));
          $rowadmin=mysqli_fetch_object($admin);
?>


     <div class="author-box-left" >
          <img alt="image" src="../img/user/<?php  if($rowadmin->adminimage==NULL){ ?>null.png<?php } else { echo $rowadmin->adminimage;?><?php } ?>" class="rounded-circle author-box-picture">
              <div class="clearfix"></div>
                  <a href="#" class="btn btn-primary mt-3 follow-btn"><?php echo $rowadmin->adminSTATUS ?></a>
     </div>
     <div class="author-box-details">
          <div class="author-box-name">
            <a href="#"><?php echo $rowadmin->adminNAME ?></a>
          </div>
          <div class="author-box-job"></div>
          <div class="author-box-description">
              <p></p>
          </div>
     </div>
