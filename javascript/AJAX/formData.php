<?php
$name=$_POST['name'];
$email=$_POST['email'];
$photo=$_FILES['file']['name'];
$hobbies=$_POST["hobbies"];
$hobbiesString=implode(",",$hobbies);

if (!file_exists('uploads')) {
    mkdir('uploads', 0777, true);
}
$targetdir='uploads/'.$photo;
 if($photo){
    $sucessfile="Sucess";
    move_uploaded_file($_FILES['file']['tmp_name'],$targetdir );
 }
 $hobbiesPrint="";
// if(in_array("Reading",$hobbiesArray)){
// $hobbiesPrint+="Reading";
// }
// if(in_array("Playing",$hobbiesArray)){
// $hobbiesPrint+="Playing";
// }

echo "$sucessfile: " . $name . " and " . $email. " file name is " .$photo. " " .$hobbiesString;