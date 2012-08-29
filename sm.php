<?php
    set_time_limit(10); // Time limit 10 seconds
    session_start(); // Start the session
    $arrayData = explode("|",$_GET['m']); //Divide the destination and the message
    $user = $_SESSION['uname']; // Get the username
    file_put_contents("sandbox/".$arrayData[0], $user."|".$arrayData[1]); // Put the message with the username of de sender.
?>