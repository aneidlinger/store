<?php

// Get All Products
$strSQL = "SELECT *


    FROM
    cis282store.products p, cis282store.categories c

    WHERE
    p.category_id = c.category_id


    ORDER BY
    p.product_id
";

// Get Result
$result = mysqli_query($connect, $strSQL);

// Fetch Data
$productList = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Free Result
mysqli_free_result($result);

// Close Connection
mysqli_close($conn);