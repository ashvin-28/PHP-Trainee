<?php
  $num=[1,2,3,4,5];
//   array function

// count()
echo "Count number of element: " . count($num);
// array_push()
array_push($num,6,7);
echo "Add element at the end: ";
print_r($num);
echo "<br>";
foreach($num as $n){
    echo $n . " ";
}
echo "<br>";

// array_unshift()
array_unshift($num,-1,0);
echo "Add element begning: ";
print_r($num);
echo "<br>";
foreach($num as $n){
    echo $n . " ";
}
echo "<br>";

// array_pop()
$del= array_pop($num);
echo "popped element $del <br>";
echo "After pop element array: ";
echo "<br>";
foreach($num as $n){
    echo $n . " ";
}
echo "<br>";

// array_shift()

$del2= array_shift($num);
echo "remove first element $del2 <br>";
echo "After remove  element array: ";
echo "<br>";
foreach($num as $n){
    echo $n . " ";
}
echo "<br>";


// array_change_key_case : change keys in upper case or lower case  
$age=array("Ashvin"=>"21","Maulik"=>"21","Krishna"=>"23");
$age2= array_change_key_case($age,CASE_UPPER);
foreach ($age2 as $key => $value) {
    echo $key . "=" . $value . "<br>";
}
echo "<br>";

// array_column : Returns the value from signle column
$a = array(
  array(
    'first_name' => 'Ashvin',
    'last_name' => 'Parmar',
  ),
  array(
    'first_name' => 'Vishv',
    'last_name' => 'Lavingiya',
  ),
  array(
    'first_name' => 'Krisha',
    'last_name' => 'Shah  ',
  )
);

$last_names = array_column($a, 'last_name');
foreach ($last_names as $key => $value) {
    echo $key ."=" .$value . "<br>";
}

// array_combine : create new array  using element from one key and one value
$fname=array("Ashvin","Vishv","Krisha");
$age=array("35","37","43");
$c=array_combine($fname,$age);
print_r($c);
echo "<br>";

// array_count_values : count all the values from array
$a=array("A","B","C","A","D");
print_r(array_count_values($a)); 
echo "<br>";

// array_diff : compare value of two array nd returns  the difference
$a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
$a2=array("e"=>"red","f"=>"green","g"=>"blue" ,"h"=>"pink");
$r=array_diff($a1,$a2);
print_r($r);
echo "<br>";

// array_diff_assoc : compare key value of two array nd returns the difference
$a3=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
$a4=array("a"=>"red","b"=>"green","c"=>"blue");
$r2=array_diff_assoc($a3,$a4);
print_r($r2);
echo "<br>";

// array_diff_uassoc: compare key value of two arrays (using user define function)
function check($a,$b){
     if($a==$b){
      return 0;
     }
     return ($a>$b)?1:-1;
}
$result=array_diff_uassoc($a3,$a4,"check");
print_r($result);
echo "<br>";

// array_fill : fill an array with value
echo "array fill"; 
$a5=array_fill(3,4,"blue");
print_r($a5);
echo "<br>";

// array_fill_keys : fill array with value using specifying keys
$key=array("a","b","c","d");
$a6=array_fill_keys($key,"blue");
print_r($a6);
echo "<br>";

// array_filter : filter value of array using callback function
function even($var)
  {
  return $var%2==0;
  }
  $a7=array(1,2,3,4,4,3,7);
  print_r(array_filter($a7,"even"));
  echo "<br>";


  // array_flip() : flip key theire associated value
  $a8=array("a"=>"red","b"=>"green","c"=>"blue");
  print_r(array_flip($a8));
  echo "<br>";

//   array_search : search key using theire value 
echo array_search("green",$a8);
echo "<br>";

// array_reverse
$a9=array("a"=>"Volvo","b"=>"BMW","c"=>"Toyota");
print_r(array_reverse($a9));
echo "<br>";

// array_slice : returns selected part of array
$a10=array("a"=>"Volvo","b"=>"BMW","c"=>"Toyota");
$a11=array_slice($a10,1);
foreach ($a11 as $key => $value) {
    echo $key . "=" . $value . "<br>";
}

// array-splice : Remove selected element from array and replace it with new element
$a12=array("a"=>"purple","d"=>"black");
array_splice($a10,0,2,$a12);
print_r($a10);
echo "<br>";
$splice=["a"=>"Ashvin","b"=>"Maulik","c"=>"Krishna"];
array_splice($splice,0,2);
print_r($splice);
echo "<br>";

// compact : create array from variable and their value
$fname="Ashvin";
$lname="Parmar";
$newArray=compact("fname","lname");
print_r($newArray);
echo "<br>";

// array_map : send each value of array to user define function nd return new value given by user define function
function myFunction($v){
    return $v*$v;

}
$arr=[1,2,3,4,5];
print_r(array_map("myFunction",$arr));
echo "<br>";


// array_merge_recursive : merge one or more array into one array
// array_merge  : merge one or more array into one array

$merge1=["a"=>"Ashvin", "b"=>"Maulik"];
$merge2=["c"=>"Krisha", "b"=>"Krishna"];
print_r(array_merge($merge1,$merge2));  
print_r(array_merge_recursive($merge1,$merge2));
echo "<br>";
// array_multisort : return sorted array assign one or more array - function sort  first array  and other array follows
$x=[1,70,40];
$y=["Banana","Apple","Grapes"];
array_multisort($x,$y);
print_r($x);
echo "<br>";
print_r($y);
echo "<br>";
// arrray_pad : insert specefied  number of elements with specefied value to array
$b=array("red","green");
print_r(array_pad($b,5,"Blue"));
echo "<br>";

// array_rand() : return random key  or array of random key
// $x2=["red","green","blue","yellow"];
// $random_keys=array_rand($x2,3);
// echo $x2[$random_keys[0]] ."<br>";
// echo $X2[$random_keys[1]] ."<br>";
// echo $X2[$random_keys[2]] ."<br>";
// echo "<br>";
$x2=["red","green","blue","yellow","brown"];
$random_keys=array_rand($x2,3);
echo $x2[$random_keys[0]]."<br>";
echo $x2[$random_keys[1]]."<br>";
echo $x2[$random_keys[2]];
echo "<br>";

// array_reduce(): send value in array to user define function  and returns string
 function myFunction2($v1,$v2){
  return $v1 . "-" .$v2;
 }
 echo "reduce";
 $animal=["cat","Dog","Horse"];
 print_r(array_reduce($animal,"myFunction2"));
 $reduceString=array_reduce($animal,"myFunction2");
 echo "<br>";
 echo $reduceString;
// array_chunk() : split array into chunk of new  arrays
$name=array("Ashvin","Maulik","Krisha","Vishv","Nikul");
$new=array_chunk($name,2);
print_r(array_chunk($name,2));
// foreach($new as $n){
//   echo $n[0]  ;
// }
echo "<br>";

// array_replace_recursive : replaces the value of first array with  the value of following array
$replace1=array(
  "a"=>array("Ashvin"), "b"=>array("Maulik","Krishna"),
);
$replace2=array(
  "a"=>array("Akshay"), "b"=>array("Krisha"),
);
print_r(array_replace_recursive($replace1,$replace2));
print_r(array_replace($replace1,$replace2));
echo "<br>";

// array_uniq : remove duplicate value from array
$uniq=["Ashvin","Maulik","Ashvin"];
print_r(array_unique($uniq));
echo "<br>";

// array_walk : runs each array element in userdefine function, array key and value are parameter in function
function printName($value,$key,$p){
          echo $key . $p . $value . "<br>"; 
}
$walk=["a"=>"Ashvin", "m"=>"Maulik", "k"=>"Krishna"];
array_walk($walk,"printName"," Name Has ");
echo "<br>";

// extract() : import variable in to current symbol table from array ,function use array keys as variable name
// and array value to variable value
$a="Unknown";
$namedArr=array(
  "a"=>"Ashvin",
  "bb"=>"Maulik",
  "cc"=>"Krishna"
);
// extract($namedArr);
extract($namedArr,EXTR_PREFIX_SAME,"myname");

echo "\$a=$a , \$bb= $bb , \$cc=$cc , \$myname_a=$myname_a";
echo "<br>";

// in_array : search array from specific value

$people=["Ashvin","Maulik","Krishna"];
// echo in_array("Ashvin",$people);
if(in_array("Ashvin",$people)){
  echo "Match Found";
}
else{
  echo "Match Not Found";

}
echo "<br>";

// key  : return element key from current internal pointer position
$player=array(
  "Opner" => "Shibham Gill",
  "Bolwer" =>"Kuldip Yadav",
  "Finisher" => "M.S.Dhoni"
);
echo "Next Player: " . next($player) . "<br>";
echo "Current Player position ".key($player) . "<br>";

// sort: sort array in ascending order
// sort($player);
// rsort($player);
// ksort($player);
// krsort($player);
// asort($player);
arsort($player);
echo ("Sort Player Array: ");
print_r($player);
echo "<br>";
// list : assign values to list of variables

$people=array("Ashvin","Maulik","Krishna");
list($a,$b,$c)=$people;
echo "$a , $b ,$c";
echo "<br>";
// natsort :sort array by natural number is case sensitive
$files=["temp15.txt","temp2.txt","Temp20.txt","temp3.txt"];
natsort($files);
print_r($files);
echo "<br>";

// natcasesort() : sort array by natural number is case insensitive 
natcasesort($files);
print_r($files);
echo "<br>";
// range : create array containing range of element
$number=range(10,50,10);
print_r($number);
echo "<br>";  


// shuffle : randomize  the order of element in array
$color=array(
  "a"=>"red",
  "b"=>"green",
  "c"=>"blue"
);
shuffle($color);
print_r($color);



