<html>
<head>
</head>
<body>
<?php
function connectServer($host,$log,$pass)
{ 
	$dbc=@mysqli_connect($host,$log,$pass) 
	  or die("connection error:".@mysqli_errno($dbc).
	         ": ".@mysqli_error($dbc)
			 );
		
	
	return $dbc;
}

function selectDB($dbc, $db)
{
	mysqli_select_db($dbc ,$db) 
	 or die ('<p style="color: red;">'.
			 "Could not select the database ".$db.
			 "because:<br/>".mysqli_error($dbc).
			 ".</p>");
	

}

function createDB($dbc,$db)
{
	$query= "CREATE DATABASE ".$db;
	mysqli_query($dbc,$query) 
	 or die('<p style="color: red;">'.
	        "Could not create the database ".
			$db." because:<br>".mysqli_error($dbc).
			".</p>");
		
	
}

function deleteDB($dbc,$db)
{
	$query= "DROP DATABASE IF EXISTS ".$db;
	mysqli_query($dbc,$query) 	 
     or die("DB Error: Could not delete the data base ".
		    $db."! <br>".@mysqli_error($dbc));
	
	print "<p> Data base $db deleted.</p>";
}

function createTable($dbc,$query,$Tab)
{
	
	@mysqli_query($dbc,$query);

	
}

function deleteDataFromTab($dbc, $Tab)
{
	$query = "DELETE FROM ".$Tab;
    @mysqli_query($dbc,$query) 
    or die ("DB Error: Could not delete data from table $Tab! <br>".
		     @mysqli_error($dbc));
	

}

function deleteTable($dbc, $Tab)
{
	$query = "DROP TABLE IF EXISTS ".$Tab;
    @mysqli_query($dbc,$query) 
      or die ("DB Error: Could not delete table person! <br>".
	          @mysqli_error($dbc));
	
}

function insertDataToTab($dbc, $Tab, $query)
{
    @mysqli_query($dbc,$query) 
      or die (@mysqli_error($dbc));
   
 
}
?>
</body>
</html>