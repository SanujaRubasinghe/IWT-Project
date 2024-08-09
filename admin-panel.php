<?php
    session_start();
    require 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <title>Admin Panel</title>
</head>
<body>
    <?php require 'header.php'; ?>
    <h1>Admin Panel</h1>
    <?php
        if (isset($_SESSION['username'])) {
            echo "<h2>Welcome, ".$_SESSION['username']."</h2>";
            echo '<button><a href="add_vendor.php">Add Vendor Account</a></button>';
            echo '<button><a href="remove_account.php">Remove Account</a></button>';
        }
    ?>
    
</body>
</html>