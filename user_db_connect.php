<?php
    $servername = "dbshop.mysql.database.azure.com";
    $username = "sanuja";
    $password = "$AnuJA@2003";
    $dbname = "shop";
    $tablename = "userdata";

    $conn = mysqli_connect($servername, $username, $password, $dbname, $tablename);

    if (!$conn) {
        die("Connection Error: ".mysqli_connect_error($conn));
    }
?>
