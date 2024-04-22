<?php
 $user_agent = $_SERVER['HTTP_USER_AGENT'];
 $a = strpos($user_agent, 'Mobile');
 if($a) {
    echo "mobile";
 }
 else {
    $w = screen.width;
    if $w == '753'{
        echo "besar";
    }

 }
?>