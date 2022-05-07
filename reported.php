<?php 
include "DBfunction.php";
include 'hearderadmin.php';

$dbc=connectServer("localhost","root","");
selectDB($dbc,"projetphp");

if(isset($_GET['del'])){
	$email=$_GET['del'];
	$query="update client set enabled=false where email='$email'";
	$query1="delete from report where email='$email'";
	@mysqli_query($dbc,$query) or die(mysqli_error($dbc));
	@mysqli_query($dbc,$query1) or die(mysqli_error($dbc));

	header('Location: reported.php');

}
if(isset($_GET['add'])){
	$email=$_GET['add'];
	$query="update client set enabled=true where email='$email'";
	@mysqli_query($dbc,$query) or die(mysqli_error($dbc));

	header('Location: reported.php');

}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		
 .column {
  float: left;
  width: 47%;
  padding: 15px;
  
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

@media screen and (max-width:600px) {
  .column {
    width: 100%;
  }
}
	</style>
</head>
<body>
<div class="row">
  <div class="column">
    <h2 align="center">Desactiver un compte</h2>
    <?php


$query='select email from report group by email having count(*)>4';

$x=mysqli_query($dbc,$query);
while($row=@mysqli_fetch_array($x)){ ?>

<table>
	<tr>
		<td><?php echo $row[0]; ?></td>
        <td><a href="reported.php?del=<?= $row[0] ?>">Banir</a></td>
	</tr>
</table>

<?php } ?>
      
    </div>
  
  <div class="column">
    <h2 align="center">Reactiver un compte</h2>
 <?php


$query='select email from client where enabled=false';

$x=mysqli_query($dbc,$query);
while($row=@mysqli_fetch_array($x)){ ?>

<table>
	<tr>
		<td><?php echo $row[0]; ?></td>
        <td><a href="reported.php?add=<?= $row[0] ?>">reactiver</a></td>
	</tr>
</table>

<?php } ?>
     </div>
 </div>
</body>
</html>