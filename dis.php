<html>
<head>
<?php  session_start();	 ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}
</style>
<?php

include "DBfunction.php";

if(isset($_GET['var']))
{
	if(isset($_POST['dele']))
	{
		
   $dbc=connectServer("localhost","root","");
selectDB($dbc,"projetphp");
		$query = "DELETE FROM imageprop where idprop=".$_GET['id'];
		$query1 = "DELETE FROM allocation where idprop=".$_GET['id'];
		$query2 = "DELETE FROM reservation where idprop=".$_GET['id'];
		$query3 = "DELETE FROM propriete where idprop=".$_GET['id'];
    @mysqli_query($dbc,$query); 
    @mysqli_query($dbc,$query1); 
    @mysqli_query($dbc,$query2); 
    @mysqli_query($dbc,$query3); 
	echo '<script>window.location.href="homeagent.php";</script>';
	}
	if(isset($_POST['take']))
	{
		$dbc=connectServer("localhost","root","");
selectDB($dbc,"projetphp");
		$query="UPDATE propriete SET propriete.disponible = true
WHERE idprop=".$_GET['id'];
@mysqli_query($dbc,$query); 

	}
	
}
else if(isset($_COOKIE["user7"]) || isset($_SESSION["email"]) )
{
	
	$id=$_GET['id'];
   $dbc=connectServer("localhost","root","");
selectDB($dbc,"projetphp");

if(isset($_SESSION["email"]))
	$email=($_SESSION["email"]);
else if(isset($_COOKIE["user7"]))
		$email=$_COOKIE["user7"];
if(isset($_POST['register']))
{
	
	$query2="select count(*)  from reservation  where emailLoca='$email'";

	$z =@mysqli_query($dbc,$query2);
	   
		 $row = @mysqli_fetch_array ($z) ;
		
		if($row[0]>=3)
		{
			
			echo "<script>alert('trois reservations maximum')</script>";	
		}
		else
		{
			$query="INSERT into reservation (emailLoca,idprop ) VALUES ('$email','$id')";
			
			insertDataToTab($dbc,"reservation", $query) or die (@mysqli_error($dbc));
		}
}

}
else
	echo '<script>window.location.href="login.php";</script>';
?>


<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 50%;
  margin-left:25%;
  margin-bottom:5%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #7FFFD4;
  color: white;
}
.button {
  display:inline-block;
  width:140px;
 
 margin-bottom:20px;
 margin-left:45%;
  font-size: 24px;

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



</head>
<body>


<?php

$id=$_GET['id'];

$query="select im1,im2,im3,im4 from imageprop where imageprop.idprop=$id ";
	$dbc=connectServer("localhost","root","");
selectDB($dbc,"projetphp");
	   $x =@mysqli_query($dbc,$query);
	   
		while( $row = @mysqli_fetch_array ($x) ) 
		{ 
		
			?>	
			<div class="w3-content w3-display-container">
  <img class="mySlides" src="data:image;charset=utf8;base64,<?php echo base64_encode($row[0]); ?>" style="width:100%;height:500px">
  <img class="mySlides" src="data:image;charset=utf8;base64,<?php echo base64_encode($row[1]); ?>" style="width:100%;height:500px">
  <img class="mySlides" src="data:image;charset=utf8;base64,<?php echo base64_encode($row[2]); ?>" style="width:100%;height:500px">
  <img class="mySlides" src="data:image;charset=utf8;base64,<?php echo base64_encode($row[3]); ?>" style="width:100%;height:500px">

  <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
		<?php } ?>
  <script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>
</div>
			
			
			<br>
			<br>

	 
<?php		 
		 
		 
	 
   $query1="select description ,type ,lieu ,surface ,price ,nbrbed ,nbrbath,propriete.picine ,propriete.jacouzi ,propriete.garage,propriete.gardin from propriete where  propriete.idprop=$id";
   $y =@mysqli_query($dbc,$query1);   
		while( $row1 = @mysqli_fetch_array ($y) ) 
		{				
			?>
			<table id="customers">
  <tr>
    <th style="text-align: center;">Location<img src="location.png"></th>
    <th style="text-align: center;">Area<img src="area-graph.png"></th>
    <th style="text-align: center;">Type<img src="house.png"></th>
    <th style="text-align: center;">Prix<img src="money.png"></th>
  </tr>
  <tr>
    <td><?php echo $row1[2];?></td>
    <td><?php  echo $row1[3]."(SQ FT)";?></td>
    <td><?php echo $row1[1];?></td>
    <td><?php echo $row1[4]."$";?></td>
  </tr>
  </table>	
  <table id="customers">
  <tr>
    <th style="text-align: center;">Nbr bedroom<img src="bed.png"></th>
    <th style="text-align: center;">Nbr bathroom<img src="bathroom.png"></th>
    
  </tr>
  <tr>
    <td  style="text-align: center;"><?php  echo $row1[5]; ?></td>
    <td style="text-align: center;"><?php  echo $row1[6];?></td>
    
  </tr>
  </table>  
  
   <table id="customers">
  <tr>
    <th style="text-align: center;">It also contain</th>
  </tr>
  <tr>
 <td><pre> <?php if($row1[7]==true){echo "Picine";?> <img src='pool.png'> <?php }if($row1[8]==true){echo "    Jacouzi";?> <img src='jacuzzi.png'> <?php  }if($row1[9]==true){echo "     garage";?><img src='garage.png'><?php  } if($row1[10]==true){echo "    gardin";?><img src='park.png'><?php } ?></td></pre>
   
      </tr>
  </table>  
  
  
				
				
				<p><b><font size="5px" style="color:blue">About this property:</font><br><font size="7px" style="color:red"> <?php echo $row1[0];?> </font></b> <br><br>
				
		
			
<?php	
				 
		
		}
   if(isset($_GET['var']))
   {
	   ?>
	   <form action="dis.php?id=<?=$id?>&var=7" method="post">
	   <input type="hidden" name="dele">
	   <div class="button">
	   <input type="submit" value="delet"></div>
	   </form> 
	   <form action="dis.php?id=<?=$id?>&var=7" method="post">
	   <input type="hidden" name="take">
	   <div class="button">
	   <input type="submit" value="take"></div>
	   </form>
	   
	<?php   
   }
   else
   { ?>
	    <form action="dis.php?id=<?=$id?>" method="post">
	   <input type="hidden" name="register">
	   <div class="button">
	   <input type="submit" value="register"></div>
	   </form>
	   <?php
   }
  ?>

</body>
</html>