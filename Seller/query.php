
<?php include('../1connection.php'); ?>
<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if (isset($_POST['updateimage'])) {

    $sellerID = $_POST['sellerID'];
    date_default_timezone_set('Asia/Manila');
    $txtdate = date('F d, Y h:i:sa', time());

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
        $message = 'Successfully Changing Your Avatar!';
    } else {
        $final_filename = 'null.png';
        $message = 'Unsuccessfully Changing Your Avatar!';
    }


    $add = mysqli_query($con, "UPDATE seller set 
                sellerimage = '$final_filename' 
            WHERE 
                sellerID='$sellerID'
            ") or die(mysqli_error($con));

    $insertactivitylog1 = mysqli_query($con, "INSERT into activitylog (
                activitylogUSERID,  
                activitylogUSERTYPE,
                activitylogDESCRIPTION,
                activitylogDATE
            ) VALUES(
                '$sellerID',
                'seller',            
                '$message',
                '$txtdate'
            ) ");

    if ($add) {
        echo "<script type='text/javascript'>window.location.replace('viewprofile.php');alert('$message');</script>";
    }
}

if (isset($_POST['btnitemadds'])) {


    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $moq = $_POST['moq'];
    $maxoq = empty($_POST['maxoq']) ? 'NULL' : "'". $_POST['maxoq'] ."'";
    $price = $_POST['price'];
    $sell = $_POST['sell'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $sellerID = $_POST['sellerID'];
    $lat = $_POST['lat'];
    $long = $_POST['long'];
    $suggestion = $_POST['suggestion'];

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
        $copied = move_uploaded_file($tmpName, "../img/product/" . $final_filename) or die();
    } else {
        $final_filename = 'null.png';
    }

    date_default_timezone_set('Asia/Manila');
    $date = date('m/d/Y h:i:s a', time());

    $add = mysqli_query($con, "INSERT into item (  
                itemNAME,  
                itemQUANTITY,
                itemPRICE ,
                itemTOTALSELL, 
                itemCATEGORY,
                itemDESCRIPTION,
                itemSELLER,
                itemLONGITUTE,
                itemLATITUDE,
                itemIMG,
                itemMOQ,
                itemMAXOQ,
                itemPRODUCTTYPE
            ) VALUES(
                '$name',
                '$quantity',            
                '$price',
                '$sell',
                '$category',
                '$description',
                '$sellerID',          
                '$long',        
                '$lat',
                '$final_filename',
                '$moq',
                $maxoq,
                '$suggestion'
            ) ");

    if ($add) {
        echo "<script type='text/javascript'>window.location.replace('index.php');alert('Successfully Added!')</script>";
    }
}

if (isset($_POST['btneditprofile'])) {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $sellerID = $_POST['sellerID'];
    date_default_timezone_set('Asia/Manila');
    $txtdate = date('F d, Y h:i:sa', time());

    if (empty($firstName) || empty($lastName) || empty($number) || empty($email) || empty($sellerID)) {
        $message = 'Updating profile info failed, Some Info is Missing!';
    } else {

        $message = 'You Have Successfully Updated Your Profile Info!';
        $seller = mysqli_query($con, "SELECT seller.* from seller where sellerID = '$sellerID'") or die(mysqli_error($con));
        $rowseller = mysqli_fetch_object($seller);

        $editprofile = mysqli_query($con, "UPDATE seller set 
                sellerfirstname = '$firstName',
                sellerlastname = '$lastName',
                sellermobilenumber = '$number',
                selleremail = '$email'
            WHERE 
                sellerID='$sellerID'
            ") or die(mysqli_error($con));
    }

    $insertactivitylog1 = mysqli_query($con, "INSERT into activitylog (
                activitylogUSERID,  
                activitylogUSERTYPE,
                activitylogDESCRIPTION,
                activitylogDATE
            ) VALUES(
                '$sellerID',
                'seller',            
                '$message',
                '$txtdate'
            ) ");


    echo "<script type='text/javascript'>window.location.replace('viewprofile.php');alert('$message');</script>";
}

if (isset($_POST['btnforgotpasswordfinalize'])) {

    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $sellerId = $_POST['sellerId'];

    if (empty($password) || empty($confirmPassword) || empty($sellerId)) {
        $message = 'Updating password failed, Some Info is Missing!';
    } else {
        if ($password !== $confirmPassword) {
            echo "
            <script type='text/javascript'>
                window.location.replace('/seller/auth-forgot-password-step-2.php');
                alert('Password and confirm password is not the same!');
            </script>";
            return;
        }

        $message = 'You Have Successfully Updated Your Password!';

        $editprofile = $editprofile = mysqli_query($con, "UPDATE seller set sellerpass = '$password' WHERE sellerID='$sellerId'") or die(mysqli_error($con));
    }
    echo "<script type='text/javascript'>window.location.replace('/Seller/login.php');alert('$message');</script>";
}

if (isset($_POST['btnupdatesecurity'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $sellerID = $_POST['sellerID'];
    date_default_timezone_set('Asia/Manila');
    $txtdate = date('F d, Y h:i:sa', time());
    if (empty($username) || empty($password)  || empty($sellerID)) {
        $message = 'Updating your security failed, Some info is missing!';
    } else {
        $message = 'You Have Successfully Updated Your Security!';
        $seller = mysqli_query($con, "SELECT seller.* from seller where sellerID = '$sellerID'") or die(mysqli_error($con));
        $rowseller = mysqli_fetch_object($seller);
        if ($rowseller->sellerpass == $password) {
            $message = 'Updating your security failed, You entered same old password!';
        } else {
            $editprofile = mysqli_query($con, "UPDATE seller set 
                sellerpass = '$username',
                selleruser = '$password'
            WHERE 
                sellerID='$sellerID'
            ") or die(mysqli_error($con));
        }
    }
    $insertactivitylog1 = mysqli_query($con, "INSERT into activitylog (
                activitylogUSERID,  
                activitylogUSERTYPE,
                activitylogDESCRIPTION,
                activitylogDATE
            ) VALUES(
                '$sellerID',
                'seller',            
                '$message',
                '$txtdate'
            ) ");
    echo "<script type='text/javascript'>window.location.replace('viewprofile.php');alert('$message');</script>";
}



if (isset($_POST['btnacceptorder'])) {
    $cartID = $_POST['cartID'];
    $itemID = $_POST['itemID'];
    $orderID = $_POST['orderID'];
    $accountID = $_POST['accountID'];
    $sellerID = $_POST['sellerID'];
    date_default_timezone_set('Asia/Manila');
    $txtdate = date('F d, Y h:i:sa', time());
    $orderIDmodified = $orderID . "-" . $accountID . "-" . $sellerID;

    if (empty($orderID) || empty($accountID)  || empty($sellerID)) {
        $message = 'Accepting order failed, Some info is missing!';
    } else {
        $message = 'You Have Successfully Accepted the Order with ID#: ' . $orderIDmodified;

        $seller = mysqli_query($con, "SELECT seller.* from seller where sellerID = '$sellerID'") or die(mysqli_error($con));
        $rowseller = mysqli_fetch_object($seller);

        $item = mysqli_query($con, "SELECT item.* from item where itemID = '$itemID'") or die(mysqli_error($con));
        $rowitem = mysqli_fetch_object($item);
        $notification = 'Your ordered item "' . $rowitem->itemNAME . '" is accepted by the seller!';


        $editprofile = mysqli_query($con, "UPDATE cart set 
                orderID = '$orderIDmodified',
                cartSTATUS = '3',
                cartACCEPTED = '$txtdate'
            WHERE 
                cartID='$cartID'
            ") or die(mysqli_error($con));
    }
    $insertactivitylog1 = mysqli_query($con, "INSERT into activitylog (
                activitylogUSERID,  
                activitylogUSERTYPE,
                activitylogDESCRIPTION,
                activitylogDATE
            ) VALUES(
                '$sellerID',
                'seller',            
                '$message',
                '$txtdate'
            ) ");
    $insertNOTIFICATION = mysqli_query($con, "INSERT into notification (
                notificationCLIENTID,  
                notificationCLIENTTYPE,
                notificationMESSAGE,
                notificationDATE
            ) VALUES(
                '$accountID',
                'customer',            
                '$notification',
                '$txtdate'
            ) ");
    echo "<script type='text/javascript'>window.location.replace('pending.php');alert('$message');</script>";
}

if (isset($_POST['btnupdatestatusfrom3'])) {
    
    $orderID = $_POST['orderID'];
    $accountID = $_POST['accountID'];
    $sellerID = $_POST['sellerID'];
    $image = $_FILES["image"];

    date_default_timezone_set('Asia/Manila');
    $txtdate = date('F d, Y h:i:sa', time());

    if (empty($orderID) || empty($accountID)  || empty($sellerID) || empty($image)) {
        echo 'yes';
        $message = 'Updating status failed, Some info is missing!';
    } else {
        $fileName = $image['name'];
        $tmpName  = $image['tmp_name'];
        $fileSize = $image['size'];
        $fileType = $image['type'];

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
        $copied = move_uploaded_file($tmpName, "../img/deliveryproof/" . $final_filename) or die();

        $message = 'The status of order with ID#: ' . $orderID . ' has been successfully updated.';

        $seller = mysqli_query($con, "SELECT seller.* from seller where sellerID = '$sellerID'") or die(mysqli_error($con));
        $rowseller = mysqli_fetch_object($seller);

        $orderResult = mysqli_query($con, "SELECT * from cart LEFT JOIN item ON item.itemID = cart.itemID where orderID = '$orderID'") or die(mysqli_error($con));
        $order = mysqli_fetch_object($orderResult);

        $notification = ($order->cartTYPE == 'Delivery') ? 'Your order ID' . $orderID . 'is now delivering.' : 'Your order ID' . $orderID . 'is now ready to be picked up.';

        $update = mysqli_query($con, "UPDATE cart set 
                cartSTATUS = '4',
                cartDELIVERY = '$txtdate',
                cartDELIVERYIMAGE = '$final_filename'
            WHERE 
                orderID='$orderID' 
            ") or die(mysqli_error($con));

        if ($update) {
            $insertNOTIFICATION = mysqli_query($con, "INSERT into notification (
                    notificationCLIENTID,  
                    notificationCLIENTTYPE,
                    notificationMESSAGE,
                    notificationDATE
                ) VALUES(
                    '$accountID',
                    'customer',            
                    '$notification',
                    '$txtdate'
                ) ");

            $location = ($order->cartTYPE == 'Delivery') ? 'shipped' : 'topickup';
            echo "<script type='text/javascript'>window.location.replace('$location.php');alert('$message');</script>";
        } else {
            echo "<script type='text/javascript'>window.location.replace('accepted.php');alert('There is an error in the system, Please  try again later!');</script>";
        }

        $insertactivitylog1 = mysqli_query($con, "INSERT into activitylog (
                    activitylogUSERID,  
                    activitylogUSERTYPE,
                    activitylogDESCRIPTION,
                    activitylogDATE
                ) VALUES(
                    '$sellerID',
                    'seller',            
                    '$message',
                    '$txtdate'
                ) ");
    }
}

if (isset($_POST['btndelivery'])) {

    $orderID = $_POST['orderID'];
    $accountID = $_POST['accountID'];
    $sellerID = $_POST['sellerID'];
    date_default_timezone_set('Asia/Manila');
    $txtdate = date('F d, Y h:i:sa', time());

    $orderIDmodified = $orderID . "-" . $accountID . "-" . $sellerID;

    if (empty($orderID) || empty($accountID)  || empty($sellerID)) {
        $message = 'Delivery order failed, Some info is missing!';
    } else {
        $message = 'You Have Successfully change status from Accepted to Delivery the Order with ID#: ' . $orderIDmodified;

        $seller = mysqli_query($con, "SELECT seller.* from seller where sellerID = '$sellerID'") or die(mysqli_error($con));
        $rowseller = mysqli_fetch_object($seller);

        $notification = 'Your order ID' . $orderID . 'is change the status by seller from accepted to Delivery!';


        $update = mysqli_query($con, "UPDATE cart set 
                cartSTATUS = '4',
                cartDELIVERY = '$txtdate'
            WHERE 
                orderID='$orderID' 
            ") or die(mysqli_error($con));
    }

    if ($update) {
        $insertNOTIFICATION = mysqli_query($con, "INSERT into notification (
                notificationCLIENTID,  
                notificationCLIENTTYPE,
                notificationMESSAGE,
                notificationDATE
            ) VALUES(
                '$accountID',
                'customer',            
                '$notification',
                '$txtdate'
            ) ");

        echo "<script type='text/javascript'>window.location.replace('shipped.php');alert('$message');</script>";
    } else {
        echo "<script type='text/javascript'>window.location.replace('accepted.php');alert('There is an error in the system, Please  try again later!');</script>";
    }

    $insertactivitylog1 = mysqli_query($con, "INSERT into activitylog (
                activitylogUSERID,  
                activitylogUSERTYPE,
                activitylogDESCRIPTION,
                activitylogDATE
            ) VALUES(
                '$sellerID',
                'seller',            
                '$message',
                '$txtdate'
            ) ");
}
if (isset($_POST['btnrecieved'])) {
    $orderID = $_POST['orderID'];
    $accountID = $_POST['accountID'];
    $sellerID = $_POST['sellerID'];
    date_default_timezone_set('Asia/Manila');
    $txtdate = date('F d, Y h:i:sa', time());

    $orderIDmodified = $orderID . "-" . $accountID . "-" . $sellerID;

    if (empty($orderID) || empty($accountID)  || empty($sellerID)) {
        $message = 'Pickup order failed, Some info is missing!';
    } else {
        $message = 'You Have Successfully change status from To Pickup to Received the Order with ID#: ' . $orderIDmodified;

        $seller = mysqli_query($con, "SELECT seller.* from seller where sellerID = '$sellerID'") or die(mysqli_error($con));
        $rowseller = mysqli_fetch_object($seller);

        $notification = 'Your order ID' . $orderID . 'is change the status by seller from To Pickup to Received!';

        $update = mysqli_query($con, "UPDATE cart set 
                cartSTATUS = '5',
                cartRECIEVED = '$txtdate'
            WHERE 
                orderID='$orderID' 
            ") or die(mysqli_error($con));
    }

    if ($update) {
        $insertNOTIFICATION = mysqli_query($con, "INSERT into notification (
                notificationCLIENTID,  
                notificationCLIENTTYPE,
                notificationMESSAGE,
                notificationDATE
            ) VALUES(
                '$accountID',
                'customer',            
                '$notification',
                '$txtdate'
            ) ");

        echo "<script type='text/javascript'>window.location.replace('Delivered.php');alert('$message');</script>";
    } else {
        echo "<script type='text/javascript'>window.location.replace('shipped.php');alert('There is an error in the system, Please  try again later!');</script>";
    }

    $insertactivitylog1 = mysqli_query($con, "INSERT into activitylog (
                activitylogUSERID,  
                activitylogUSERTYPE,
                activitylogDESCRIPTION,
                activitylogDATE
            ) VALUES(
                '$sellerID',
                'seller',            
                '$message',
                '$txtdate'
            ) ");
}


if (isset($_POST['btnupdateaddress'])) {

    $lat = $_POST['lat'];
    $long = $_POST['long'];
    $sellerID = $_POST['sellerID'];
    date_default_timezone_set('Asia/Manila');
    $txtdate = date('F d, Y h:i:sa', time());
    if (empty($long) || empty($lat)  || empty($sellerID)) {
        $message = 'Updating your address failed, Some info is missing!';
    } else {
        $message = 'You Have Successfully Updated Your Address!';
        $seller = mysqli_query($con, "SELECT seller.* from seller where sellerID = '$sellerID'") or die(mysqli_error($con));
        $rowseller = mysqli_fetch_object($seller);

        $editprofile = mysqli_query($con, "UPDATE seller set 
                sellerlatitude = '$lat',
                sellerlongitude = '$long'
            WHERE 
                sellerID='$sellerID'
            ") or die(mysqli_error($con));
    }
    $insertactivitylog1 = mysqli_query($con, "INSERT into activitylog (
                activitylogUSERID,  
                activitylogUSERTYPE,
                activitylogDESCRIPTION,
                activitylogDATE
            ) VALUES(
                '$sellerID',
                'seller',            
                '$message',
                '$txtdate'
            ) ");
    echo "<script type='text/javascript'>window.location.replace('viewprofile.php');alert('$message');</script>";
}

if (isset($_POST['btncreateaccount'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $number = $_POST['number'];
    $email = $_POST['email'];

    $username = $_POST['username'];
    $password = $_POST['password'];
    $isSeasonal = is_null($_POST['isSeasonal']) ? '0' : '1';

    $lat = $_POST['lat'];
    $lng = $_POST['lng'];

    $no = $_POST['no'];
    $region = $_POST['region'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $barangay = $_POST['barangay'];

    $gender = $_POST['gender'];
    $categoryId = $_POST['categoryId'];

    $address = $no . ", " . $barangay . ", " . $city . ", " . $province . ", Philippines";

    $securityQuestion = $_POST['securityQuestion'];
    $securityAnswer = $_POST['securityAnswer'];


    date_default_timezone_set('Asia/Manila');
    $txtdate = date('F d, Y h:i:sa', time());

    $masterlistResult = mysqli_query($con, "SELECT * FROM farmers_masterlist WHERE municipality='$city' AND sellerId IS NULL") or die(mysqli_error($con));

    // UPDATE item set 
    //             itemNAME = '$name',
    //             itemQUANTITY = '$quantity',
    //             itemPRICE = '$price',
    //             itemCATEGORY = '$category',
    //             itemDESCRIPTION = '$description' 
    //         WHERE 
    //             itemID='$id'
    //         "

    $masterlist = mysqli_fetch_all($masterlistResult, MYSQLI_ASSOC);

    $status = 'new';
    $masterlistId;
    foreach ($masterlist as $farmer) {
        similar_text($farmer["firstName"], $firstName, $firstNameResultPercent);
        similar_text($farmer["lastName"], $lastName, $lastNameResultPercent);

        $ave = ($firstNameResultPercent + $lastNameResultPercent) / 2;

        if ($ave > 90) {
            if ($farmer["gender"] != $gender) continue;
            if ($farmer["categoryId"] != $categoryId) continue;
            
            $status = 'active';
            $masterlistId = $farmer["id"];
            break;
        }
    }

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
        $final_filename = 'null.png';
    }


    if (empty($username) || empty($password)) {
        $message = 'Failed to create account!';
        echo "<script type='text/javascript'>window.location.replace('register.php');alert(`$message`)</script>";
        return;
    } else {
        $message = 'You Have Successfully Created your Account';
        try {
            $insertaccount = mysqli_query($con, "INSERT into seller (
                sellerfirstname,  
                sellerlastname,  
                selleruser,
                sellerpass,
                sellerimage,
                sellerlatitude,  
                sellerlongitude,
                sellermobilenumber,
                sellerdatecreated,
                selleremail,
                sellerSTATUS,
                selleraddress,
                sellergender,
                sellercategoryid,
                sellersecurityquestion,
                sellersecurityanswer,
                sellerisseasonal
            ) VALUES(
                '$firstName',
                '$lastName',
                '$username',            
                '$password',
                '$final_filename',
                '$lat',
                '$lng',            
                '$number',
                '$txtdate',
                '$email',
                '$status',
                '$address',
                '$gender',
                '$categoryId',
                '$securityQuestion',
                '$securityAnswer',
                '$isSeasonal'
            ) ");

            if ($status == 'active') {
                $last_id = $con->insert_id;
                mysqli_query($con, "UPDATE farmers_masterlist SET sellerId='$last_id' WHERE id='$masterlistId'") or die(mysqli_error($con));
            }

            echo "<script type='text/javascript'>window.location.replace('login.php');alert('$message');</script>";
        } catch (Exception $e) {
            $message = $e->getMessage();
            if (str_contains($message, 'Duplicate')) $message = 'This user already exists.';
            echo "<script type='text/javascript'>window.location.replace('register.php');alert(`$message`)</script>";
        }
    }
}
if (isset($_POST['btnupdatesproducts'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $moq = $_POST['moq'];
    $maxoq = empty($_POST['maxoq']) ? 'NULL' : "'". $_POST['maxoq'] ."'";
    $suggestion = $_POST['suggestion'];

    date_default_timezone_set('Asia/Manila');
    $txtdate = date('F d, Y h:i:sa', time());


    $add = mysqli_query($con, "UPDATE item set 
                itemNAME = '$name',
                itemQUANTITY = '$quantity',
                itemPRICE = '$price',
                itemCATEGORY = '$category',
                itemDESCRIPTION = '$description',
                itemMOQ = '$moq',
                itemMAXOQ = $maxoq,
                itemPRODUCTTYPE = '$suggestion'
            WHERE 
                itemID='$id'
            ") or die(mysqli_error($con));



    if ($add) {
        echo "<script type='text/javascript'>window.location.replace('viewproduct.php?itemid=$id');alert('You have succesfully update this product info!');</script>";
    }
}
if (isset($_POST['btnupdatesproductsimg'])) {
    $id = $_POST['id'];
    $iamgedefault = $_POST['iamgedefault'];
    date_default_timezone_set('Asia/Manila');
    $txtdate = date('F d, Y h:i:sa', time());

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
        $copied = move_uploaded_file($tmpName, "../img/product/" . $final_filename) or die();
        $message = 'Successfully Changing Product Image!';
    } else {
        $final_filename = '$iamgedefault';
        $message = 'Unsuccessfully Changing Product Imagee!';
    }


    $add = mysqli_query($con, "UPDATE item set 
                itemIMG = '$final_filename' 
            WHERE 
                itemID='$id'
            ") or die(mysqli_error($con));


    if ($add) {
        echo "<script type='text/javascript'>window.location.replace('viewproduct.php?itemid=$id');alert('$message');</script>";
    }
}
?>