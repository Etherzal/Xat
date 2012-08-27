<?php
    include 'classes/authsys.php';
    session_start();
    $aus = new aus();
    if($aus->cLogin($_POST['u'], $_POST['p'])){
        $_SESSION['uname'] = $_POST['u'];
        $_SESSION['valid'] = true;
        header("Location: index.php");
    }else{
        header("Location: login.html");
    }
?>