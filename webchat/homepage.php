<?php
session_start();

    if (!isset($_SESSION['username']))
    {
        header("location:login.php");
    }
    $_SESSION['name']=$_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
<title>HOME</title>


<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body style="background-color: #f7eddc">
    
    <h1 style="background-color : red ; color : white;" ><?php echo $_SESSION['name'] ?> -online</h1>
    <div class="output">
        <?php
         include "dbh.php";
         $sql = "SELECT * from posts";
         $result = mysqli_query($con,$sql);
         $num = mysqli_num_rows($result);
           if($num > 0)
           {
              while( $row = mysqli_fetch_assoc($result))
              {
                if($row["e_id"]==$_SESSION['e_id'])
                {
                  echo "".$row["name"]. " " ." --> ".$row['msg']."<br>";
                  echo "<br>";
                }

              }
           }
           else{
                echo "0 entries";
           }
         mysqli_close($con);

        ?>
    </div>
    <form method="post" action="send.php">
   <textarea name="msg" placeholder="Your message here!" class="form-control"></textarea><br>
   <input type="submit" value="send">

   </form>
   <br>


</body>
</html>