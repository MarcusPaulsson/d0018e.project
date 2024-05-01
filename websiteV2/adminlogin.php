<?php
    $con=mysqli_connect("utbweb.its.ltu.se", "19990310", "19990310", "db19990310") or die(mysqli_error($con));
    session_start();
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
			<h1 href="index.php" rel="home">Spritbolaget Administratör</a></h1>
            <a href="signup.php" style="padding-left: 700px;vertical-align: middle"  >SKAPA KONTO</a>  <!--  skapa konto!-->
            <a  href="login.php" style="padding-left: 700px;vertical-align: middle" >LOGGA IN </a>    <!--  logga in!-->
			<div class="menu-menu-1-container">
		</div>
		
		</nav>
		</header>
            <br><br><br><br><br>
           
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                            <h1 class="entry-title"><a  href="login.php" >TILLBAKA? </a>       </h1>
                            </div>
                            <br>
                            <div class="panel-body">
                                <form class="wpcf7" method="post" action="loginadmin_submit.php" id="contactform">
                                    <div class="form-group">

                                        <input type="text" class="form-control" name="employ_email" placeholder="Email*" >
                                        
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password*" >
                                       
                                    </div>
                                    <div class="form-group">
                                    <br>
                                        <input type="submit" value="Logga in" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
          
           <br><br><br><br><br><br><br><br><br><br>
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
