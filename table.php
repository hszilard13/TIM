<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<title>Marker table</title>
</head>
<body>
<div>
<?php
$conn=mysqli_connect("localhost","root","pwdpwd","tim_users") or die(mysqli_error());
$result = mysqli_query($conn,"SELECT * FROM `markers`");

$markerArray = array();
 echo "<table>";
 while($row = mysqli_fetch_array($result)){
 //Pentru proiect,in loc de echo o sa fie 5 variabile(sau un array) care o sa stocheze si o sa trimita mai departe catre harta
 //pentru a afisa marker-ul.
 echo "<tr>";
 echo "<td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['lat']."</td><td>".$row['lng']."</td><td>".$row['color']."</td><td>".$row['label']."</td>";
 echo "</tr>";
 echo "</table>";
 //Stocare markere in array pt parsare in harta
 $markerArray[] = $row; 
}

//Transmiterea datelor de la o pagina la cealalta prin sesiune
session_start();
$_SESSION['markerArray'] = $markerArray;
?>
<br>
<table>
 <tr>
 	<td>name </td>
 	<td>lat  </td>
 	<td>lng  </td>
 	<td>color</td>
 	<td>label</td>
 </tr>
</table>
<form action ="php/store_marker.php" method = "POST">
<input type ="text" id = "name" name = "name"> 
<input type ="text" id = "lat" name = "lat"> 
<input type ="text" id = "lng" name = "lng"> 
<input type ="text" id = "color" name = "color"> 
<input type ="text" id = "label" name = "label"> 
<input type = "submit" id = "btn" value ="Store"/>
</form>
<button onclick="del()"> Delete </button>
<button > <a href="/map.php"> Go to map!</a> </button>
</div>


</body>
</html>