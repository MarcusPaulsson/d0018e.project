<?php
    $con=mysqli_connect("utbweb.its.ltu.se", "19990310", "19990310", "db19990310") or die(mysqli_error($con));
    session_start();
    $name= mysqli_real_escape_string($con,$_POST['name']);
    $stock= mysqli_real_escape_string($con,$_POST['stock']);
    $percentage= mysqli_real_escape_string($con,$_POST['percentage']);
    $color= mysqli_real_escape_string($con,$_POST['color']);
    $picture=mysqli_real_escape_string($con,$_POST['picture']);
    $pricetag=(mysqli_real_escape_string($con,$_POST['pricetag']));
    $description=(mysqli_real_escape_string($con,$_POST['description']));
    
    $duplicate_product_query="select name from products where name='$name'";
    $duplicate_product_result=mysqli_query($con,$duplicate_product_query) or die(mysqli_error($con));
    $rows_fetched=mysqli_num_rows($duplicate_product_result);
    if($rows_fetched>0){
       
        ?>
        <script>
            window.alert("Denna produkt finns redan i sortimentet!");
        </script>
        <meta http-equiv="refresh" content="1;url=adminpage.php" />
        <?php
    }else{
      
        $product_registration_query="insert into products(name,stock_quantity,Percentage,Color,picture,Pricetag, Description) values ('$name','$stock','$percentage','$color','$picture','$pricetag','$description')";
        
        $product_registration_result=mysqli_query($con,$product_registration_query) or die(mysqli_error($con));
        ?>
        <script>
            window.alert("Ny Product tillagd!");
        </script>
        <meta http-equiv="refresh" content="1;url=adminpage.php" />
        <?php
       
        ?>
        
        <?php
    }
    
?>