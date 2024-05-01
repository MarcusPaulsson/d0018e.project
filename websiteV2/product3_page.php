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
                           <li><a href="cart.php"><span style="padding-left: 700px;vertical-align: middle" class="glyphicon glyphicon-shopping-cart"></span> KUNDVAGN</a></li>
                           <li><a href="logout.php"><span style="padding-left: 700px;vertical-align: middle" class="glyphicon glyphicon-log-out"></span> LOGGA UT</a></li>
                           
                           <?php
                           }else{
                            ?>
                            <li><a href="signup.php"  style="padding-left: 700px;vertical-align: middle"  >SKAPA KONTO<span class="glyphicon glyphicon-user"></span> </a></li>
                           <li><a href="login.php" style="padding-left: 700px;vertical-align: middle"  >LOGGA IN <span class="glyphicon glyphicon-log-in"></span> </a></li>
                           <?php
                           }
                           ?>
                           
                       </ul>
                   </div>
               </div>
</nav>


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

            <div class="container">
                <div class="row">

                <br><br><br>


                <?php      
                                                        $filename = basename($_SERVER['REQUEST_URI'], '?'.$_SERVER['QUERY_STRING']);
                                                        $pagenumber = substr($filename,7,1); // big brain to get the specific pagenumber
                                                        $queryReview = "SELECT * FROM products WHERE id = $pagenumber";
                                                      
                                                      if ($result = $con->query($queryReview)) {
                      
                                                      /* fetch associative array */
                                                         while ($row = $result->fetch_assoc()) {  // Will only be one row but it will work for us....
                                                          
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
         <br>
         <h2 class="entry-title"><a style="right: 100px;" href= <?php echo $page; ?> rel="bookmark"><?php echo $name; ?> </a></h2>
         </header>
         </article>


         <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <center>
                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
												<p class="price">
													<span class="amount">Pris:   <?php echo $pricetag; ?>  Kr </span> <!-- Länk från databas!!!!-->
												
												<p class="percentage">
													<span class="percentage">Procenthalt: <?php echo $percentage; ?> % </span> <!-- Länk från databas!!!!-->
												</p>
												<p class="quantity">
													<span class="quantity">Lagersaldo:  <?php echo $stockAmount; ?>  st </span> <!-- Länk från databas!!!!-->
												</p>
                                                <p class="quantity">
													<span class="quantity"> Färg: <?php echo $color; ?>  </span> <!-- Länk från databas!!!!-->
												</p>

											</div>
                                                                <br>
                                    <!-- Cart handler -->
                                    <?php if(!isset($_SESSION['email'])){  ?>
                                        <p><a href="login.php" role="button" class="btn btn-primary btn-block">Köp nu!! (logga in)</a></p>
                                        <?php
                                        }
                                        else{
                                            if(check_if_added_to_cart($id)){
                                                echo '<a href="#" class=btn btn-block btn-success disabled>Added to cart</a>';
                                            }else{
                                                $stringID = (string)$id;
                                                $addCart= "cart_add.php?id=".$stringID;
                                                ?>
                                                <a href=<?php echo $addCart; ?> class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Lägg till i kundvagn</a>
                                                <?php
                                            }
                                        }
                                        ?>
                                    
                                </div>
                            </center>
                        </div>
                    </div>
                            <?php
                                                         
                                                                 }
                                                       
                         }
                         ?>



</div>
            </div>
            <br>

            <div class="panel entry-content wc-tab" id="tab-reviews">
												<div id="reviews">
													<div id="comments">
														<h2>Omdömen för produkten:</h2>
														<ol class="commentlist">
                                                         <?php      
														$hello = 'Jägermeister';
                                                        $queryReview = "SELECT * FROM review WHERE Product = 'Underberg'";
                                                        if ($result = $con->query($queryReview)) {
                                                        ?>    <?php
                                                        while ($row = $result->fetch_assoc()) {
                                                        $name = $row["Name"];
                                                        $rating = $row["Rating"]; 
                                                        $text = $row["Review_text"];
                                                        ?> 
                                                       <section>
                                                        <div class="container">
                                                        <div class="row">
                                                             <div class="col-sm-5 col-md-6 col-12 pb-4">
                                                                    <h4><?php echo $name ?></h4> <span>Betyg:<?php echo $rating ?> </span> <br>
                                                                    <p><?php echo $text ?> </p>
                                                                    <p style="border:3px; border-style:solid; padding: 0.001em;">
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                        <?php
                                                        
                                                                }           
                        }
                        ?>

</ol>
													</div>
													<div class="clear">
													</div>

            <footer id="colophon" class="site-footer">
		<div class="container">
			<div class="site-info">
				 <a target="blank" >&copy; LTU-projekt 2021</a>
			</div>
		</div>	
		</footer>
        </div>
        <script src='bootstrap/js/jquery.js'></script>
	<script src='bootstrap/js/plugins.js'></script>
	<script src='bootstrap/js/scripts.js'></script>
	<script src='bootstrap/js/masonry.pkgd.min.js'></script>
    </body>
</html>
