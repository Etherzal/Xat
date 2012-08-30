<?php
    class aus {
        function cLogin ($_user, $_pass) {
            include 'mysql.php'; // Database connection and select the database
            $query = "SELECT pass, sal FROM users WHERE user = '".$_user."'"; // Query for obtain the pass and sal of the user
            $result = mysql_query($query, $con) or die(mysql_error()); // Send the query
            $data = mysql_fetch_array($result); // Fetch the result to an array
            if (md5($data[1]."_".$_pass) == $data[0]){ // Check if the password (with md5 and the sal) its correct
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
            $rand = "";
            for($i=0; $i<$n; $i++) {
                $rand.= $char[rand()%strlen($char)];
            }
            $passR = md5($rand."_".$_pass);
            include 'mysql.php'; // Database connection and select the database
            $query = "insert into users values ('".$_user."','".$passR."','".$rand."')"; // Query for obtain the pass and sal of the user
            mysql_query($query, $con) or die(mysql_error()); // Send the query
            fopen('sandbox/'.$_user,'w+');
        }
    }
?>