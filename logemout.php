<html>
<head>

<?php
  if(isset($_COOKIE["emp"]) || isset($_SESSION["emailemp"]))
  {
session_start();
unset($_SESSION["emailemp"]);  
if(isset($_COOKIE["emp"]))
{setcookie("emp","", time() - 3600);}
session_destroy();
echo '<script>window.location.href="log.php";</script>';
  }
?>
</head>
<body>
</body>
</html>