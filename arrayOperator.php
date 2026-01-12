<?php
  $a=[1,2,3,4];
  $b=[5,6,4,3];
  print_r($a+$b);
  echo "<br>";
  $x = array("a" => "red", "b" => "blue");  
  $y = array("c" => "blue", "d" => "yellow");
  print_r($x + $y);
  echo "<br>";     
  var_dump($x==$y);
  echo "<br>";

$x2 = array("a" => "red", "b" => "green");  
$y2 = array("c" => "red", "d" => "grren");  
var_dump($x2 != $y2);
echo "<br>";
var_dump($x2<>$y2);
?>