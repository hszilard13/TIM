
<html>
<body>
<?php
 
  
 $username = $_POST['username'];
 $password = $_POST['password'];
 $good_to_go = 0;
 $admin = 0;


 $con =  mysqli_connect("localhost","root","pwdpwd","tim_users");
 $result = mysqli_query($con,"SELECT * FROM `users` WHERE username = '$username' AND password = '$password' ");

 
while($row = mysqli_fetch_array($result)){
	if($username == $row['username']){
		  if($password == $row['password']){
			 $good_to_go = 1;
			 $admin = $row['admin'];
		  }
	   	
	}	
//echo $row['username'].'   '.$row['password'].'  '.$row['admin'];
}

session_start();
 $_SESSION['admin'] = $admin;	
 $_SESSION['good_to_go'] = $good_to_go;

if($good_to_go == 1){
    header("refresh:1;url = ../table.php");
}else{
	echo 'Invalid username or password!Please try again!';
	header("refresh:2;url = ../index.php");

}



?>

</body>
</html>