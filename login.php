<?php
    include 'classes/authsys.php'; // Include the class for auth
    session_start(); // Start the session
    $aus = new aus(); // Create a new aus (AuthSystem)
    if($aus->cLogin($_POST['u'], $_POST['p'])){ // Check if the password is correct
        // Correct
        $_SESSION['uname'] = $_POST['u'];
        $_SESSION['valid'] = true;
        header("Location: /Xat");
    }else{
        // Incorrect
        header("Location: login.html");
    }
?>