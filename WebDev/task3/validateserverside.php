<?php
$name= $password1 =$pic= $email =$physical_address =$displaypassword=$phoneno="";
$nameErr =$passwordErr =$emailErr =$physical_addressErr=$picErr=$phonenoErr="";
    if(!isset($_POST['name']))
        header("Location:registration form.php");
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        echo "$nameErr";
        return;
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
         echo "$nameErr";
            return;
        }
    }
    if(empty($_POST["password"])){
        $passwordErr="password is required";
         echo "$passwordErr";
        return;
    }
    else
    {$password1=$displaypassword=$_POST["password"];
    }
     if($_FILES['pic']['error']>0)
     {
         echo "no image chosen";
         return;
     }
     mkdir($name.'/images',0777,true);
     chmod($name,0777);
     chmod($name.'/images',0777);
     $target=$name.'/images/'.basename($_FILES["pic"]["name"]);
     if(!move_uploaded_file($_FILES["pic"]["tmp_name"],$target))
     {
          echo "Error in uploading the image:(";
          return;
      }

    $phoneno=$_POST["phoneno"];

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        echo "$emailErr";
        return;
    } else {
        $email = test_input($_POST["email"]);
// check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            echo"$emailErr";
            return;
        }
    }

        $physical_address=test_input($_POST["physicaladdress"]);
    if($nameErr===""&&$passwordErr===""&&$emailErr===""&&$physical_addressErr==="")
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
        $password1=md5($password1,2155);
        $sql = "INSERT INTO users1 (name,password,pic,email,phoneno,physicaladdress)
VALUES ('$name', '$password1','$target','$email','$phoneno','$physical_address')";

        if ($conn->query($sql) === TRUE) {
            echo "Success";
            return;
           
        } else {
            echo "sign up failed.Some other user might have entered the same detail/details." ;
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