
<html>
<body>
<?php
 $username = $_POST['username'];
 $password = $_POST['password'];
  $good_to_go = 0;
  


 $con =  mysqli_connect("localhost","root","pwdpwd","tim_users");
 $result = mysqli_query($con,"SELECT * FROM `users`");

 
while($row = mysqli_fetch_array($result)){
	if($username == $row['username']){
		  if($password == $row['password']){
			 $good_to_go = 1;
		  }
	   	
	}	
	
}

if($good_to_go == 1){
	header("refresh:1;url = ../html/map.html");
}else{
	echo 'Invalid username or password!Please try again!';
	header("refresh:3;url = ../html/login.html");

}


?>

</body>
</html>