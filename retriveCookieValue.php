<?php
if(!isset($_COOKIE["user"])) {
    echo "Cookie named 'username' is not set!";
}else{

    echo "Cookie value is ". $_COOKIE["user"]; 
}
?>
<a href="deleteCookie.php">Delete Cookie</a>
