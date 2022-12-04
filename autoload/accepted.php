<?php include('1connection.php'); ?>

<section class="section">
                <div class="section-header">
                   <!--  <h1>Pending Order</h1> -->
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Accepted Order</a></div>
                    </div>
                </div>

                <div class="section-body">

                    <h2 class="section-title">Accepted Order</h2>
                   
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped v_center" id="table-1">
                                          
                                           <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Item Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Shipping Fee</th>
                                                <th>Total Ammount</th>
                                                <th>View</th>
                                            </tr>
                                          </thead>
                                          <tbody>
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
                                            
                                        </tbody>
                                        </table>
                                    
<?php 
if ($count1==0) {

   echo "<center>";
   echo "<h1>No Data Available</h1>";
   echo "</center>";
}

 ?>  
                                          
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>