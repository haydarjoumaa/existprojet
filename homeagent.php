<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <?php 
  include "Agent.php";
  ?>
<style>
div.gallery {
  border: 1px solid #ccc;
  margin:50px;
 
  width: 550px;
  height: 650px;
}

div.gallery:hover {
  border: 1px solid #777;
  
  width: 550px;
  height: 650px;
}

div.gallery img {
  width: 550px;
  height: 450px;
 
}

div.desc {
  
  color:red;
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

</style>
</head>
<body>
<?php 

include "DBfunction.php";
$email=$_SESSION["emailemp"];
  $query="select propriete.idprop,im1,propriete.type,propriete.lieu ,propriete.surface ,propriete.price ,propriete.nbrbed ,propriete.nbrbath, propriete.picine ,propriete.jacouzi ,propriete.garage,propriete.gardin,propriete.emailprop from propriete,imageprop,allocation where allocation.emailagent='$email' and propriete.idprop=allocation.idprop and propriete.idprop=imageprop.idprop ";
	$dbc=connectServer("localhost","root","");
selectDB($dbc,"projetphp");
	   $x =@mysqli_query($dbc,$query)  or die ("DB Error: Could not delete table person! <br>".
	          @mysqli_error($dbc));
	   
		while( $row = @mysqli_fetch_array ($x) ) 
		{
			?><div class="responsive">
  <div class="gallery"><a href="dis.php?id=<?=$row[0]?>&var=7"><img  src="data:image;charset=utf8;base64,<?php echo base64_encode($row[1]); ?>" width='200' height='200'>
	<div class="desc"><pre><span class="inner-pre" style="font-size: 20px"><b style="color:black">Type:</b><?php echo " ".$row[2]."           ";?><b style="color:black">Location:</b><?php echo "   ".$row[3];?></pre></span></div>
  <div class="desc"><pre><span class="inner-pre" style="font-size: 20px"><b style="color:black">Email Proprietaire:</b><?php echo " ".$row[12]."           ";?></pre></span></div>
	<div class="desc"><pre><span class="inner-pre" style="font-size: 20px"><b style="color:black">Surface:</b><?php echo " ".$row[4]."(SQFT)      ";?><b style="color:black">Price:</b><?php echo "   ".$row[5]."$";?></pre></span></div>
	<div class="desc"><pre><span class="inner-pre" style="font-size: 20px"><b style="color:black">Nbrbed:</b><?php echo " ".$row[6]."              ";?><b style="color:black">Nbrbath:</b><?php echo "   ".$row[7];?></pre></span></div>
	<div class="desc"><pre><span class="inner-pre" style="font-size: 20px"><b style="color:DodgerBlue"><?php if($row[8]==true)echo "Picine     ";if($row[9]==true)echo "Jacouzi    ";if($row[10]==true)echo "garage    ";if($row[11]==true)echo "gardin";?></b></pre></span></div>
	</a>
	</div>		
	</div>	
<?php
		}
 ?>


</body>
</html>