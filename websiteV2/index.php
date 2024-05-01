<?php
session_start();
$con=mysqli_connect("utbweb.its.ltu.se", "19990310", "19990310", "db19990310") or die(mysqli_error($con));
?><html lang="en-US">
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
                           <a href="cart.php" style="padding-left: 700px;vertical-align: middle" >KUNDVAGN <span class="glyphicon glyphicon-shopping-cart"></span> </a>
                           <a href="logout.php" style="padding-left: 700px;vertical-align: middle" >LOGGA UT <span class="glyphicon glyphicon-log-out"></span> </a>
                           <?php
                           }else{
                            ?>
                            
                            <a href="signup.php"  style="padding-left: 700px;vertical-align: middle"  >SKAPA KONTO<span class="glyphicon glyphicon-user"></span> </a></li>
                            <a href="login.php" style="padding-left: 700px;vertical-align: middle"  >LOGGA IN <span class="glyphicon glyphicon-log-in"></span> </a></li>
                           <?php
                           }
                           ?>
                           
                       </ul>
                   </div>
               </div>
</nav>


        <div class="menu-menu-1-container">
            

    </div>
    <nav id="site-navigation" class="main-navigation">
    <button class="menu-toggle">Menu</button>
    <a class="skip-link screen-reader-text" href="#content" style="padding-left: 700px;vertical-align: middle" >Skip to content</a>
    <div class="menu-menu-1-container">
        <ul id="menu-menu-1" class="menu">
            
            <li><a href="index.php">HEM</a></li>						<!--  TITELKATEGORIER!!-->
            <li><a href="products.php">ALLA PRODUKTER</a></li>
            <li><a href="review.html">OMDÖMEN</a></li>
            <li><a href="cart.php">KUNDVAGN</a></li>
        </ul>
    </div>
    </nav>
    </header>
    <!-- #masthead -->
    <div id="content" class="site-content">
        <div id="primary" class="content-area column full">
            <main id="main" class="site-main">
            <div class="grid portfoliogrid">
            
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
                                                         
                                                         <article class="hentry">
         <header class="entry-header">
         <div class="entry-thumbnail">
             <a href=<?php echo $page; ?>><img src=<?php echo $pictureURL; ?> alt = "" onerror='this.src = "pictures/no.png"' width="400" height="200" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="p1"/></a>
         </div>
         <h2 class="entry-title"><a href= <?php echo $page; ?> rel="bookmark"><?php echo $name; ?></a></h2>
         <a class='portfoliotype' >Färg: <?php echo $color; ?></a><!-- Lägg in länk till underkategorier om möjligt -->
         </header>
         </article>
                            <?php
                                                         
                                                                 }
                                                       
                         }
                         ?>
                

            </div>
            <!-- .grid -->
       
            <br/>
            
            </main>
            <!-- #main -->
        </div>
        <!-- #primary -->
    </div>
    <!-- #content -->
</div>

<!-- .container -->
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