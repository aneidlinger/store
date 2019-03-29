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

    <div class="container-fluid bg-primary">
        <div class="row">
            <div class="col">
                <h1 class="text-secondary">Category List</h1>
                <a href="add_categories.php" class="btn btn-primary">Add Category</a>
                <a href="index.html" class="btn btn-primary">Return to Admin Home</a>
            </div>
        </div>
    </div>

    <div class="container-fluid card-header">
        <div class="row text-center text-secondary">
            <div class="col-1"></div>
            <h2 class="col-5 text-left">Category</h2>
        </div>
    </div>


    <div class="container-fluid list">
        <?php foreach ($categoryList as $row) {?>

        <div class="row text-body text-center line">
            <div class="col-1 align-self-center"><?php echo $row['category_id']; ?></div>
            <div class="col-5 text-left align-self-center"><?php echo $row['category_name']; ?></div>
            <div class="col-6 align-self-center">
                <a href="edit_categories.php?edit=<?php echo $row['category_id']; ?>" class="btn btn-info">Edit</a>
                <a href="models/edit_categories_model.php?delete=<?php echo $row['category_id']; ?>"
                    class="btn btn-danger">Delete</a>
            </div>
        </div>

        <?php }?>
    </div>






    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>


</html>