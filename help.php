
<?php
    require('connectdb.php');
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
<style type="text/css">
    .active{
        background-color: green;
        color: white;
    }

    .sidenav {
    height: 100%;
    width: 160px;
    z-index: 1;
    position: relative;
    top: 35px;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    padding-top: 20px;
}

.sidenav a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    padding-bottom: 12px;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.main {
    margin-left: 160px; /* Same as the width of the sidenav */
    font-size: 28px; /* Increased text to enable scrolling */
    padding: 0px 10px;
}
@media screen and (max-height: 450px) {
    .sidenav {padding-top: 150px;}
    .sidenav a {font-size: 18px;}
}

  div.container{
      border : 2px #4a148c;
      border-top-left-radius: 8px;
      border-bottom-right-radius: 8px;
  }
</style>

<script>
$(document).ready(function(){
  
    $("#att1").click(function(){
      $('#msg2').fadeout();
    });
    $("#att2").click(function(){
      $('#msg1').fadeout();
    });
});
</script>
    <title> Help Section </title>
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
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Do+Hyeon" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=EB+Garamond" rel="stylesheet">
            

</head>

<body style="background-color: #dce6f7;">

<header class="bgImage" style="min-height: 768px; max-height: 1080px">
  <nav class="navbar">
       <div class="container">
      <div class="navbar-header">
            
          <!-- <a class="navbar-brand"> <h2> Join2Event </h2>  </a> -->
          <!-- <img src="images/logo2.png" height:"15" width :"15" />   -->
      </div>
      <ul class="nav navbar-nav navbar-right">
            <li ><a class="active" href="index.php" >HOME</a></li>
            <li ><a href="event_list.php">VIEW EVENTS</a></li>
            <li ><a href="create_event.php">CREATE EVENTS</a></li>
            
    <?php
        if(isset($_SESSION['username']))
        {
            $username = $_SESSION['username'];
            
            echo "<li><a href='logout.php'>Logout
                <span class='glyphicon glyphicon-log-in'></span>
            </a></li>";

            echo "<li><a style='background-color:magenta'>Howdy, $username</a></li>";
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



<div class="rows" >
  <div class="col-md-2" >
    <div class="sidenav">
  <button style="border:none; background-color: #111;" id="att1"><a >How to Start</a> </button>
  <button style="border:none; background-color: #111;" id="att2"><a >FAQ's</a></button>
  <button style="border:none; background-color: #111;" id="att3"><a >Customer cell</a></button>
  <button style="border:none; background-color: #111;" id="att4"><a >feedback</a></button>
     </div>
  </div> 
  <div class="col-md-10" >
     

      <div  style=" border-top-left-radius: 10px; border-bottom-right-radius: 8px; margin-left: 20px; border-color: #4a148c; border : 5px solid white; margin-right: 20px; margin-bottom: 16px;" id="msg1">
            <div class="headqts" style="margin-left: 30px;"> <p class="qts" style="font-family: 'Do Hyeon', sans-serif; color : #FF0000 ; font-size: 25px; " > How to get started? </p></div>
            <div class="headans" style="margin-left: 45px;"> <p class="ans" style="font-family: 'EB Garamond', serif; font-size: 20px; color: #FF8000;overflow-x : ellipsis "> Sign-in -> create event -> publish with location -> submit and you're done! </p></div> 
      </div>  
      
      <div  style=" border-top-left-radius: 10px; border-bottom-right-radius: 8px; margin-left: 20px; border-color: #4a148c; border : 5px solid white; margin-right: 20px; margin-bottom: 16px;" id="msg2">
            <div class="headqts" style="margin-left: 30px;"> <p class="qts" style="font-family: 'Do Hyeon', sans-serif; color : #FF0000 ; font-size: 25px;"> Issues related to sign-in </p></div>
            <div class="headans" style="margin-left: 45px;" > <p class="ans" style="font-family: 'EB Garamond', serif; font-size: 20px; color: #FF8000 ;overflow-x : ellipsis" > Drop email to our customer care at 'care@join2event.com </p></div> 
      </div>  
    
      <div  style=" border-top-left-radius: 10px; border-bottom-right-radius: 8px; margin-left: 20px;  border-color: #4a148c; border : 5px solid white; margin-right: 20px; margin-bottom: 16px;" id="msg2">
            <div class="headqts" style="margin-left: 30px;"> <p class="qts" style="font-family: 'Do Hyeon', sans-serif; color : #FF0000 ; font-size: 25px;"> How to create an event? </p></div>
            <div class="headans" style="margin-left: 45px;" > <p class="ans" style="font-family: 'EB Garamond', serif; font-size: 20px; color: #FF8000 ;overflow-x : ellipsis" > Initailly sign-in -> create event -> fill event details -> add geotags with description -> publish  </p></div> 
      </div>  
  
     <div  style=" border-top-left-radius: 10px; border-bottom-right-radius: 8px; margin-left: 20px;  border-color: #4a148c; border : 5px solid white; margin-right: 20px; margin-bottom: 16px;" id="msg2">
            <div class="headqts" style="margin-left: 30px;"> <p class="qts" style="font-family: 'Do Hyeon', sans-serif; color : #FF0000 ; font-size: 25px;"> How to Join an Event?</p></div>
            <div class="headans" style="margin-left: 45px;" > <p class="ans" style="font-family: 'EB Garamond', serif; font-size: 20px; color: #FF8000 ;overflow-x : ellipsis" > Sign-in -> Check events list -> click on the event you're interested -> click join event on the top-right corner of the event name </p></div> 
      </div>  
  

   


  </div>
</div>





</header>


</body>

</html>
