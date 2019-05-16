<?php

require('connectdb.php');
session_start();

if(!isset($_SESSION['username']))
	header("location:login.php");

$username = $_SESSION['username'];
$eid = $_GET['id'];

$data=mysqli_query($conn,"SELECT * FROM event WHERE id='$eid'");
$event=mysqli_fetch_array($data);

	if($_SERVER["REQUEST_METHOD"] == "POST"){
   		 $name = stripslashes($_REQUEST['name']);
   		 $name = mysqli_real_escape_string($conn,$name);
   		 $_SESSION['name'] = $name; 
   		 $venue = stripcslashes($_REQUEST['venue']);
   		 $venue = mysqli_real_escape_string($conn,$venue);
   		 $city = stripslashes($_REQUEST['city']);
   		 $city = mysqli_real_escape_string($conn,$city);
   		 $description = stripslashes($_REQUEST['description']);
   		 $description = mysqli_real_escape_string($conn,$description);
   		 $rawdate = stripslashes($_REQUEST['date']);
   		 $date = date("Y-m-d", strtotime($rawdate));

    	$sql = "UPDATE event SET name='$name', venue='$venue', city='$city', description='$description', date='$date' WHERE id='$eid";
    }
    else{
    
?>


<!DOCTYPE html>
<html>
<head>
	<title>edit Event</title>
</head>
<body>

	<h5>"Enter the new values in the fields you want to edit<br><br>"</h5>
	<form name="c_event" method="post">
    <input type="text" name="name" value="$event['name']" required/><br>
    <input type="text" name="date" value="$event['date']" required/><br>
    <input type="text" name="venue" value="$event['venue']" required/><br>
    <input type="text" name="city" value="$event['city']" required/><br>
    <input type="text" name="description" value="$event['description']." required/><br>
    <input type="submit" name="submit" value="Edit"/><br>
    </form>

</body>
</html>

<?php } ?>