<?php
//header("Access-Control-Allow-Origin: *");
 
/* Database Config */
//host
$host="agrimarket.store";
//username
$username="u941863348_agrimarket";
//password
$pass="3c49JR9uI#";
//database name
$db="u941863348_agrimarket";	

/* End Config */

$con=mysqli_connect($host,$username,$pass,$db)or die(mysqli_error($con));
if($con==true){

}

session_start();
?>