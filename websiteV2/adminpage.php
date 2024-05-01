<?php
    session_start();
    $con=mysqli_connect("utbweb.its.ltu.se", "19990310", "19990310", "db19990310") or die(mysqli_error($con));
    if(!isset($_SESSION['Email'])){
        header('location: adminlogin.php');
    }
    $user_id=$_SESSION['Employee_id'];
    $user_products_query="select it.id,it.name,it.Pricetag from cart_data cart inner join products it on it.id=cart.item_id where cart.user_id='$user_id'";
    $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
    $no_of_user_products= mysqli_num_rows($user_products_result);
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
    
    
    
            <h1  >  Spritbolagets intranät 	</h1>  <!--  TITEL!!-->
    

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
                               
                        
                         <li><a href="logout.php"><span style="padding-left: 700px;vertical-align: middle" ></span> LOGGA UT</a></li>


                         <nav id="site-navigation" class="main-navigation">
    <button class="menu-toggle">Menu</button>
    <a class="skip-link screen-reader-text" href="#content" style="padding-left: 700px;vertical-align: middle" >Skip to content</a>
    <div class="menu-menu-1-container">
    </div>
    </nav>

                         <br> <br> 
                       
                         <h1>Lägg till ny administratör:</h1>
                         
                         <br>
                         <form method="post" action="admin_registration_script.php"> 
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Namn*" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="surname" placeholder="Efternamn*" required="true" >
                            </div> 
                            <div class="form-group">
                                <input type="number" class="form-control" name="salary" placeholder="Lön*" required="true">
                            </div>
                            <div class="form-group"> 
                                <input type="phone" class="form-control" name="phone" placeholder="Tel. nr*" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Email*" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="password" placeholder="Lösenord*" required="true">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="  Skapa Administratör  ">
                            </div>
                        </form>

                        <br> <br> 


                        <nav id="site-navigation" class="main-navigation">
    <button class="menu-toggle">Menu</button>
    <a class="skip-link screen-reader-text" href="#content" style="padding-left: 700px;vertical-align: middle" >Skip to content</a>
    <div class="menu-menu-1-container">
    </div>
    </nav>
     <br>
            
			<div class="panel-body pre-scrollable">
           
				<table class="table">
                <h1>Placerade ordrar:</h1>  
					<thead>
                                <td style="max-width: 70px;">
								<center>Order ID</center>
                                <td style="max-width: 100px;">
								<center>Kund ID</center>
                                <td style="max-width: 100px;">
								<center>Namn</center> 
                                <td style="max-width: 120px;">
								<center>Adress</center> 
                                <td style="max-width: 100px;">
								<center>E-Post</center> 
                                <td style="max-width: 100px;">
								<center>Produkt</center> 
                                <td style="max-width: 70px;">
								<center>Antal</center> 
                                <td style="max-width: 100px;">
								<center>Totalpris</center> 
					</thead>         
                    <?php 
                        $orderQuery="SELECT * FROM orders";
                        $Order_result=mysqli_query($con,$orderQuery) or die(mysqli_error($con));
                        
                       while($row=mysqli_fetch_array($Order_result)){ 
                              
                                $order_id = $row["id"];
                                $user_id = $row["userid"];
                                $email = $row["email"];
                                $Product_id = $row["Product_id"];
                                $AmountOrdered = $row["AmountOrdered"];
                                $totalprice = $row["totalprice"];
                                $status = $row["status"];
                                $shipping_name = $row["shippingname"];
                                $shipping_address = $row["shippingaddress"];
                                $order_nr = $row["order_nr"];
                                $realProductName = "SELECT name FROM products WHERE id = $Product_id";
                                $productQuery=mysqli_query($con,$realProductName) or die(mysqli_error($con)); 
                                $curProduct = $productQuery->fetch_assoc();
                                ?>

                    <tbody>
						<tr> 
                            
						<td style="max-width: 100px;">
								
								<center><?php echo $order_nr; ?></center>
                                <td style="max-width: 100px;">
                                <center><?php echo $user_id; ?></center>
                                <td style="max-width: 100px;">
                                <center><?php echo $shipping_name; ?></center>
                                <td style="max-width: 100px;">
                                <center><?php echo $shipping_address; ?></center>
                                <td style="max-width: 100px;">
                                <center><?php echo $email; ?></center>
                                <td style="max-width: 100px;">
                                <center><?php echo $curProduct['name']; ?></center>
                                <td style="max-width: 100px;">
                                <center><?php echo $AmountOrdered."st"; ?></center>
                                <td style="max-width: 100px;">
                                <center><?php echo $totalprice."kr"; ?></center>
                                <td style="max-width: 100px;">

                       </tr> 	
				</tbody>
                <?php }?>
				</table>
			</div>

            <br> <br>
            <nav id="site-navigation" class="main-navigation">
    <button class="menu-toggle">Menu</button>
    <a class="skip-link screen-reader-text" href="#content" style="padding-left: 700px;vertical-align: middle" >Skip to content</a>
    <div class="menu-menu-1-container">
    </div>
    </nav>

                       
                       <h1>Registrera en ny produkt:</h1>
                       
                       <br>

                       <form method="post" action="createproduct.php"> 
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Produktnamn*" required="true">
                            </div>
                            <div class="form-group">
                            <input type="number" name="stock" size="1" min="1"  placeholder="Lagersaldo*" required="true" >
                            </div> 
                            <div class="form-group">
                                <input type="number" name="percentage" size="1" min="1"  placeholder="Procenthalt (%)*" required="true"/>
                            </div>
                            <div class="form-group"> 
                                <input type="text" class="form-control" name="color" placeholder="Färg*" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="picture" placeholder="Bildadress*" required="true">
                            </div>
                            <div class="form-group">
                            <input type="number" name="pricetag" size="1" min="1"  placeholder="Pris*" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="description" placeholder="Beskrivning*" required="true">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="       Skapa Produkt!       ">
                            </div>
                        </form>


                           </ul>
                       </div>
                   </div>
                   <br> <br> 
















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
