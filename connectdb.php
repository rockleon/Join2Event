<?php
	$conn = mysqli_connect("localhost","root","","test");
  if(!$conn){
    die("Database connection failed: ".mysqli_error(conn));
  }

?>