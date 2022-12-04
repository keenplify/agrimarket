<?php
include('../../1connection.php');


if ($_GET["categoryName"]) {
    $categoryName = $_GET["categoryName"];

    $result = array();

    $query = "SELECT * FROM product_suggestions LEFT JOIN category ON category.categoryID = product_suggestions.product_suggestion_category_id WHERE categoryNAME='$categoryName'";

    $item = mysqli_query($con, $query) or die(mysqli_error($con));

    echo json_encode(mysqli_fetch_all($item, MYSQLI_ASSOC));
}