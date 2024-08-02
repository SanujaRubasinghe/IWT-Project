<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="js/get_suggestion.js"></script>
    <script src="js/cart.js" defer></script>
    <title>Shop</title>
</head>
<body>
    <?php
        session_start();
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
            include 'header.php';
        } else {
            include 'header_not_logged.php';
        }
    ?>

    <section id="search-suggestion">
        <ul id="suggestion-list"></ul>
    </section>

    <?php

    $item = $_REQUEST['item'];

    $sql = "SELECT * FROM `products` WHERE id=$item";

    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $prod_name = $row['name'];
        $prod_price = $row['price'];
        $image = $row['image_path'];

        echo "<section class='view-product-container'>
            <div class='view-product-card'>
                <div class='vp-image'><img src='images/$image' alt='Laptop'></div>
                <div class='vp-info'>
                    <h3>$prod_name</h3>
                    <p>Rs.$prod_price</p>
                    <button id='add-to-cart'>Add to Cart</button>
                </div>
            </div>
        </section>";
    }


    ?>

</body>
</html>