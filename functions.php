<?php 

function set_cookie($name, $value, $length){
    setcookie($name, $value, $length, "/");
}

?>