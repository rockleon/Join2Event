<?php

require('connectdb.php');
session_start();

// name owner date venue description delete()

if(!isset($_SESSION['username']))
	header("location:login.php");

$username = $_SESSION['username'];
$id = $_GET['id'];

?>


<!DOCTYPE html>
<html>
<head>
<style type="text/css">
    .active{
        background-color: green;
        color: white;
    }
</style>
    <title>
    
    </title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css.map">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css.map">
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<!--<link href="https://fonts.googleapis.com/css?family=Montez" rel="stylesheet"> -->
<link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:500" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
<script src="js/jquery-1.12.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/js.js"></script>


</head>

<body style="background-color: #f2f2f2;">

<header class="bgImage1">
  <nav class="navbar">
       <div class="container">
      <div class="navbar-header">
            
          <!-- <a class="navbar-brand"> <h2> Join2Event </h2>  </a> -->
          <img src="images/logo2.png" height:"15" width :"15" />  
      </div>
      <ul class="nav navbar-nav navbar-right">
            <li ><a href="index.php">HOME</a></li>
            <li ><a class="active" href="event_list.php">VIEW EVENTS</a></li>
            <li ><a href="create_event.php">CREATE EVENTS</a></li>
            <li ><a href="myevents.php">MY EVENTS</a></li>
    <?php
        if(isset($_SESSION['username']))
        {
            $username = $_SESSION['username'];
            
            echo "<li><a href='logout.php'>Logout
                <span class='glyphicon glyphicon-log-in'></span>
            </a></li>";

            echo "<li><a>
                  <span class='glyphicon glyphicon-user'></span>$username</a></li>";
        }
        else
        {
            echo "<li><a href='signup.php'>Signup
                <span class='glyphicon glyphicon-log-in'></span>
            </a></li>";

            echo "<li><a href='login.php'>Login
                <span class='glyphicon glyphicon-log-in'></span>
            </a></li>";
        }
      ?>
      </ul>
  </div>
  </nav>
</header>

<div style="color:white">
 <?php
  	$data=mysqli_query($conn,"SELECT * FROM event WHERE id='$id' ORDER BY date");
	$row=mysqli_fetch_array($data);

	// echo "Event Name : ".$event['name']."<br>";
	// echo "Event Organiser : ".$event['owner']."<br>";
	// echo "Event Date : ".$event['date']."<br>";
	// echo "Venue : ".$event['venue']."<br>";
	// echo "Description : ".$event['description']."<br>";

	$_SESSION['name'] = $row['name'];
    $_SESSION['e_id'] = $row['id'];
    $ename = $row['name'];


	// if($event['owner']==$username){
		// echo"<form action='delete_event.php?id=$id' method='POST'>
		// <input type='submit' placeholder:'Delete Event'></form>";
  //

    $time=strtotime($row['date']);
    $m=date("F",$time);
    $day=date("j",$time);

    switch($row['type'])
          {   
              case 1:   $path="images/Birthday.jpg";
                        break;
              case 2:   $path="images/wedding.jpg";
                        break;
              case 3:   $path="images/festival.jpg";
                        break;
              case 4:   $path="images/gettogether.jpg";
                        break;
              case 5:   $path="images/exhibition.jpg";
                        break;
              case 6:   $path="images/lecture.jpg";
                        break;
              case 7:   $path="images/concert.jpg";
                        break;
              case 8:   $path="images/movie.jpg";
                        break;
              case 9:   $path="images/sport.png";
                        break;
              case 10:  $path="images/others.jpg";
                        break;              
          }

    echo '
        <br><br> 
        <div class="container">
                <div class="col-md-12">
                <hr style="border-color:black">
                </div>
                </div>

                <div class="row">
                <section>
                    <div class="container">
                        <div class="date col-md-1">
                            <span class="month" style="color:black">'.$m.'</span>
                            <hr class="line" style="border-color:black">
                            <span class="day">'.$day.'</span>
                        </div>
                        <div class="col-md-5">
                            <img src="'.$path.'" class="img-responsive" style="height: 100%; width: 100%; object-fit: contain">
                        </div>
                        <div class="subcontent col-md-6">
                            <h1 class="title">'.$row['name'].'</h1>
                            <h4 style="color:black">Created By : '.$row['owner'].'</h4>
                            <p class="title" style="color:black">
                            <span>Venue :'.$row['venue'].'</span>
                            </p>
                            <p class="definition" style="color:black">
                            '.$row['description'].'
                            <p>
                            <hr class="customline2" style="border-color:black">
                            <a type="button" class="btn btn-default btn-lg btn-primary" href="gmapp.php" target="_blank">
                            Location  <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a type="button" class="btn btn-default btn-lg btn-warning" href="webchat/homepage.php" target="_blank">
                            Chat &nbsp;<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

    $dat=mysqli_query($conn,"SELECT * FROM e_join WHERE u_name='$username' AND e_name='$ename'");
    $jon=mysqli_fetch_array($dat);

    if($jon !== NULL){
        echo '
            <button type="button" onclick="leave()" id="leave" style="background-color:red; color:white" class="btn btn-default btn-lg">
            Leave  <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>
            </button>
            </p>
            </div>
            </div>
            </section>
            </div> 

            <div class="container">
            <div class="col-md-12">
            <hr style="border-color:black">
            </div>
            </div>'; 
    }
    
    else
    {
        echo '
            <button type="button" onclick="join()" id="join" style="background-color:green; color:white" class="btn btn-default btn-lg">
            Join  <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
            </button>
            </p>
            </div>
            </div>
            </section>
            </div> 

            <div class="container">
            <div class="col-md-12">
            <hr style="border-color:black">
            </div>
            </div>';
    }

?> 
</div>


<hr class="footerline">
<footer>
<div class="container">
    <div class="row">

            <div class="footcontent col-md-4">
                <!--right content-->
                Follow Us:
                <br>
                <img src="images/facebook.png">
                <img src="images/twitter.png">
                <img src="images/googleplus.png">
                <img src="images/youtube.png">
            </div>
        </section>
    </div>
</div>
</footer>

</body>

</html>

<script>
    function join(){ 
        if(confirm("Are you sure you want to Join this event?"))  
        {  
            $.ajax({  
                url:"join.php",  
                type:"POST",    
                success:function(){  
                    alert("You have successfully joined this event")
                    location.reload();  
                }  
            });  
        }  
    };

    function leave(){
        if(confirm("Are you sure you want to Leave this event?"))
        {
            $.ajax({
                url:"leave.php",
                type:"POST",
                success:function(data){
                    alert(data+" You have successfully unsubscribed from the event")
                    location.reload();
                }
            })
        }
    }
</script>