<!DOCTYPE html>
<html>
<head>
    
   
</head>
<body>
    
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="signup_process.php" method="POST">
           
                <label>Username</label>
                <input type="text" name="username_reg" >
             
            
            
                <label>Password</label>
                <input type="password" name="password_reg">
                
           
            
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" >
               
            
          
                <input type="submit"  value="Submit">
                <input type="reset"  value="Reset">
            
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    
</body>
</html>