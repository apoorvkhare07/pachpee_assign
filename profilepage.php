<!DOCTYPE>
<html>
<head>
<title>
Profile
</title>
</head>
<body>
<h3> Profile Page </h3>
<form name="profileform" method="post" enctype="multipart/form-data">
Fullname :  
<input type="text" name="fullname" id="fullname">
<br><br>
Branch :  
<input type="text" name="branch" id="branch">
<br><br>
Interests :  
<input type="text" name="interest" id="interest">
<br><br>
<input type="file" name="image" id="image">
<br><br>
<input type="file" name="cover" id="cover">
<input type="submit" value="Submit">
</form>
</body>

<?php
$conn=new mysqli('192.168.121.187', 'first_year', 'first_year','first_year_db');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"]=="POST"){
$target_dir="uploads/";
$target_file=$target_dir . basename($_FILES["image"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
echo 'upload successfull';
}
else{
echo "upload unsuccessfull";
}
$fullname=$_POST['fullname'];
$branch=$_POST['branch'];
$image=basename($_FILES["image"]["name"]);
$cover=basename($_FILES["cover"]["name"]);
$sql="INSERT INTO apoorv_profile VALUES ('$fullname','$branch','$image','$cover')";

if($conn->query($sql) == TRUE){
  echo 'successfully updated db ';
}
else{
  echo 'NHP';
}
}

?>
</html>
