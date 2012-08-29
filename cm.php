<?php
    set_time_limit(0); // Time limit 0 and forever wait.
    session_start(); // Start the session
    $user = $_SESSION['uname']; //Get the username
    session_write_close(); // Write close the session
    while (file_get_contents("sandbox/".$user) == ""){}; //Wait until the file isnt empty
    echo (file_get_contents("sandbox/".$user)); //Then write it for the request
    file_put_contents("sandbox/".$user, ""); // Put it empty
?>