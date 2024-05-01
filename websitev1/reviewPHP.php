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

$sql = "INSERT INTO review ( Product, Rating, Review_text, Name, Email) VALUES ('$product', '$rating', '$comment', '$name', '$email')";
$Select = "SELECT email FROM register WHERE email = ? LIMIT 1";
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
        echo "Review inserted successfully! :)";
} 
    else if( mysqli_error($link) == "Duplicate entry '$email' for key 'PRIMARY'") { // ghetto check if the primary email allready has been registered....
        echo "Email allready posted comment!";
}

else{

    echo mysqli_error($link) ;
    echo "...   Submit all fields correctly!!!";
}
    }
mysqli_close($link);
        }
        else{echo "all fields are required!!!!";}

    }

    else {echo "submit button never pressed?";}
?>