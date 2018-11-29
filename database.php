<?php
    $servername = "localhost";
    $username = "username";
    $password = "password";
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

    // sql to create tables
    $sql = "CREATE TABLE soda_stock(
    drink INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    drinkname varchar(21),
    stock INT(3)
    )";
    if ($conn->query($sql) === TRUE) {
        echo "Table soda_stock created successfully";
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
    $stmt = $conn->prepare("INSERT INTO soda_stock(drinkname, stock) VALUES(?, ?)");
    $stmt->bind_param("si", "Rough Snake", 100);
    if($conn->query($sql) === true){
        $last_id = $conn->insert_id;
    }else{
        echo "Error creating Record: ".$conn->error;
    }
    $stmt->bind_param("si", "Lemon lager", 100);
    if($conn->query($sql) === true){
        $last_id = $conn->insert_id;
    }else{
        echo "Error creating Record: ".$conn->error;
    }
    $stmt->bind_param("si", "Passion fruit buzzer (kiwi java)", 100);
    if($conn->query($sql) === true){
        $last_id = $conn->insert_id;
    }else{
        echo "Error creating Record: ".$conn->error;
    }
    $stmt->bind_param("si", "SeÑor Bub", 100);
    if($conn->query($sql) === true){
        $last_id = $conn->insert_id;
    }else{
        echo "Error creating Record: ".$conn->error;
    }
    $stmt->bind_param("si", "Drop", 100);
    if($conn->query($sql) === true){
        $last_id = $conn->insert_id;
    }else{
        echo "Error creating Record: ".$conn->error;
    }
    $stmt->bind_param("si", "Brew POP", 100);
    if($conn->query($sql) === true){
        $last_id = $conn->insert_id;
    }else{
        echo "Error creating Record: ".$conn->error;
    }
    $stmt->bind_param("si", "Angelic lion", 100);
    if($conn->query($sql) === true){
        $last_id = $conn->insert_id;
    }else{
        echo "Error creating Record: ".$conn->error;
    }
    $stmt->bind_param("si", "EPIC(Fruit Punch)", 100);
    if($conn->query($sql) === true){
        $last_id = $conn->insert_id;
    }else{
        echo "Error creating Record: ".$conn->error;
    }
    $stmt->bind_param("si", "EPIC(Blue raspberry)", 100);
    if($conn->query($sql) === true){
        $last_id = $conn->insert_id;
    }else{
        echo "Error creating Record: ".$conn->error;
    }
    $stmt->bind_param("si", "Rough Snake Zero", 100);
    if($conn->query($sql) === true){
        $last_id = $conn->insert_id;
    }else{
        echo "Error creating Record: ".$conn->error;
    }
    $stmt->bind_param("si", "Oaken Five", 100);
    if($conn->query($sql) === true){
        $last_id = $conn->insert_id;
    }else{
        echo "Error creating Record: ".$conn->error;
    }


    $stmt->close();
    $conn->close();
?>