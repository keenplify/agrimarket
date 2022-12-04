<?php 
include('1connection.php');
$sellerID = $_GET['sellerID'];
 ?>
<div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-striped v_center">
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Total Sell</th>
                                                <th>View</th>
                                            </tr>
<?php
 $item=mysqli_query($con,"SELECT *  from item ")or die(mysqli_error($con));
              while($rowitem=mysqli_fetch_object($item))
              {
                if ($sellerID == $rowitem->itemSELLER) {
                   
              
?>
                                            <tr>
                                                <td><?php echo $rowitem->itemID;  ?></td>
                                                <td><?php echo $rowitem->itemNAME;  ?></td>
                                                <td><?php echo $rowitem->itemQUANTITY;  ?></td>
                                                <td><?php echo $rowitem->itemPRICE;  ?></td>
                                                <td><?php echo $rowitem->itemTOTALSELL;  ?></td>
                                                <td><a href="viewproduct.php?itemid=<?=$rowitem->itemID?>" class="btn btn-primary">Detail</a></td>
                                            </tr>
                                            
<?php }} ?>   
                                        </table>
                                    </div>
                                </div>