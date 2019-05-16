<?php
    require('connectdb.php');
    session_start();

if (isset($_REQUEST['username'])){    
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($conn,$username);
    $_SESSION['username'] = $username; 
    $fname = stripcslashes($_REQUEST['fname']);
    $fname = mysqli_real_escape_string($conn,$fname);
    $lname = stripslashes($_REQUEST['lname']);
    $lname = mysqli_real_escape_string($conn,$lname);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($conn,$email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn,$password);
    $address = stripslashes($_REQUEST['address']);
    $address = mysqli_real_escape_string($conn,$address);
    $city = stripslashes($_REQUEST['city']);
    $city = mysqli_real_escape_string($conn,$city);
    $phone = stripslashes($_REQUEST['phone']);
    $phone = mysqli_real_escape_string($conn,$phone);
    $query = "INSERT into user (fname, lname, email, username, password, address, city, phone)
    VALUES ('$fname', '$lname', '$email', '$username', '$password', '$address', '$city', '$phone')";
    $result = mysqli_query($conn,$query);
    
    if($result){
        echo "<div class='form'>
        <h3>Event registered successfully.</h3></div>";
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
    <link rel="stylesheet" type="text/css" href="css/login-register.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">  
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css.map">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css.map">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <!--<link href="https://fonts.googleapis.com/css?family=Montez" rel="stylesheet"> -->
    <script src="js/jquery-1.12.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 
</head>

<body style="background-color: #f2f2f2;">

<header class="bgImage1" >


  <nav class="navbar">
       <div class="container">
      <div class="navbar-header">
            
          <img src="images/logo2.png"/>
          <!-- <a class="navbar-brand"><h2 style="color: #fcf8bf; font-weight: 900;"> Join2Event </h2></a> -->
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

    <div class="login-page">
        <div class="form">
            <form><h2>Register</h2>
              <input type="text" name="fname" placeholder="First Name" required/><br>
              <input type="text" name="lname" placeholder="Last Name" required/><br>
              <input type="email" name="email" placeholder="Email ID" required />
              <input type="text" name="username" placeholder="Username" required/><br>
              <input type="password" name="password" placeholder="Password" required />
              <input type="text" name="address" placeholder="Address" required />
              <input type="text" name="city" placeholder="City eg. Mumbai" required />  
              <input type="number" name="phone" placeholder="Contact no." required> 
              <button type="submit" name="submit">SUBMIT</button><br>
                <p class="message" style="color: white">Already registered?
                    <a href='login.php'>Login</a>
                </p>
            </form>
           </p>
            </form>
        </div>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/login-register.js"></script>

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