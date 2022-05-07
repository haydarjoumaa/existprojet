<?php
include "DBfunction.php";
$dbc=connectServer("localhost","root","");
selectDB($dbc,"projetphp");
$email=$_GET['email'];
$emailagent=$_GET['emailagent'];
$id=$_GET['idprop'];

$query1="select price from propriete where idprop=$id";
$x=@mysqli_query($dbc,$query1);
$row=@mysqli_fetch_array($x);


if(isset($_POST['nomclient'])){
$nom=$_POST['nomclient'];
$datefin=$_POST['datefin'];
$pen=$_POST['pen'];

$query="insert into contrat values('$emailagent','$email','$nom',$id,NOW(),'$datefin',$row[0],$pen)";

$query2="update propriete set disponible=false where idprop=$id";
@mysqli_query($dbc,$query) or die(@mysqli_error($dbc));
@mysqli_query($dbc,$query2);



$query = "DELETE FROM reservation where reservation.idprop=$id";
  @mysqli_query($dbc,$query)  or die ("DB Error: Could not delete table person! <br>".
	          @mysqli_error($dbc)); 
echo "<script>window.location.href='reserveagent.php'</script>";
exit() ;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		
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
  width:70px;
  padding: 4px 17px;
  font-size: 14px;
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
</head>
<body>
	<form action="signercontrat.php?email=<?=$email?>&emailagent=<?=$emailagent?>&idprop=<?=$id?>" method="POST">
	<table id="customers">
		<tr>
			<td>Nom Client</td><td><input type="text" name="nomclient" required="required"></td>
		</tr>
		<tr>
			<td>Email Agent</td><td><?php echo $emailagent;  ?></td>
		</tr>
		<tr>
			<td>Email Locataire</td><td><?php echo $email;  ?></td>
		</tr>
		<tr>
			<td>Id propriete</td><td><?php echo $id;  ?></td>
		</tr>
		<tr>
			<td>Date Fin Contrat</td><td><input type="Date" name="datefin" placeholder="yyyy-mm-dd" required="required"></td>
		</tr>
		<tr>
			<td>Prix Propriete</td><td><?php echo $row[0];  ?> $</td>
		</tr>
		<tr>
			<td>penalite</td><td><input type="text" name="pen" required="required" pattern="[1-9 .]{1-3}"></td>
		</tr>
		<tr>
			<td></td><td><input class="button" type="submit" name="submit" value="SUBMIT"></td>
		</tr>
	</table>
</form>
</body>
</html>