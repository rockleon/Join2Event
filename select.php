<style>
  .line{
    background-color : white;
  }
</style>

<?php  
 require('connectdb.php'); 
 session_start();

$user=$_SESSION['username'];

 $output = '';
 
 if(isset($_POST["query"])){
  $sear = $_POST["query"];
  
  $sql = "SELECT * FROM event WHERE name LIKE '%$sear%' AND owner!='$user' ORDER BY date";
 }
 
else{
 $sql = "SELECT * FROM event WHERE owner!='$user' ORDER BY date";  
}

 $result = mysqli_query($conn, $sql);

 $rows = mysqli_num_rows($result);

$path="imagepath";

$output .='<div>';

 if($rows > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
            
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

           $output .= '  
                
                <div class="container">
                <div class="col-md-12">
                <hr style="border-color:black">
                </div>
                </div>

                <div class="row">
                <section>
                    <div class="container">
                        <div class="date col-md-1">
                            <span class="month">'.$m.'</span>
                            <hr class="line" style="border-color:black">
                            <span class="day">'.$day.'</span>
                        </div>
                        <div class="col-md-5">
                            <img src="'.$path.'" class="img-responsive" style="height: 100%; width: 100%; object-fit: contain">
                        </div>
                        <div class="subcontent col-md-6">
                            <h1 class="title">'.$row['name'].'</h1>
                            <p class="location">
                            <span style="color:maroon">'.$row['venue'].'</span>
                            <br></p>
                            <p class="definition">
                            '.$row['description'].'
                            </p>
                            <hr class="customline2" style="border-color:black">
                            <a type="button" class="btn btn-default btn-lg btn-primary" href="event_details.php?id='.$row["id"].'">
                            View Details  <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                </section>
            </div> 

            <div class="container">
            <div class="col-md-12">
            <hr style="border-color:black">
            </div>
            </div>

           ';  
      }  
        
 }  
 else  
 {  
      $output .= '';
				  
 }  
 $output .= '</div>';  
 echo $output;  
 ?>