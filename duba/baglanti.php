<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "duba";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die ("Bağlantı hatası: " . mysqli_connect_error());
    }
?>