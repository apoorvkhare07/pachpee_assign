<?php
session_start();

?>
<!DOCTYPE>
<html>
<head>
<title> profile </title>
<script>

  </script>
</head>
<body>
<a href="http://192.168.121.187:8001/apoorv/feedpage.php"> Feeds </a>
<a href="http://192.168.121.187:8001/apoorv/signup_pagecopy.php">Update profile</a>
<a href="http://192.168.121.187:8001/apoorv/logout.php">Logout</a>
<?php
$conn = new mysqli('192.168.121.187', 'first_year', 'first_year','first_year_db');
if($conn->connect_error){
  die("Connection failed:". $conn->connect_error);}
  $sessionvar= $_SESSION["user"]; 
  $sql = "SELECT * FROM apoorv_profile JOIN info ON info.email=apoorv_profile.fullname WHERE info.email ='$sessionvar'";  
echo '<h2> Your Profile</h2>';
$result = $conn->query($sql);
if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    echo '<br> <br>';
    echo "Name : " . $row["fullname"]. '<br>'." branch : " . $row["image"]. '<br>' . "profile picutre";
    $url1='/apoorv/uploads/';
    $url=$url1.$row["cover"]; 
  ?>
<br><br><br>
<img src="<?php echo$url;?> " width=200px; height=200px;/>
<?php
  }
  }


else {
  echo "0 results";
}

?>

</body>
</html>
