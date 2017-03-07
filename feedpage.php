<!DOCTYPE>
<html>
<head>
<title> Common Feed </title>
</head>
<body>
<h1> NEW FEED </h1>
<form name="feed_form" method="post">
USER : <input type="text" id="user" name="user">
<br><br>
TIME : <input type="text" id="time" name="time">
<br><p> Your Post Here : </p> 
<textarea rows="20" cols="100" name="feed" id="feed">
</textarea>
<br><br>
<input type="submit" value="Post feed">
</form>
<?php

 $conn = new mysqli('192.168.121.187', 'first_year', 'first_year','first_year_db');
 if($conn->connect_error){
 die("Connection failed:". $conn->connect_error);}  
if ($_SERVER["REQUEST_METHOD"] =="POST")
    { 
$n_user=$_POST['user'];
$n_time=$_POST['time'];                                        
$n_feed=$_POST['feed'];
$sql = "INSERT INTO apoorv_feeds (user,time,feed) VALUES ('$n_user','$n_time','$n_feed')";
if ($conn->query($sql) == TRUE) {                                     
  echo '<div style="color:green;"> Successfull</div>';           
} else {                                                                 
  echo '<div style="color:green;"> UnSuccessfull</div>';           
}
}
 $sql = "SELECT * FROM apoorv_feeds";
 echo '<h2> Common Feeds</h2>';
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
   echo '<br> <br>';
   echo "user : " . $row["user"]. '<br>'." time : " . $row["time"]. '<br>' . $row["feed"]. "<br>";
         }
 } else {
      echo "0 results";
 } 
                                              

?>
</body>
</html>

