<?php

if (isset($_POST['submit'])) {
    if (isset($_POST['name']) && isset($_POST['email']) &&
        isset($_POST['product']) && 
        isset($_POST['rating']) && isset($_POST['comment'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $product = $_POST['product'];
        $email = $_POST['email'];
        $rating = $_POST['rating'];
        $comment = $_POST['comment'];

$link = mysqli_connect("utbweb.its.ltu.se", "19990310", "19990310", "db19990310");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "INSERT INTO review( Product, Rating, Review_text, Name, Email) VALUES ('$product', '$rating', '$comment', '$name', '$email')";
  
mysqli_query($link, $sql);  
echo '<script>window.alert("Omdöme tillagd!!")</script>';
header('Refresh:0 ; URL=index.php'); 

mysqli_close($link);
        }
        else{echo "all fields are required!!!!";}
    } else {echo "submit button never pressed?";}
?>