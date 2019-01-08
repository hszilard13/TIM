<?php

$name  = $_POST['name'];
$lat   = $_POST['lat'];
$lng   = $_POST['lng'];
$color = $_POST['color'];
$label = $_POST['label'];

  $conn=mysqli_connect("localhost","root","pwdpwd","tim_users") or die(mysqli_error());
  mysqli_select_db($conn, "markers");
  //Pentru proiect,in loc de exemple o sa fie 5 variable primite de la harta.
  $sql_insert="INSERT INTO markers (name, lat, lng ,color, label) VALUES ($name,$lat,$lng,$color,$label)";
  
  $retval = mysqli_query($conn, $sql_insert);
  if(! $retval )
  {
    die('Could not insert data: ' . mysqli_error());
  }
  echo "Data inserted successfully\n";
  
  $result = mysqli_query($conn,"SELECT * FROM `markers`");
?>