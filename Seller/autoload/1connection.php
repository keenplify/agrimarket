<?php
//header("Access-Control-Allow-Origin: *");
 
/* Database Config */
//host
$host="localhost";
//username
$username="root";
//password
$pass="";
//database name
$db="geofarmer2";	

/* End Config */

$con=mysqli_connect($host,$username,$pass,$db)or die(mysqli_error($con));
if($con==true){

}
?>