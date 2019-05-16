<?php
    require('connectdb.php');
    session_start();

    // if (!isset($_SESSION['user']))
    // {
    //     header("location:login.php");
    // }

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
<html>
<head>
    <title>Sign-Up</title>
</head>
<body>

    <div class="form">
    <h1>Sign-Up</h1>
    <form name="signup" method="post">
    <input type="text" name="fname" placeholder="First Name" required/><br>
    <input type="text" name="lname" placeholder="Last Name" required/><br>
    <input type="email" name="email" placeholder="Email ID" required/><br>
    <input type="text" name="username" placeholder="username" required/><br>
    <input type="password" name="password" placeholder="Password" required/><br>
    <input type="text" name="address" placeholder="Address" required/><br>
    <input type="text" name="city" placeholder="City" required/><br>
    <input type="text" name="phone" placeholder="Contact No." required/><br>
    <input type="submit" name="submit" value="Sign-Up"/><br>
    </form>
    </div>

</body>
</html>

<?php } ?>