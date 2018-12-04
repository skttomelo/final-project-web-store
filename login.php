<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "floodingbeveragesdb";
    $uname=$pass="";

    //test data
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $uname = test_input($_POST["uname"]);
        $pass = test_input($_POST["psw"]);
    }
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if(strlen($pass)>100){
        ob_start();
        header('Location: SignUppage.php');
        ob_end_flush();
        die();
    }
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //selects input from database and checks if what the user inputted lines up
    $sql = "SELECT userid, username, pass FROM users WHERE username='".$uname."' AND pass='".$pass."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $conn->close();
    if(($row["username"] === $uname) && ($row["pass"] === $pass)){
        $_SESSION["username"] = $row["username"];
        $_SESSION["id"] = $row["userid"];
        $_SESSION["logged"] = true;

        ob_start();
        header('Location: home-page.php');
        ob_end_flush();
        die();
    }
    $_SESSION["logged"] = false;
    ob_start();
    header('Location: loginpage.php');
    ob_end_flush();
    die();
?>