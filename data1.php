<html>
<head>
</head>
<body>
<?php
include "DBfunction.php";
$dbc=connectServer("localhost","root","");
selectDB($dbc,"projetphp");
$query = 'CREATE TABLE client (email VARCHAR(40) NOT NULL PRIMARY KEY,
										password varchar(20) NOT NULL,
										telephone varchar(20) NOT NULL,
										enabled BOOLEAN  )
				';
createTable($dbc,$query,"client");
$query1 = 'CREATE TABLE propriete (idprop INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
										emailprop VARCHAR(40) NOT NULL ,
										description text,
										type varchar(100) NOT NULL,
										lieu varchar(100) NOT NULL,
										surface float NOT NULL,
										price float NOT NULL,
										nbrbed integer NOT NULL,
										nbrbath integer NOT NULL,
										picine boolean ,
										jacouzi boolean ,
										garage boolean ,
										gardin boolean ,
										disponible boolean ,										
										allouer boolean ,										
										foreign key(emailprop)
										references client (email))
				';
		createTable($dbc,$query1,"propriete");	
		
		
		$query2 = 'CREATE TABLE employee (email VARCHAR(40) NOT NULL PRIMARY KEY,
											type varchar(20),
										password varchar(20) NOT NULL,
										telephone varchar(20) NOT NULL)
										
				';
createTable($dbc,$query2,"employee");	


$query3 = 'CREATE TABLE reservation (emailLoca VARCHAR(40) NOT NULL ,
								 idprop INT UNSIGNED NOT NULL ,
								 primary key(emailLoca,idprop),
								 foreign key(emailLoca)
								 references client(email),
								 foreign key(idprop)
								 references propriete(idprop))
								 
										
				';
createTable($dbc,$query3,"reservation");

$query4= 'CREATE TABLE allocation (emailagent VARCHAR(40) NOT NULL ,
								 idprop INT UNSIGNED NOT NULL ,
								 primary key(emailagent,idprop),
								 foreign key(idprop)
								 references propriete(idprop),
								  foreign key(emailagent)
								 references employee(email))
										
				';
createTable($dbc,$query4,"allocation");

$query5= 'CREATE TABLE imageprop (
								 
								 idprop INT UNSIGNED AUTO_INCREMENT NOT NULL primary key,
								 im1 longblob,
								 im2 longblob,
								 im3 longblob,
								 im4 longblob)
								 
										
				';
				createTable($dbc,$query5,"imageprop");
$query6 = 'CREATE TABLE report (email VARCHAR(40) NOT NULL)';
createTable($dbc,$query6,"report");	

$query7 = 'CREATE TABLE contrat (
emailagent VARCHAR(40) NOT NULL,
emailloca VARCHAR(40) NOT NULL,
nameloca VARCHAR(40) NOT NULL,
idprop INT UNSIGNED NOT NULL ,
datedebut date,
datefin date,
prix float,
penalite float,
primary key(emailagent,emailloca,idprop),
foreign key (emailagent) references employee(email),
foreign key (emailloca) references client(email),
foreign key (idprop) references propriete(idprop)


)';

createTable($dbc,$query7,"contrat");	
	
?>
</body>
</html>