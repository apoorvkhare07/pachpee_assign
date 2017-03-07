<?php include 'signup_page.php';?>
<?php
echo'<script>alert("in ajax file")</script>';
echo $_GET['q'];

$q=$_REQUEST["q"];  
$conn = new mysqli('192.168.121.187', 'first_year', 'first_year','first_year_db');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql="SELECT username FROM info WHERE username = '$q'";
$result= $conn->query($sql);
if($result->num_rows > 0 ){
  echo'<script>alert("username not available")';
}
?>  

