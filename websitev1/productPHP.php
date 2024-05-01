<?php

$link = mysqli_connect("utbweb.its.ltu.se", "19990310", "19990310", "db19990310"); // connect to the database
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

                                                                                    // Take out information from the database




$sql = "INSERT INTO review (Product_id, Rating, Review_text, Name, Email) VALUES ('$product', '$rating', '$comment', '$name', '$email')";
$Select = "SELECT email FROM register WHERE email = ? LIMIT 1";
$Insert = "INSERT INTO register(username, password, gender, email, phoneCode, phone) values(?, ?, ?, ?, ?, ?)";
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

    echo "all fields are required!!!!";
}
    }
mysqli_close($link);
       
?>