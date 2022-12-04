<?php
if(isset($_POST['content'] , $_POST['password'])  ){
require_once ('../1connection.php');
require_once ('sanitize.inc.php');


//Grab Login Post Data
$content = isset($_POST['content']) ? $_POST['content'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";

//Sanitize Data
$content = sanitize_sql_string($content);
$password = sanitize_sql_string($password);
//Insert data into database

mysqli_query($con, "UPDATE admin set adminusername = '$content', adminpassword='$password', WHERE adminID='1'");

}
?>