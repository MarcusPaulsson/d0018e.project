





<?php
    session_start();
    $con=mysqli_connect("utbweb.its.ltu.se", "19990310", "19990310", "db19990310") or die(mysqli_error($con));
 
    
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }else{
        $user_id=$_GET['id'];
       
        $transactionStart = "START TRANSACTION";
        $transaction_query = mysqli_query($con, $transactionStart) or die(mysqli_error($con));

        $confirm_query="update cart_data set status='Confirmed' where user_id=$user_id";
        $confirm_query_result=mysqli_query($con,$confirm_query) or die(mysqli_error($con));
        
        $tempQuery="SELECT * FROM cart_data WHERE status='Confirmed' and user_id = $user_id";
        $tempNrOfProducts=mysqli_query($con,$tempQuery) or die(mysqli_error($con));
        $nrRowCount = $tempNrOfProducts->num_rows;
        if($nrRowCount == 0){
            ?>
            
        <script>
            window.alert("Din kundvagn var tyvärr tom");
        </script>
        <meta http-equiv="refresh" content="0;url=cart.php" />
        <?php
        }
        
        $loopCounter = 0;
        $array = array();
        while($nrRowCount > $loopCounter ){

            $test = $_POST['amount'.$loopCounter];
            $array[$loopCounter] = $test;
            $loopCounter=$loopCounter+1;
        }


        // FUNKTION FÖR ATT KOLLA OM NÅGON AV DE BESTÄLLDA PRODUKTERNA HAR FLER ANTAL ÄN RESPEKTIVE 
        // LAGERSALDO, OM NÅGON AV BESTÄLLNINGARNA FELAR TAS ALLA BESTÄLLNINGAR BORT 
        // OCH DU SKICKAS TILLBAKA TILL KUNDVAGNEN.
        $stockCheckCounter = 0;
        $isCheckOK = 1;
        $temp1="SELECT * FROM cart_data WHERE status='Confirmed' and user_id = $user_id";
        $temp1res=mysqli_query($con,$temp1) or die(mysqli_error($con));
        $array2 = array();
        $array3 = array();
        while ($row =$temp1res->fetch_assoc())
        {
            $array2[$stockCheckCounter] = $row['item_id'];
            $omegaTemp = $array2[$stockCheckCounter];
            $tempPro1="SELECT stock_quantity FROM products WHERE id=$omegaTemp";
            $tempProRes=mysqli_query($con,$tempPro1) or die(mysqli_error($con));
            $hahaTemp = $tempProRes->fetch_assoc();
            $CHECKstock =$hahaTemp['stock_quantity'];
            $CHECKcart = $array[$stockCheckCounter];
            echo "StockQuantity for productID".$omegaTemp." ".$CHECKstock."st";
            echo "<br>";
            echo "CartQuantity for productID".$omegaTemp." ".$CHECKcart."st";
            echo "<br>";
            echo "<br>";
            // Jämför om kundvagnen överskriver lagersaldo
            if($CHECKstock < $CHECKcart)
            {
                $isCheckOK = 0;
            }
            $stockCheckCounter=$stockCheckCounter+1;
        }
  
        if($isCheckOK == 0){
            // OM NÅGON AV BESTÄLLNIGNARNA ÖVERSTIGER LAGERSALDO TAS ALLT BORT OCH VI SKICKAS TILL cart.php (med kundvagnen kvar)
            $confirm_query="update cart_data set status='Added to cart' where user_id=$user_id";
            $confirm_query_result=mysqli_query($con,$confirm_query) or die(mysqli_error($con));

            $transactionStart = "COMMIT";
            $transaction_query = mysqli_query($con, $transactionStart) or die(mysqli_error($con));
            ?>
            <script>
            window.alert("Någon mängd av dina produkter överskrider lagersaldo! Sidan kommer uppdateras..");
            </script>
            <meta http-equiv="refresh" content="0;url=cart.php" />
            <?php
        }




    }

    $orderQuery = "SELECT * FROM cart_data WHERE status = 'Confirmed' AND user_id = $user_id";
    $resultOrderQuery = mysqli_query($con,$orderQuery) or die(mysqli_error($con));
    $counterArray = 0;
    $totalOrderPrice=0;
    while ($row = $resultOrderQuery->fetch_assoc()) {
        $user_id = $row["user_id"];
        $item_id = $row["item_id"]; 
        $userQuery = "SELECT * FROM customers WHERE id = $user_id";
        $userQueryResult=mysqli_query($con,$userQuery) or die(mysqli_error($con));
        $userinfo = $userQueryResult->fetch_assoc();
        $userName = $userinfo["name"];  
        $userEmail = $userinfo["email"];
        $userAddress = $userinfo["address"];
        $tempAmount = $array[$counterArray];
        $productPriceQuery = "SELECT * FROM products WHERE id = $item_id";
        $productPriceResult=mysqli_query($con,$productPriceQuery) or die(mysqli_error($con));
        $temp = $productPriceResult->fetch_assoc();
        $productPrice = $temp['Pricetag'];
        $totalOrderPrice=$totalOrderPrice + $productPrice*$tempAmount;
        $orderPrice = $productPrice*$tempAmount;
        $ordernumber = getdate();
        $ordertime = $ordernumber[0];
        
        $insertOrder="INSERT INTO orders(userid,email,Product_id,AmountOrdered,totalprice, status, shippingname, shippingaddress, order_nr) values ('$user_id','$userEmail','$item_id','$tempAmount','$orderPrice','1','$userName','$userAddress', '$ordertime')";
        $insertOrderQuery=mysqli_query($con,$insertOrder) or die(mysqli_error($con));
        $counterArray= $counterArray+1;
        $reset = "delete from cart_data where user_id='$user_id'";
        $confirm_query_result=mysqli_query($con,$reset) or die(mysqli_error($con));


        // Ta bort antalet köpta varor från lagersaldo:
        $currentStockAmount = $temp['stock_quantity'];
        $updatedStockAmount = $currentStockAmount - $tempAmount;
        
        $updateStockQuery = "UPDATE `products` SET `stock_quantity`=$updatedStockAmount WHERE id = $item_id";
        $updateStockResult=mysqli_query($con,$updateStockQuery) or die(mysqli_error($con));



        $transactionStart = "COMMIT";
        $transaction_query = mysqli_query($con, $transactionStart) or die(mysqli_error($con));
    }
?>

<!DOCTYPE html>
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
    
    
    
            <h1  > <a href="index.php" > Spritbolaget  </h1>  <!--  TITEL!!-->
    
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
            <br>
            
            
            <div class="container">
          
            <p style="text-align:center">Jättetack! </p>
                <div class="row">
               
                    <div class="col-xs-6">
                    
                        <div class="panel panel-primary">
                            
                            <div class="panel-body">
                            <p>
                                <p>Grattis! Du har handlat sprit för <?php echo $totalOrderPrice; ?> kr! </p>
                                <p>Produkterna skickas till: <?php echo $userName; ?> på adressen  <?php echo $userAddress; ?></p>

                                <p>Din order är placerad, klicka<a href="products.php"> [HÄR] </a> för att köpa mer!</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <br><br><br><br><br>
            <br><br><br><br><br>
            <br><br><br><br><br>
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
