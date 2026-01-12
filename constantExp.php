<?php
class People{
     const name="Ashvin";
     function printName(){
        echo self::name;
     }

}
$people=new People();
$people->printName();
echo People::name;
echo "<br>"
;
// if(true){
// //   const age=21;
// }
// if(true){
//     define("AGE",21);
// }
// echo AGE;

define("AGE",21);
echo AGE;