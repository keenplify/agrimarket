<?php include('../1connection.php'); ?>
<?php include('1session.php'); ?>
<?php 
 if(isset($_GET['orderid']) ? $_GET['orderid'] : ''){
    $orderid = $_GET['orderid'];
    $accountID2 = $_GET['accountID'];

 }else{
         echo"<script type='text/javascript'>window.location.replace('errors-404.php');</script>";
      }
?>
<!DOCTYPE html>
<html lang="en">

<!-- -->
<?php include('1head.php'); ?>

<body class="layout-4">
<!-- Page Loader -->
<?php include('1loader.php'); ?>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        <!-- Start app top navbar -->
<?php include('1topnav.php'); ?>        

        <!-- Start main left sidebar menu -->
<?php include('1leftnav.php'); ?>         

        <!-- Start app main Content -->
        <div class="main-content">
            <section class="section" id="printableArea">
                <div class="section-header">
          
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Invoice</a></div>
                       
                    </div>
                </div>

                <div class="section-body">
                       <h2 class="section-title">Invoice</h2>
  <?php

$slide12=mysqli_query($con,"SELECT cart.*,item.*,account.* from cart,item,account where cart.itemID = item.itemID and cart.accountID = account.accountID group by cart.orderID order by cart.cartID desc ")or die(mysqli_error($con));
              while($rowslide12=mysqli_fetch_object($slide12))
              {
                if ( $rowslide12->orderID==$orderid) {
                  
               
$od=$rowslide12->orderID;
$ad=$rowslide12->name; 
$as=$rowslide12->accountID;             

?>
                       <div class="invoice">
                    <div class="invoice-print">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="invoice-title">
                                    <h2>Invoice</h2>
                                    <div class="invoice-number">Order #: <?php echo $od; ?></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <address>
                                            <strong>Billed To:</strong><br>
                                           You
                                        </address>
                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <address>
                                            <strong>Shipped To:</strong><br>
                                           
                                       <?php echo $rowslide12->name; ?><br>
                                            <?php echo $rowslide12->addresshead; ?><br>
                                            <?php echo $rowslide12->mobilenumber; ?><br>
                                            
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                    <?php if($rowslide12->cartPAYMENTTYPE =='1'){ ?>
                                        <address>
                                            <strong>Payment Method:</strong><br>
                                            COD
                                        </address>
                                    <?php }else{ ?>
                                        <address>
                                            <strong>Payment Method:</strong><br>
                                            Pick-Up
                                        </address>
                                    <?php } ?>
                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <address>
                                            <strong>Order Date:</strong><br>
                                             <?php echo $rowslide12->cartACCEPTED; ?><br><br>
                                             <p class="mb-0"><strong>Order Status: </strong> <br>
                                                <?php  if( $rowslide12->cartSTATUS ==1 ){?>
                                                        <span class="badge badge-default">Ordered</span>
                                            <?php }elseif( $rowslide12->cartSTATUS ==2 ){  ?>
                                                        <span class="badge badge-primary">Pending</span>
                                            <?php }elseif( $rowslide12->cartSTATUS ==3 ){   ?>
                                                        <span class="badge badge-info">Accepted</span>
                                            <?php }elseif( $rowslide12->cartSTATUS ==4 ){  ?>
                                                        <span class="badge badge-warning">Shipped</span>
                                            <?php }elseif( $rowslide12->cartSTATUS ==5 ){  ?>
                                                        <span class="badge badge-success">Delivered</span>
                                            <?php }elseif( $rowslide12->cartSTATUS ==6 ){  ?>
                                                        <span class="badge badge-danger">Cancelled</span>
                                             <?php }elseif( $rowslide12->cartSTATUS ==7 ){  ?>
                                                        <span class="badge badge-success">Pick-Up</span>            
                                            <?php } ?></p>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="section-title">Order Summary</div>
                                <p class="section-lead">All items here cannot be deleted.</p>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-md">
                                        <tr>
                                            <th data-width="40">#</th>
                                            <th>Item</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-right">Totals</th>
                                        </tr>
                                      <?php
$sumq=0;
$sumqt=0;
$i=0;
$slide1=mysqli_query($con,"SELECT cart.*,item.* from cart,item where cart.itemID = item.itemID and cart.accountID='$accountID2' ")or die(mysqli_error($con));
              while($rowslide1=mysqli_fetch_object($slide1))
              {
                
                if ($rowslide1->orderID == $od ) {
                 $i++;
                 $sumq = $rowslide1->itemPRICE* $rowslide1->cartCOUNT;
                 $sumqt = $sumqt + $sumq;
           
              

?>
                                            <tr>
                                            <td><?php echo $i; ?></td>
                                              <td ><?php echo $rowslide1->itemNAME ; ?></td>
                                              <td  class="text-center">x<?php echo $rowslide1->cartCOUNT; ?></td>
                                              <td class="text-center"> <?php echo $rowslide1->itemPRICE ; ?></td>
                                             
                                               <td class="text-right"> <?php echo $sumq ; ?></td>
                                            </tr>
 <?php
}}
?>                                            
                                   
                                    </table>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-8">
                                        <div class="section-title">Payment Method</div>
                                        <p class="section-lead">The payment method that we provide is to make it easier for you to pay invoices.</p>

                                     <?php if($rowslide12->cartPAYMENTTYPE =='1'){ ?>
                                        <div class="images">
                                            <img src="../img/banner/cash.PNG" alt="cod" style="width: 250px;">
                                        </div>
                                    <?php }else{ ?>
                                         <div class="images">
                                            <img src="../img/banner/pick.PNG" alt="cod" style="width: 250px;">
                                        </div>
                                    <?php } ?>

                                        

                                    </div>

                                     <?php if($rowslide12->cartPAYMENTTYPE =='1'){ ?>
                                        <div class="col-lg-4 text-right">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Subtotal</div>
                                            <div class="invoice-detail-value">P<?php echo $sumqt ; ?>.00</div>
                                        </div>
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Shipping</div>
                                            <div class="invoice-detail-value">Shipping Fee: +</strong>50</div>
                                        </div>
                                        <hr class="mt-2 mb-2">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Total</div>
                                            <div class="invoice-detail-value invoice-detail-value-lg">P<?php echo $sumqt +50; ?>.00</div>
                                        </div>
                                    </div>
                                    <?php }else{ ?>
                                        <div class="col-lg-4 text-right">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Subtotal</div>
                                            <div class="invoice-detail-value">P<?php echo $sumqt ; ?>.00</div>
                                        </div>
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Pick-Up</div>
                                            <div class="invoice-detail-value">Pick-Up Fee: +</strong>0</div>
                                        </div>
                                        <hr class="mt-2 mb-2">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Total</div>
                                            <div class="invoice-detail-value invoice-detail-value-lg">P<?php echo $sumqt; ?>.00</div>
                                        </div>
                                    </div>
                                    <?php } ?>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    
                    
                </div>
<?php
}}
?> 
                      
                </div>
            </section>
        </div>
        
        <!-- Start app Footer part -->
<?php include('1footer.php'); ?>    
    </div>
</div>

<!-- General JS Scripts -->
<script src="assets/bundles/lib.vendor.bundle.js"></script>
<script src="js/CodiePie.js"></script>

<!-- JS Libraies -->
<script src="http://maps.google.com/maps/api/js?key=AIzaSyCnT63XUjqjPgXZ0lFTU_pdpfUX7swzTTM&amp;sensor=true"></script>
<script src="assets/modules/gmaps.js"></script>

<!-- Page Specific JS File -->
<!-- <script src="js/page/gmaps-draggable-marker.js"></script> -->

<!-- JS Libraies -->
<script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
<script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>

<!-- Template JS File -->
<script src="js/scripts.js"></script>
<script src="js/custom.js"></script>
</body>
</html>

<!-- <script type="text/javascript">
   "use strict";

var input_lat = $("#input-lat"), // latitude input text
  input_lng = $("#input-lng"), // longitude input text
  map = new GMaps({ // init map
    div: '#map',
    lat: <?php echo $row->itemLATITUDE;  ?>,
    lng: <?php echo $row->itemLONGITUTE;  ?>
  });

// add marker
var marker = map.addMarker({
  lat: <?php echo $row->itemLATITUDE;  ?>,
  lng: <?php echo $row->itemLONGITUTE;  ?>,
  draggable: true,
});

</script> -->

<!-- Default Size -->
<div class="modal fade" id="Delivery" tabindex="" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel"></h4>
            </div>
            <div class="modal-body"> Do You Want To Change Status This Order To Shipped? </div>
            <div class="modal-footer text-center">
               <form method="post" action="query.php">
                    <input type="" name="orderID" value="<?= $orderid; ?>" hidden>
                    <input type="" name="sellerID" value="<?= $sellerID; ?>" hidden>
                    <input type="" name="accountID" value="<?= $accountID2; ?>" hidden>
                <button type="submit" name="btndelivery" class="btn btn-success btn-lg  waves-effect">Shipped</button>
                </form>
                <a href="" class="btn btn-danger btn-lg waves-effect" data-dismiss="modal">No</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Recieved" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel"></h4>
            </div>
            <div class="modal-body"> Do You Want To Change Status This Order To Recieved? </div>
            <div class="modal-footer text-center">
              <form method="post" action="query.php">
                    <input type="" name="orderID" value="<?= $orderid; ?>" hidden>
                    <input type="" name="sellerID" value="<?= $sellerID; ?>" hidden>
                    <input type="" name="accountID" value="<?= $accountID2; ?>" hidden>
                <button type="submit" name="btnrecieved" class="btn btn-success btn-lg  waves-effect">Recieved</button>
                </form>
                <a href=""  class="btn btn-danger btn-lg waves-effect" data-dismiss="modal">No</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Pick" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel"></h4>
            </div>
            <div class="modal-body"> Do You Want To Change Status This Order To Pick-Up Alreadsy? </div>
            <div class="modal-footer text-center">
                <form method="post" action="query.php">
                  <input type="" name="orderID" value="<?= $orderid; ?>" hidden>
                    <input type="" name="sellerID" value="<?= $sellerID; ?>" hidden>
                    <input type="" name="accountID" value="<?= $accountID2; ?>" hidden>   
                    
                <button type="submit" name="btnorderpickup" class="btn btn-success btn-lg  waves-effect">Pick-Up</button>
                </form>
                <a href=""  class="btn btn-danger btn-lg waves-effect" data-dismiss="modal">No</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>