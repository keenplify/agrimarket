<?php
//header("Access-Control-Allow-Origin: *");
 
/* Database Config */
//host
$host="127.0.0.1";
//username
$username="root";
//password
$pass="*8*S5Kz2drNc";
//database name
$db="geofarmer";	

/* End Config */

$con=mysqli_connect($host,$username,$pass,$db)or die(mysqli_error($con));
if($con==true){

}

session_start();
?>