<?php
   $conn=mysqli_connect("localhost","root","pwdpwd","tim_users") or die(mysqli_error());
   $result = mysqli_query($conn,"SELECT * FROM `markers`");
 
 
		 $sql="DELETE FROM markers WHERE id='$id'";
    if(mysqli_query($conn, $sql)){
		echo "Records were deleted successfully.";
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

?>