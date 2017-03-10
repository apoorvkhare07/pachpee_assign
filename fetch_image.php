<?php
header("content-type:image/jpeg");
$conn=new mysqli('192.168.121.187','first_year','first_year','first_year_db');
if($conn->connect_error) {
  die("Connection failed: " .$conn->connect_error);
$name=$_GET['name'];
$select_image="select * from apoorv_profile where name='$name'";

$var=mysql_query($select_image);

if($row=mysql_fetch_array($var))
{
   $image_name=$row["imagename"];
    $image_content=$row["imagecontent"];
}
echo $image;
?>
}
