<?php

session_start();

if (isset($_POST["submitForm"])) {
    //Get form data
    $category_name = mysqli_real_escape_string($connect, $_POST['category_name']);

    $query = "INSERT INTO cis282store.categories(
                category_name
                ) VALUES (
                '$category_name'
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
