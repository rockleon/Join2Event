<?php
require('connectdb.php');
session_start();

    if (!isset($_SESSION['username']))
    {
        header("location:login.php");
    }

$id=$_GET['id'];

$query = "DELETE from event where id='$id'";
$result = mysqli_query($conn,$query);
header("location:myevents.php");

?>