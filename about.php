<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="style3.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
<?php
include "DBfunction.php";
   $dbc=connectServer("localhost","root","");
selectDB($dbc,"projetphp");

if(isset($_COOKIE["user7"]) || isset($_SESSION["email"]))
	{
		
     if(isset($_SESSION["email"]))
     { 
		 $email=$_SESSION["email"];}
     else if(isset($_COOKIE["user7"]))
		$email=$_COOKIE["user7"];


if(isset($_POST['submit']))
{
	$query = "DELETE FROM imageprop where idprop=".$_GET['id'];
	$query1 = "DELETE FROM propriete where idprop=".$_GET['id'];
	@mysqli_query($dbc,$query);
	@mysqli_query($dbc,$query1);
	
}

	}
	else
{
	echo '<script>window.location.href="login.php";</script>';
}
		


?>
div.gallery {
  border: 1px solid #ccc;
  margin:10px;
  width: 550px;
  height: 550px;
}



div.gallery img {
  width: 550px;
  height: 450px;
 
}

div.desc {
  
  color:red;
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 6px;
  float: left;
  width:500px;
  margin:55px;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 500px;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

input[type=submit] {
  width: 50%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
.button {
  display: inline-block;
  padding: 4px 17px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

</style>
  <?php include "projet.php"; ?>
</head>
<body>
<br>
<center><h1 style="color:blue"> YOUR INFORMATION PROPERTY </h1><br><br></center>
<?php

 if(isset($_SESSION["email"]))
     { 
		 $email=($_SESSION["email"]);}
		 
	 if(isset($_COOKIE["user7"]) || isset($_SESSION["email"]))
	{  
	    
	   $query="select propriete.idprop,im1,propriete.type,propriete.lieu ,propriete.surface ,propriete.price ,propriete.nbrbed ,propriete.nbrbath, propriete.picine ,propriete.jacouzi ,propriete.garage,propriete.gardin from propriete,imageprop where imageprop.idprop=propriete.idprop and  propriete.emailprop='$email' and propriete.disponible=false and propriete.allouer=false  ";
	
	   $x =@mysqli_query($dbc,$query);
	 
		while( $row = @mysqli_fetch_array ($x) ) 
		{
			?><div class="responsive">
  <div class="gallery"><img  src="data:image;charset=utf8;base64,<?php echo base64_encode($row[1]); ?>" width='200' height='200'>
	<div class="desc"><pre><span class="inner-pre" style="font-size: 20px"><b style="color:black">Type:</b><?php echo " ".$row[2]."           ";?><b style="color:black">Location:</b><?php echo "   ".$row[3];?></pre></span></div>
	<div class="desc"><pre><span class="inner-pre" style="font-size: 20px"><b style="color:black">Surface:</b><?php echo " ".$row[4]."(SQFT)      ";?><b style="color:black">Price:</b><?php echo "   ".$row[5]."$";?></pre></span></div>
	<div class="desc"><pre><span class="inner-pre" style="font-size: 20px"><b style="color:black">Nbrbed:</b><?php echo " ".$row[6]."              ";?><b style="color:black">Nbrbath:</b><?php echo "   ".$row[7];?></pre></span></div>
	<div class="desc"><pre><span class="inner-pre" style="font-size: 20px"><b style="color:DodgerBlue"><?php if($row[8]==true)echo "Picine     ";if($row[9]==true)echo "Jacouzi    ";if($row[10]==true)echo "garage    ";if($row[11]==true)echo "gardin";?></b></pre></span></div>
	<a href="disPropritaire.php?id=<?=$row[0]?>"><input type="submit" value="Delet la propriete" class="button" name="submit">
	</a>
	</div>		
	</div>	
<?php
		}
   
   
   	}
	else
{
	echo '<script>window.location.href="login.php";</script>';
}
   
  ?>
</body>
</html>