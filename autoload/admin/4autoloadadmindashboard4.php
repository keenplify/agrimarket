<?php
                                                  
                                                        $sumq=0;
                                                        $sumqt=0;

                                                        $slide1=mysqli_query($con,"SELECT cart.*,item.* from cart,item where cart.itemID = item.itemID ")or die(mysqli_error($con));
                                                            while($rowslide1=mysqli_fetch_object($slide1))
                                                            {
                                                                if ($rowslide1->orderID!='1') 
                                                                {
                                                                    $sumq = $rowslide1->itemPRICE* $rowslide1->cartCOUNT;
                                                                    $sumqt = $sumqt + $sumq;   
                                                                }

                                                               
                                                            }
                                                        



                                                            
                                                            
                       ?>