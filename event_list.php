
<?php
    require('connectdb.php');
    session_start();
 
 	if (!isset($_SESSION['username']))
    {
        header("location:login.php");
    }

    $username = $_SESSION['username'];

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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Montez" rel="stylesheet"> 
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
    <div>
    <br>
    <div class="container">
    <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-1">
    <form class="form-inline">
      <input class="form-control mr-sm-2" style="color: orange" type="text" placeholder="Search" aria-label="Search" name="search_text" id="search_text" />
    </form><br>
  </div>
  </div>
  </div>
    <div class="container">
        <div id="live_data"></div>
    </div>
    </div>

		

<hr class="footerline">
<footer>
<div class="container">
    <div class="row">
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

    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


</body>

</html>

<script>  
$(document).ready(function(){  

    load_data();

 function load_data(query)
 {
  $.ajax({
   url:"select.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#live_data').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
   
    
  $(document).on('click', '.btn_delete', function(){  
        var id=$(this).data("id9");  
        if(confirm("Are you sure you want to delete this?"))  
        {  
            $.ajax({  
                url:"delete.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"text",  
                success:function(data){  
                    alert(data);
                    location.reload();  
                }  
            });  
        }  
    });  
});  
</script>
