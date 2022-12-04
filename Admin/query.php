<?php include('../1connection.php'); ?>
<?php
if (isset($_POST['deactivethis'])) {

    $accountID = $_POST['accountid'];
    $txtdate = date('Y-m-d H:i:s');

    $add = mysqli_query($con, "UPDATE account set 
                                    status = 'blocked' 
                                    WHERE 
                                    accountID='$accountID'");
    if ($add) {
        echo "<script type='text/javascript'>window.location.replace('viewcustomer.php?customerID=$accountID');</script>";
    }
}
if (isset($_POST['activethis'])) {

    $accountID = $_POST['accountid'];
    $txtdate = date('Y-m-d H:i:s');

    $add = mysqli_query($con, "UPDATE account set 
                                    status = 'active' 
                                    WHERE 
                                    accountID='$accountID'");
    if ($add) {
        echo "<script type='text/javascript'>window.location.replace('viewcustomer.php?customerID=$accountID');</script>";
    }
}
if (isset($_POST['deactivethisseller'])) {

    $sellerID = $_POST['sellerid'];
    $txtdate = date('Y-m-d H:i:s');

    $add = mysqli_query($con, "UPDATE seller set 
                                    sellerstatus = 'blocked' 
                                    WHERE 
                                    sellerID='$sellerID'");
    if ($add) {
        // echo"<script type='text/javascript'>window.location.replace('viewseller.php?sellerID=$sellerID');</script>";  
        echo "<script type='text/javascript'>window.location.replace('sellernew.php');</script>";
    }
}
if (isset($_POST['activethisseller'])) {

    $sellerID = $_POST['sellerid'];
    $txtdate = date('Y-m-d H:i:s');

    $add = mysqli_query($con, "UPDATE seller set 
                                    sellerstatus = 'active' 
                                    WHERE 
                                   sellerID='$sellerID'");
    if ($add) {
        // echo"<script type='text/javascript'>window.location.replace('viewseller.php?sellerID=$sellerID');</script>"; 
        echo "<script type='text/javascript'>window.location.replace('sellernew.php');</script>";
    }
}

if (isset($_POST['addmasterlist'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $municipality = $_POST['city'];
    $gender = $_POST['gender'];
    $categoryId = $_POST['categoryId'];

    $add = mysqli_query($con, "INSERT INTO farmers_masterlist (firstName, lastName, municipality, gender, categoryId) VALUES ('$firstName', '$lastName', '$municipality', '$gender', '$categoryId')");
    if ($add) {
        echo "<script type='text/javascript'>window.location.replace('masterlist.php');</script>";
    }
}

if (isset($_POST['addnotifications'])) {
    $text = $_POST['text'];
    $expireAt = $_POST['expire_at'];

    $add = mysqli_query($con, "INSERT INTO notifications (text, expire_at) VALUES ('$text', '$expireAt')");
    if ($add) {
        echo "<script type='text/javascript'>window.location.replace('notifications.php');</script>";
    }
}

if (isset($_POST['deletemasterlist'])) {
    $id = $_POST['id'];

    $add = mysqli_query($con, "DELETE FROM farmers_masterlist WHERE id='$id'");
    if ($add) {
        echo "<script type='text/javascript'>window.location.replace('masterlist.php');</script>";
    }
}

if (isset($_POST['deletenotification'])) {
    $id = $_POST['id'];

    $add = mysqli_query($con, "DELETE FROM notifications WHERE id='$id'");
    if ($add) {
        echo "<script type='text/javascript'>window.location.replace('notifications.php');</script>";
    }
}

if (isset($_POST['updateimage'])) {


    $txtdate = date('Y-m-d H:i:s');

    if (isset($_FILES["imageupload"]['name']) && $_FILES["imageupload"]['name'] != '') {
        $fileName = $_FILES["imageupload"]['name'];
        $tmpName  = $_FILES["imageupload"]['tmp_name'];
        $fileSize = $_FILES["imageupload"]['size'];
        $fileType = $_FILES["imageupload"]['type'];

        function getExtension($str)
        {
            $i = strrpos($str, ".");
            if (!$i) {
                return "";
            }
            $l = strlen($str) - $i;
            $ext = substr($str, $i + 1, $l);
            return $ext;
        }
        $extension = getExtension($fileName);
        $extension = strtolower($extension);
        $final_filename = time() . "." . $extension;
        $copied = move_uploaded_file($tmpName, "../img/user/" . $final_filename) or die();
    } else {
        $final_filename = $_POST['picturea'];
    }


    $add = mysqli_query($con, "UPDATE admin set adminimage = '$final_filename' WHERE adminID='1'") or die(mysqli_error($con));

    if ($add) {
        $_SESSION['mess'] = 'add';
        echo "<script type='text/javascript'>window.location.replace('viewprofile2.php?responce=1');</script>";
    }
}
?>