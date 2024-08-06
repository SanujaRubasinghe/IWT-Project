<?php
    $servername = "dbshop.mysql.database.azure.com";
    $username = "sanuja";
    $password = 'dbshop@1234';
    $dbname = "shop";
    $tablename = "productdata";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection Failed: ".mysqli_connect_error());
    }
?>
