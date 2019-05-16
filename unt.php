echo "<h3> Events Nearby You<br>";

    $query = "SELECT city from user where username='$username'";
    $cit = mysqli_query($conn,$query);
    $city = mysqli_fetch_array($cit);
    $c = $city['city'];

    $query = "SELECT * from event where city='$c'";
    $result = mysqli_query($conn,$query);

    if (mysqli_num_rows($result)>0) {
    	while ($row = mysqli_fetch_assoc($result)){
    		echo "<a href='event_details.php?id=".$row['id']."'> ".$row['name']." </a><br>"	;
    	}
    }
    else{
    		echo "No Results!!<br>";
    }

    echo "<h3> Other Events<br>";


    $query = "SELECT * from event where city!='$c'";
    $result = mysqli_query($conn,$query);

    if (mysqli_num_rows($result)>0) {
    	while ($row = mysqli_fetch_assoc($result)){
    		echo "<a href='event_details.php?id=".$row['id']."'> ".$row['name']." </a><br>"	;
    	}
    }
    else{
    		echo "No Results!!<br>";
    }	

?>











                <tr>  
                       
                     <td><a href="event_details.php?id='.$row['id'].'">'.$row["name"].'</td>  
                     <td class="message" data-id2="'.$row["id"].'">'.$row["date"].'</td>  
                       
                </tr> 












    $dat=mysqli_query($conn,"SELECT * FROM e_join WHERE u_name='$username' AND e_name='$ename'");
    $jon=mysqli_fetch_array($dat);

    $count = mysqli_num_rows($jon);
    if($count == 1)
    {
        echo '
                $count = mysqli_num_rows($result);
            '
    }

























            <a type="button" id="join" style="background-color:green; color:white" class="btn btn-default btn-lg" href="">
                            Join  <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                            </a>
                            </p>
                        </div>
                    </div>
                </section>
            </div> 

            <div class="container">
            <div class="col-md-12">
            <hr style="border-color:black">
            </div>
            </div>';