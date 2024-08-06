<?php
    $servername = "dbshop.mysql.database.azure.com";
    $username = "sanuja";
    $password = 'dbshop@1234';
    $dbname = "shop";
    $tablename = "userdata";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection Error: ".mysqli_connect_error($conn));
    }
?>
