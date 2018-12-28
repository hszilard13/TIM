<?php

$conn=mysqli_connect("localhost","root","pwdpwd","tim_users") or die(mysqli_error());
$result = mysqli_query($conn,"SELECT * FROM `markers`");

$markerArray = array();

 while($row = mysqli_fetch_array($result)){
 //Pentru proiect,in loc de echo o sa fie 5 variabile(sau un array) care o sa stocheze si o sa trimita mai departe catre harta
 //pentru a afisa marker-ul.
 echo $row['name'].' '.$row['lat'].' '.$row['lng'].' '.$row['color'].' '.$row['label'].'<br>';
 
 //Stocare markere in array pt parsare in harta
 $markerArray[] = $row; 
}

//Transmiterea datelor de la o pagina la cealalta prin sesiune
session_start();
$_SESSION['markerArray'] = $markerArray;

?>