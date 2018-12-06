<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "floodingbeveragesdb";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if($_SERVER["REQUEST_METHOD"] == "POST"){ 
        for ($i = 0; $i < 10; $i++) {
            if(isset($_POST["item-".$i])){
                $sql = "SELECT stock FROM soda_stock WHERE drinkid=".$i;
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $_SESSION["amount".$i] = $_POST["item-".$i];
                if(intval($row["stock"])<intval($_SESSION["amount".$i])){
                    $_SESSION["amount".$i] = $row["stock"];
                }
                $sql = "INSERT INTO orders(userid, drink, quantity) VALUES('".$_SESSION["id"]."', '".$i."', '".$_SESSION["amount".$i]."')";
                $conn->query($sql);
                
                $_SESSION["amount".$i] = intval($row["stock"])-intval($_POST["item-".$i]);
                $sql = "UPDATE soda_stock SET stock=stock - ".$_SESSION["amount".$i]." WHERE drinkid=".$i;
                $conn->query($sql);
            }
        }
    }

    $conn->close();

    ob_start();
    header('Location: catalog.php');
    ob_end_flush();
    die();
?>