<?php
    $con=mysqli_connect("utbweb.its.ltu.se", "19990310", "19990310", "db19990310") or die(mysqli_error($con));
    session_start();
    echo "test";
    $employ_email=mysqli_real_escape_string($con,$_POST['employ_email']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
         ?>
        <!-- <meta http-equiv="refresh" content="2;url=adminlogin.php" /> -->
         <?php
    
    $admin_authentication_query="select Employee_id ,email from employee where Email='$employ_email' and Password='$password'";
    $admin_authentication_result=mysqli_query($con,$admin_authentication_query) or die(mysqli_error($con));
    $rows_fetched=mysqli_num_rows($admin_authentication_result);
    if($rows_fetched==0){
        
        ?>
        <script>
            window.alert("Fel email eller lösenord!");
        </script>
        <meta http-equiv="refresh" content="1;url=adminlogin.php" />
        <?php
    }
    
    
    else{
        $row=mysqli_fetch_array($admin_authentication_result);
        $_SESSION['Email']=$employ_email;
        $_SESSION['Employee_id']=$row['Employee_id']; 
        ?>
        <script>
            window.alert("Welcome!!!");
        </script>

        <?php
        header('location: adminpage.php');


    }
    
 ?>