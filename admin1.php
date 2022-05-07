

<!DOCTYPE html>
<html>
<head>
<?php include "hearderadmin.php"; ?>
<?php
include "DBfunction.php";
$dbc=connectServer("localhost","root","");
selectDB($dbc,"projetphp");

if( isset($_POST['em'])){
	echo '<script>alert("hi");</script>';
$id=$_POST['id'];
$email=$_POST['em'];
	$query="insert into allocation values('$email',$id) ";
	$query1="update propriete set allouer=true where idprop=$id";
	@mysqli_query($dbc,$query);
	@mysqli_query($dbc,$query1);


	header('Location: admin1.php');
    
}
if(isset($_POST['del']))
{
	$query = "DELETE FROM imageprop where idprop=".$_GET['id'];
	$query3 = "DELETE FROM propriete where idprop=".$_GET['id'];
	@mysqli_query($dbc,$query);
	@mysqli_query($dbc,$query3);
	
}
?>
<style>
div.gallery {
  border: 1px solid #ccc;
  margin:50px;
 
  width: 550px;
  height: 670px;
}

div.gallery:hover {
  border: 1px solid #777;
  
  width: 550px;
  height: 670px;
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
</style>

	<title></title>
</head>
<body>

	<?php 


  $query="select propriete.idprop,im1,propriete.type,propriete.lieu ,propriete.surface ,propriete.price ,propriete.nbrbed ,propriete.nbrbath, propriete.picine ,propriete.jacouzi ,propriete.garage,propriete.gardin from propriete,imageprop where propriete.idprop=imageprop.idprop and propriete.allouer=false and propriete.disponible=false";
	

	   $x =@mysqli_query($dbc,$query);
	   
		while( $row = @mysqli_fetch_array ($x) ) 
		{
			?>
			<form action="admin1.php" method="post">
			<?php
			?><div class="responsive">
  <div class="gallery"><img  src="data:image;charset=utf8;base64,<?php echo base64_encode($row[1]); ?>" width='200' height='200'>
	<div class="desc" ><pre ><span class="inner-pre" style="font-size: 20px"><b style="color:black">Type:</b><?php echo " ".$row[2]." ";?><b style="color:black">Location:</b><?php echo "   ".$row[3];?></pre></span></div>
	<div class="desc"><pre><span class="inner-pre" style="font-size: 20px"><b style="color:black">Surface:</b><?php echo " ".$row[4]."(SQFT)   ";?><b style="color:black">Price:</b><?php echo "   ".$row[5]."$";?></pre></span></div>
	<div class="desc"><pre><span class="inner-pre" style="font-size: 20px"><b style="color:black">Nbrbed:</b><?php echo " ".$row[6]."        ";?><b style="color:black">Nbrbath:</b><?php echo "   ".$row[7];?></pre></span></div>
	<div class="desc"><pre><span class="inner-pre" style="font-size: 20px"><b style="color:DodgerBlue"><?php if($row[8]==true)echo "Picine     ";if($row[9]==true)echo "Jacouzi    ";if($row[10]==true)echo "garage    ";if($row[11]==true)echo "gardin";?></b></pre></span></div>
	<select name=em>
<?php
$query1="select email from employee";
$y =@mysqli_query($dbc,$query1);
while($row1=@mysqli_fetch_array($y)){ 
$query2="select count(*)from allocation where emailAgent='$row1[0]'";
$z=@mysqli_query($dbc,$query2);
$row2=@mysqli_fetch_array($z);
?>

	<option value= <?php echo  '"'.$row1[0].'"' ; ?> ><?php echo $row1[0]."  (".$row2[0].")";  ?></option>


<?php } ?>
</select>
<input type="hidden" name="id" value=<?php echo '"'.$row[0].'"'; ?> >
<input type="submit" name="sub" value="Allouer">
</form>
<form action="admin1.php?id=<?=$row[0] ?>" method="post">
<input type="hidden" name="del">
<input type="submit"  value="Delette">
</div>	
</div>
	<?php } ?>
	
	
		
</form>

</body>
</html>