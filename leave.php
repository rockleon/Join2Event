<?php

	require('connectdb.php');
	session_start();

	$eid = $_SESSION['e_id'];
	$user = $_SESSION['username'];
	
	$query = "DELETE FROM e_join WHERE e_id='$eid' AND u_name='$user'";
 	if(mysqli_query($conn,$query))
 	{
  		echo 'Data Deleted';
 	}
 	else
 		echo 'Data not Deleted/Found';

?>