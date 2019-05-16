<?php
    require('connectdb.php');
    session_start();


    if(isset($_REQUEST['username'])) {
      
        $username = stripcslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($conn,$username); 

        $password = stripcslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn,$password);
    
        $query = "SELECT * from user where username='$username' AND password='$password'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_array($result);
      
        $count = mysqli_num_rows($result);
        
        if($count == 1) {
            $_SESSION['username'] = $username;
            header("location:index.php");
        }else {
            echo "<div class='form'>Your Login Name or Password is invalid</div>";
        }
   }
   else{
   
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/login-register.css">
   
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
            
            <form class="login-form"><h2 style="color: white">Login</h2>
              <input type="text" name="username" placeholder="Username" required />
              <input type="password" name="password" placeholder="Password" required/>
              <button type="submit" name="submit">SUBMIT</button><br>

                <p class="message"><span style="color: white">Not registered?</span>
                    <a href="signup.php">Create an account</a>
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