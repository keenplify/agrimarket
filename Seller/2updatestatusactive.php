<?php include('../1connection.php'); ?>
<?php
// Choose a function depends on value of $_POST["action"]
if($_POST["action"] == "activethis"){
  activethis();
}

// Function
function activethis(){
  $accountid = $_POST["accountid"];

  // Check if variable value is empty
 
          $query = "UPDATE account set status = 'active' WHERE accountID='$accountid'";
          mysqli_query($con, $query);
          echo 1; 
      
}