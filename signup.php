<!-- 
Name(s): Trevor Crow
Date: 12/3/2018
Description: Signs up the user then redirects to the home page
-->
<?php
    session_start();
    $uname=$fname=$lname=$email=$pass= "";
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "floodingbeveragesdb";
    
    //test data
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $uname = test_input($_POST["uname"]);
        $fname = test_input($_POST["fname"]);
        $lname = test_input($_POST["lname"]);
        $email = test_input($_POST["email"]);
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
    
    //check if user already exist
    $sql = "SELECT username FROM users WHERE username='".$uname."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if(($row["username"] === $uname)){
        $_SESSION["registered"] = false;

        $conn->close();
        ob_start();
        header('Location: SignUppage.php');
        ob_end_flush();
        die();
    }

    //insert new user
    $sql = "INSERT INTO users(fname, lname, email, username, pass) VALUES('".$fname."', '".$lname."', '".$email."', '".$uname."', '".$pass."')";
    if($conn->query($sql) === false){
        echo "Error creating Record: ".$conn->error;
    }
    $last_id = $conn->insert_id;
    $conn->close();
    
    $_SESSION["registered"] = true;
    $_SESSION["username"] = $uname;
    $_SESSION["id"] = $last_id;

    ob_start();
    header('Location: home-page.php');
    ob_end_flush();
    die();

?>