<?php
session_start();
if(!isset($_SESSION["userName"]) && !isset($_SESSION["age"])){
    echo "session value not exist";
}
else{
    echo 'username is ' .$_SESSION["userName"] . ' & age is '. $_SESSION["age"];
    }

?>
<a href="deleteSession.php">Delete Session Value</a>
