<?php
   include("configuration.php");
 
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $username = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM admin WHERE username = '$username' and passcode = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
		
      if($count == 1) {
         session_register("username");
         $_SESSION['login_user'] = $username;
         
         header("location: openpage.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html> 
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border:  5px #32233; " align = "left">
            <div style = "background-color:#000000; color:#EEEEEE; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:50px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/>
                  <br />
                  <br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" />
                  <br/>
                  <br />
                  <input type = "submit" value = " Submit "/><br />
            </form>
               
               <div style = "font-size:10px; margin-top:10px"><?php echo $error; ?></div>
	
            </div>
				
         </div>
			
      </div>

   </body>
</html>