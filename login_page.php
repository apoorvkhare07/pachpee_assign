<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>
Login
</title>
<link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css" integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="login_page_css">
<script type="text/javascript" src=""></script>
</head>
<body>
<h2> Login </h2>
<br>
<div id="center">
<form name="myform" method="post">
<input id="email" name="email" onchange="" placeholder="Email" type="email">
<br>
<input id="password" name="password" onchange="" placeholder="Password" type="password">
<br>
<input id="rememberme" type="checkbox" value="Remember me"name="remember me ">
Remember me <br>
<input  name="loginbutton" value="Login" type="submit">
</form> 
<a href="http://192.168.121.187:8001/apoorv/signup_page.php">Sign Up</a>
</div>
<?php 
echo '<div style="color:green;">hulululu</div>';   
function signin(){
  $conn = new mysqli('192.168.121.187', 'first_year', 'first_year', 'first_year_db');
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo '<div style="color:green;">hululu</div>'; 
  $mail=$_POST['email'];
  $_SESSION["user"]=$mail; 
  $config_username = $mail;
   $config_password = $_POST["password"];
 $rememberme=$_POST["rememberme"];
    $sql = "SELECT password FROM info WHERE email = '$mail'";
  $result = $conn->query($sql);
  $suser=$_SESSION["user"];
echo '<div style="color:green;">hululu</div>';
if($rememberme==true){

$cookie_name="randomkey";
          $cookie_value="key";
                    setcookie($cookie_name,$cookie_value, time()+(86400*10),"/");
                            } 

}

if($result->num_rows > 0) {
    echo"adsadasd";
    while($row = $result->fetch_assoc()) {
      if($row["password"]===sha1($_POST['password'])) 
      {
       echo 'asdasd';
         echo '<script>alert("Login successfull")</script>';
        

      header('Location: http://192.168.121.187:8001/apoorv/confirmprofilepage.php');
      
      }}
    } } 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  echo '<div style="color:green;">hululu</div>'; 
  if (empty($_POST["email"])) {
    $nameErr = "Email is required";
  }
  else {
    $email = $_POST["email"];
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      echo'<script>alert("Invalid email")</script> ';
    }      else{
      echo '<div style="color:red;">hulul</div>';  
      signin(); 

    }
     
  }
}

?>
</body>
</html>

