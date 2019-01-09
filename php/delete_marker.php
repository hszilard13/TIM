<?php
$admin = $_POST['admin'];
$name  = $_POST['name'];
   $conn=mysqli_connect("localhost","root","pwdpwd","tim_users") or die(mysqli_error());
   $result = mysqli_query($conn,"SELECT * FROM `markers`");
 
    if($admin == 1){
		 $sql="DELETE FROM markers WHERE name='$name'";
    if(mysqli_query($conn, $sql)){
		echo "Records were deleted successfully.";
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}else{
		echo "The command is not allowed.You don't have admin account");
	}
}

?>