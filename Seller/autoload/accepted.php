 <?php include('1connection.php'); ?>
 <?php
$count1=0;
$slide12=mysqli_query($con,"SELECT cart.*,item.*,account.* from cart,item,account where cart.itemID = item.itemID  and cart.accountID = account.accountID group by cart.orderID order by cart.cartID desc ")or die(mysqli_error($con));
              while($rowslide12=mysqli_fetch_object($slide12))
              {
                if ($rowslide12->cartSTATUS=='3') {
                  
$count1++;                
$od=$rowslide12->orderID; 
$ad=$rowslide12->name; 
$as=$rowslide12->accountID;               

?>

<tr>
                                    <td><?php echo $od; ?></td>
<td>
<?php
$sumq=0;
$sumqt=0;
$count=0;

$slide1=mysqli_query($con,"SELECT cart.*,item.* from cart,item where cart.itemID = item.itemID ")or die(mysqli_error($con));
              while($rowslide1=mysqli_fetch_object($slide1))
              {
                
                if ($rowslide1->orderID == $od) {

                 $sumq = $rowslide1->itemPRICE* $rowslide1->cartCOUNT;
                 $sumqt = $sumqt + $sumq;
           
              

?>


                                
                                    <strong><?php echo $rowslide1->itemNAME ; ?><br></strong>
                                    
                                                                    
<?php
}}
?> 
</td>

<td>
<?php

$slide1=mysqli_query($con,"SELECT cart.*,item.* from cart,item where cart.itemID = item.itemID ")or die(mysqli_error($con));
              while($rowslide1=mysqli_fetch_object($slide1))
              {
                
                if ($rowslide1->orderID == $od) {

                
           
              

?>


                                
                                   X<?php echo $rowslide1->cartCOUNT; ?>
                                    
                                                                    
<?php
}}
?> 
</td>

<td>
<?php

$slide1=mysqli_query($con,"SELECT cart.*,item.* from cart,item where cart.itemID = item.itemID ")or die(mysqli_error($con));
              while($rowslide1=mysqli_fetch_object($slide1))
              {
                
                if ($rowslide1->orderID == $od) {
                    $sumq = $rowslide1->itemPRICE;
                 

                
           
              

?>


                                
                                   <?php echo $sumq ; ?>
                                    
                                                                    
<?php
}}
?> 
</td>


<td><a href="javascript:void(0);">
    <?php  if( $rowslide12->cartSTATUS ==1 ){?>
                <div class="badge badge-primary">Pending</div>
    <?php }elseif( $rowslide12->cartSTATUS ==2 ){  ?>
                <div class="badge badge-primary">Pending</div>
    <?php }elseif( $rowslide12->cartSTATUS ==3 ){   ?>
                <div class="badge badge-success">Accepted</div>
    <?php }elseif( $rowslide12->cartSTATUS ==4 ){  ?>
                <div class="badge badge-info">Shipped</div>
    <?php }elseif( $rowslide12->cartSTATUS ==5 ){  ?>
                <div class="badge badge-primary">Delivered</div>
    <?php }elseif( $rowslide12->cartSTATUS ==6 ){  ?>
                <div class="badge badge-primary">Cancelled</div>
    <?php } ?>
   
        
    </a></td>
<td><a href="javascript:void(0);">P50</a></td>
                                    <td><a href="javascript:void(0);">P<?php echo $pd= $sumqt+50 ?>.00</a>  ;
</td>
                                   <td>
                                        <a href="vieworder.php?orderid=<?=$od?>" class="btn btn-primary"><i class="zmdi zmdi-eye"></i>View</a>
                                       
                                    </td>
                                 

</tr>
<?php
}}
?>
<?php 
if ($count1==0) {

   echo "<td colspan='8'><center>";
   echo "<h1>No Data Available</h1>";
   echo "</center></td>";
}

 ?>  