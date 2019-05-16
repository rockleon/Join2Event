
<?php
    require('connectdb.php');
    session_start();

?>


<!DOCTYPE html>
<html>
<head>
<style type="text/css">
    img{
      object-fit: scale-down;
      background-repeat: no-repeat;
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

<body style="background-color: #dce6f7;">

<header class="bgImage1">
  <nav class="navbar">
       <div class="container">
      <div class="navbar-header">
            
          <!-- <a class="navbar-brand"> <h2> Join2Event </h2>  </a> -->
          <img src="images/logo2.png" height:"15" width :"15" />  
      </div>
      <ul class="nav navbar-nav navbar-right">
            <li ><a class="active" href="index.php" >HOME</a></li>
            <li ><a href="event_list.php">VIEW EVENTS</a></li>
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


<div class="container" style=" width: 100%;" >
  <div id="myCarousel" class="carousel slide" data-ride="carousel" >
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li> 
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" style="height: 100%; width: 100%; object-fit: contain">

      <div class="item active" style="height: 450px">
        <img src="1.jpg" alt="Los Angeles" style="height: 100%; width: 100%; object-fit: contain" >
        <div class="carousel-caption">
          <h3>Festivals</h3>
          <p>Invite others for celebrating festivals together</p>
        </div>
      </div>

      <div class="item" style="height: 450px">
        <img src="2.jpg" alt="Chicago" style="height: 100%; width: 100%; object-fit: contain">
        <div class="carousel-caption">
          <h3>Concerts</h3>
          <p>Get company for going to concerts</p>
        </div>
      </div>
    
      <div class="item" style="height: 450px">
        <img src="3.jpg" alt="New York" style="height: 100%; width: 100%; object-fit: contain">
        <div class="carousel-caption">
          <h3>Parties</h3>
          <p>Join people for parties</p>
        </div>
      </div>

      <div class="item" style="height: 450px">
        <img src="5.jpg" alt="Los Angeles" style="height: 100%; width: 100%; object-fit: contain">
        <div class="carousel-caption">
          <h3>Random Meetups</h3>
          <p>Make new friends</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


<div class="container">
    <h1 style="text-align: center; color:black; margin-top: 50px; font-family: 'Berkshire Swash', cursive;font-weight: 20px;">A place where gathering people for any event is just like a cup of tea.</h1>
    
    <h1 style="text-align: center; color:black; font-family: 'Berkshire Swash', cursive; font-weight: 20px;">Short on participants for group events? Come join us to group up old friends or make new acquintances for a party, post-work gathering, function, sports, exhibitions, competitions or any other public events.</h1>
</div>


<hr class="footerline">
<footer>
<div class="container">
    <div class="row">

        </section>

        <section>
            <div class="footcontent col-md-4">
               <!--  right content -->
                Follow Us:
                <br>
                <img src="images/facebook.png">
                <img src="images/twitter.png">
                <img src="images/googleplus.png">
                <img src="images/youtube.png">
            </div>
            <div class="footcontent col-md-3">
              <br><br>
              <p style="margin-right: 20px;"> &copy; Copyright 2017 </p>
            </div>
            <div class="footcontent col-md-5">
              <h2>Made by Department of</h2>
              <h2>COMPUTER SCIENCE</h2>
            </div>
        </section>
    </div>
</div>
</footer>
 




</body>

</html>
