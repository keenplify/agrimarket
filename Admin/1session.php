<?php 
if(!isset($_SESSION['admin'])){
 echo"<script type='text/javascript'>window.location.replace('login.php')</script>";
}else
{
          $adminID = $_SESSION['admin'];
          $admin=mysqli_query($con,"SELECT admin.* from admin where adminID = '$adminID'")or die(mysqli_error($con));
          $rowadmin=mysqli_fetch_object($admin);        
}
?>