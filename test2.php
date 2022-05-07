<html>
<head>
<style>
div,h1 { text-align: center;}

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

input[type=submit]:hover {
  background-color: #45a049;
}


input[type=text], select {
  width: 30%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  border: 3px solid blue;
}
textarea {
  width: 30%;
  height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  border: 3px solid blue;
}

.container {
  display: block;
  position: relative;
  padding-left:0px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
  
}
.center {
  margin: auto;
  width: 60%;
  border: 3px solid #73AD21;
  padding: 10px;
}


.inputfile + label {
    font-size: 1.25em;
    font-weight: 700;
    color: white;
    background-color: black;
    display: inline-block;
}

.inputfile:focus + label,
.inputfile + label:hover {
    background-color: red;
}




</style>
<?php

include "projet.php";
?>
<?php
include "DBfunction.php";
	$dbc=connectServer("localhost","root","");
selectDB($dbc,"projetphp");
$picine="false";
	$garage="false";
	$gardin="false";
	$jacoozi="false";
	if(isset($_COOKIE["user7"]) || isset($_SESSION["email"]))
	{
		$dsa=$_SESSION["email"];
		$er="select count(*) from client where email='".$dsa."' and enabled=false";
		$resop=@mysqli_query($dbc,$er);
		$ttt=@mysqli_fetch_array($resop);
		
		if($ttt[0]!=0)
			echo '<script>window.location.href="search.php";</script>';
if(isset($_POST['type']) )
{
	$type=$_POST['type'];
	$location=$_POST['location'];
	$prix=$_POST['prix'];
	$surface=$_POST['surface'];
	$description=$_POST['subject'];
	$nbrbed=$_POST['nbrbed'];
	$nbrbath=$_POST['nbrbath'];
	if(isset($_SESSION["email"]))
	$email=($_SESSION["email"]);
	else if(isset($_COOKIE["user7"]))
		$email=$_COOKIE["user7"];
	
	if(isset($_POST['picine']))	
	{
		$picine="true";
	}
	if(isset($_POST['garage']))	
	{
		$garage="true";
	}
	if(isset($_POST['gardin']))	
	{
		$gardin="true";
	}
	if(isset($_POST['jacoozi']))	
	{
		$jacoozi="true";
	}
		
	$fileName1 = basename($_FILES["image1"]["name"]); 
    $fileType1 = pathinfo($fileName1, PATHINFO_EXTENSION);
    $fileName2 = basename($_FILES["image2"]["name"]); 
    $fileType2 = pathinfo($fileName2, PATHINFO_EXTENSION);
    $fileName3 = basename($_FILES["image3"]["name"]); 
    $fileType3 = pathinfo($fileName3, PATHINFO_EXTENSION);
    $fileName4 = basename($_FILES["image4"]["name"]); 
    $fileType4 = pathinfo($fileName4, PATHINFO_EXTENSION);
   
   $allowTypes = array('jpg','png','jpeg','gif'); 
	

   	            $image1 = $_FILES['image1']['tmp_name']; 
            $imgContent1 = addslashes(file_get_contents($image1)); 
                        $image2 = $_FILES['image2']['tmp_name']; 
            $imgContent2 = addslashes(file_get_contents($image2)); 
                        $image3 = $_FILES['image3']['tmp_name']; 
            $imgContent3 = addslashes(file_get_contents($image3)); 
                        $image4 = $_FILES['image4']['tmp_name']; 
            $imgContent4 = addslashes(file_get_contents($image4)); 
			
			$query="insert into propriete(emailprop  ,description ,type ,lieu ,surface ,price ,nbrbed ,nbrbath, picine ,jacouzi ,garage,gardin  ,disponible  ,allouer ) values('$email','$description','$type','$location',$surface,$prix,$nbrbed,$nbrbath,$picine,$jacoozi,$garage,$gardin,false,false)";
			
            $query1="INSERT into imageprop (im1,im2,im3,im4) VALUES ('$imgContent1','$imgContent2','$imgContent3','$imgContent4')";
			
			
			insertDataToTab($dbc,"propriete", $query);
			insertDataToTab($dbc,"imageprop", $query1);
            

}
	}
else
{
	echo '<script>window.location.href="login.php";</script>';
}
?>


</head>

<body>

	<br><br>
	<form action="test2.php" method="post" enctype="multipart/form-data">
	<div>
		<img src="add.jpg" alt="image" class="center" width="1000" height="333" > </div><br>
		<h1 style="color:blue">ADD YOUR INFORMATION PROPERTY </h1><br><br>
	<div>
			<b>Enter Type</b> <font style="color:red">  *  &nbsp  &nbsp </font>
		
			<select name="type" id="type">
				<option value="maison"><b>	maison<b></option>
				<option value="maison"><b>	Duplex<b></option>
				<option value="appartement">appartement</option>
				<option value="compoud">compoud</option>
				<option value="shalet">shalet</option>
			</select><br><br>
	</div>
	
	<hr width="60%"  color="grey" style="margin-left:20%"><br><br>

	<div> <b>Loction of property<b>  <font style="color:red">  * &nbsp  &nbsp  </font>
				<select name="location">
				<option value="beyrouth">beyrouth</option>
				<option value="nabatieh">nabatieh</option>
				<option value="sour">sour</option>
				<option value="saida">saida</option>
				<option value="tripoli">tripoli</option>
				<option value="baalbak">baalbak</option>
			</select><br><br>
	</div>
	<br>
	<hr width="60%" color="grey" style="margin-left:20%"><br><br>
	
	<div> 
		<b>Surface Totale<b>   <font style="color:red">  * &nbsp  &nbsp   </font><var> </var>
		<input type="text" id="surface" name="surface"  pattern="[0-9]{1,4}" required><var> &nbsp   SQ FT</var> <br><br>
		<b>Prix Totale<b>   <font style="color:red">  * &nbsp  &nbsp  </font>
		<input type="text" id="surface" name="prix" pattern="[0-9]{1,4}" required>   $<br><br>
    </div>
	
	<hr width="60%"  color="grey" style="margin-left:20%"><br><br>
	
	<div> 
		<b>Number bed room<b>    <font style="color:red">  * &nbsp  &nbsp  </font>
		<input type="number" name="nbrbed" min="1" max="7" value="2" ><br><br>
		<b> Number bath room <b>  <font style="color:red">  *  &nbsp  &nbsp </font>
		<input type="number" name="nbrbath" min="1" max="7" value="2"><br><br>
	</div>
	
	<hr width="60%"  color="grey" style="margin-left:20%"><br><br>
	<div>
	 <label for="subject" style="margin-bottom:70px"><b>Discreption <b></label>  <font style="color:red">  * &nbsp  &nbsp  </font>
				<br> <textarea  name="subject" placeholder="Write something.." style="height:200px" required></textarea>
	</div>
	<hr width="60%"  color="grey" style="margin-left:20%;margin-top:50px"><br><br>
	
	<div>
		<label>Select  5 Image File:</label>
		<input type="file" name="image1" required>
		<input type="file" name="image2" required>
		<input type="file" name="image3" required>
		<input type="file" name="image4" required>
		
	</div>
	
	<hr width="60%"  color="grey" style="margin-top:50px;margin-left:20%"><br><br>
	<div class="center">
		<label class="container"><b>with Picine<b>
			<input type="checkbox" name="picine" >
			<span class="checkmark" align="center"></span>
		</label>
		<label class="container"><b>with jacoozi<b>
			<input type="checkbox" name="jacoozi">
			<span class="checkmark" ></span>
		</label>
		<label class="container"><b>with garage<b>
			<input type="checkbox" name="garage">
			<span class="checkmark" ></span>
		</label>
		<label class="container"><b>with gardin<b>
			<input type="checkbox" name="gardin">
			<span class="checkmark"></span>
		</label>
		
	</div>
	 
	<br>
	 <div><input type="submit" value="Submit"></div>
	</form>
</body>
</html>