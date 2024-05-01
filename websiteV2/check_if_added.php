<?php
    
    function check_if_added_to_cart($item_id){  
        $con=mysqli_connect("utbweb.its.ltu.se", "19990310", "19990310", "db19990310") or die(mysqli_error($con));
        $user_id=$_SESSION['id'];
        $product_check_query="select * from cart_data where item_id='$item_id' and user_id='$user_id' and status='Added to cart'";
        $product_check_result=mysqli_query($con,$product_check_query) or die(mysqli_error($con));
        $num_rows=mysqli_num_rows($product_check_result);
        if($num_rows>=1){
            return 1;}
        return 0;
    }
?>