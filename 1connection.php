<?php
//header("Access-Control-Allow-Origin: *");
 
/* Database Config */
//host
$host="sql605.main-hosting.eu";
//username
$username="u941863348_agrimarket";
//password
$pass="5mJL4pSSeBRDe";
//database name
$db="u941863348_agrimarket";	

/* End Config */

$con=mysqli_connect($host,$username,$pass,$db)or die(mysqli_error($con));
if($con==true){

}

session_start();
?>