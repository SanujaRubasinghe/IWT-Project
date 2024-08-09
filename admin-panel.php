<?php
    session_start();
    require 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>
    <h1>Admin Panel</h1>
    <?php
        if (isset($_SESSION['username'])) {
            echo "<h2>Welcome, ".$_SESSION['username']."</h2>";
        }
    ?>

</body>
</html>