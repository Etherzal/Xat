<?php
    // Start the session and check if the session is valid.
    session_start();
    if ($_SESSION['valid']):
        // Its correct, so load the chat
?>
<html>
    <head>
        <title>Xat</title>
        <script src="js/jquery-1.8.0.min.js"></script>
        <script src="js/my.js"></script>
        <link href="css/normalize.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <div id="chatbox">
            --- The chat will appear here
        </div>
        <input type="text" id="write"><button id="send">Send</button>
    </body>
</html>
<?php
    endif;
    if (!($_SESSION['valid'])){
        // If the session isnt initialized or no valid
        unset($_SESSION['uname']);
        unset($_SESSION['valid']);
        header("Location: login.html");
    }
?>