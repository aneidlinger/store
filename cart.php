<?php
require 'includes/config.php';
require 'models/cart_model.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">



	<title>CIS 282 Store | Cart</title>
</head>
<body>
<div class="container">
    <div class="row">

    <div class="table-responsive">
    <table class="table">
        <tr><th colspan="5"><h3>Order Details</h3></th></tr>
        <tr>
                <th width="40%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="20%">Price</th>
                <th width="15%">Total</th>
                <th width="5%">Action</th>
        </tr>
    <?php
if (!empty($_SESSION['shopping_cart'])):

    $total = 0;

    foreach ($_SESSION['shopping_cart'] as $key => $product):
    ?>
	        <tr>
	            <td><?php echo $product['name']; ?></td>
	            <td><?php echo $product['quantity']; ?></td>
	            <td>$ <?php echo $product['price']; ?></td>
	            <td>$ <?php echo number_format($product['quantity'] * $product['price'], 2); ?></td>
	            <td>
	                <a href="cart.php?action=delete&id=<?php echo $product['id']; ?>">
	                    <div class="btn-danger remove">Remove</div>
	                </a>
	            </td>
	        </tr>
	        <?php
    $total = $total + ($product['quantity'] * $product['price']);
endforeach;
?>
        <tr>
                <td colspan="3" class="text-right"><strong>Order Total</strong></td>
                <td><strong>$ <?php echo number_format($total, 2); ?></strong></td>
                <td></td>
        </tr>
        <tr>
            <!-- Show checkout button only if the shopping cart is not empty -->
            <td colspan="5">
                <?php
if (isset($_SESSION['shopping_cart'])):
    if (count($_SESSION['shopping_cart']) > 0):
    ?>
	                <button type="button" class="btn btn-lg btn-block checkout">Checkout</button>
	                <?php endif;endif;?>
            </td>
        </tr>

            <?php
endif;
?>
    </table>
    <a href="index.php">Back</a>
    </div>


</div>











<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>


</html>