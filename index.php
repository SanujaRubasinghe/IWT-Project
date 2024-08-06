<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <script src="js/get_suggestion.js" defer></script>
    <title>Home</title>
</head>
<body>
    <?php include 'header.php'?>

    <section id="search-suggestion">
        <ul id="suggestion-list"></ul>
    </section>

    <section>
        <?php
            if (isset($_SESSION['username'])) {
                echo "<h1>Welcome, ".$_SESSION['username']."</h1>";
            }
        ?>
    </section>
    <br>
    <h1>Home Page</h1>
</body>
</html>