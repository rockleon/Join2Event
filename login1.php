<?php
    require('connectdb.php');
    session_start();

    // if (!isset($_SESSION['user']))
    // {
    //     header("location:login.php");
    // }


    if(isset($_POST['username'])) {
      
        $username = stripcslashes($_POST['username']);
        $username = mysqli_real_escape_string($conn,$username); 

        $password = stripcslashes($_POST['password']);
        $password = mysqli_real_escape_string($conn,$password);
    
        $query = "SELECT * from user where username='$username' AND password='$password'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_array($result);
      
        $count = mysqli_num_rows($result);
        
        if($count == 1) {
            $_SESSION['username'] = $username;
            echo "<div class = 'form'>Logged in!!</div>";
            header("location:index.php");
        }else {
            echo "<div class='form'>Your Login Name or Password is invalid</div>";
        }
   }
   else{
   
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Log-in</title>
</head>
<body>

    <div class="form">
    <h1>Log-in</h1>
    <form name="login" action="" method="POST">
    <input type="text" name="username" placeholder="Username" required/><br>
    <input type="password" name="password" placeholder="Password" required/><br>
    <input type="submit" name="submit" value="Login"/><br>
    </form>
    </div>

<?php } ?>

</body>
</html>

