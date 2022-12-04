<?php 
if(!isset($_SESSION['seller'])){
 echo"<script type='text/javascript'>window.location.replace('login.php')</script>";
}else
{
          $sellerID = $_SESSION['seller'];
          $seller=mysqli_query($con,"SELECT seller.* from seller where sellerID = '$sellerID'")or die(mysqli_error($con));
          $rowseller=mysqli_fetch_object($seller);        
}
?>