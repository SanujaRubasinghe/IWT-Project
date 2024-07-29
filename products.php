<?php include 'connect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Products</title>
</head>
<body>
    <?php include 'header.php' ?>
    <div class="product-container">
        <?php
            $display_products = mysqli_query($conn, "select * from `products`");
            if (mysqli_num_rows($display_products) > 0) {
                while($row = mysqli_fetch_assoc($display_products)) {
                    $product_name = $row['name'];
                    $product_price = $row['price'];
                    $path = $row['image_path'];
        ?>
            <div class="product-card">
                <div class="image"><img src="images/<?php echo $path?>" alt="<?php echo $path?>"></div>
                <div class="info">
                    <p id="prod_name"><?php echo $product_name ?></p>
                    <p id="prod_price">Rs.<?php echo $product_price ?></p>
                </div>
            </div>
        <?php
                }
            } else {
                echo "No Products Available.";
            }
        ?>
    </div>

    
</body>
</html>