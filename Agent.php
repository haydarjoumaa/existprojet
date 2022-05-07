<!DOCTYPE html>
<html>
<head>
<?php
session_start();
if(isset($_SESSION["emailemp"]))
{
	
}
else
{
echo '<script>window.location.href="log.php";</script>';}
?>
	<title>Agent_Page</title>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
}

/* Style the header */
.header {
  background-color: black;
  color: white;
  padding: 5px;
  text-align: center;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;

}

</style>
</head>
<body>



<div class="topnav">
  <a href="homeagent.php" style="margin-right: 10px;margin-left: 35%">My Properties</a>
  <a href="reserveagent.php" style="margin-right: 10px"  >My Deals</a>
  
 


  <a href="log.php" style="float: right;" >Logout</a>
</div>

</body>
</html>