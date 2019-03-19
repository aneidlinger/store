<?php

// Get category id's
$idQuery = "SELECT categories.category_id, categories.category_name
            FROM cis282store.categories";

// Get Result
$result = mysqli_query($connect, $idQuery);

// Fetch Data
$categoryList = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Free Result
mysqli_free_result($result);

session_start();

if (isset($_POST["submitForm"])) {
    //Get form data
    $category_id = mysqli_real_escape_string($connect, $_POST['category_id']);
    $product_code = mysqli_real_escape_string($connect, $_POST['product_code']);
    $product_name = mysqli_real_escape_string($connect, $_POST['product_name']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $list_price = mysqli_real_escape_string($connect, $_POST['list_price']);
    $discount_percent = mysqli_real_escape_string($connect, $_POST['discount_percent']);
    $now = new DateTime('NOW', new DateTimeZone('America/Chicago'));
    $date = $now->format('Y-m-d H:i:s');

    $query = "INSERT INTO cis282store.products(
                category_id, product_code, product_name, description, list_price, discount_percent, date_added
                ) VALUES (
                '$category_id', '$product_code', '$product_name', '$description', '$list_price', '$discount_percent', '$date'
                )
        ";

    if (mysqli_query($connect, $query)) {

        $_SESSION['message'] = "Record has been saved!";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "An Error occurred while Saving. " . mysqli_error($connect);
        $_SESSION['msg_type'] = "danger";
    }

}

// Close Connection
mysqli_close($connect);