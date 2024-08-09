<?php
    require 'connect.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == "GET"){
        $product = $_REQUEST['product'];
    
        $add_to_cart_query = "INSERT INTO `cart` (productId, userId, itemCount) VALUES($product, ".$_SESSION['userId'].", 1)";
        $select_cart_item_query = "SELECT `productId` FROM `cart` WHERE productId=$product";
        $update_cart_item_count_query = "UPDATE `cart` SET itemCount=itemCount+1 WHERE productID=$product";
    
        if (mysqli_query($conn, $select_cart_item_query)) {
            mysqli_query($conn, $update_cart_item_count_query);
        } else {
            if (!mysqli_query($conn, $add_to_cart_query)) {
                die("Insertion Failed".mysqli_error($conn));
            }
        }
    }

    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/cart.css">
    <title>Shopping Cart</title>
</head>
<body>
    <?php
        include 'header.php';
    ?>
    <h1>Shopping Cart</h1>

    <table id="item-table">
        <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Action</th>
        </tr>

        <tr>
            <td>Laptop</td>
            <td><img src="images/laptop.jpg" alt="Laptop"></td>
            <td>Rs.34343</td>
            <td>Remove | Edit</td>
        </tr>
    </table>
</body>
</html>