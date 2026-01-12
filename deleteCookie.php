<?php
 setcookie("user","",time()-(86400*30), "/");
 unset($_COOKIE["user"]);
 //  header("Location:cookieExp.php");
//  exit();
?>
<a href="cookieExp.php">Go to cookie page</a>