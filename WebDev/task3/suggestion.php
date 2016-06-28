<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user1DB";
if(!isset($_POST['dynaming']))
    return;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$word = $_POST['dynaming'];
$sql= "SELECT name FROM users1 WHERE name LIKE '".$word."%' ORDER BY name ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        echo "<tr><p>".$row['name']."</p></tr>";
    }
}
else
    echo "no suggestions";
$conn->close();