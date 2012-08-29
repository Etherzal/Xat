<?php
    set_time_limit(0);
    session_start();
    $user = $_SESSION['uname'];
    session_write_close();
    while (file_get_contents("sandbox/".$user) == ""){};
    echo (file_get_contents("sandbox/".$user));
    file_put_contents("sandbox/".$user, "");
?>