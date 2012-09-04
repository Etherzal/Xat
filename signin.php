<?php
    include 'classes/authsys.php'; //Include the auth system
    $aus = new aus(); //And create a new var
    $aus->signin($_POST['u'], $_POST['p']); // Use it for register
    header("Location: index.php#ss") // Redirect
?>