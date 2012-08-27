<?php
set_time_limit(0);
while (file_get_contents("sandbox/c") == ""){};
echo (file_get_contents("sandbox/c"));
file_put_contents("sandbox/c", "");
?>