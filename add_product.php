<?php
    include 'connect.php';

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $prod_name = htmlspecialchars($_POST['product_name']);
        $prod_price = htmlspecialchars($_POST['product_price']);
        $image_path = $_FILES['image']['name'];
        $targetDir = 'images/'.$image_path;

        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $targetDir)) {
            die("Image uploading failed.");
        }

        $sql = "INSERT INTO `productdata` (`name`, price, image_path)
                VALUES('$prod_name', $prod_price, '$image_path')";

        if (!mysqli_query($conn, $sql)) {
            die("Query Failed: ".mysqli_error($conn));
        }

        $response['status'] = "200";

        echo $response['status'];
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
    <script src="js/action.js" defer></script>
    <script src="js/get_suggestion.js"></script>
    <title>Home</title>

</head>
<body>
    
    <?php include 'header.php';?>

    <section id="search-suggestion">
        <ul id="suggestion-list"></ul>
    </section>
    
    <section class="card-container">
        <div class="card-wrapper">
            <div class="message" id="message">
                <span id="message-text"></span>
                <button onclick="this.parentElement.style.display='none'" id="close-btn">X</button>
            </div>
            <div class="add-product">
                <form id="add-product">
                    <label for="product_name">Name:</label>
                    <input type="text" name="product_name" id="prod_name_input" required>
                    <br><br>
                    <label for="product_price">Price:</label>
                    <input type="number" min="0" name="product_price" id="prod_price_input" required>
                    <br><br>
                    <label for="image">Image:</label>
                    <input type="file" name="image" id="image" accept="image/png, image/jpg, image/jpeg" required>
                    <br><br>
                    <button type="submit" id="add-product-btn">Add Product</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>