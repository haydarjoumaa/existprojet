<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8">
    <title></title>
  
    
	  <?php
  include "DBfunction.php";
  if(isset($_POST['logemail']))
{
	$dbc=connectServer("localhost","root","");
selectDB($dbc,"projetphp");
	$t=$_POST['logemail'];
	$query="SELECT * FROM employee WHERE email='$t'";
	$x =@mysqli_query($dbc,$query);
	$row = @mysqli_fetch_array ($x);
	
	 if(is_null($row))
	 {
		 echo '<script>alert("Incorect email");</script>';
	 }
	 else{
		
      if($row[2]==$_POST['pass'])
	  {
		  session_start();
  $_SESSION['emailemp'] = $_POST["logemail"];
 
		  
		  echo '<script>window.location.href="homeagent.php";</script>';
	  }
	  else
		  echo '<script>alert("Incorect pass");</script>';
	 }
}
?>
    <style>
	@import "https://use.fontawesome.com/releases/v5.5.0/css/all.css";
body{
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  background: url(bg.jpg) no-repeat;
  background-size: cover;
}
.login-box{
  width: 280px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  color: white;
}
.login-box h1{
  float: left;
  font-size: 40px;
  border-bottom: 6px solid #4caf50;
  margin-bottom: 50px;
  padding: 13px 0;
}
.textbox{
  width: 100%;
  overflow: hidden;
  font-size: 20px;
  padding: 8px 0;
  margin: 8px 0;
  border-bottom: 1px solid #4caf50;
}
.textbox i{
  width: 26px;
  float: left;
  text-align: center;
}
.textbox input{
  border: none;
  outline: none;
  background: none;
  color: white;
  font-size: 18px;
  width: 80%;
  float: left;
  margin: 0 10px;
}
.btn{
  width: 100%;
  background: none;
  border: 2px solid #4caf50;
  color: white;
  padding: 5px;
  font-size: 18px;
  cursor: pointer;
  margin: 12px 0;
}
	</style>
  </head>
  <body>
  <form action="log.php" method="post">
<div class="login-box">
  <h1>Login</h1>
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text" placeholder="Username" name="logemail" required>
  </div>

  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" placeholder="Password" name="pass" required>
  
  </div>
 
  <input type="submit" class="btn" value="Sign in">
</div>
</form>
  </body>
  
</html>