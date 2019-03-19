<?php

session_start();

$mysqli = new mysqli('cis282store.cnj51rw6g5sj.us-east-1.rds.amazonaws.com', 'neidlingerstore', 'red8blue', 'cis282store') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$cat_name = '';
$row = '';
$categoryList = '';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM cis282store.products WHERE product_id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: ../delete_products_success.php");
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $query = "SELECT * FROM cis282store.products WHERE product_id=$id;";
    $query .= "SELECT * FROM cis282store.categories;";

    if ($mysqli->multi_query($query)) {

        if ($result = $mysqli->store_result()) {
            $res = $result->fetch_all(MYSQLI_ASSOC);
            $row = $res[0];
            $result->free();
        }
        $mysqli->next_result();
        if ($result = $mysqli->store_result()) {
            $categoryList = $result->fetch_all(MYSQLI_ASSOC);
            $result->free();
        }

    }

}

if (isset($_POST['update'])) {
    $id = $_POST['product_id'];
    $cat_id = $_POST['category_id'];
    $prod_code = $_POST['product_code'];
    $prod_name = $_POST['product_name'];
    $desc = htmlspecialchars($_POST['description'], ENT_QUOTES);
    $listPrice = $_POST['list_price'];
    $discPercent = $_POST['discount_percent'];

    $mysqli->query("UPDATE cis282store.products SET category_id='$cat_id', product_code='$prod_code', product_name='$prod_name', description='$desc', list_price='$listPrice', discount_percent='$discPercent'  WHERE product_id=$id") or
    die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header("location: ../edit_products_success.php");
}

// Close Connection
mysqli_close($connect);