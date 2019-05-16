<?php

	require('connectdb.php');
	session_start();

	$eid = $_SESSION['e_id'];
	$user = $_SESSION['username'];

	$data=mysqli_query($conn,"SELECT * FROM event WHERE id='$eid'");
	$eve=mysqli_fetch_array($data);

	$ename = $eve['name'];
	$own = $eve['owner'];

	$query = "INSERT into e_join (u_name,e_id,e_name,o_name)
    VALUES ('$user', '$eid', '$ename', '$own')";
    $result = mysqli_query($conn,$query);

?>