<?php
    include 'classes/authsys.php'; //Include the auth system
    $aus = new aus(); //And create a new var
    if($aus->signin($_POST['u'], $_POST['p'])){
        header("Location: index.php#ss");
    }else{
        header("Location: index.php#fail");
    }
?>