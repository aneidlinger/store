<?php
require 'includes/config.php';
require 'models/product_model.php';

//require('models/cart_model.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">

    <?php
if ($result):
    if (mysqli_num_rows($result) > 0):
        while ($product = mysqli_fetch_assoc($result)):
            //print_r($product);
            ?>
    <title>CIS 282 Store | <?php echo $product['product_name']; ?></title>


</head>

<body>


    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <h2><?php echo $product['product_name']; ?></h2>
            </div>
        </div>

        <div class="row mb-3">

            <div class="col-5">
                <?php $productPicName = str_replace(" ", "_", $product['product_code']);?>
                <img src="img/<?php echo $product['product_code']; ?>_l.jpg"
                    class="img-fluid border border-warning rounded-lg mb-3" />

                <form method="post" action="cart.php?action=add&id=<?php echo $product['product_id']; ?>">
                    <div class="row mx-n1">
                        <input type="text" name="quantity" class="form-control col-5 px-1" value="1" />
                        <input type="hidden" name="name" value="<?php echo $product['product_name']; ?>" />
                        <input type="hidden" name="price" value="<?php echo $product['list_price']; ?>" />
                        <input type="submit" name="add_to_cart" class="btn btn-success cart-submit ml-auto col-6 px-1"
                            value="Add to Cart" />
                    </div>
                </form>

            </div>

            <div class="col-7">
                <?php echo $product['description']; ?>
                <h4 class="price text-info">$<?php echo $product['list_price']; ?></h4>
            </div>

        </div>

        <a href="index.php">Continue Shopping</a>
        <?php
        endwhile;
    endif;
endif;
?>
    </div>








    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>


</html>