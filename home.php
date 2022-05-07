<html>
<head>
    <link rel="stylesheet" href="style2.css">
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
	
	    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>

</head>
<body>
<?php
include "projet.php";

?>

<div class="home">
      <div class="max-width">
            <div class="home-content">
     <div class="text-1">
Welcome</div>
<div class="text-2">
Find Your<br> Dream Home</div>
<div class="text-3">


We have  <span class="typing"></span></div>
<script>

var typed;

typed = new Typed(".typing", {
	
        strings: ["experience ", "industry knowledge", "largest inventory of properties"],
        typeSpeed: 100,
        backSpeed: 60,
        loop: true
    });
	
	</script>
            </div>
</div>

</div>
<h1>FEATURED PROPERTIES</h1>
<p class="p1">Finding your perfect home for the right price shouldn’t be a nightmare, which is why we are here to help. Here are some of the best properties handpicked just for you.</p>
    <section class="teams" id="teams" style="background-color: #d5f4e6;">
        <div class="max-width">
	
            <h1 style="margin-left:35%;">DEVELOPERS</h1>
<br>
<div class="carousel owl-carousel">

                <div class="card">
                    <div class="box">
		
                        <img src="person1.jpg" alt="img">
                        <div class="text">Haydar jomaa</div>
<p>
Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
</div>
</div>
<div class="card">
                    <div class="box">
                        <img src="image1.jpg" alt="img">
                        <div class="text">
Ali saad</div>
<p>
Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
</div>
</div>
<div class="card">
                    <div class="box">
                        <img src="person3.jpg" alt="img">
                        <div class="text">
Hassan salman</div>
<p>
Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
</div>
</div>

			<script>
		
 $('.carousel').owlCarousel({
        
    });
	</script>
</div>
</div>
</section>

    <section class="contact" id="contact" style="background-color:#bbb;">
       
            <h1 style="margin-left:32%;">
Contact me</h1>
<br>
<div class="row1" >
<div class="contact-content">
                <div class="columnleft">
                    <div class="text">
Get in Touch</div>
<p>
Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos harum corporis fuga corrupti. Doloribus quis soluta nesciunt veritatis vitae nobis?</p>
<div class="icons">
                        <div class="row">
                            <i class="fas fa-user"></i>
                            <div class="info">
                                <div class="head">
Name</div>
<div class="sub-title">
RealEstate</div>
</div>
</div>
<div class="row">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="info">
                                <div class="head">
Address</div>
<div class="sub-title">
Nabatieh, lebanon</div>
</div>
</div>
<div class="row">
                            <i class="fas fa-envelope"></i>
                            <div class="info">
                                <div class="head">
Email</div>
<div class="sub-title">
abc@gmail.com</div>
</div>
</div>
</div>
</div>

<div class="column right">

<div class="text">Message us</div>
<form action="#">
      <div class="fields">
	  <div class="field name">
      <input type="text" placeholder="Name" required>
                            </div>
<div class="field email">
                                <input type="email" placeholder="Email" required>
                            </div>
</div>
<div class="field">
                            <input type="text" placeholder="Subject" required>
                        </div>

<div class="button">
                            <button type="submit">Send message</button>
                        </div>
</form>
</div>
</div>
</div>
</section>
</body>
</html>