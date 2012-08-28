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
        <div id="wrapper">
            <div id="usersBox">
                <?php echo $usersList ?>
            </div>
            <div id="chats">
                <div id="chatList">
                    <span>Sirikon</span><span>Peter</span>
                </div>
                <div id="frameChat">
                    <div id="Sirikon" class="chatbox">Aqui Sirikon</div>
                    <div id="Peter" class="chatbox">Aqui Peter</div>
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