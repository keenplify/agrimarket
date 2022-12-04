<?php include('../1connection.php'); ?>
<?php
// Choose a function depends on value of $_POST["action"]
if($_POST["action"] == "insert"){
  insert();
}

// Function
function insert(){
  global $con;
  $errorid=0;
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Check if variable value is empty
  if(empty($username) || empty($password) ){
    echo 3;
  }else{

        // Check if email still available
        $sameEmail = mysqli_query($con, "SELECT * FROM admin WHERE adminusername = '$username'");
        if(mysqli_num_rows($sameEmail) > 0){
          // Output
          echo 2;
        }else{
          $query = "UPDATE admin set adminusername = '$username', adminpassword='$password' WHERE adminID='1'";
          mysqli_query($con, $query);
         // Output
          echo 1; 
        }
  }
}