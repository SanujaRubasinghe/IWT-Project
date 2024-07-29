<?php
    include 'connect.php';

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $prod_name = htmlspecialchars($_POST['product_name']);
        $prod_price = htmlspecialchars($_POST['product_price']);
        $image_path = "earbuds.jpg";

        $sql = "INSERT INTO `products` (name, price, image_path)
                VALUES('$prod_name', $prod_price, '$image_path')";

        if (!mysqli_query($conn, $sql)) {
            die("Query Failed: ".mysqli_error());
        }

        $response['status'] = "200";

        echo $response['status'];
    }

    echo $response['status'];
    mysqli_close($conn);

?>