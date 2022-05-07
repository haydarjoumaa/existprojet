<html>
<head>
<?php include "Agent.php";
include "DBfunction.php";
?>
<style>

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 50%;
  
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
<?php



if(isset($_GET['id']))
{
	$x= $_GET['id'] ;
	   $dbc=connectServer("localhost","root","");
selectDB($dbc,"projetphp");
	$query = "DELETE FROM reservation where reservation.emailLoca='$x'";
  @mysqli_query($dbc,$query)  or die ("DB Error: Could not delete table person! <br>".
	          @mysqli_error($dbc)); 
  
  if(isset($_GET['v']))
  {
	  $query1="insert into report values('$x')";
	  @mysqli_query($dbc,$query1); 
	  
  }
	
	
}


?>
</head>
<body>
<?php

$a=$_SESSION['emailemp'];
   $dbc=connectServer("localhost","root","");
selectDB($dbc,"projetphp");
$query="select client.email,client.telephone,allocation.idprop from reservation,allocation,client where allocation.emailagent='$a' and allocation.idprop=reservation.idprop and client.email=reservation.emailLoca";
  $x =@mysqli_query($dbc,$query) ;
	  
		while( $row = @mysqli_fetch_array($x) ) 
		{
			?>
						<table id="customers">
  <tr>
    <th style="text-align: center;">Email</th>
    <th style="text-align: center;">Telephone</th>
    <th style="text-align: center;">Id of property</th>
    <th style="text-align: center;">Make contrat</th>
    <th style="text-align: center;">Delete</th>
    <th style="text-align: center;">Report</th>
    <th style="text-align: center;">Rendez-Vous</th>
  </tr>
  <tr>
    <td><?php echo $row[0];?></td>
    <td><?php echo $row[1];?></td>
    <td><?php echo $row[2];?></td>
    <td><form method="post" action="signercontrat.php?email=<?=$row[0]?>&emailagent=<?=$a ?>&idprop=<?=$row[2] ?>"><input type="submit" value="Rent" class="button"></form></td>
    <td><form method="post" action="reserveagent.php?id=<?=$row[0]?>"><input type="submit" value="delete" class="button"></form></td>
    <td><form method="post" action="reserveagent.php?id=<?=$row[0]?>&v=7"><input type="submit" value="report" class="button"></form></td>
    <td><form method="post" action="indexx.php?email=<?=$row[0]?>">
      Date Debut
      <input type="datetime-local" name="datedebut" required="required">
      Date Fin
      <input type="datetime-local" name="datefin"  required="required">
      <input type="submit" value="Send" class="button"></form>
    </td>
  </tr>
  </table>	
			
		<?php	
		}


?>
</body>
</html>