<?php
include('../../1connection.php');


if ($_GET["itemSELLER"]) {
    $itemSeller = $_GET["itemSELLER"];

    $result = array();

    $item = mysqli_query($con, "SELECT * FROM item WHERE itemSELLER=$itemSeller") or die(mysqli_error($con));
    while ($itemRow = $item ->fetch_assoc()) {
        $result[] = $itemRow;
    }

    echo json_encode($result);
}