<?php
$con = mysqli_connect("localhost", "r4reejh", "test123","webapp"); 
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die("mysql connect error");
}

$email_regex = '/\S+@\S+\.\S+/';
$name_regex = '/[A-Za-z]/';
?>