<?php

    // Indexed array

    $fruits=array("Apple","Banana","Grapes");
    echo $fruits[1] . "<br>";
    foreach($fruits as $f){
        echo $f .",";
    }
    echo "<br>";

    // Associative Array

    $data=array(
         "Name"=>"Ashvin",
         "Age"=>"21",
         "city"=>"Siddhpur"
    );
    foreach($data as $k=>$d){
        echo $k . "=" . $d . "<br>";
    }

    // Multidimensional Array
    

    $cars=array(
        array("volvo",12, 13),
        array("Enova",14,15),
        array("punch",14,15)
    );
    var_dump($cars);
    echo "<br>";
    
    foreach($cars as $c){
        echo $c[0] . " " .$c[1]. " " .$c[2] . "<br>";
    }
    // use array in multiple daya type like another aray

    $myArr=array(
        "Volvo" ,15, ["Apple","Banana","Grapes"],myFun()
    );
    // foreach ($myArr as $value) {
    //     echo $value . " ";
    // }
    function myFun(){
        return  "hello";
    }
    echo $myArr[0];
    echo $myArr[1];
    echo $myArr[2][0];
    echo $myArr[3];
?>