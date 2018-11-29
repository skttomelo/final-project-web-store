php
<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE MySodas (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
roughsnake VARCHAR(1),
lemonlager VARCHAR(1),
Passion fruit buzzer VARCHAR(1),
SeÑor Bub VARCHAR(1),
DropVARCHAR(1),
Brew POP VARCHAR(1),
Angelic lion VARCHAR(1),
EPIC(Fruit Punch) VARCHAR(1),
EPIC(Blue rasberry) VARCHAR(1),
Rough Snake Zero VARCHAR(1),
Oaken Five VARCHAR(1)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MySodas created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>