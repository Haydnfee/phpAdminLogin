<?php
    require_once('config.php');

    if(isset($_GET['caller_id'])){
        $die = $_GET['caller_id'];
        if($dir == 'logout') {
            logged_out();
        }else {
            echo "Caller ID was passed incorrectly";
        }
    }

?>
