<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Create database and table</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE user1DB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user1DB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql= "CREATE TABLE users1 (
id INT(30) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) UNIQUE,
password VARCHAR(100) ,
pic VARCHAR(100) ,
email VARCHAR(40) UNIQUE,
phoneno INT(10) UNIQUE,
physicaladdress VARCHAR(300)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table users1 created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
</body>
</html>