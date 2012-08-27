<?php
    include 'classes/authsys.php';
    $aus = new aus();
    $aus->signin($_POST['u'], $_POST['p']);
    header("Location: index.php")
?>
