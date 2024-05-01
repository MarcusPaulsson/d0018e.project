<?php


if (isset($_POST['submit'])) {

   
    if (isset($_POST['email']) && isset($_POST['surname']))   {
        $host="utbweb.its.ltu.se";
        $user="19990310";
        $password="19990310";
        $db="db19990310";
        //ob_start();
       // session_start();
        $conn = mysqli_connect($host,$user,$password);
        mysqli_select_db($conn, $db);
        
            $email=$_POST['email'];
            $pass=$_POST['surname'];
            
            $sql="SELECT * FROM Employee WHERE Email='".$email."'AND Password='".$pass."' limit 1";
            
            $result=mysqli_query($conn, $sql);
           
            
            if(mysqli_num_rows($result) == 0){
                echo " You Have Successfully Logged in :)))";
              //  $_SESSION['valid'] = true;
              //  $_SESSION['timeout'] = time();
               // $_SESSION['username'] = 'email';
               // header('Refresh: 2; URL = admin.html');
                exit();
            }
            else{
                echo " You have entered incorrect email or password :(";
                exit();
            }
                
    }
    else{echo "all fields are required!!!!";}

}
else {echo "submit button never pressed?";}
?>