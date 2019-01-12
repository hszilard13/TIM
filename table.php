<html>
<head>
<link rel="stylesheet" href="../css/table.css">
<title>Marker table</title>
</head>
<body>

<div id ="table">
<?php
$conn=mysqli_connect("localhost","root","pwdpwd","tim_users") or die(mysqli_error());
$result = mysqli_query($conn,"SELECT * FROM `markers`");

$markerArray = array();
 echo "<table><tr><td><p>ID</p></td><td><p>Name</p></td><td><p>Lat</p></td><td><p>Lng</p></td><td><p>Color</p></td><td><p>Label</p></td></tr>";
 while($row = mysqli_fetch_array($result)){
 //Pentru proiect,in loc de echo o sa fie 5 variabile(sau un array) care o sa stocheze si o sa trimita mai departe catre harta
 //pentru a afisa marker-ul.
 echo "<tr>";
 echo "<td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['lat']."</td><td>".$row['lng']."</td><td>".$row['color']."</td><td>".$row['label']."</td>";
 echo "</tr>";
 //Stocare markere in array pt parsare in harta
 $markerArray[] = $row; 
}
echo "</table>";

//Transmiterea datelor de la o pagina la cealalta prin sesiune
session_start();
$_SESSION['markerArray'] = $markerArray;
$isAdmin = $_SESSION['admin'];
$Active = $_SESSION['good_to_go'];
if($Active != 1){
	header("refresh:0;url = ../index.php");
}
$_SESSION['good_to_go'] = 0;
?>
<div id = "su">
<br>
<form action ="php/store_marker.php" method = "POST">
<input type ="text" id = "name" name = "name" placeholder="Name"> 
<input type ="text" id = "lat" name = "lat" placeholder="Lat"> 
<input type ="text" id = "lng" name = "lng" placeholder="Lng"> 
<input type ="text" id = "color" name = "color" placeholder="Color"> 
<input type ="text" id = "label" name = "label" placeholder="Label"> 
<input type = "submit" id = "btn" value ="Store"/>
</form>

<form action ="php/delete_marker.php" method = "POST">
<p> Enter marker ID to delete it!</p>
<input type ="text" id = "del" name = "del" placeholder="ID"> 
<input type = "submit" id = "btn" value ="Delete"/>
</form>
</div>
<button id="myButton" class="float-left submit-button" >Go to map!</button>

<script type="text/javascript">
    var isAdmin = <?php echo json_encode($isAdmin); ?>;
    document.getElementById("myButton").onclick = function () {
        location.href = "/map.php";
    };
	
    var x = document.getElementById("su");
    if (isAdmin === "0") {
      x.style.display = "none";
    } else {
      x.style.display = "block";
    }

</script>
</div>


</body>
</html>