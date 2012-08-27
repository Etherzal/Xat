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
            if (md5($data[1].$_pass) == $data[0]){
                // Correct
                return true;
            }else{
                // Incorrect
                return false;
            }
        }
    }
?>
