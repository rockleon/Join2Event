<?php

$con = mysqli_connect("localhost","root","","mydatabase");
 if(!$con)
 {
     die("connection Error".mysqli_connect_error());
 }
 
?> 