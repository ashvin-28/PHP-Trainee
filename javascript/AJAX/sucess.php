<?php
$register=$_POST["register"];
$name=$_POST["name"];
$email=$_POST["email"];
if($register=="sucess"){
    $sucesssArray=["1"=>$register,"2"=>$name,"3"=>$email];
    echo json_encode($sucesssArray);
}