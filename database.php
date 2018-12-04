<!-- 
Name(s): Trevor Crow
Date: 12/1/2018
Description: ****RUN THIS FIRST**** Creates the database for the server the it redirects you to the home page
-->
<?php
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
        userid int(6) UNSIGNED,
        drink int(2) UNSIGNED,
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
    $stmt = $conn->prepare("INSERT INTO soda_stock(drinkid, drinkname, stock) VALUES(?, ?, ?)");
    $stmt->bind_param("isi", $drink_id, $drink_name, $amount);
    
    //Rough Snake
    $drink_name = "Rough Snake";
    $stmt->execute();

    //Lemon lager
    $drink_name = "Lemon lager";
    $drink_id++;
    $stmt->execute();    

    //Passion fruit buzzer (kiwi java)
    $drink_name = "Passion fruit buzzer (kiwi java)";
    $drink_id++;
    $stmt->execute();

    //SeÑor Bub
    $drink_name = "SeNor Bub";
    $drink_id++;
    $stmt->execute();

    //Brew POP
    $drink_name = "Brew POP";
    $drink_id++;
    $stmt->execute();

    //Angelic lion
    $drink_name = "Angelic lion";
    $drink_id++;
    $stmt->execute();

    //EPIC(Fruit Punch)
    $drink_name = "EPIC(Fruit Punch)";
    $drink_id++;
    $stmt->execute();

    //EPIC(Blue raspberry)
    $drink_name = "EPIC(Blue raspberry)";
    $drink_id++;
    $stmt->execute();

    //Rough Snake Zero
    $drink_name = "Rough Snake Zero";
    $drink_id++;
    $stmt->execute();

    //Oaken Five
    $drink_name = "Oaken Five";
    $drink_id++;
    $stmt->execute();

    $stmt->close();
    $conn->close();

    ob_start();
    header('Location: home-page.php');
    ob_end_flush();
    die();
?>