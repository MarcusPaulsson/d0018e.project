<!php 
include 'db_connect.php';
session_start();
>
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



			<h1  >Spritbolaget 	</h1>  <!--  TITEL!!-->
			<a  href="login.html" style="padding-left: 700px;vertical-align: middle" >LOGGA IN </a>    <!--  logga in!-->
			<a href="create_account.html" style="padding-left: 700px;vertical-align: middle"  >SKAPA KONTO</a>  <!--  skapa konto!-->
			<div class="menu-menu-1-container">
				
	
		</div>
		<nav id="site-navigation" class="main-navigation">
		<button class="menu-toggle">Menu</button>
		<a class="skip-link screen-reader-text" href="#content" style="padding-left: 700px;vertical-align: middle" >Skip to content</a>
		<div class="menu-menu-1-container">
			<ul id="menu-menu-1" class="menu">
				
				<li><a href="index.php">HEM</a></li>						<!--  TITELKATEGORIER!!-->
				<li><a href="allproducts.html">ALLA PRODUKTER</a></li>
				<li><a href="review.html">OMDÖMEN</a></li>
				<li><a href="cart.html">KUNDVAGN</a></li>
			</ul>
		</div>
		</nav>
		</header>
		<!-- #masthead -->
		<div id="content" class="site-content">
			<div id="primary" class="content-area column full">
				<main id="main" class="site-main">
				<div class="grid portfoliogrid">
				
					<article class="hentry">
					<header class="entry-header">
					<div class="entry-thumbnail">
						<a href="product1_page.html"><img src="pictures/jäger.png"  rnd=38062 width="400" height="200" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="p1"/></a>
					</div>
					<h2 class="entry-title"><a href="product1_page.html" rel="bookmark">Jägermeister</a></h2>
					<a class='portfoliotype' >Starksprit</a> <!-- Lägg in länk till underkategorier om möjligt -->
					<a class='portfoliotype' >Bitter</a><!-- Lägg in länk till underkategorier om möjligt -->
					</header>
					</article>
					
					<article class="hentry">
					<header class="entry-header">
					<div class="entry-thumbnail">
						<a href="product2_page.html"><img src="pictures/tequila.png" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="p1"/></a>
					</div>
					<h2 class="entry-title"><a href="product2_page.html" rel="bookmark">Tequila</a></h2>
					<a class='portfoliotype'>Starksprit</a><!-- Lägg in länk till underkategorier om möjligt -->
					<a class='portfoliotype' >Mexico</a><!-- Lägg in länk till underkategorier om möjligt -->
					</header>
					</article>
					
					<article class="hentry">
					<header class="entry-header">
					<div class="entry-thumbnail">
						<a href="product3_page.html"><img src="pictures/underberg.png" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="p1"/></a>
					</div>
					<h2 class="entry-title"><a href="product3_page.html" rel="bookmark">Underberg</a></h2>
					<a class='portfoliotype' >Starksprit</a><!-- Lägg in länk till underkategorier om möjligt -->
					<a class='portfoliotype' >Bitter</a><!-- Lägg in länk till underkategorier om möjligt -->
					</header>
					</article>
					
					<article class="hentry">
					<header class="entry-header">
					<div class="entry-thumbnail">
						<a href="product4_page.html"><img src="pictures/vodka.png" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="p1"/></a>
					</div>
					<h2 class="entry-title"><a href="product4_page.html" rel="bookmark">Vodka</a></h2>
					<a class='portfoliotype' >Starksprit</a><!-- Lägg in länk till underkategorier om möjligt -->
					<a class='portfoliotype' >Renat Brännvin</a><!-- Lägg in länk till underkategorier om möjligt -->
					</header>
					</article>
					
					<article class="hentry">
					<header class="entry-header">
					<div class="entry-thumbnail">
						<a href="product5_page.html"><img src="pictures/whiskey.png" width="400" height="200" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="p1"/></a>
					</div>
					<h2 class="entry-title"><a href="product5_page.html" rel="bookmark">Whiskey</a></h2>
					<a class='portfoliotype' >Starksprit</a><!-- Lägg in länk till underkategorier om möjligt -->
					<a class='portfoliotype' >Whiskey</a><!-- Lägg in länk till underkategorier om möjligt -->
					</header>
					</article>
					
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