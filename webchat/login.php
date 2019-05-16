<?php

session_start();
include "dbh.php";
$uname = $_POST['uname'];
$pass=$_POST['pass'];

$sql = "SELECT * from signup where username='$uname' AND password ='$pass'";
$result = mysqli_query($conn,$sql);  


if ( !$res =$result->fetch_assoc())
{
	header("location:error.php");

}
else{
	$_SESSION['name']=$_POST['uname'];
	header("location:homepage.php");
}
                    

?>                                       
                                                                                                                                                                                                                                                                                                         