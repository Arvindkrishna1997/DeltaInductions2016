<?php
// Start the session
session_start();
if(!isset($_POST['physicaladdress']))
    header("Location:login page.php");
?>

<?php
$pic=$physical_address =$displaypassword="";
$physical_addressErr=$picErr="";
$name=$_SESSION['name'];
     if($_FILES['pic']['error']>0)
     {
         echo "no image chosen";
         return;
     }
  

        $physical_address=test_input($_POST["physicaladdress"]);
    if($physical_addressErr==="")
    {
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
         unlink($_SESSION["pic"]);
        $target=$_SESSION['name'].'/images/'.basename($_FILES["pic"]["name"]);

        if(!move_uploaded_file($_FILES["pic"]["tmp_name"],$target))
        {
            echo "Error in uploading the image:(";
            return;
        }

        $_SESSION["pic"]=$target;

        $sql = "UPDATE users1 SET pic='$target', physicaladdress='$physical_address' WHERE name='$name' ";


        if ($conn->query($sql) === TRUE) {
            echo "Success";
            return;

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            return;
        }

        $conn->close();




    }
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>