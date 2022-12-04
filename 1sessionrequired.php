<?php 
if(!isset($_SESSION['account'])){
  echo"<script type='text/javascript'>window.location.replace('login.php')</script>";
}else
{
          $accountID = $_SESSION['account'];
          $account=mysqli_query($con,"SELECT account.* from account where accountID = '$accountID'")or die(mysqli_error($con));
          $row=mysqli_fetch_object($account);        
}
?>