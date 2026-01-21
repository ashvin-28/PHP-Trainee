<?php
$array=[1,2,3,4];
$arr=[2,3,6,7];
// print_r(array_replace($array,$arr));
echo '<br>';
// print_r(array_shift($array));
// array_shift($array);]
// $arr2=array_pop($array[1]);
// echo $arr2;
echo "<br>";
// // print_r($array);
// if(in_array((float)"1",$array)){
// 	echo "yes";
// }
// else{
// 	echo "No";
// }
// echo "Hello ", "World";
// print ("Hello");

// $str=implode("-", $array);
// // echo $str;
// $arr2=explode("-",$str);
// print_r($arr2);
// unset($array[1]);
// print_r($array);
$len=count($array);
// foreach($array as $l){
// if($array[$l]==3){
//     echo "Yes";
//     break;
// }
// else{
//     echo "No";
// }
// $searchValue=5;
// $found=false;
//  function searchArrayValue($array,$searchValue){
//       foreach($array as $a){
//         if($a==$searchValue){
//             global $found;
//             $found=true;
//             echo "$searchValue is exist on  position";
//             break;

//         }
//     }
   
     
// }
// searchArrayValue($array,$searchValue);
// if(!$found){
//     echo "$searchValue is not exist";
// }
// 
$a1=[40,20,30];
$a2=[70,60,50];
array_multisort($a1,$a2,);
print_r($a1);
echo "<br>";
print_r($a2);