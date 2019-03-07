<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/styles.css">

    <?php
require 'includes/config.php';
require 'models/categories_model.php';
?>

    <title>CIS 282 Store | Category List</title>
</head>

<body>
    <div class="container bg-primary">
        <h1 class="text-secondary">Category List</h1>
    </div>

    <div class="container">
        <div class="row text-center text-secondary">
            <div class="col-1"></div>
            <h2 class="col-1">Category</h2>
        </div>
    </div>

    <div class="container">

        <?php foreach ($categoryList as $row) {?>
        <div class="row text-body">
            <div class="col-1"><?php echo $row['category_id']; ?></div>
            <div class="col-1"><a
                    href="edit_categories.php?<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></a>
            </div>
        </div>
        <?php }?>

    </div>





    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>


</html>