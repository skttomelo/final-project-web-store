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

    $sql = "INSERT INTO users(fname, lname, email, username, pass) VALUES('".$fname."', '".$lname."', '".$email."', '".$uname."', '".$pass."')";
    if($conn->query($sql) === false){
        echo "Error creating Record: ".$conn->error;
    }
    $conn->close();
    
    $_SESSION["username"] = $uname;

    ob_start();
    header('Location: home-page.php');
    ob_end_flush();
    die();

?>