<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/styles.css">
    <title>CIS282 | Add Products</title>

    <?php
require 'includes/config.php';
require 'models/add_products_model.php';
?>

</head>

<body>
    <form method="post">
        <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
            <?php
echo $_SESSION['message'];
unset($_SESSION['message']);
?>
        </div>
        <?php endif;?>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <select name="category_id">
                    <?php foreach ($categoryList as $row): ?>
                    <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Product Code</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='product_code' placeholder="Add Add Product Code">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Product Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='product_name' placeholder="Add Product Name">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" name='description' placeholder="Add Description"></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">List Price</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='list_price' placeholder="Add List Price">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Discount Percent</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='discount_percent' placeholder="Add Discount Percentage">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" name="submitForm" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

    <a href="products.php" class="btn btn-primary">Back To Products</a>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>