<?php
        include('include/db.php');
     $query="SELECT * FROM chat order by id asc";
     if($result=mysqli_query($conn,$query)){
        while($row=mysqli_fetch_array($result,MYSQLI_BOTH)){
                echo  "<div class='comment'><span class='name'>".$row['name']." :</span><span class='content'>".$row['content']."</span><span class='time'>".$row['time'].'</span></div>';
            }
    }else{
        die("query failed".mysqli_error());
    }
    ?>