<?php
    set_time_limit(0); // Time limit 0 and forever wait.
    session_start(); // Start the session
    $user = $_SESSION['uname']; //Get the username
    session_write_close(); // Write close the session
    $chatFile = file_get_contents("sandbox/".$user);
    while ($chatFile == ""){
        $chatFile = file_get_contents("sandbox/".$user);
    }; //Wait until the file isnt empty
    echo("[".trim($chatFile, ',')."]");
    file_put_contents("sandbox/".$user, ""); // Put it empty
?>