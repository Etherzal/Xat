<?php
    class aus {
        function cLogin ($_user, $_pass) {
            // Database connection
            $con = mysql_connect("localhost", "root", "vivagoogle");
            // Select the database of Xat
            mysql_select_db("xatdb", $con);
            // Query for obtain the pass and sal of the user
            $query = "SELECT pass, sal FROM users WHERE user = '".$_user."'";
            // Send the query
            $result = mysql_query($query, $con) or die(mysql_error());
            // Fetch the result to an array
            $data = mysql_fetch_array($result);
            // Check if the password (with md5 and the sal( its correct
            if (md5($data[1]."_".$_pass) == $data[0]){
                // Correct
                return true;
            }else{
                // Incorrect
                return false;
            }
        }
        function signin ($_user, $_pass) {
            // Generate a random string for the sal
            $n = 10;
            $char= "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
            srand((double)microtime()*1000000);
            for($i=0; $i<$n; $i++) {
                $rand.= $char[rand()%strlen($char)];
            }
            $passR = md5($rand."_".$_pass);
            // Database connection
            $con = mysql_connect("localhost", "root", "vivagoogle");
            // Select the database of Xat
            mysql_select_db("xatdb", $con);
            // Query for obtain the pass and sal of the user
            $query = "insert into users values ('".$_user."','".$passR."','".$rand."')";
            // Send the query
            mysql_query($query, $con) or die(mysql_error());
        }
    }
?>