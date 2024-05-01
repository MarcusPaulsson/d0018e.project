<?php

if (isset($_POST['name'])) {
    if (isset($_POST['surname']) && isset($_POST['email']) &&
        isset($_POST['password']) && 
        isset($_POST['address']) && isset($_POST['phone'])) {
           

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $dummy = 1;

$link = mysqli_connect("utbweb.its.ltu.se", "19990310", "19990310", "db19990310");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "INSERT INTO customer ( Name, Surname, Phone, Address, Email, Password) VALUES ( '$name', '$surname', '$phone', '$address', '$email', '$password')";
$Select = "SELECT email FROM customer WHERE Email = ? LIMIT 1";
$stmt = $link->prepare($Select);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($resultEmail);
$stmt->store_result();
$stmt->fetch();
$rnum = $stmt->num_rows;
if ($rnum == 0) {
    $stmt->close();
if(mysqli_query($link, $sql)){
    echo "Account successfully created :)";
} 

    else{echo  'Email allready registered an account';}

    
    }
    
mysqli_close($link);
        }
        else{echo "all fields are required!!!!";}

    }

    else {echo "submit button never pressed?";}
?>