<?php
class getListOf {
    function users(){
        $con = mysql_connect("localhost", "root", "vivagoogle");
        // Select the database of Xat
        mysql_select_db("xatdb", $con);
        // Query for obtain the pass and sal of the user
        $query = "SELECT user FROM users";
        // Send the query
        $result = mysql_query($query, $con) or die(mysql_error());
        // Fetch the result to an array
        while ($row = mysql_fetch_assoc($result)) {
            $array[] = $row['user'];
        }
        return $array;
    }
}
?>
