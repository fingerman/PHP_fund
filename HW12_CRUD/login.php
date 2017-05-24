<?php
session_start(); // Starting Session

$users = [
    "John" => "s3kjfkdesjgo",
    "Hannah" => "fpdiskfjdsljf",
    "EndlessStudent" => "softuni"
];



$error=''; // Variable To Store Error Message
if (isset($_POST['Submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    } else {
// Define $username and $password
        $username = $_POST['username'];
        $password = $_POST['password'];
    }
}

if
foreach ($users as $key => $val) {
    if ($val == $password and $key == $username){
        echo $username;
    }
}




?>



