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
  
  $sql = "SELECT * FROM event WHERE name LIKE '%$sear%' AND owner LIKE '$user' ORDER BY date";
 }
 
else{
 $sql = "SELECT * FROM event WHERE owner LIKE '$user' ORDER BY date";  
}

 $result = mysqli_query($conn, $sql);

 $rows = mysqli_num_rows($result);

$path="imagepath";

$output .='<div>';

 if($rows > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
          
          $tim=$row['date'];  
          $time=strtotime($row['date']);
          $m=date("F",$time);
          $day=date("j",$time);

          $eid=$row['id'];
          $pqr="SELECT * FROM e_join WHERE e_id='$eid'";
          $pa=mysqli_query($conn,$pqr);
          $cnt = mysqli_num_rows($pa);

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
                        <div class="date col-md-2">
                            <span class="month" contenteditable>'.$tim.'</span>
                            <hr class="line" style="border-color:black">
                        </div>
                        
                        <div class="subcontent col-md-5">
                            <h1 class="title" contenteditable>'.$row['name'].'</h1>
                            <p class="location">
                            <span style="color:maroon" contenteditable>'.$row['venue'].'</span>
                            <br></p>
                            <p class="definition" contenteditable>
                            '.$row['description'].'
                            </p>
                            <hr class="customline2" style="border-color:black">
                            <a type="button" class="btn btn-default btn-lg btn-danger" href="delete_event.php?id='.$row["id"].'">Delete Event</a>
                        </div>

                        <br><br>
                        <div class="subcontent col-md-5">
                        <span style="color:black"> Participants = '.$cnt.'</span>';


            while($part = mysqli_fetch_array($pa))
            $output .=  '
                          <p class="location">
                            <span style="color:maroon">'.$part['u_name'].'</span>
                            <br></p>
                        </div>';


            $output .= '
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

 