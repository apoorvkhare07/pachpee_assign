<?php
session_start();
?>
<!DOCTYPE>
<html>
<head>
<title> Common Feed </title>
</head>
<body>
<h1> NEW FEED </h1>
<form name="feed_form" method="post">
User : <?php echo $_SESSION["user"]; ?>
<br>
time : <?php echo date("h:i:sa"); ?>
<p> Your Post Here : </p> 
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
$n_user=$_SESSION["user"];
$n_feed=$_POST['feed'];
$n_time=date("h:i:sa");
$sql = "INSERT INTO apoorv_feeds (user,dt,feed) VALUES ('$n_user','$n_time','$n_feed')";
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
   echo "user : " . $row["user"]. '<br>'." time : " . $row["dt"]. '<br>' . $row["feed"]. "<br>";
         }
 } else {
      echo "0 results";
 } 

?>
</body>
</html>

