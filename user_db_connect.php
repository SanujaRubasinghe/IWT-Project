<?php
    $servername = "dbshop.mysql.database.azure.com";
    $username = "sanuja";
    $password = "$AnuJA@2003";
    $dbname = "userdata";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection Error: ".mysqli_connect_error($conn));
    }
?>
