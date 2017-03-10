<?php
session_start();
$conn = new mysqli('192.168.121.187', 'first_year', 'first_year','first_year_db');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);   
}
$GLOBALS["user"]=$_SESSION["user"];
$sql="SELECT * FROM info WHERE email='$user'";
$result = $conn->query($sql);
if($result->num_rows > 0){
while($row = $result->fetch_assoc()) { 
$GLOBALS['nam']=$row['name'];
echo '<div style="color:red">'.$nam.'</div>';
$GLOBALS['mob']=$row['mobile'];
$GLOBALS['username']=$row['username'];
}}
?>
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
        if ( (code > 64 && code < 91) && 
            (code > 96 && code < 123)) { 
          alert("Only Alphabets allowed in Name field")
            break;  
        } 
      }
  }
  return;
}

function validateForm4(){
  var y = document.forms["myform"]["Number"].value;
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

    alert("psword and confirm password doesn'ast match")
  }
}

function check_username(str){
alert("check");
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       alert(this.responseText);
    }
  };
  alert(str);
  xmlhttp.open("GET", "ajaxsignup_page.php?q=" + str, true);
  xmlhttp.send();

}


</script>



</head>
<body style="position: absolute; width: 100%;color: white;display: block; text-align:center;">
<div id="topnav">

</ul>
</div>
<div id="Center">
<h1 style="color:black;">Update</h1> 
<div id="centerele" > 
<form name="myform"  method="POST" >
<input type="Email" name="Email" id="username" value="<?php echo $_SESSION["user"]  ?>" onchange="validateForm()"  placeholder="Email" style="margin:10px;">
<br>
<input type="text" name="Name" id="a2" value="<?php echo $nam; ?>" onchange="validateForm2()" placeholder="Name"style="margin:10px;">
<br>
<input type="password" name="password" id="a3"  placeholder="Password" style="margin:10px;">
<br>
<input type="password" name="confirm password" id="a4" onchange="validateform3()" placeholder="Confirm Password" style="margin:10px;">
<br>
<input type="number" name="Number" id="a5" value="<?php echo $mob ?>" onchange="validateForm4()" placeholder="Number" style="margin:10px;">
<br>
<input type="text" name="Username" id="a6" value="<?php echo $username ?>" onchange="check_username(this.value)" placeholder="Username" style="margin:10px;">
</div>
<br>

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
<input value="Submit" type="submit" name="reset">
</div>

</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
$conn = new mysqli('192.168.121.187', 'first_year', 'first_year','first_year_db');
$fuser=$_POST['Username'];
    $fpass=sha1($_POST['Password']);
    $fname=$_POST['Name'];
    $femail=$_POST['Email'];
    $fnum=$_POST['Number'];
    $sql = "UPDATE info SET username='$fuser',password='$fpass',name='$fname',mobile='$fnum',email='$femail' WHERE email='$user'";
    $sql1 ="UPDATE apoorv_profile SET fullname='$femail' WHERE fullname='$nam'";
    
mysqli_query($conn,$sql);
mysqli_query($conn,$sql1);

if ($conn->query($sql) == TRUE) {  
 $_SESSION["user"]=$femail;
  header("Location: http://192.168.121.187:8001/apoorv/updateprofile.php");
}

  }

 




?>
</body>
</html>
