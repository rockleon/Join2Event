<?php
    require('connectdb.php');
    session_start();

    if (!isset($_SESSION['username']))
    {
        header("location:login.php");
    }

if (isset($_REQUEST['name'])){   

    $username = $_SESSION['username'];
    $name = stripslashes($_REQUEST['name']);
    $name = mysqli_real_escape_string($conn,$name);
    $_SESSION['name'] = $name; 
    $venue = stripcslashes($_REQUEST['venue']);
    $venue = mysqli_real_escape_string($conn,$venue);
    $city = stripslashes($_REQUEST['city']);
    $city = mysqli_real_escape_string($conn,$city);
    $description = stripslashes($_REQUEST['description']);
    $description = mysqli_real_escape_string($conn,$description);
    $type = stripslashes($_REQUEST['type']);
    $type = mysqli_real_escape_string($conn,$type);
    $rawdate = stripslashes($_REQUEST['date']);
    $date = date("Y-m-d", strtotime($rawdate));
    $query = "INSERT into event (name, owner, venue, city, description, date,type)
    VALUES ('$name', '$username', '$venue', '$city', '$description', '$date', '$type')";
    $result = mysqli_query($conn,$query);
    
    if($result){
        header("location:index.php");
        }
    }
    else{
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/login-register.css">
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
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/login-register.js"></script>

 
</head>

<body style="background-color: #f2f2f2;">
  <header class="bgImage1">


  <nav class="navbar">
       <div class="container">
      <div class="navbar-header">
            
          <img src="images/logo2.png"/>
          <!-- <a class="navbar-brand"><h2 style="color: #fcf8bf; font-weight: 900;"> Join2Event </h2></a> -->
      </div>
      <ul class="nav navbar-nav navbar-right">
            <li ><a href="index.php">HOME</a></li>
            <li ><a href="event_list.php">VIEW EVENTS</a></li>
            <li ><a class="active" href="create_event.php">CREATE EVENTS</a></li>
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


    <div class="login-page">
    <div class="form">
    <h1 style="color: lavender">Create-Event</h1>
    <form name="c_event" method="post">
    <input type="text" name="name" placeholder="Event Name" style="background-color: white" required/><br>
    <input type="text" name="date" placeholder="date of the event(format: YYYY-MM-DD)" style="background-color: white" required/><br>
    <input type="text" name="venue" placeholder="Venue" style="background-color: white" required/><br>
    <input type="text" name="city" placeholder="City" style="background-color: white" required/><br><br>
    <textarea name="description" placeholder="Description" rows="5" cols="51" required></textarea><br><br>
    <select name="type" style="width: 100%;height:50px" required>
        <option>Select Type of Event</option>
        <option value="1">Birthday</option>
        <option value="2">Wedding/Reception</option>
        <option value="3">Festival</option>
        <option value="4">Get Together</option>
        <option value="5">Exhibition</option>
        <option value="6">Lectures/Seminars</option>
        <option value="7">Shows/Concerts</option>
        <option value="8">Movies</option>
        <option value="9">Sports</option>
        <option value="10">Others</option>
    </select>
    <br><br>
    <button type="submit" name="submit">SUBMIT</button><br>
    </form>
    </div>
    </div>


<hr class="footerline">
<footer>
<div>
    <div class="row">

        </section>

        <section>
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
<?php } ?>