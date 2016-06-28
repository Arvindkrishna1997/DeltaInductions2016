
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sign up</title>
    <link rel="stylesheet" type="text/css" href="viewuser.css">
</head>

<body>
<?php
if(!isset($_POST["search"]))
 header("Location:login page.php");
$name=$_POST["search"];
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


<h2><?php echo $name." Profile";?></h2>
<form id="form" method="post"  action="editdetails.php" enctype="multipart/form-data"  >
    <img src = '<?php echo $pic;?>' width='150px' height='150px' alt= 'Sorry No Image was found ' />
    <br/><br/>
    <input type="text" name="name" id="name" disabled="disabled" value="<?php echo "Name:".$name;?>">
    <br/><br/>
    <input type="text" name="phoneno" id="phoneno" disabled="disabled" value="<?php echo "Phone: ".$phoneno;?>">
    <br/><br/>
    <input type="text" name="email" id="email" disabled="disabled" value="<?php echo "email: ".$email;?>">
    <br/><br/>

    <textarea name="physicaladdress"  id="address" disabled="disabled" ><?php echo "Address: ".$physicaladdress;?> </textarea>
</form>
<a href="login page.php">back</a>
</body>
</html>