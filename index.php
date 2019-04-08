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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css"
        integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">

    <title>CIS 282 Store</title>


</head>

<body>
    <!-- Navbar Container -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php">CIS282 Store</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar Content -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="category.php?category=Guitars">Guitars</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="category.php?category=Basses">Basses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="category.php?category=Drums">Drums</a>
                    </li>
                </ul>
                <!-- Search Bar -->
                <form class="form-inline my-2 my-lg-0" action="search.php" method="POST">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search"
                        aria-label="Search">
                    <button class="btn btn-info my-2 my-sm-0" type="submit" name="submit" value="Search">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <?php
if ($result):
    if (mysqli_num_rows($result) > 0):
        while ($product = mysqli_fetch_assoc($result)):
            //print_r($product);
            ?>
			            <div class="col-md-4 col-sm-6 my-5">
			                <form class="h-100" method="post" action="cart.php?action=add&id=<?php echo $product['product_id']; ?>">
			                    <div class="products d-flex flex-column justify-content-between h-100">
			                        <?php $productPicName = str_replace(" ", "_", $product['product_code']);?>
			                        <img src="img/<?php echo $product['product_code']; ?>_l.jpg"
			                            class="img-fluid border border-warning rounded-lg" />
			                        <div class="d-flex flex-column justify-content-between flex-fill">
			                            <h4 class="text-info"><a
			                                    href="product.php?product=<?php echo $product['product_id']; ?>"><?php echo $product['product_name']; ?></a>
			                            </h4>
			                            <h4 class="text-info">$<?php echo $product['list_price']; ?></h4>
			                        </div>
			                        <div class="row mx-n1">
			                            <input type="text" name="quantity" class="form-control col-5 px-1" value="1" />
			                            <input type="hidden" name="name" value="<?php echo $product['product_name']; ?>" />
			                            <input type="hidden" name="price" value="<?php echo $product['list_price']; ?>" />
			                            <input type="submit" name="add_to_cart"
			                                class="btn btn-success cart-submit ml-auto col-6 px-1" value="Add to Cart" />
			                        </div>
			                    </div>
			                </form>
			            </div>
			            <?php
        endwhile;
    endif;
endif;
?>
        </div>



    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>


</html>