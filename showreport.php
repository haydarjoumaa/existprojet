<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  
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
</style>
<?php
include "hearderadmin.php";
include "DBfunction.php";
$dbc=connectServer("localhost","root","");
selectDB($dbc,"projetphp");
$query="select * from contrat";
 $x =@mysqli_query($dbc,$query);
	   
		while( $row = @mysqli_fetch_array ($x) ) 
		{
			?>
								<table id="customers">
  <tr>
    <th style="text-align: center;">Emailagent</th>
    <th style="text-align: center;">emaillocataire</th>
    <th style="text-align: center;">namelocataire</th>
    <th style="text-align: center;">idprop</th>
    <th style="text-align: center;">datedebut</th>
    <th style="text-align: center;">datefin</th>
    <th style="text-align: center;">prix</th>
    <th style="text-align: center;">penalite</th>
  </tr>
  <tr>
    <td><?php echo $row[0];?></td>
    <td><?php echo $row[1];?></td>
    <td><?php echo $row[2];?></td>
    <td><?php echo $row[3];?></td>
    <td><?php echo $row[4];?></td>
    <td><?php echo $row[5];?></td>
    <td><?php echo $row[6];?></td>
    <td><?php echo $row[7];?></td>
   
  </tr>
  </table>	
			
		<?php	
			
		}
?>
</head>
<body>

</body>
</html>