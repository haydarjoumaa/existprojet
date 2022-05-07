<?php 
include "DBfunction.php";

$dbc=connectServer("localhost","root","");
selectDB($dbc,"projet2022");
if(isset($_POST['emailAgent'])){
$emailAgent=$_POST['emailAgent'];
$passAgent=$_POST['passAgent'];
$tel=$_POST['tel'];
$query="insert into employee values('$emailAgent','Agent','$passAgent','$tel')";
@mysqli_query($dbc,$query) or die(mysqli_error($dbc));


header('Location: admin.php');
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	   <style>
	@import "https://use.fontawesome.com/releases/v5.5.0/css/all.css";
body{
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  background: url(projetphp.jpg) no-repeat;
  background-size: cover;
}
.login-box{
  width: 500px;
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
  width: 90%;
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
	<?php include "hearderadmin.php"; ?>
</head>
<body >
	
  <form action="admin.php" method="post" >
<div class="login-box">
  <h1>ADD Agent</h1>
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text" name="emailAgent" required="required" placeholder="Enter username">
  </div>

  <div class="textbox">
    <i class="fas fa-phone"></i>
    <input type="text" name="tel" required="required" pattern="[1-9,+]{1,10}" placeholder="Enter Telephone">
  
  </div>
  <div class="textbox">
    <i class="fas fa-lock"></i>
  <input type="Password" name="passAgent" required="required" placeholder="Enter Password">
  
  </div>
 
  <input type="submit" class="btn" value="Submit">
</div>
</form>
</body>
</html>