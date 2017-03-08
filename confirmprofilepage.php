<!DOCTYPE>
<html>
<head>
<title> profile </title>
</head>
<body>
<?php

$conn = new mysqli('192.168.121.187', 'first_year', 'first_year','first_year_db');
if($conn->connect_error){
  die("Connection failed:". $conn->connect_error);}
 
  $sql = "SELECT * FROM apoorv_profile";
echo '<h2> Your Profile</h2>';
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo '<br> <br>';
    echo "Name : " . $row["fullname"]. '<br>'." branch : " . $row["image"]. '<br>' . "profile picutre";
    $url1='/apoorv/uploads/';
    $url=$url1.$row["branch"]; 
    ?>

<img src="<?php echo$url;?> "/>
<?php
  }
  }


else {
  echo "0 results";
}

?>

</body>
</html>
