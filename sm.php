<?php
    set_time_limit(10); // Time limit 10 seconds
    session_start(); // Start the session
    $user = $_SESSION['uname']; // Get the username
    $dataArray = array("msg"=>$_GET['m'], "user"=>$user);
    file_put_contents("sandbox/".$_GET['u'], json_encode($dataArray).",", FILE_APPEND); // Put the message with the username of de sender.
?>