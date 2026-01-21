<?php
$cookieName="user";
$cookieValue="Ashvin Parmar";

if(!isset($_post["create"])){

    setcookie($cookieName,$cookieValue,time()+(86400*30), "/");
}
// $_COOKIE[$cookieName]=$cookieValue;
if(!isset($_COOKIE[$cookieName])){
    echo "Cookie not set";
}
else{
    echo "Cookie name $cookieName is set". "<br>";
    echo "Cookie value is $_COOKIE[$cookieName]"; 
}
echo "<br>";


?>
<form  method="post">
    <button type="submit" name="create">Create Cookie</button>
</form>
<a href="deleteCookie.php">Delete Cookie</a>
<br>

<?php




