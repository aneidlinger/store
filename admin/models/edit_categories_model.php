<?php

session_start();

$mysqli = new mysqli('cis282store.cnj51rw6g5sj.us-east-1.rds.amazonaws.com', 'neidlingerstore', 'red8blue', 'cis282store') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$cat_name = '';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM cis282store.categories WHERE category_id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: ../delete_categories_success.php");
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM cis282store.categories WHERE category_id=$id") or die($mysqli->error());
    if (count($result) == 1) {
        $row = $result->fetch_array();
        $cat_name = $row['category_name'];

    }
}

if (isset($_POST['update'])) {
    $id = $_POST['category_id'];
    $cat_name = $_POST['category_name'];

    $mysqli->query("UPDATE cis282store.categories SET category_name='$cat_name'  WHERE category_id=$id") or
    die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header("location: ../edit_categories_success.php");
}

// Close Connection
mysqli_close($connect);
