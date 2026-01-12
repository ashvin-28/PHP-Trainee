<?php
 function printNumber(iterable $numberValue){
      foreach($numberValue as $value)
      {
        echo $value . "<br>";
      }
}
$numberArray=[1,2,3,4,5];
printNumber($numberArray);
echo "<br>";


function getIterable():iterable{
    return ["A","B","C"];
}
// var_dump(getIterable());
$iterable=getIterable();

var_dump($iterable);
foreach ($iterable as  $value) {
   echo $value. "<br>";
} 