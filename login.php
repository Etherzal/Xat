<?php
    // Include the class for auth
    include 'classes/authsys.php';
    // Start the session
    session_start();
    // Create a new aus (AuthSystem)
    $aus = new aus();
    // Check if the password is correct
    if($aus->cLogin($_POST['u'], $_POST['p'])){
        // Correct
        $_SESSION['uname'] = $_POST['u'];
        $_SESSION['valid'] = true;
        header("Location: index.php");
    }else{
        // Incorrect
        header("Location: login.html");
    }
?>