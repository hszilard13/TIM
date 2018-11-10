<?php

 $username_reg = $_POST['username_reg'];
 $password_reg = $_POST['password_reg'];
 $password_confirm = $_POST['confirm_password'];
 $already_exist = 0;
 $pass_match = 0;
 
  
 $con =  mysqli_connect("localhost","root","pwdpwd","tim_users");
 $result = mysqli_query($con,"SELECT * FROM `users`");
 
 
 while($row = mysqli_fetch_array($result)){
	if($username_reg == $row['username']){
		 $already_exist = 1;
	   	
	}	
	
}

if($already_exist == 1){
	echo 'This username already exist,please try another username!';
	echo "<br>";
	header("refresh:3;url = signup.php");
}
	
if ($password_confirm == $password_reg){
	     $pass_match = 1;
		
		 
}else{
	 echo 'Password problem!Type your password again';
	 echo "<br>";
	 header("refresh:3;url = signup.php");
}

if(($already_exist == 0) && ( $pass_match == 1)){

	$query = "INSERT INTO users(username,password,admin)
	          VALUES('$username_reg','$password_reg','0')";
	mysqli_query($con,$query);
	    $_SESSION['username'] = $username_reg;
		$_SESSION['success'] = "You are now logged in";
		echo"You are now logged in";
		header("refresh:3;url = login.php");
}

?>