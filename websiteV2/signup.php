<?php
    $con=mysqli_connect("utbweb.its.ltu.se", "19990310", "19990310", "db19990310") or die(mysqli_error($con));
    session_start();
    if(isset($_SESSION['email'])){
        header('location: products.php');
    }
?>

<html lang="en-US">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Spritbolaget</title>
<link rel='stylesheet' href='css/woocommerce-layout.css' type='text/css' media='all'/>
<link rel='stylesheet' href='css/woocommerce-smallscreen.css' type='text/css' media='only screen and (max-width: 768px)'/>
<link rel='stylesheet' href='css/woocommerce.css' type='text/css' media='all'/>
<link rel='stylesheet' href='css/font-awesome.min.css' type='text/css' media='all'/>
<link rel='stylesheet' href='style.css' type='text/css' media='all'/>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Oswald:400,500,700%7CRoboto:400,500,700%7CHerr+Von+Muellerhoff:400,500,700%7CQuattrocento+Sans:400,500,700' type='text/css' media='all'/>
<link rel='stylesheet' href='css/easy-responsive-shortcodes.css' type='text/css' media='all'/>
</head>



<body class="home page page-template page-template-template-portfolio page-template-template-portfolio-php">
<div id="page">
	<div class="container">
		<header id="masthead" class="site-header">
		<div class="site-branding">
			<h1 href="index.php" rel="home">Spritbolaget</a></h1>
            <a href="signup.php" style="padding-left: 700px;vertical-align: middle"  >SKAPA KONTO</a>  <!--  skapa konto!-->
            <a  href="login.php" style="padding-left: 700px;vertical-align: middle" >LOGGA IN </a>    <!--  logga in!-->
			
			<div class="menu-menu-1-container">
				
		</div>
		<nav id="site-navigation" class="main-navigation">
		<button class="menu-toggle">Menu</button>
		<a class="skip-link screen-reader-text" href="#content">Skip to content</a>
		<div class="menu-menu-1-container">
			<ul id="menu-menu-1" class="menu">
				<li><a href="index.php">Hem</a></li>
				<li><a href="products.php">Alla produkter</a></li>
				<li><a href="review.html">Omdömen</a></li>
				<li><a href="cart.php">Kundvagn</a></li>
			</ul>
		</div>
		</nav>
		</header>
            <br><br>
           
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                        <h1><b>SKAPA KONTO</b></h1>
                        <form method="post" action="user_registration_script.php" class="wpcf7"> 
                            <!-- NAME -->
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="För-och efternamn*" required="true">
                            </div>
                            <br>
                            <!-- EMAIL -->
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email*" required="true" >
                            </div> 
                            <br>
                            <!-- PASSWORD -->
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Lösenord*" required="true">
                            </div>
                            <br>
                            <!-- PHONENUMBER -->
                            <div class="form-group"> 
                                <input type="tel" class="form-control" name="contact" pattern="[0-9]{10}" placeholder="Tel. nr*" required="true">
                            </div>
                            <br>
                            <!-- CITY -->
                            <div class="form-group">
                                <input type="text" class="form-control" name="city" placeholder="Stad*" required="true">
                            </div>
                            <br>
                            <!-- ADRESS -->
                            <div class="form-group">
                                <input type="text" class="form-control" name="address" placeholder="Adress*" required="true">
                            </div>
                            <br>
                            <!-- CREATE ACCOUNT BUTTON -->
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Skapa konto*">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <br><br>
            <footer id="colophon" class="site-footer">
	<div class="container">
		<div class="site-info">
			 <a target="blank" >&copy; LTU-projekt 2021</a>
		</div>
	</div>	
	</footer>
	<a href="#top" class="smoothup" title="Back to top"><span class="genericon genericon-collapse"></span></a>
</div>
<!-- #page -->
<script src='js/jquery.js'></script>
<script src='js/plugins.js'></script>
<script src='js/scripts.js'></script>
<script src='js/masonry.pkgd.min.js'></script>
</body>
</html>
