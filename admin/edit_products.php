<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/styles.css">

    <?php

require 'models/edit_products_model.php';
?>



    <title>CIS 282 Store | Edit Products</title>
</head>

<body>


    <?php if (isset($_SESSION['message'])): ?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
echo $_SESSION['message'];
unset($_SESSION['message']);
?>
    </div>
    <?php endif;?>


    <?php function pre_r($array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

?>


    <form action="models/edit_products_model.php" method="POST">
        <input type="hidden" name="product_id" value="<?php echo $id; ?>">

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <select name="category_id">
                    <?php foreach ($categoryList as $cat): ?>
                    <option value="<?php echo $cat['category_id']; ?>"><?php echo $cat['category_name']; ?>
                    </option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Product Code</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='product_code' value="<?php echo $row['product_code']; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Product Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='product_name' value="<?php echo $row['product_name']; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" name='description'><?php echo $row['description']; ?></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">List Price</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='list_price' value="<?php echo $row['list_price']; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Discount Percent</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='discount_percent'
                    value="<?php echo $row['discount_percent']; ?>">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <?php if ($update == true): ?>
                <button type="submit" class="btn btn-info" name="update">Update</button>
                <?php else: ?>
                <button type="submit" class="btn btn-primary" name="save">Save</button>
                <?php endif;?>
            </div>
        </div>
    </form>

    <a href="products.php">Back to Products</a>








    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>


</html>