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

    $conn->close();
?>