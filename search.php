<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="style3.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
div.gallery {
  border: 1px solid #ccc;
  margin:10px;
 
  width: 550px;
  height: 550px;
}

div.gallery:hover {
  border: 1px solid #777;
  
  width: 550px;
  height: 550px;
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
   <script>
  $( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 1000,
      values: [ 200, 700 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "" + $( "#slider-range" ).slider( "values", 0 ) +
      " - " + $( "#slider-range" ).slider( "values", 1 ) );
  } );
  
  
    $( function() {
    $( "#slider-range1" ).slider({
      range: true,
      min: 0,
      max: 9000,
      values: [ 410, 5000 ],
      slide: function( event, ui ) {
        $( "#amount1" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
      }
    });
    $( "#amount1" ).val( "" + $( "#slider-range1" ).slider( "values", 0 ) +
      " - " + $( "#slider-range1" ).slider( "values", 1 ) );
  } );
    
	
	$( function() {
    $( "#slider-range2" ).slider({
      range: true,
      min: 1,
      max: 7,
      values: [ 2, 5 ],
      slide: function( event, ui ) {
        $( "#amount2" ).val( " " + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
      }
    });
    $( "#amount2" ).val( " " + $( "#slider-range2" ).slider( "values", 0 ) +
      " - " + $( "#slider-range2" ).slider( "values", 1 ) );
  } );
  
  
    $( function() {
    $( "#slider-range3" ).slider({
      range: true,
      min: 1,
      max: 7,
      values: [ 2, 5 ],
      slide: function( event, ui ) {
        $( "#amount3" ).val( " " + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
      }
    });
    $( "#amount3" ).val( " " + $( "#slider-range3" ).slider( "values", 0 ) +
      " - " + $( "#slider-range3" ).slider( "values", 1 ) );
  } );
  </script>
  <?php
include "projet.php";

?>
</head>
<body>

<div class="ss">
<div class="first">
<form method="post" action="search.php">
<select name="type">
<option value="maison">maison</option>
<option value="Duplex">Duplex</option>
<option value="appartement">appartement</option>
<option value="compoud">compoud</option>
<option value="shalet">shalet</option>
</select>

  <input list="languages" placeholder="choose city" class="inputt" name="location" required>
  <datalist id="languages" >
    <option value="beyrouth"></option>
    <option value="nabatieh"></option>
    <option value="sour"></option>
    <option value="saida"></option>
    <option value="tripoli"></option>
    <option value="baalbak"></option>
   
  </datalist>

<input type="submit" value="Search" class="button">
 
<p>
  <label for="amount" style="margin-left:10px; margin-right:5px;font-weight:bold">Price range($):</label>
  <input type="text" id="amount" name="price" readonly style="border:0; color:#f6931f; font-weight:bold; width:70px">
  
   <label for="amount" style="margin-left:10px; margin-right:10px;font-weight:bold">Area(SQFT):</label>
  <input type="text" id="amount1" name="area" readonly style="border:0; color:#f6931f; font-weight:bold; width:70px">
  
   <label for="amount" style="margin-left:10px; margin-right:10px;font-weight:bold">Nbrbath range:</label>
  <input type="text" id="amount2" name="nbrbath" readonly style="border:0; color:#f6931f; font-weight:bold; width:40px">
  
   <label for="amount" style="margin-left:10px; margin-right:10px;font-weight:bold">Nbrbed range:</label>
  <input type="text" id="amount3" name="nbrbed" readonly style="border:0; color:#f6931f; font-weight:bold; width:40px">
</p>
 
<div id="slider-range" style="width:165px;height:15px;margin:10px;display:inline-block;background-color:#00BFFF"></div>
<div id="slider-range1" style="width:165px;height:15px;margin:10px;display:inline-block;background-color:#00BFFF"></div>
<div id="slider-range2" style="width:170px;height:15px;margin:10px;display:inline-block;background-color:#00BFFF"></div>
<div id="slider-range3" style="width:165px;height:15px;margin:10px;margin-left:40px;display:inline-block;background-color:#00BFFF"></div>
 <label class="container" style="display:inline-block ;margin-left:5px;font-weight:bold" >Picine
  <input type="checkbox" name="picine">
  <span class="checkmark" style="display:inline-block"></span>
</label>
<label class="container" style="display:inline-block;margin-left:65px;margin-top:25px;font-weight:bold">Garage
  <input type="checkbox" name="garage">
  <span class="checkmark" style="display:inline-block"></span>
</label>
<label class="container" style="display:inline-block;margin-left:65px;font-weight:bold">Gardin
  <input type="checkbox" name="gardin">
  <span class="checkmark" style="display:inline-block"></span>
</label>
<label class="container" style="display:inline-block;margin-left:65px;font-weight:bold">Jacouzi
  <input type="checkbox" name="jacouzi">
  <span class="checkmark" style="display:inline-block"></span>
</label>

</form>
</div>
</div>
  <?php
   include "DBfunction.php";
   $dbc=connectServer("localhost","root","");
selectDB($dbc,"projetphp");
   if(isset($_POST['type']))
   {
	   $type=$_POST['type'];
	$location=$_POST['location'];
	$pieces = explode(" - ", $_POST['nbrbath']);
	$pieces1 = explode(" - ", $_POST['nbrbed']);
	$pieces2 = explode(" - ", $_POST['price']);
	$pieces3 = explode(" - ", $_POST['area']);
	$picine="false";
	$garage="false";
	$gardin="false";
	$jacoozi="false";
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
	if(isset($_POST['jacouzi']))	
	{
		$jacoozi="true";
	}
	
	$query="select propriete.idprop,im1,propriete.type,propriete.lieu ,propriete.surface ,propriete.price ,propriete.nbrbed ,propriete.nbrbath, propriete.picine ,propriete.jacouzi ,propriete.garage,propriete.gardin from propriete,imageprop where propriete.idprop=imageprop.idprop and propriete.disponible=true and propriete.type='$type' and propriete.lieu='$location' and propriete.price between $pieces2[0] and $pieces2[1] and propriete.surface between $pieces3[0] and $pieces3[1] and propriete.nbrbed between $pieces1[0] and $pieces1[1] and propriete.nbrbath between $pieces[0] and $pieces[1] and propriete.surface  between $pieces3[0] and $pieces3[1] and propriete.picine=$picine and propriete.jacouzi=$jacoozi and propriete.garage=$garage and propriete.gardin=$gardin  " ;  
	     $x =@mysqli_query($dbc,$query);
	  	  
		while( $row = @mysqli_fetch_array ($x) ) 
		{
			?><div class="responsive">
  <div class="gallery"><a href="dis.php?id=<?=$row[0]?>"><img  src="data:image;charset=utf8;base64,<?php echo base64_encode($row[1]); ?>" width='200' height='200'>
	<div class="desc"><pre><span class="inner-pre" style="font-size: 20px"><b style="color:black">Type:</b><?php echo " ".$row[2]."           ";?><b style="color:black">Location:</b><?php echo "   ".$row[3];?></pre></span></div>
	<div class="desc"><pre><span class="inner-pre" style="font-size: 20px"><b style="color:black">Surface:</b><?php echo " ".$row[4]."(SQFT)      ";?><b style="color:black">Price:</b><?php echo "   ".$row[5]."$";?></pre></span></div>
	<div class="desc"><pre><span class="inner-pre" style="font-size: 20px"><b style="color:black">Nbrbed:</b><?php echo " ".$row[6]."              ";?><b style="color:black">Nbrbath:</b><?php echo "   ".$row[7];?></pre></span></div>
	<div class="desc"><pre><span class="inner-pre" style="font-size: 20px"><b style="color:DodgerBlue"><?php if($row[8]==true)echo "Picine     ";if($row[9]==true)echo "Jacouzi    ";if($row[10]==true)echo "garage    ";if($row[11]==true)echo "gardin";?></b></pre></span></div>
	</a>
	</div>		
	</div>	
		
<?php
		}
	   
   }
   else
   {
	   
	   $query="select propriete.idprop,im1,propriete.type,propriete.lieu ,propriete.surface ,propriete.price ,propriete.nbrbed ,propriete.nbrbath, propriete.picine ,propriete.jacouzi ,propriete.garage,propriete.gardin from propriete,imageprop where propriete.idprop=imageprop.idprop and propriete.disponible=true";
	
	   $x =@mysqli_query($dbc,$query);
	 
		while( $row = @mysqli_fetch_array ($x) ) 
		{
			?><div class="responsive">
  <div class="gallery"><a href="dis.php?id=<?=$row[0]?>"><img  src="data:image;charset=utf8;base64,<?php echo base64_encode($row[1]); ?>" width='200' height='200'>
	<div class="desc"><pre><span class="inner-pre" style="font-size: 20px"><b style="color:black">Type:</b><?php echo " ".$row[2]."           ";?><b style="color:black">Location:</b><?php echo "   ".$row[3];?></pre></span></div>
	<div class="desc"><pre><span class="inner-pre" style="font-size: 20px"><b style="color:black">Surface:</b><?php echo " ".$row[4]."(SQFT)      ";?><b style="color:black">Price:</b><?php echo "   ".$row[5]."$";?></pre></span></div>
	<div class="desc"><pre><span class="inner-pre" style="font-size: 20px"><b style="color:black">Nbrbed:</b><?php echo " ".$row[6]."              ";?><b style="color:black">Nbrbath:</b><?php echo "   ".$row[7];?></pre></span></div>
	<div class="desc"><pre><span class="inner-pre" style="font-size: 20px"><b style="color:DodgerBlue"><?php if($row[8]==true)echo "Picine     ";if($row[9]==true)echo "Jacouzi    ";if($row[10]==true)echo "garage    ";if($row[11]==true)echo "gardin";?></b></pre></span></div>
	</a>
	</div>		
	</div>	
<?php
		}
   }
   
   
   
  ?>
</body>
</html>