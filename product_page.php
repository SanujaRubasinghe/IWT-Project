<?php 
    session_start();
    require 'connect.php'; 

    function add_to_cart() {
        global $conn;
        $item = $_REQUEST['item'];
        $userid = $_SESSION['userId'];
    
        $add_to_cart_query = "INSERT INTO cart(productId, userId, itemCount)
                              VALUES($item, $userid, 1)";

        $select_item_query = "SELECT productID FROM cart WHERE productId=$item";

        $update_item_count_query = "UPDATE cart SET itemCount=itemCount+1 WHERE productId=$item";
        
        if (mysqli_num_rows(mysqli_query($conn, $select_item_query)) > 0) {
            mysqli_query($conn, $update_item_count_query);
        } else if (!mysqli_query($conn, $add_to_cart_query)) {
            die("Failed to add product.".mysqli_error($conn));
        }
        view_product();
    }

    function view_product() {
        global $conn;
        $item = $_REQUEST['item'];

        $sql = "SELECT * FROM `productdata` WHERE productid=$item";
    
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
                        <button id='add-to-cart'><a href='product_page.php?action=add&item=$item'>Add to Cart</a></button>
                    </div>
                </div>
            </section>";
        }
    }

    
?>
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
    <?php include 'header.php';?>

    <section id="search-suggestion">
        <ul id="suggestion-list"></ul>
    </section>

    <?php

        if (isset($_GET['action'])) {
            $action = $_GET['action'];

            switch($action) {
                case 'view': view_product(); break;
                case 'add': add_to_cart(); break;
                default: die("Something went wrong.".mysqli_erro($conn));
            }
        }

        mysqli_close($conn);
    ?>

</body>
</html>