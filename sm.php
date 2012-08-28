<?php
    session_start();
    $array = explode("|",$_GET['m']);
    $user = $_SESSION['uname'];
    file_put_contents("sandbox/".$array[0], $user."|".$array[1]);
?>