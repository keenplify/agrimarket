<?php include('../1connection.php'); ?>
<?php
$sellerID = $_SESSION['seller'];
          $seller=mysqli_query($con,"SELECT seller.* from seller where sellerID = '$sellerID'")or die(mysqli_error($con));
          $rowseller=mysqli_fetch_object($seller);
?>


     <div class="author-box-left" >
          <img alt="image" src="../img/user/<?php  if($rowseller->sellerimage==NULL){ ?>null.png<?php } else { echo $rowseller->sellerimage;?><?php } ?>" class="ratio-1x1 rounded-circle author-box-picture" style="aspect-ratio: 1;">
              <div class="clearfix"></div>
                  <a href="#" class="btn btn-primary mt-3 follow-btn"><?php echo $rowseller->sellerSTATUS ?></a>
     </div>
     <div class="author-box-details">
          <div class="author-box-name">
            <a href="#"><?php echo $rowseller->sellerfirstname ?></a>
          </div>
          <div class="author-box-job"></div>
          <div class="author-box-description">
              <p></p>
          </div>
     </div>
