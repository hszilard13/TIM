<html>
<head>
<link rel="stylesheet" href="../css/table.css">
<title>Marker table</title>
</head>
<body>
<div>
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
?>
<div id = "su">
<br>
<form action ="php/store_marker.php" method = "POST">
<input type ="text" id = "name" name = "name"> 
<input type ="text" id = "lat" name = "lat"> 
<input type ="text" id = "lng" name = "lng"> 
<input type ="text" id = "color" name = "color"> 
<input type ="text" id = "label" name = "label"> 
<input type = "submit" id = "btn" value ="Store"/>
</form>
<button onclick="del()"> Delete </button>
<button id="myButton" class="float-left submit-button" >Go to map!</button>
</div>
<script type="text/javascript">
    var isAdmin = <?php echo json_encode($isAdmin); ?>;
    document.getElementById("myButton").onclick = function () {
        location.href = "/map.php";
    };
	function myFunction() {
    var x = document.getElementById("myDIV");
    if (admin === "1") {
      x.style.display = "none";
    } else {
      x.style.display = "block";
    }
}
</script>
</div>


</body>
</html>