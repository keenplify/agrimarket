
<?php 
$count=0;
$Pending=0;
$Shipping=0;
$Completed=0;
$slide12=mysqli_query($con,"SELECT cart.*,item.*,account.* from cart,item,account where cart.itemID = item.itemID  and cart.accountID = account.accountID group by cart.orderID order by cart.cartID desc ")or die(mysqli_error($con));
              while($rowslide12=mysqli_fetch_object($slide12))
              {
                if ($rowslide12->cartSTATUS=='1') {
                      $Pending++;
                  }
                  if ($rowslide12->cartSTATUS=='4') {
                       $Shipping++;
                  }
                  if ($rowslide12->cartSTATUS=='5'||$rowslide12->cartSTATUS=='7') {
                        $Completed++;
                  }
               $count++;   
              }
?>

                      <!-- <div class="card card-statistic-2 bg-primary">
                        <div class="card-stats bg-primary">
                              <div class="card-stats-title bg-primary">Order Statistics </div>
                              <div class="card-stats-items" >
                                  <div class="card-stats-item" >
                                      <div class="card-stats-item-count"><?php echo $Pending; ?></div>
                                      <div class="card-stats-item-label">Pending</div>
                                  </div>
                                  <div class="card-stats-item">
                                      <div class="card-stats-item-count"><?php echo $Shipping; ?></div>
                                      <div class="card-stats-item-label">Shipping</div>
                                  </div>
                                  <div class="card-stats-item">
                                      <div class="card-stats-item-count"><?php echo $Completed; ?></div>
                                      <div class="card-stats-item-label">Completed</div>
                                  </div>
                              </div>
                            
                        </div>
                        
                            <div class="card-icon shadow-success bg-success">
                            <i class="fas fa-archive "></i>
                            </div>
                            <div class="card-wrap">
                              <div class="card-header">
                                  <h4 >Total Orders</h4>
                              </div>
                              <div class="card-body " style="color: white;">
                                  <?php echo $count; ?>
                              </div>
                            </div>
                      </div> -->

<!-- 
                      <div class="col-lg-4 col-md-4 col-sm-12">
                    
                        <div class="card card-hero " >
                            <div class="card-header" style="height: 196px; width: 100%;">
                                <div class="card-icon">
                                   <i class="fas fa-archive "></i>
                                </div>
                                


                                    
                            </div>
                        </div>


                    
                    </div>
 -->