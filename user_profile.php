<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <title>Profile</title>
</head>
<body>
    <?php include 'header.php'; ?>

    <fieldset>
        <legend>User Profile</legend>
        <p>username: </p>
        <p>email:</p>
    </fieldset>
    <?php
        if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == '3') {
            echo '<button><a href="add_product.php">Add Product</a></button>';
        }

        if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == '1') {
            echo '<a href="admin-panel.php">Admin Panel</a>';
        }

    ?>
    <button><a href="logout.php">Log Out</a></button>
</body>
</html>