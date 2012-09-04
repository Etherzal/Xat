<?php
    // Start the session and check if the session is valid.
    session_start();
    if ($_SESSION['valid']):
        // Its correct, so load the chat
        include 'classes/listof.php';
        $listOf = new getListOf();
        $nUsers = count($listOf->users());
        $i = 0;
        $usersList = "";
        while ($i<$nUsers){
            $usersList .= "<li>".$listOf->users()[$i]."</li>";
            $i++;
        }
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
        <a href="https://github.com/Sirikon/Xat" target="_blank"><img style="position: absolute; top: 0; left: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_left_red_aa0000.png" alt="Fork me on GitHub"></a>
        <div id="wrapper">
            <div id="header"><h1>Xat</h1><div id="desc"> - A Chat project by Sirikon</div></div>
            <div id="usersBox">
                Bienvenido <span id="username"><?php echo $_SESSION['uname'] ?></span>
                <?php echo $usersList ?>
            </div>
            <div id="chats">
                <div id="chatList">
                    
                </div>
                <div id="frameChat">
                    
                </div>
                <div id="writeZone">
                    <input type="text" id="write"><button id="send">Send</button>
                </div>
            </div>
        </div>
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