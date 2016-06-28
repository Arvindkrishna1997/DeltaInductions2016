<?php
// Start the session
session_start();
?>

<?php
$name=$password1="";
if(!isset($_POST['name']))
    header("Location:login page.php");
$name=($_POST["name"]);
    $password1=($_POST["password"]);

    $password1=md5($password1,2155);

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
    $sql = "SELECT * FROM users1";
    $result = $conn->query($sql);
    $flag=0;
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if($row["name"]==$name&&$row["password"]==$password1)

            {
                $_SESSION["name"]=$row["name"];
                $_SESSION["pic"]=$row["pic"];
                $flag=1;
                echo "Success";
                return;
                break;

            }
        }
    }

    if($flag===0) {
        echo "wrong user!!!";
        return;
    }
    $conn->close();

?>