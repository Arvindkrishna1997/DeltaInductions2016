<?php
$username=$password=$email=$phoneno=$address=" ";
$usernameErr=$passwordErr=$emailErr=$phonenoErr=$addressErr= " ";
    if($_POST['username'])       

    if (empty($_POST['name']))
        $usernameErr = "name required";
    else {
        $username = test_input($_POST['name']);
        if (!preg_match("/^[a-zA-Z ]*$/", $username))
            $usernameErr = "invalid name";
    }
    if (empty($_POST['phoneno']))
        $phonenoErr = "phoneno required";
    else {
        $phonenoErr = test_input($_POST['phoneno']);
        if (!preg_match("/^[0-9]*$/", $phoneno))
            $phonenoErr = "invalid phonenumber";
    }
    if (empty($_POST['password']))
        $passwordErr = "password required";
    else {
        $password = test_input($_POST['password']);

    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
        if (empty($_POST["address"]))
            $addressErr = "physical address is reqiured";
        else
            $address = test_input($_POST["address"]);
        if ($usernameErr != " ")
            echo "superb";

    }
    function test_input($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
    }
?>