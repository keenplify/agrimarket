<?php 
$count=0;
$count2=0;
$usertotal=0;
$slide12=mysqli_query($con,"SELECT * from account")or die(mysqli_error($con));
              while($rowslide12=mysqli_fetch_object($slide12))
              {
               $count++;   
              }
$slide122=mysqli_query($con,"SELECT * from seller")or die(mysqli_error($con));
              while($rowslide122=mysqli_fetch_object($slide122))
              {
               $count2++;   
              }
$usertotal=$count+$count2;
?>

                