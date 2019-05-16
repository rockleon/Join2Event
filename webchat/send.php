

<?php
session_start();
include 'dbh.php';
$msg = $_POST['msg'];
$name = $_SESSION['name'];
$e_id = $_SESSION['e_id'];
$sql = "INSERT into posts(msg,name,e_id) values('$msg','$name','$e_id')";
$result = mysqli_query($con,$sql);

header("location:homepage.php");

?>