<?php
    session_start();
    require 'check_if_added.php';
    $con=mysqli_connect("utbweb.its.ltu.se", "19990310", "19990310", "db19990310") or die(mysqli_error($con));
?>
<html lang="en-US">
<!-- below is used to ensure login features  -->

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



        <h1  > <a href="index.php" > Spritbolaget 	</h1>  <!--  TITEL!!-->

        <nav class="navbar navbar-inverse navabar-fixed-top">
               <div class="container">
                   <div class="navbar-header">
                       <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> -->
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                       <!-- </button> -->
                
                   </div>
                   
                   <div class="collapse navbar-collapse" id="myNavbar">
                       <ul class="nav navbar-nav navbar-right">
                           <?php
                           if(isset($_SESSION['email'])){
                           ?>
                           <a href="cart.php"><span style="padding-left: 700px;vertical-align: middle" class="glyphicon glyphicon-shopping-cart"></span> KUNDVAGN</a>
                           <a href="logout.php"><span style="padding-left: 700px;vertical-align: middle" class="glyphicon glyphicon-log-out"></span> LOGGA UT</a>
                           <a class="skip-link screen-reader-text" href="#content">Skip to content</a>
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
                           <?php
                           }else{
                            ?>
                            <a href="signup.php"  style="padding-left: 700px;vertical-align: middle"  >SKAPA KONTO<span class="glyphicon glyphicon-user"></span> </a>
                            <a href="login.php" style="padding-left: 700px;vertical-align: middle"  >LOGGA IN <span class="glyphicon glyphicon-log-in"></span> </a>

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
                           <?php
                           }
                           ?>
                           
                       </ul>
                   </div>
               </div>
</nav>

            <div class="container">
                <div class="row">

                <br><br><br>

                <?php      
                                                      $queryReview = "SELECT * FROM products";
								
                                                      if ($result = $con->query($queryReview)) {
                      
                                                      /* fetch associative array */
                                                         while ($row = $result->fetch_assoc()) {
                                                          
                                                             $id = $row["id"];
                                                             $name = $row["name"];
                                                             $stockAmount = $row["stock_quantity"]; 
                                                             $percentage = $row["Percentage"]; 
                                                             $color = $row["Color"]; 
                                                             $pictureURL = $row["picture"]; 
                                                             $pricetag = $row["Pricetag"]; 
                                                             $description = $row["Description"]; 
                                                            $stringID = (string)$id;
                                                            $page = "product".$stringID."_page.php";
                                                            
                                                         ?> 

                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <a href=<?php echo $page; ?>>
                                <img src=<?php echo $pictureURL; ?> alt = "" onerror='this.src = "pictures/no.png"'>
                            </a>
                            <center>
                                <div class="caption">
                                    <h3><?php echo $name; ?></h3>
                                    <p><?php echo $pricetag; ?> Kr </p>
                                    <?php if(!isset($_SESSION['email'])){  ?>
                                        <p><a href="login.php" role="button" class="btn btn-primary btn-block">Köp nu!! (logga in)</a></p>
                                        <?php
                                        }
                                        else{
                                            if(check_if_added_to_cart($id)){
                                                echo '<a href="#" class=btn btn-block btn-success disabled>Tillagd</a>';
                                            }else{
                                                $stringID = (string)$id;
                                                $addCart= "cart_add.php?id=".$stringID;
                                                ?>
                                                <a href= <?php echo $addCart; ?> class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Lägg till i kundvagn</a>
                                                <?php
                                            }
                                        }
                                        ?>
                                    
                                </div>
                            </center>
                        </div>
                    </div>
                    
                    <br><br><br><br><br>
                    <?php
                                                         
                                                        }
                                              
                }
                ?>
       


</div>
            </div>
            
            <!-- .container -->
<footer id="colophon" class="site-footer">
<div class="container">
    <div class="site-info">
         <a target="blank" >&copy; LTU-projeasdaskt 2021</a>
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