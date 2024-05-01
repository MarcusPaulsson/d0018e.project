<?php



if (isset($_SERVER['REQUEST_METHOD']) == 'POST'   ) {

    if (isset($_POST['email']) && isset($_POST['pass']))   {

        $host="utbweb.its.ltu.se";
        $user="19990310";
        $password="19990310";
        $db="db19990310";


        //include 'db_connect.php';



        $conn = mysqli_connect($host,$user,$password);
        mysqli_select_db($conn, $db);
        
            $email=$_POST['email'];
            $pass=$_POST['pass'];
            
            $sql="SELECT * FROM customer WHERE Email= '$email' AND Password='$pass'";
            
            $result=mysqli_query($conn, $sql);
            $num= mysqli_num_rows($result);
            if($num==1){
                echo '<script>alert("Login Successful!");
                window.location.href = "index.php";</script>';
                session_start();
                $_SESSION['loggedin']  = true;
                $_SESSION['email'] = $email;
            }
            else{
                echo '<script>alert("Sorry! We could not find your Account.");
                window.location.href = "login.html";</script>';
                exit();
            }
                
        

    }
    else{echo "all fields are required!!!!";}

}
else {echo "submit button never pressed?";}
?>