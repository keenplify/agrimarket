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
        $s = mysqli_query($con, "SELECT * FROM seller WHERE selleruser = '$username' and sellerpass = '$password'");
        $r = mysqli_fetch_object($s);
       $count=mysqli_num_rows($s);
       if($count>0){
        $_SESSION['seller']=$r->sellerID;
          echo 1;
        }else{
          echo 2; 
        }
  }
}