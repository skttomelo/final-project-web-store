<!-- 
Name(s): Trevor Crow
Date: 12/1/2018
Description: ****RUN THIS FIRST**** Creates the database for the server the it redirects you to the home page
-->
<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "floodingbeveragesdb";

    // Create connection
    // $conn = new mysqli($servername, $username, $password, $dbname);
    $conn = new mysqli($servername, $username, $password);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    // create database
    $sql = "CREATE DATABASE ".$dbname;
    if($conn->query($sql) === true){
        echo "Database created successfully";
    }else{
        echo "error creating database ".$conn->error;
    }
    $conn->close();

    //connect to that database
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    // sql to create tables
    $sql = "CREATE TABLE soda_stock(
    drinkid INT(1) PRIMARY KEY, 
    drinkname varchar(21),
    price DECIMAL(10,2),
    stock INT(3)
    )";
    if ($conn->query($sql) === TRUE) {
        echo "Table soda_stock created successfully\n";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $sql = "CREATE TABLE users(
        userid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        fname varchar(30) not null,
        lname varchar(30) not null,
        email varchar(50),
        username varchar(20),
        pass varchar(100),
        reg_date TIMESTAMP
    )";
    if ($conn->query($sql) === TRUE) {
        echo "Table users created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $sql = "CREATE TABLE orders(
        ordernum INT(12) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        userid INT(6),
        drink INT(2),
        quantity INT(3),
        bought_date TIMESTAMP
    )";
    if ($conn->query($sql) === TRUE) {
        echo "Table orders created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    //insert drinks into drinks table
    $drink_name = "";
    $drink_id = 0;
    $amount = 100;
    $price = 2.99;
    $stmt = $conn->prepare("INSERT INTO soda_stock(drinkid, drinkname, price, stock) VALUES(?, ?, ?, ?)");
    $stmt->bind_param("isdi", $drink_id, $drink_name, $price, $amount);
    
    //Rough Snake
    $drink_name = "Rough Snake";
    $stmt->execute();

    //Lemon lager
    $drink_name = "Lemon lager";
    $drink_id++;
    $price = 4.66;
    $stmt->execute();    

    //Passion fruit buzzer (kiwi java)
    $drink_name = "Passion fruit buzzer (kiwi java)";
    $drink_id++;
    $price = 3.25;
    $stmt->execute();

    //SeÑor Bub
    $drink_name = "SeNor Bub";
    $drink_id++;
    $price = 3.25;
    $stmt->execute();

    //Brew POP
    $drink_name = "Brew POP";
    $drink_id++;
    $price = 2.99;
    $stmt->execute();

    //Angelic lion
    $drink_name = "Angelic lion";
    $drink_id++;
    $price = 5.99;
    $stmt->execute();

    //EPIC(Fruit Punch)
    $drink_name = "EPIC(Fruit Punch)";
    $drink_id++;
    $price = 6.99;
    $stmt->execute();

    //EPIC(Blue raspberry)
    $drink_name = "EPIC(Blue raspberry)";
    $drink_id++;
    $price = 6.99;
    $stmt->execute();

    //Rough Snake Zero
    $drink_name = "Rough Snake Zero";
    $drink_id++;
    $price = 2.59;
    $stmt->execute();

    //Oaken Five
    $drink_name = "Oaken Five";
    $drink_id++;
    $price = 8.9;
    $stmt->execute();

    $stmt->close();
    $conn->close();

    for($i = 0; $i<10;$i++){
        $_SESSION["amount".$i] = $amount;
    }

    ob_start();
    header('Location: home-page.php');
    ob_end_flush();
    die();
?>