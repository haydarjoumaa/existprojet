<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
  <head>
  <?php
  include "DBfunction.php";
  if(isset($_POST['email']))
{
	$x=$_POST['email'];
	$y=$_POST['password'];
	$z=$_POST['phone'];
	$dbc=connectServer("localhost","root","");
selectDB($dbc,"projetphp");

$query="INSERT INTO client(email,password,telephone,enabled) values('$x','$y','$z',true)";

@mysqli_query($dbc,$query) or die('<script>alert("Email already exists ");</script>') ;
	
	
	
}
if(isset($_POST['logemail']))
{
	$dbc=connectServer("localhost","root","");
selectDB($dbc,"projetphp");
	$t=$_POST['logemail'];
	$query="SELECT * FROM client WHERE email='$t'";
	$x =@mysqli_query($dbc,$query);
	$row = @mysqli_fetch_array ($x);
	
	 if(is_null($row))
	 {
		 echo '<script>alert("Incorect email");</script>';
	 }
	 else{
		
      if($row[1]==$_POST['pass'])
	  {
		  session_start();
  $_SESSION['email'] = $_POST["logemail"];
 
		  if(isset($_POST["check"]) && $_POST["check"]==true)
		  { setcookie("user7",$_POST['logemail'],time()+3600*30); }
		  echo '<script>window.location.href="home.php";</script>';
	  }
	  else
		  echo '<script>alert("Incorect pass");</script>';
	 }
}
?>
    <meta charset="utf-8">
    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <!-- <title>Login & Signup Form </title> -->
    <link rel="stylesheet" href="style1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div class="wrapper">
      <div class="title-text">
        <div class="title login">
Login Form</div>
<div class="title signup">
Signup Form</div>
</div>
<div class="form-container">
        <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked>
          <input type="radio" name="slide" id="signup">
          <label for="login" class="slide login">Login</label>
          <label for="signup" class="slide signup">Signup</label>
          <div class="slider-tab">
</div>
</div>
<div class="form-inner">
          <form action="login.php" method="post" class="login">
            <div class="field">
              <input type="text" placeholder="Email Address" name="logemail" required>
            </div>
<div class="field">
              <input type="password" placeholder="Password" name="pass" required>
            </div>
<div class="pass-link">
<a href="#">Forgot password?</a></div>
<input type="checkbox" name="check"><label> Remember Me</label>
<div class="field btn">
              <div class="btn-layer">
</div>
<input type="submit" value="Login">
            </div>
<div class="signup-link">
Not a member?<br>Please <a href="">Signup now</a></div>
</form>
<form action="login.php" class="signup" method="post">
            <div class="field">
              <input type="text" placeholder="Email Address" name="email"required>
            </div>
<div class="field">
              <input type="password" placeholder="Password" name="password" id="fname" required>
            </div>
<div class="field">
              <input type="password" placeholder="Confirm password" id="fname1" onfocusout="myFunction()" required>
            </div>
			<div class="field">
              <input type="text" placeholder="Enter your phone number" name="phone" required>
            </div>
			
<div class="field btn">
              <div class="btn-layer">
</div>
<input type="submit" value="Signup">
            </div>
			<script>
function myFunction() {
  var x = document.getElementById("fname").value;
  var y = document.getElementById("fname1").value;
  if(x!=y)
  {
	  alert("wrong confirm password");
	  document.getElementById("fname1").value="";
  }
  
  
  
}
</script>
</form>
</div>
</div>
</div>
<script>
      const loginText = document.querySelector(".title-text .login");
      const loginForm = document.querySelector("form.login");
      const loginBtn = document.querySelector("label.login");
      const signupBtn = document.querySelector("label.signup");
      const signupLink = document.querySelector("form .signup-link a");
      signupBtn.onclick = (()=>{
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
      });
      loginBtn.onclick = (()=>{
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
      });
      signupLink.onclick = (()=>{
        signupBtn.click();
        return false;
      });
    </script>

  </body>
</html>