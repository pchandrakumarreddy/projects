<?php
        include('include/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>chat</title>
    <link rel="icon" href="img/favicon.png"  type="image/png">
    <link rel="stylesheet" type="text/css" href="styles/main.css">
    <script>
            function ajax(){
                var xml=new XMLHttpRequest();
                xml.open("GET",'chat.php',true);
                xml.onreadystatechange=function(){
                    if(xml.readyState==4 && xml.status==200){
                        var result=xml.responseText;
                        document.getElementById("demo").innerHTML=result;
                    }
                }
                xml.send();
            }
            setInterval(function(){ajax()}, 1000);
    </script>
</head>
<body onload="ajax()">
    <div class="container">
        <div id="demo"></div>
    <form action="index.php" method="post">
        <label for="username">User name
        <input type="text" name="username" id="username"></label><br><br>
        <label for="content">message&nbsp;&nbsp;&nbsp;
        <textarea name="content" id="content" ></textarea></label><br>
        <button type="submit" name="submit">send</button>
    </form>
    </div>
    <?php
    if(isset($_POST['submit'])){
      $name=$_POST['username'];
      $content=$_POST['content'];
      $query="INSERT INTO chat(name,content) values('$name','$content')";
     if($result=mysqli_query($conn,$query)){
       // echo "<script>alert('inserted');</script>";
    }else{
        echo "<script>alert('error');</script>";
    }
    }
    ?>
</body>
</html>
