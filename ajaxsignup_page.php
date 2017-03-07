
<?php

$q=$_GET["q"];  
$conn = new mysqli('192.168.121.187', 'first_year', 'first_year','first_year_db');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql="SELECT username FROM info WHERE username='$q'";
echo"hiii";
$result= $conn->query($sql);
if($result->num_rows > 0 ){
  echo "username not available";
}
else {
echo"in else";
}
?>  

