<?php
require 'includes/config.php';
require 'models/cart_model.php';
require 'models/search_model.php';

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
                    <li class="nav-item">
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

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 search_results">
                <h2>Search Results for "<?php echo "$search"; ?>"</h2>
            </div>

            <?php while ($result = mysqli_fetch_array($searchResult)) {?>

            <div class="col-2 search_img my-2">
                <?php $resultPicName = str_replace(" ", "_", $result['product_code']);?>
                <img src="img/<?php echo $result['product_code']; ?>_l.jpg"
                    class="img-fluid border border-warning rounded-lg" alt="search results">
            </div>

            <div class="col-10 search_info my-2">
                <h2><a href="product.php?product=<?php echo $result['product_id']; ?>">
                        <?php echo $result['product_name']; ?></a></h2>
                <h4 class="text-info">$<?php echo $result['list_price']; ?></h4>
            </div>
            <?php }?>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>


</html>