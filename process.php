<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "floodingbeveragesdb";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "DELETE FROM orders WHERE userid=".$_SESSION["id"];
    $conn->query($sql);
    $conn->close();

    ob_start();
    header('Location: cart.php');
    ob_end_flush();
    die();
?>