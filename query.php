<?php
include('1connection.php');
include('./knplfy/utils.php');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if (isset($_POST['btnlogin'])) {

    $user = $_POST['username'];
    $pass = $_POST['password'];

    $s = mysqli_query($con, "SELECT * FROM account where pass='$pass' and user = '$user'") or die(mysqli_errno($con));
    $r = mysqli_fetch_object($s);
    $count = mysqli_num_rows($s);
    if ($count > 0) {
        $_SESSION['account'] = $r->accountID;

        //admin Link
        echo "<script type='text/javascript'>window.location.replace('index.php');alert('Login Successfully!')</script>";
    } else {
        echo "<script type='text/javascript'>window.location.replace('login.php');alert('Wrong username or paassword!');</script>";
    }
}

if (isset($_POST['btnaddtocart'])) {
    $quant = trim($_POST['quant']);
    $itemID = trim($_POST['itemID']);
    $accountID = trim($_POST['accountID']);
    $sellerID = trim($_POST['sellerID']);
    $visitorID = trim($_POST['visitorId']);
    date_default_timezone_set('Asia/Manila');
    $date = date('F d, Y h:i:sa', time());

    $item = mysqli_query($con, "SELECT * from item where itemID = '$itemID'") or die(mysqli_error($con));
    $rowitem = mysqli_fetch_object($item);
    $message = $rowitem->itemNAME . " is added to your cart.";
    $status = '2';

    $query = "INSERT into cart ( 
        cartCOUNT,
        accountID,
        itemID,
        orderID,
        cartDATE, 
        cartPENDING, 
        orderSELLER,
        cartSTATUS
    ) VALUES(
        '$quant',
        '$accountID',
        '$itemID',
        '1',
        '$date',
        '$date',
        '$sellerID',
        '$status'
    )";

    // Check if item is already in cart. If yes, add to quantity instead of adding new cart item.
    $oldCartQuery = mysqli_query($con, "SELECT * from cart WHERE itemID = '$itemID' AND accountId = '$accountID' AND cartSTATUS = '2'");
    $oldCart = mysqli_fetch_object($oldCartQuery);

    if ($oldCart) {
        $clamped = clamp(
            $oldCart->cartCOUNT + $quant,
            $rowitem->itemMOQ,
            !empty($rowitem->itemMAXOQ) ? $rowitem->itemMAXOQ : $rowitem->itemQUANTITY
        );
        $query = "UPDATE cart SET cartCOUNT = $clamped";
    }

    mysqli_query($con, "UPDATE visitors SET visitor_is_converted = '1' WHERE visitor_id = '$visitorID'");
    $minus = mysqli_query($con, "UPDATE item set itemQUANTITY = itemQUANTITY-'$quant'  WHERE itemID='$itemID'");
    $plus = mysqli_query($con, "UPDATE item set  itemTOTALSELL = itemTOTALSELL + '$quant' WHERE itemID='$itemID'");
    
    $addto = mysqli_query($con, $query) or die(mysqli_error($con));

    $insertactivitylog1 = mysqli_query($con, "INSERT into activitylog (
                activitylogUSERID,  
                activitylogUSERTYPE,
                activitylogDESCRIPTION,
                activitylogDATE
            ) VALUES(
                '$accountID',
                'buyer',            
                '$message',
                '$date'
            ) ");
    if ($addto) {
        echo "<script type='text/javascript'>window.location.replace('cart.php');</script>";
    }
}
if (isset($_POST['btncomfirm2'])) {
    $iddd = $_POST['iddd'];
    $type = $_POST['type'];
    date_default_timezone_set('Asia/Manila');
    $date = date('mdYhi', time());
    $newID = "Agri-Market" . $date;
    $message = "Order ID No." . $newID . " is successfully placed.";
    $delll = mysqli_query($con, "UPDATE cart SET orderID = '$newID', cartTYPE = '$type' WHERE accountID ='$iddd' AND orderID = '1' ");
    $insertactivitylog1 = mysqli_query($con, "INSERT into activitylog (
                activitylogUSERID,  
                activitylogUSERTYPE,
                activitylogDESCRIPTION,
                activitylogDATE
            ) VALUES(
                '$iddd',
                'buyer',            
                '$message',
                '$date'
            ) ");
    if ($delll) {
        echo "<script type='text/javascript'>window.location.replace('viewprofile.php');alert('Successfully Item Buy!')</script>";
    }
}

if (isset($_POST['btnregister'])) {
    $no = $_POST['no'];
    $region = $_POST['region'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $barangay = $_POST['barangay'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $gender = $_POST['gender'];

    $securityQuestion = $_POST['securityQuestion'];
    $securityAnswer = $_POST['securityAnswer'];

    // $email=$_POST['email'];
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $address = $no . ", " . $barangay . ", " . $city . ", " . $province . ", Philippines";

    date_default_timezone_set('Asia/Manila');
    $date = date('mdYhi', time());

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
        $copied = move_uploaded_file($tmpName, "img/user/" . $final_filename) or die();
    } else {
        $final_filename = 'null.png';
    }

    try {
        $insertactivitylog1 = mysqli_query($con, "INSERT into account (
                    mobilenumber,
                    name,  
                    user,
                    pass,
                    gender,
                    image,
                    lat,
                    longi,
                    addresshead,
                    securityquestion,
                    securityanswer
                ) VALUES(
                    '$phone',
                    '$name',
                    '$user',            
                    '$pass',
                    '$gender',
                    '$final_filename',
                    '$lat',            
                    '$lng',
                    '$address',
                    '$securityQuestion',
                    '$securityAnswer'
                ) ");
        if ($insertactivitylog1) {
            echo "<script type='text/javascript'>window.location.replace('login.php');alert('Successfully Register!')</script>";
        } else {
            echo "<script type='text/javascript'>window.location.replace('register.php');alert('Unable to register. Please try again.')</script>";
        }
    } catch (Exception $e) {
        $message = $e->getMessage();
        if (str_contains($message, 'Duplicate')) $message = 'This user already exists.';
        echo "<script type='text/javascript'>window.location.replace('register.php');alert(`$message`)</script>";
    }
}


if (isset($_POST['btnupdateaddress'])) {
    $lat = $_POST['lat'];
    $long = $_POST['long'];
    $accountID = $_POST['accountID'];
    date_default_timezone_set('Asia/Manila');
    $txtdate = date('F d, Y h:i:sa', time());
    if (empty($long) || empty($lat)  || empty($accountID)) {
        $message = 'Updating your address failed, Some info is missing!';
    } else {
        $message = 'You Have Successfully Updated Your Address!';
        $seller = mysqli_query($con, "SELECT account.* from account where accountID = '$accountID'") or die(mysqli_error($con));
        $rowseller = mysqli_fetch_object($seller);

        $editprofile = mysqli_query($con, "UPDATE account set 
                lat = '$lat',
                longi = '$long'
            WHERE 
                accountID='$accountID'
            ") or die(mysqli_error($con));
    }
    $insertactivitylog1 = mysqli_query($con, "INSERT into activitylog (
                activitylogUSERID,  
                activitylogUSERTYPE,
                activitylogDESCRIPTION,
                activitylogDATE
            ) VALUES(
                '$accountID',
                'buyer',            
                '$message',
                '$txtdate'
            ) ");
    echo "<script type='text/javascript'>window.location.replace('viewprofile.php');alert('$message');</script>";
}

if (isset($_POST['updateimage'])) {

    $accountID = $_POST['accountID'];
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
        $copied = move_uploaded_file($tmpName, "img/user/" . $final_filename) or die();
        $message = 'Successfully Changing Your Avatar!';
    } else {
        $final_filename = 'null.png';
        $message = 'Unsuccessfully Changing Your Avatar!';
    }


    $add = mysqli_query($con, "UPDATE account set 
                image = '$final_filename' 
            WHERE 
                accountID='$accountID'
            ") or die(mysqli_error($con));

    $insertactivitylog1 = mysqli_query($con, "INSERT into activitylog (
                activitylogUSERID,  
                activitylogUSERTYPE,
                activitylogDESCRIPTION,
                activitylogDATE
            ) VALUES(
                '$accountID',
                'buyer',            
                '$message',
                '$txtdate'
            ) ");

    if ($add) {
        echo "<script type='text/javascript'>window.location.replace('viewprofile.php');alert('$message');</script>";
    }
}

if (isset($_POST['btneditprofile'])) {

    $name = $_POST['name'];
    $number = $_POST['number'];
    $no = $_POST['no'];
    // $address=$_POST['add'];
    $region = $_POST['region2'];
    $province = $_POST['province2'];
    $city = $_POST['city2'];
    $barangay = $_POST['barangay2'];
    $address = $no . ", " . $barangay . ", " . $city . ", " . $province . ", Philippines";
    $accountID = $_POST['accountID'];
    date_default_timezone_set('Asia/Manila');
    $txtdate = date('F d, Y h:i:sa', time());

    if (empty($name) || empty($number)  || empty($accountID)) {
        $message = 'Updating profile info failed, Some Info is Missing!';
    } else {

        $message = 'You Have Successfully Updated Your Profile Info!';
        $seller = mysqli_query($con, "SELECT * from account where accountID = '$accountID'") or die(mysqli_error($con));
        $rowseller = mysqli_fetch_object($seller);

        $editprofile = mysqli_query($con, "UPDATE account set 
                name = '$name',
                mobilenumber = '$number',
               
                addresshead= '$address'
            WHERE 
                accountID='$accountID'
            ") or die(mysqli_error($con));
    }

    $insertactivitylog1 = mysqli_query($con, "INSERT into activitylog (
                activitylogUSERID,  
                activitylogUSERTYPE,
                activitylogDESCRIPTION,
                activitylogDATE
            ) VALUES(
                '$accountID',
                'buyer',            
                '$message',
                '$txtdate'
            ) ");


    echo "<script type='text/javascript'>window.location.replace('viewprofile.php');alert('$message');</script>";
}

if (isset($_POST["btnforgotpasswordfinalize"])) {
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $accountId = $_POST['accountId'];

    if (empty($password) || empty($confirmPassword) || empty($accountId)) {
        $message = 'Updating password failed, Some Info is Missing!';
    } else {
        if ($password !== $confirmPassword) {
            echo "
            <script type='text/javascript'>
                window.location.replace('/auth-forgot-password-step-2.php');
                alert('Password and confirm password is not the same!');
            </script>";
            return;
        }

        $message = 'You Have Successfully Updated Your Password!';

        $editprofile = mysqli_query($con, "UPDATE account set pass = '$password' WHERE accountID='$accountId'") or die(mysqli_error($con));
    }
    echo "<script type='text/javascript'>window.location.replace('/login.php');alert('$message');</script>";
}

if (isset($_POST['btnupdatesecurity'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $accountID = $_POST['accountID'];
    date_default_timezone_set('Asia/Manila');
    $txtdate = date('F d, Y h:i:sa', time());
    if (empty($username) || empty($password)  || empty($accountID)) {
        $message = 'Updating your security failed, Some info is missing!';
    } else {
        $message = 'You Have Successfully Updated Your Security!';
        $seller = mysqli_query($con, "SELECT * from account where accountID = '$accountID'") or die(mysqli_error($con));
        $rowseller = mysqli_fetch_object($seller);
        if ($rowseller->pass == $password) {
            $message = 'Updating your security failed, You entered same old password!';
        } else {
            $editprofile = mysqli_query($con, "UPDATE account set 
                pass = '$password',
                user = '$username'
            WHERE 
                accountID='$accountID'
            ") or die(mysqli_error($con));
        }
    }
    $insertactivitylog1 = mysqli_query($con, "INSERT into activitylog (
                activitylogUSERID,  
                activitylogUSERTYPE,
                activitylogDESCRIPTION,
                activitylogDATE
            ) VALUES(
                '$accountID',
                'buyer',            
                '$message',
                '$txtdate'
            ) ");
    echo "<script type='text/javascript'>window.location.replace('viewprofile.php');alert('$message');</script>";
}
if (isset($_POST['deletecartitem'])) {

    $id = $_POST['id'];
    $count = $_POST['count'];
    $itemno = $_POST['itemno'];


    $delll = mysqli_query($con, "DELETE FROM cart WHERE cartID='$itemno'");
    $filterdashboard = mysqli_query($con, "UPDATE item set itemQUANTITY = itemQUANTITY+'$count' , itemTOTALSELL = itemTOTALSELL - '$count' WHERE itemID='$id'");

    if ($delll) {
        $_SESSION['mess'] = 'add';
        echo "<script type='text/javascript'>window.location.replace('cart.php');alert('Successfully Deleted!')</script>";
    }
}

if (isset($_POST['btnsubquant'])) {

    $cartID = $_POST['cartID'];
    $quant = $_POST['quant'];
    date_default_timezone_set('Asia/Manila');
    $txtdate = date('F d, Y h:i:sa', time());

    $carts = mysqli_query($con, "SELECT * from cart LEFT JOIN item ON item.itemID = cart.itemID where cartID = '$cartID' ") or die(mysqli_error($con));
    $rowcarts = mysqli_fetch_object($carts);

    if (empty($cartID) || ($rowcarts->cartCOUNT == '1')) {
        $message = 'Updating failed';
        echo "<script type='text/javascript'>window.location.replace('cart.php');alert('$message');</script>";
        return;
    } else {
        if ($rowcarts->itemMOQ >= $rowcarts->cartCOUNT) {
            $message = 'Minimum order quantity has reached';
            echo "<script type='text/javascript'>window.location.replace('cart.php');alert('$message');</script>";
            return;
        } else {
            $cart = mysqli_query($con, "UPDATE cart set cartCOUNT = cartCOUNT-1 WHERE cartID='$cartID'") or die(mysqli_error($con));
        }
    }

    echo "<script type='text/javascript'>window.location.replace('cart.php');</script>";
}

if (isset($_POST['btnaddquant'])) {

    $cartID = $_POST['cartID'];
    $quant = $_POST['quant'];
    date_default_timezone_set('Asia/Manila');
    $txtdate = date('F d, Y h:i:sa', time());

    $carts = mysqli_query($con, "SELECT * from cart LEFT JOIN item ON item.itemID = cart.itemID where cartID = '$cartID'") or die(mysqli_error($con));
    $rowcarts = mysqli_fetch_object($carts);

    if (empty($cartID)) {
        $message = 'Updating failed';
        echo "<script type='text/javascript'>window.location.replace('cart.php');alert('$message');</script>";
    } else {
        if (!is_null($rowcarts->itemMAXOQ)) {
            if ($rowcarts->itemMAXOQ <= $rowcarts->cartCOUNT) {
                $message = 'Maximum order quantity has reached';
                echo "<script type='text/javascript'>window.location.replace('cart.php');alert('$message');</script>";
                return;
            }
        }

        $cart = mysqli_query($con, "UPDATE cart set cartCOUNT 
                 = cartCOUNT+1
            WHERE 
                cartID='$cartID'
            ") or die(mysqli_error($con));
    }

    echo "<script type='text/javascript'>window.location.replace('cart.php');</script>";
}
if (isset($_POST['btnrecieved'])) {

    $orderID = $_POST['orderID'];
    $accountID = $_POST['accountID'];
    $sellerID = $_POST['sellerID'];
    date_default_timezone_set('Asia/Manila');
    $txtdate = date('F d, Y h:i:sa', time());
    $image = $_FILES["image"];

    $orderIDmodified = $orderID . "-" . $accountID . "-" . $sellerID;
    if (empty($orderID) || empty($accountID)  || empty($sellerID) || empty($image)) {
        $message = 'Delivery order failed, Some info is missing!';
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
        $copied = move_uploaded_file($tmpName, "./img/deliveredproof/" . $final_filename) or die();

        $message = 'You Have Successfully change status from Delivery to Delivered the Order with ID#: ' . $orderIDmodified;

        $seller = mysqli_query($con, "SELECT seller.* from seller where sellerID = '$sellerID'") or die(mysqli_error($con));
        $rowseller = mysqli_fetch_object($seller);

        $notification = 'Your order ID' . $orderID . 'is change the status by seller from Delivery to Delivered!';

        $update = mysqli_query($con, "UPDATE cart set 
                cartSTATUS = '5',
                cartRECIEVED = '$txtdate',
                cartRECEIVEDIMAGE = '$final_filename'
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

        echo "<script type='text/javascript'>window.location.replace('viewprofile.php');alert('$message');</script>";
    } else {
        echo "<script type='text/javascript'>window.location.replace('viewprofile.php');alert('There is an error in the system, Please  try again later!');</script>";
    }
}

if (isset($_POST['btnAddReview'])) {
    $cartID = $_POST['cartID'];
    $reviewText = $_POST['review'];
    $reviewRating = $_POST['rating'];

    $query = "UPDATE cart set cartREVIEW='$reviewText', cartREVIEWRATING=$reviewRating WHERE cartID = '$cartID'";
    $update = mysqli_query($con, $query) or die(mysqli_error($con));

    echo "<script type='text/javascript'>window.location.replace('viewprofile.php');alert('Successfully created review. Thank you for reviewing!');</script>";
}

if (isset($_POST['btncancel'])) {

    $orderID = $_POST['orderID'];
    $accountID = $_POST['accountID'];
    $sellerID = $_POST['sellerID'];
    date_default_timezone_set('Asia/Manila');
    $txtdate = date('F d, Y h:i:sa', time());

    $orderIDmodified = $orderID . "-" . $accountID . "-" . $sellerID;

    if (empty($orderID) || empty($accountID)  || empty($sellerID)) {
        $message = 'Cancel order failed, Some info is missing!';
    } else {
        $message = 'You Have Successfully change status  to Order Cancelled the Order with ID#: ' . $orderIDmodified;

        $seller = mysqli_query($con, "SELECT seller.* from seller where sellerID = '$sellerID'") or die(mysqli_error($con));
        $rowseller = mysqli_fetch_object($seller);

        $notification = 'Your order ID' . $orderID . 'is change the status by you to Order Cancelled!';


        $update = mysqli_query($con, "UPDATE cart set cartSTATUS = '6' WHERE orderID='$orderID'") or die(mysqli_error($con));
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

        echo "<script type='text/javascript'>window.location.replace('viewprofile.php');alert('$message');</script>";
    } else {
        echo "<script type='text/javascript'>window.location.replace('viewprofile.php');alert('There is an error in the system, Please  try again later!');</script>";
    }
}

if (isset($_POST['btnsearch'])) {

    $search = $_POST['search'];
    if (empty($search)) {
        echo "<script type='text/javascript'>window.location.replace('shop.php');</script>";
    } else {
        echo "<script type='text/javascript'>window.location.replace('shopsearch.php?info=$search');</script>";
    }
}
