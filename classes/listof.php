<?php
class getListOf {
    function users(){
        include 'mysql.php';
        // Select the database of Xat
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