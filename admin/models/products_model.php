<?php 

require('includes/config.php');

$productId = $_GET['product'];

// Get all products
$strSQL = 
    "SELECT * FROM cis282store.products p
    WHERE p.product_id = $productId";

// Get results
$result = mysqli_query($connect, $strSQL);

// Fetch data
$productList = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Free result
mysqli_free_result($result);

// Close connection
mysqli_close($connect);

?>