<?php
    set_time_limit(10);
    session_start();
    $arrayData = explode("|",$_GET['m']);
    $user = $_SESSION['uname'];
    file_put_contents("sandbox/".$arrayData[0], $user."|".$arrayData[1]);
?>