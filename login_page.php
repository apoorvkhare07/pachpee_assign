<!DOCTYPE html>
<html>
  <head>
    <title>
    SignUp
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
      <input  name="signupbutton" value="Signup" type="button"> 
     </div>
    <?php
       session_start();
       if ($_SERVER["REQUEST_METHOD"] == "POST") {
           if (empty($_POST["email"])) {
                 $nameErr = "Email is required";
           }
           else {
                         $email = $_POST["email"];
                         if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                          echo'<script>alert("Invalid email")</script> ';
                         }
           }
       }
     ?>
      </body>
</html>

