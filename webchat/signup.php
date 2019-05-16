<?php

include "dbh.php";
$uname = $_POST['uname'];
$email = $_POST['email'];
$password = $_POST['pass'];

$sql = "insert into signup (username,email,password) values ( '$uname','$email','$password')";
$result = $con->query($sql);

header("location:index.html");

?>