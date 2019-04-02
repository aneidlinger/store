<?php

if (isset($_POST['submit'])) {

    $search = mysqli_real_escape_string($connect, $_POST['search']);
    $query = "SELECT * FROM products
                WHERE product_name LIKE '%$search%'
                OR product_code LIKE '%$search%'
                OR list_price LIKE '%$search%';";
    $searchResult = mysqli_query($connect, $query);

}