<?php include('../1connection.php'); ?>
<?php include('session/1session.php'); ?>
<?php 
$response = $_GET['responce'];

?>
<!DOCTYPE html>
<html lang="en">

<!-- -->
<?php include('addson/1head.php'); ?>
<!-- CSS Libraries -->
<link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">
<link rel="stylesheet" href="assets/modules/jquery-selectric/selectric.css">
<link rel="stylesheet" href="assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<body class="layout-4">
<!-- Page Loader -->
<?php include('addson/1loader.php'); ?>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        <!-- Start app top navbar -->
<?php include('addson/1topnav.php'); ?>        

        <!-- Start main left sidebar menu -->
<?php include('addson/1leftnav.php'); ?>         

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
                                <div class="card-body" onload = "image();">
                                  <script type="text/javascript">
                                      function table(){
                                        const xhttp = new XMLHttpRequest();
                                        xhttp.onload = function(){
                                          document.getElementById("loadimage").innerHTML = this.responseText;
                                        }
                                        xhttp.open("GET", "4autoloadadminimage.php");
                                        xhttp.send();
                                      }

                                      setInterval(function(){
                                        table();
                                      }, 1);
                                    </script>
                                     <div id="loadimage">

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
                                            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="">
                                                <h4>Edit Profile Picture</h4>
                                            </div>
                                            <div class="accordion-body collapse bg-light" id="panel-body-1" data-parent="#accordion">
                                            
                                               <div class="form-group row ">
                                                  <label class="col-form-label  col-12 ">Thumbnail</label>
                                                  <center>
                                              <form id="" action="query.php" method="post" enctype="multipart/form-data">
                                                  <div class="col-12 ">
                                                      <div id="image-preview" class="image-preview" >
                                                          <label for="image-upload" id="image-label">Choose File</label>
                                                          <input type="file" accept="image/*" name="imageupload"  id="image-upload" />
                                                      </div>
                                                  </div>
                                                  </center>

                                              </div>
                                              <div class="card-footer  text-right">
                                                 
                                                 <button type="submit"  name="updateimage"  class="btn btn-success">Submit</button>
                                              </div>
                                            </form>
                                             
                                </script>
                                            </div>
                                        </div>
                                        <div class="accordion">
                                            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-2">
                                                <h4>Edit Profile Info</h4>
                                            </div>
                                            <div class="accordion-body collapse  bg-light" id="panel-body-2" data-parent="#accordion">
                                              
                                              <form id="xxx" action="" method="post" >
                                              <div class="card-body">
                                                      <span id="error2"></span>
                                                  <div class="form-row">
                                                     
                                                      
                                                     
                                                      <div class="form-group col-md-12">
                                                          <label for="inputEmail4">Name</label>
                                                          <input type="text" class="form-control" id="firstName"  name="firstName" required="">
                                                          <input type="text" class="form-control" id="lastName"  name="lastName" required="">
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="card-footer bg-light text-right">
                                                 
                                                  <button type="submit" name="button" onclick = "editname();" class="btn btn-success">Submit</button>
                                              </div>
                                           </form>

                                    <script type="text/javascript">
                                    // Prevent form from submit or refresh
                                    var error = document.getElementById("error")
                                     // var error2 = document.getElementById("error2")
                                    var form = document.getElementById("xxx");
                                    function handleForm(event) { event.preventDefault(); }
                                    form.addEventListener('submit', handleForm);
                                    // Function
                                    function editname(){
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
                                          url: '2updatename.php',
                                          // Method
                                          type: 'POST',
                                          data: {
                                            // Get value
                                            firstName: $("input[name=firstName]").val(),
                                            lastName: $("input[name=lastNameName]").val(),
                                            action: "insert2"
                                          },
                                          success:function(response){
                                            // Response is the output of action file
                                            if(response == 1){
                                             error.innerHTML = "<div class='alert alert-success alert-has-icon'><div class='alert-icon'><i class='fa fa-check'></i></div><div class='alert-body'><button class='close' data-dismiss='alert'><span>&times;</span></button><div class='alert-title'>Success</div>Successfully updated your Profile!</div> </div>"
                                              document.getElementById('firstName').value = ''
                                              document.getElementById('lastName').value = ''
                                              setTimeout(function(){ //function will be executed after 10 seconds       
                                               error.innerHTML = ""; //will show the button
                                              }, 2*1000);
                                            }
                        
                                             else if(response == 3){
                                                  error2.textContent = "Name Field is Empty!"
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
                                        <div class="accordion">
                                            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panelbody3">
                                                <h4 id="security">Edit Security</h4>
                                            </div>
                                            <div class="accordion-body collapse  bg-light" id="panelbody3" data-parent="#accordion">
                               
                                    <div class="card-body bg-light">
                                        <span id="error2"></span>
                                    <div class="form-row">
                                       
                                        
                                <form id="myFormss" action="" method="post" >
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4">Username</label>
                                            <input type="text" class="form-control" id="username"  name="username" required="">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="inputPassword4">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-light">
                                   
                                     <button type="submit" name="button" onclick = "insert();" class="btn btn-success">Submit</button>
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
<?php include('addson/1footer.php'); ?>    
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

<script src="assets/modules/summernote/summernote-bs4.js"></script>
<script src="assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
<script src="assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
<script src="assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

<!-- Page Specific JS File -->
<script src="js/page/features-post-create.js"></script>

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

<script type="text/javascript">
                                    
  var error = document.getElementById("error")
    response=<?php echo $response; ?>                                
    if(response == 1){
      error.innerHTML = "<div class='alert alert-success alert-has-icon'><div class='alert-icon'><i class='fa fa-check'></i></div><div class='alert-body'><button class='close' data-dismiss='alert'><span>&times;</span></button><div class='alert-title'>Success</div>Successfully updated your Image!</div> </div>"
        setTimeout(function(){ //function will be executed after 10 seconds       
         error.innerHTML = ""; //will show the button
           }, 2*1000);
       }
                                           

                                </script>
