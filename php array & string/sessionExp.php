<?php
session_start();

$_SESSION["userName"]="Ashvin";
$_SESSION["age"]=21;
echo "username & age are set in session" ."<br>";

echo $_SESSION["userName"] . "<br>";
$_SESSION["userName"]="Ashvin Parmar";
// session_abort();  : abort session without saving changes
echo "After changes session value: " . $_SESSION["userName"] . "<br>";



?>
<a href="retriveSession.php">Retrive Session Value</a>
