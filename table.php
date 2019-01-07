<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<title>Marker table</title>
</head>
<body>
<div>

<?php

function store($name, $lat, $lng, $color, $label)
{
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
}

function del($id)
{
   $conn=mysqli_connect("localhost","root","pwdpwd","tim_users") or die(mysqli_error());
   $result = mysqli_query($conn,"SELECT * FROM `markers`");
 
 
		 $sql="DELETE FROM markers WHERE id='$id'";
    if(mysqli_query($conn, $sql)){
		echo "Records were deleted successfully.";
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}

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
<tr>
	<td><input type="text" name="name"></td>
 	<td><input type="text" name="lat"></td>
 	<td><input type="text" name="lng"></td>
 	<td><input type="text" name="color"></td>
 	<td><input type="text" name="label"></td>
</tr>
</table>
<form>
<button onclick="insert()"> Insert </button>
<button onclick="del()"> Delete </button>
<button > <a href="/map.php"> Go to map!</a> </button>
</div>

<script type = "text/javascript">

function insert()
{
	var name  = document.getElementsByName("name").value;
    var lat   = document.getElementsByName("lat").value;
    var lng   = document.getElementsByName("lng").value;
    var color = document.getElementsByName("color").value;
    var label = document.getElementsByName("label").value;
	
	jQuery.ajax({
    type: "POST",
    url: "table.php",
    data: {functionname: 'store', arguments: [name, lat, lng, color, label]},

    success: function (obj, textstatus) {
                  if( !('error' in obj) ) {
                      yourVariable = obj.result;
                  }
                  else {
                      console.log(obj.error);
                  }
            }
});
}

function del()
{
	jQuery.ajax({
    type: "POST",
    url: 'table.php',
    dataType: 'json',
    data: {functionname: 'del', arguments: [id]},

    success: function (obj, textstatus) {
                  if( !('error' in obj) ) {
                      yourVariable = obj.result;
                  }
                  else {
                      console.log(obj.error);
                  }
            }
});
}

</script>

</body>
</html>