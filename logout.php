<html>
<head>
<?php
session_start();
if(isset($_SESSION["email"]))
{unset($_SESSION["email"]); 
session_destroy();
echo "hi";
 }
if(isset($_COOKIE["user7"]))
{
	 unset($_COOKIE['user7']);
	 setcookie('user7','',time()-(3600*30));

	
	
}
echo '<script>window.location.href="home.php";</script>';
session_destroy();


?>

</head>
<body>


</body>
</html>