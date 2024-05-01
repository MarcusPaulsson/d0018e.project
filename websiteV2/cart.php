
<?php
    session_start();
    $con=mysqli_connect("utbweb.its.ltu.se", "19990310", "19990310", "db19990310") or die(mysqli_error($con));
    if(!isset($_SESSION['email'])){
        header('location: login.php');
    }
    $user_id=$_SESSION['id'];
    $user_products_query="select it.id,it.name,it.Pricetag from cart_data cart inner join products it on it.id=cart.item_id where cart.user_id='$user_id'";
    $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
    $no_of_user_products= mysqli_num_rows($user_products_result);
    $sum=0;
    if($no_of_user_products==0){
    ?>
        <script>
        window.alert("Inga produkter finns i kundvagnen.");
        </script>
        
    <?php
    }
    
    else{
        while($row=mysqli_fetch_array($user_products_result)){
            $sum=$sum+$row['Pricetag']; 
       }
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
    
    
    
            <h1  > <a href="index.php" > Spritbolaget 	</h1>  <!--  TITEL!!-->
    
            <nav class="navbar navbar-inverse navabar-fixed-top">
                   <div class="container">
                       <div class="navbar-header">
                           
                               <span class="icon-bar"></span>
                               <span class="icon-bar"></span>
                               <span class="icon-bar"></span>
                        
                    
                       </div>
                       
                       <div class="collapse navbar-collapse" id="myNavbar">
                           <ul class="nav navbar-nav navbar-right">
                               <?php
                               if(isset($_SESSION['email'])){
                               ?>
                               <a href="cart.php"><span style="padding-left: 700px;vertical-align: middle" class="glyphicon glyphicon-shopping-cart"></span> KUNDVAGN</a>
                               <a href="logout.php"><span style="padding-left: 700px;vertical-align: middle" class="glyphicon glyphicon-log-out"></span> LOGGA UT</a>
                               <?php
                               }else{
                                ?>
                                <a href="signup.php"  style="padding-left: 700px;vertical-align: middle"  >SKAPA KONTO<span class="glyphicon glyphicon-user"></span> </a>
                                <a href="login.php" style="padding-left: 700px;vertical-align: middle"  >LOGGA IN <span class="glyphicon glyphicon-log-in"></span> </a>
                               <?php
                               }
                               ?>
                               
                           </ul>
                       </div>
                   </div>
    </nav>
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

            <br><br>
            <h2>KUNDVAGN</h2>  
           
			<div class="panel-body pre-scrollable">
				<table class="table">
					<thead>
                                <td style="max-width: 100px;">
								<center>Bild</center>
                                <td style="max-width: 100px;">
								<center>Produkt (lagersaldo)</center>
                                <td style="max-width: 100px;">
								<center>Antal</center>
                                <td style="max-width: 100px;">
								<center>Pris</center> 
                
					</thead>         
                    <?php 
                        $customerQuery="select it.id,it.name,it.Pricetag from cart_data cart inner join products it on it.id=cart.item_id where cart.user_id='$user_id'";
                        $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
                        
                        $counter=1;
                        
                       ?> <form class="wpcf7" method="POST" action="success.php?id=<?php echo $user_id?>" id="contactform"> <?php
                       $n =-1;
                       while($row=mysqli_fetch_array($user_products_result)){ 
                            $productID = $row['id'];
                            $queryProductInfo= "SELECT * FROM products WHERE id = $productID";  
                            $product_query=mysqli_query($con,$queryProductInfo) or die(mysqli_error($con)); 
                            $curProduct = $product_query->fetch_assoc();                          
                            $productName = $curProduct["name"];
                            $stockAmount = $curProduct["stock_quantity"]; 
                            $percentage = $curProduct["Percentage"]; 
                            $pictureURL = $curProduct["picture"]; 
                            $pricetag = $curProduct["Pricetag"]; 
                            $counter = 0;
                            $n=$n+1;

                         ?>
                    <tbody>
						<!-- typ printa för varje sorts produkt som finns i korgen? "$products" är det specifika produktnumret, alltså loopar den igenom alla tänkbara produkter man kan köpa? Kan detta funka???-->
						<tr> 
                        
						        <td style="max-width: 100px;">
								<center><img src=<?php echo $pictureURL; ?> alt = "" onerror='this.src = "pictures/no.png"' height="96px" width="130px"></img></center>
                                
                                <td style="max-width: 110px;">
								<center><?php echo $productName; ?> (<?php echo $stockAmount; ?>st i lager)</center>
                                
                                <td style="max-width: 110px;">
								<center><div class="form">
					            <input type="number" name="amount<?php echo $n ?>" size="3" min="1" max= 1000    <?php //echo $stockAmount; ?> value="1" />  st
                                <a href='cart_remove.php?id=<?php echo $productID ?>'><img src = "pictures/bin.png"' height="10px" width="20px"></img></a> </center> </div>        
                               
                                <td style="max-width: 100px;">
								<center><?php echo $pricetag; ?> Kr(styck) </center>              
                       </tr> 	
				</tbody>
                        <br>       
                <?php 
              
            }?>
				</table>
			</div>

			<div class="panel-footer">

				<td> <br/> </td>
				
					<div class="wpcf7">
						<td>  <input type="submit" value="Köp!" name="submit"></td>
                        
					</div>
				</form>


                <?php 
                                
                            ?>
				<td> <br /> </td>

			</div>

			<div id="secondary" class="column third">
				<div id="sidebar-1" class="widget-area" role="complementary">

				</div>
				
			</div>
		
		</div>
	
	</div>
	
    <br><br><br> <br><br><br><br><br>
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
