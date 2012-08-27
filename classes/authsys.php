<?php
    class aus {
        var $path;
        var $user;
        var $key;
        function cLogin ($_user, $_pass) {
            $con = mysql_connect("localhost", "root", "vivagoogle");
            mysql_select_db("xatdb", $con);
            $query = "SELECT pass, sal FROM users WHERE user = '".$_user."'";
            $result = mysql_query($query, $con) or die(mysql_error());
            $data = mysql_fetch_array($result);
            if (md5($data[1].$_pass) == $data[0]){
                return true;
            }else{
                return false;
            }
        }
    }
?>
