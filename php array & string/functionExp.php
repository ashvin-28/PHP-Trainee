<?php
// strict type function
// declare(strict_types=1);
// function sum(int $a, int $b) {
//   return $a + $b;
// }

// // Throws a fatal error because '5' is a string instead of a number
// echo sum("5", 1);

// pass by refrence function
function add_number(&$num){
        $num=$num+5;
}
$num=2;
echo $num. "<br>";
add_number($num);
echo $num . "<br>";
// echo "<br>";

// variable number of argument function
function sumMyNumber(...$x){
    $n=0;
    for($i=0;$i<count($x);$i++){
        $n+=$x[$i];
    }
    return $n;

}
$x=sumMyNumber(1,2,3,4,5);
echo $x;
?>
