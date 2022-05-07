<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Responsive Navbar</title>
	<?php  session_start();	 ?>
</head>
<body>
    <header>
    <div class="container"> 
            <div class="logo-container">
                <h3 class="logo">REAL<span>ESTATE</span></h3>
            </div>
            <div class="nav-btn">
                <div class="nav-links">
                    <ul>
                        <li class="nav-link" style="--i: .6s">
                            <a href="home.php">Home</a>
                        </li>
                        <li class="nav-link" style="--i: .85s">
                            <a href="search.php">Search</a>    
                        </li>
                        <li class="nav-link" style="--i: 1.1s">
                            <a href="test2.php">Add</a>      
                        </li>
                        <li class="nav-link" style="--i: 1.35s">
                            <a href="about.php">About</a>
                        </li>
                    </ul>
                </div>
                <div class="log-sign" style="--i: 1.8s">
				<?php
                			
				if(isset($_COOKIE["user7"]) || isset($_SESSION["email"]))
				{ 
			       
			      echo '<a href="logout.php" for="show" class="btn transparent">Log out</a>';  
			  
			
				}
				else
                    echo '<a href="login.php" for="show" class="btn transparent">Log in</a>';   
				
?>					
                </div>		
            </div>		
    </header>
</body>
</html>