<?php
    $con=mysqli_connect("utbweb.its.ltu.se", "19990310", "19990310", "db19990310") or die(mysqli_error($con));
    session_start();
    $name= mysqli_real_escape_string($con,$_POST['name']);
    $surname= mysqli_real_escape_string($con,$_POST['surname']);
    $salary= mysqli_real_escape_string($con,$_POST['salary']);
    $phone= mysqli_real_escape_string($con,$_POST['phone']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password=(mysqli_real_escape_string($con,$_POST['password']));
    
    $duplicate_user_query="select Employee_id from employee where email='$email'";
    $duplicate_user_result=mysqli_query($con,$duplicate_user_query) or die(mysqli_error($con));
    $rows_fetched=mysqli_num_rows($duplicate_user_result);
    if($rows_fetched>0){
       
        ?>
        <script>
            window.alert("En administratör har redan denna mailadress!");
        </script>
        <meta http-equiv="refresh" content="1;url=adminpage.php" />
        <?php
    }else{
      
        $user_registration_query="insert into employee(Name,Surname,Salary,Phone,Email,Password) values ('$name','$surname','$salary','$phone','$email','$password')";
        
        $user_registration_result=mysqli_query($con,$user_registration_query) or die(mysqli_error($con));
        ?>
        <script>
            window.alert("Ny adminstratör tillagd!");
        </script>
        <meta http-equiv="refresh" content="3;url=adminpage.php" />
        <?php
       
        ?>
        
        <?php
    }
    
?>