<?php
    $log  = "The IP: ". $_SERVER['REMOTE_ADDR'] ."is logged as visitor on dashboard".PHP_EOL;
            "----------------------------------------------------------------------".PHP_EOL;
//Save string to log, use FILE_APPEND to append.
file_put_contents('./user_log_'.date("m.d.Y").'.log', $log, FILE_APPEND);
?>
