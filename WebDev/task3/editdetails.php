<?php
// Start the session
session_start();
if(!isset($_SESSION['name']))
    header("Location:detailspage.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sign up</title>
    <link rel="stylesheet" type="text/css" href="editdetails.css">
</head>

<body>
<?php
$name=$_SESSION["name"];
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
$sql = "SELECT * FROM users1 WHERE name='$name'";
$result = $conn->query($sql);
$flag=0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["name"]===$name)

        {
            $pic=$row["pic"];
            $email=$row["email"];
            $physicaladdress=$row["physicaladdress"];
            $phoneno=$row["phoneno"];
            break;

        }
    }
}
$conn->close();
?>


<h2>Edit Your Details</h2>
<form id="form" method="post"  action="edit_authenticate.php" enctype="multipart/form-data"  >
   <label>Profile pic:</label> <input required type="file" name="pic" id="pic" accept="image/*">
    <br/><br/>
   <label>Address:</label> <textarea required name="physicaladdress"  id="address"><?php echo $physicaladdress; ?></textarea>
    <br/><br/>
    <input type="submit" onclick="return clientside()" value="save changes" >
    <br/>
</form>
<script type="text/javascript" src="edit_authenticate.js"></script>
</body>
</html>