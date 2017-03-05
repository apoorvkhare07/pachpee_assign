<!DOCTYPE html>
<html>
<head>
<title>SignUp</title>
<script>
function validateForm2() {
  var x = document.forms["myform"]["Name"].value;
  if (x == "") {
    alert("Name must be filled out");
  }
  else { 
    len=x.length
      for(var i=0;i<len;i++){
        code = x.charCodeAt(i);
        if ( !(code > 64 && code < 91) && 
            !(code > 96 && code < 123)) { 
          alert("Only Alphabets allowed in Name field")
            break;  
        } 
      }
  }
  return;
}

function validateForm4(){
  var y = document.forms["myform"]["number"].value;
  var reg=/^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$/;
  if(!y.match(reg))
  {
    alert("Enter a Valid Phone Number")
  }
  return;
}
function validateForm(){
  var z=document.forms["myform"]["Email"].value;
  if(z=="")
  {
    alert(" Email field cant be left empty")
  }
  else{
    var reg2=/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/
      if(!z.match(reg2))
      {
        alert("Enter a valid Email id")
      } 

  } 
  return;}
  function validateForm5(){
    var at=document.forms["myform"]["City"].value;
    if(at=="")
    {
      alert(" City field cant be left empty")
    } 
    len1=at.length
      for(var i=0;i<len1;i++){
        code1 = at.charCodeAt(i); 
        if ( !(code1 > 64 && code1 < 91) && 
            !(code1 > 96 && code1 < 123))
        { alert("Enter a valid City") 
          break;
        }
      }
    return;
  }
function validateForm3(){
  var p1=document.forms["myform"]["Password"].value;
  var p2=document.forms["myform"]["confirm Password"].value;
  if(p1 == "" || p2 == "")
  { 
    alert("password fields can not be left empty" )
  } 
  else if ( p1!=p2 )
  {

    alert("password and confirm password doesn't match")
  }
}</script>
</head>
<body style="position: absolute; width: 100%;color: white;display: block; text-align:center;" onsubmit="validateForm6()">
<div id="topnav">

<ul><li> <a href="#">Login</a></li>
</ul>
</div>
<div id="Center">
<h1>Signup</h1> 
<div id="centerele" > 
<form name="myform"  method="post" >
<input type="Email" name="Email" id="a1" onchange="validateForm()" placeholder="Email" style="margin:10px;">
<br> 
<input type="text" name="Name" id="a2" onchange="validateForm2()" placeholder="Name"style="margin:10px;">
<br>
<input type="Password" name="Password" id="a3" placeholder="Password"style="margin:10px;">
<br>
<input type="Password" name="confirm Password" id="a4" onchange="validateForm3()" placeholder="confirm Password" style="margin:10px;">
<br>
<input type="number" name="number" id="a5" onchange="validateForm4()" placeholder="Number" style="margin:10px;">
<br>
<input type="text" name="City" id="a6" onchange="validateForm5()" placeholder="City" style="margin:10px;">
</div>
<br>
<div id="d">
<p style="color:black;">Educational Qualification <select name="dropdown" value="dropdown" id="dd" >
<option value="select" selected="True" disabled="disabled" >select</option>
<option>Undergraduate</option>
<option>Graduate</option>
<option>Postgraduate</option>
<option>PhD</option>
</select>
</p>
<br>
<p style="color:black;">Gender
<select name="dropdown2" value="dropdown2" id="dd2" >
</p>
<option value="select" selected="True" disabled="disabled">select</option>
<option> Male</option>
<option> Female</option>
</select>
</div>
<br>
<input type="reset" name="reset" value="Reset">
<input value="Submit" type="submit" name="reset">
</div>

</form>

</body>
<?php
function signin(){                                                    
  $conn = new mysqli('192.168.121.187', 'first_year', 'first_year', 'first_year_db');
  if ($conn->connect_error) {                                  
    die("Connection failed: " . $conn->connect_error);    
  }

  $sql = "SELECT username,password FROM mydb WHERE username = " . $_POST ['email'];                                                           
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {                                     
    while($row = $result->fetch_assoc()) {                     
      if($row["password"]!=$_POST ['password'])          
      {
        echo '<script>alert("Wrong email or password")</script>';} 
    }            
  }             
}                                                                
if ($_SERVER["REQUEST_METHOD"] == "POST") {                         
  echo'chakbodi';                                                   
  if (empty($_POST["email"])) {                                     
    $nameErr = "Email is required"; 
  }
  else {
    $email = $_POST["email"];
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      echo'<script>alert("Invalid email")</script> ';
    }

  }
  signin();
}

?>

</html>


