<?php include('../1connection.php'); ?>
<?php include('1session.php'); ?>
<?php 
 if(isset($_GET['customerID']) ? $_GET['customerID'] : ''){
    $customerID = $_GET['customerID'];
$user=mysqli_query($con,"SELECT * from account where accountID = '$customerID'")or die(mysqli_error($con));
      $rowuser=mysqli_fetch_object($user);
 }else{
         echo"<script type='text/javascript'>window.location.replace('errors-404.php');</script>";
      }
?>
<!DOCTYPE html>
<html lang="en">

<!-- -->
<?php include('1head.php'); ?>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
            <section class="section">
                <div class="section-header">
                   <!--  <h1>Pending Order</h1> -->
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="customer.php">Customer</a></div>
                        <div class="breadcrumb-item ">View Customer</div>
                    </div>
                </div>

                <div class="section-body">
                <span id="error"></span>
                    <h2 class="section-title">View Customer</h2>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-7">
                            <div class="card author-box card-primary">
                                <div class="card-body">
                                    <div class="author-box-left">
                                        <img alt="image" src="../img/user/<?php  if($rowuser->image==NULL){ ?>null.png<?php } else { echo $rowuser->image;?><?php } ?>" style="aspect-ratio: 1" class="ratio-1x1 rounded-circle author-box-picture">
                                        <div class="clearfix"></div>
                                        <a href="#" class="btn btn-primary mt-3"><?php echo $rowuser->status; ?></a>
                                    </div>
                                    <div class="author-box-details">
                                        <div class="author-box-name">
                                            <a href="#"><?php echo $rowuser->name ;?></a>
                                        </div>
                                        <div class="author-box-job">Customer</div>
                                        <div class="author-box-description">

                                            <p> 
                                                <b>User ID: </b><?php echo $rowuser->accountID; ?><br> 
                                                <b>Address: </b><?php echo $rowuser->addresshead; ?><br>  
                                                <b>Mobile Number: </b><?php echo $rowuser->mobilenumber; ?><br> 
                                                <b>Birth Date: </b><?php echo $rowuser->birthday; ?><br> 
                                                <b>Gender: </b><?php echo $rowuser->gender; ?><br> 
                                                <b>Date Joined: </b><?php echo $rowuser->datecreated ?><br> 
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-lg-5">
                            <div class="card ">
                                <div class="card-header">
                                    <h4>Settings</h4>
                                </div>
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div id="accordion">
                                        <div class="accordion">
                                            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-4" aria-expanded="">
                                                <h4>Edit User Status</h4>
                                            </div>
                                            <div class="accordion-body collapse bg-light" id="panel-body-4" data-parent="#accordion" >
                                            
                                   
                                                 <button  type="submit" data-toggle="modal" data-target="#exampleModal" class="btn btn-success" style="">Active</button>
                                                 <button  type="submit" data-toggle="modal" data-target="#exampleModal2" class="btn btn-danger" style="">Disabled</button>
                                            </div>
                                        </div>




                                       <div id="accordion">
                                        <div class="accordion">
                                            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="">
                                                <h4>Edit Profile Info</h4>
                                            </div>
                                            <div class="accordion-body collapse bg-light" id="panel-body-1" data-parent="#accordion" >
                                            <center>
                                                 <img alt="image" src="../img/user/<?php  if($rowuser->image==NULL){ ?>null.png<?php } else { echo $rowuser->image;?><?php } ?>" class="ratio-1x1 rounded-circle author-box-picture" style="width: 80%; aspect-ratio: 1">
                                            </center>
                                            <hr>
                                            <input type="file" name="" disabled="">
                                            <div class="card-footer bg-light text-right">
                                   
                                                 <button disabled="" type="submit" name="button" onclick = "insert();" class="btn btn-success" style="">Submit</button>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="accordion">
                                            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-2">
                                                <h4>Edit Profile Picture</h4>
                                            </div>
                                            <div class="accordion-body collapse bg-light" id="panel-body-2" data-parent="#accordion">
                                               
                                        <span id="error2"></span>
                                         <form id="myFormss" action="" method="post" >
                                    <div class="form-row">
                                       
                                        
                                   
                                        <div class="form-group col-12">
                                            <label for="inputEmail4">Name</label>
                                            <input type="text" class="form-control" id="name"  name="name" required="" readonly="" placeholder="readonly">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="inputPassword4">address</label>
                                            <input type="text" class="form-control" id="address" name="address" required="" readonly="" placeholder="readonly">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="inputPassword4">Mobile Number</label>
                                            <input type="text" class="form-control" id="number" name="number" required="" readonly="" placeholder="readonly">
                                        </div>
                                         <div class="form-group col-md-12">
                                            <label for="inputPassword4">Birth Date</label>
                                            <input type="text" class="form-control" id="birthday" name="birthday" required="" readonly="" placeholder="readonly">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="inputPassword4">Gender</label>
                                            <input type="text" class="form-control" id="gender" name="gender" required="" readonly="" placeholder="readonly">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="inputPassword4">Date Joined</label>
                                            <input type="text" class="form-control" id="datecreated" name="datecreated" required="" readonly="" placeholder="readonly">
                                        </div>

                                    
                                </div>
                                <div class="card-footer bg-light text-right">
                                   
                                     <button disabled="" type="submit" name="button" onclick = "insert();" class="btn btn-success" style="">Submit</button>
                                </div>
                             </form>
                                            </div>
                                        </div>
                                        <div class="accordion">
                                            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panelbody3">
                                                <h4 id="security">Edit Security</h4>
                                            </div>
                                            <div class="accordion-body collapse bg-light" id="panelbody3" data-parent="#accordion">
                               
                                   
                                    <span id="error2"></span>
                                    <form id="myFormss" action="" method="post" >
                                         <div class="form-row">
                                       
                                        
                                 
                                            <div class="form-group col-md-12">
                                                <label for="inputEmail4">Username</label>
                                                <input type="text" class="form-control" id="username"  name="username" required="" readonly="" placeholder="readonly">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputPassword4">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" required="" readonly="" placeholder="readonly">
                                            </div>
                                        </div>
                                    
                                        <div class="card-footer bg-light text-right">
                                       
                                            <button disabled="" type="submit" name="button" onclick = "insert();" class="btn btn-success">Submit</button>
                                        </div>
                                    </form>


                                        <script type="text/javascript">
                                              // Prevent form from submit or refresh
                                              var error = document.getElementById("error")
                                               var error2 = document.getElementById("error2")
                                              var form = document.getElementById("myFormss");
                                              function handleForm(event) { event.preventDefault(); }
                                              form.addEventListener('submit', handleForm);
                                              // Function
                                              function insert(){
                                                $(document).ready(function(){

                                                  // Make an array of languages to insert multiple checkbox values of languages
                                                  // var languages = [];
                                                  // $("input[name=languages]").each(function(){
                                                  //   if($(this).is(":checked")){
                                                  //     languages.push($(this).val());
                                                  //   }
                                                  // });

                                                  $.ajax({
                                                    // Action
                                                    url: '2updatesecurity.php',
                                                    // Method
                                                    type: 'POST',
                                                    data: {
                                                      // Get value
                                                      username: $("input[name=username]").val(),
                                                      password: $("input[name=password]").val(),
                                                      action: "insert"
                                                    },
                                                    success:function(response){
                                                      // Response is the output of action file
                                                      if(response == 1){
                                                       error.innerHTML = "<div class='alert alert-success alert-has-icon'><div class='alert-icon'><i class='fa fa-check'></i></div><div class='alert-body'><button class='close' data-dismiss='alert'><span>&times;</span></button><div class='alert-title'>Success</div>Successfully updated your security!</div> </div>"
                                                        panelbody3.innerHTML = ""
                                                        security.innerHTML="Edit Security? Please Try Again Later!"
                                                        setTimeout(function(){ //function will be executed after 10 seconds       
                                                         error.innerHTML = ""; //will show the button
                                                        }, 2*1000);
                                                      }
                                                      else if(response == 2){
                                                             error.innerHTML = "<div class='alert alert-danger alert-has-icon'><div class='alert-icon'><i class='fa fa-cross'></i></div><div class='alert-body'><button class='close' data-dismiss='alert'><span>&times;</span></button><div class='alert-title'>Danger</div>Username is already used! Please try again!</div> </div>"
                                                        setTimeout(function(){ //function will be executed after 10 seconds       
                                                         error.innerHTML = "" //will show the button
                                                          document.getElementById('username').value = ''
                                                           document.getElementById('password').value = ''
                                                        }, 2*1000);
                                                      }
                                                       else if(response == 3){
                                                            error2.textContent = "Username and Password Field is Empty!"
                                                            error2.style.color = "red"
                                                      }
                                                      else{
                                                        
                                                      }
                                                    }
                                                  });
                                                });
                                              }

                                          </script>
                        
                                         </div>
                                        </div>
                                    </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
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
<script src="js/page/gmaps-draggable-marker.js"></script>

<!-- JS Libraies -->
<script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
<script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>

<!-- Template JS File -->
<script src="js/scripts.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
<script type="text/javascript">
    
</script>
                                     <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Active This User?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                               Do you want to continue?
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <form id="" action="query.php" method="post" >
                                                     <input type="text" name="accountid" value="<?php echo $customerID; ?>" hidden>
                                                <button type="submit" name="activethis"  class="btn btn-success">Yes</button>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Deactive This User?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                               Do you want to continue?
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                 <form id="" action="query.php" method="post" >
                                                    <input type="text" name="accountid" value="<?php echo $customerID; ?>" hidden>
                                                <button type="submit" name="deactivethis"  class="btn btn-danger">Yes</button>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                                           
                        