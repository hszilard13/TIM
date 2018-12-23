<?php

$conn=mysqli_connect("localhost","root","pwdpwd","tim_users") or die(mysqli_error());
mysqli_select_db($conn, "markers");
//Pentru proiect,in loc de exemple o sa fie 5 variable primite de la harta.
$sql_insert="INSERT INTO markers (name, lat, lng ,color, label) VALUES ('Wien', '20.15', '28.22', 'red', 'Aceasta este o descriere')";

$retval = mysqli_query($conn, $sql_insert);
if(! $retval )
{
  die('Could not insert data: ' . mysqli_error());
}
echo "Data inserted successfully\n";

?>