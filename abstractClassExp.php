<?php
abstract class ParentClass{
    abstract protected function prefixname($name);
}
class ChildClass extends ParentClass{
    public function prefixname($name)
    {
         if($name=="Ashvin Parmar"){
            $prefix="Mr";
         }
         elseif ($name=="Mansi Patel") {
                       $prefix="Miss";

         }
         else{
            $prefix="";
         }
         echo $prefix . " " . $name . "<br>";
    }
}
$class=new ChildClass();
$class->prefixname("Ashvin Parmar") ;
$class->prefixname("Mansi Patel") ;
$class->prefixname("Maulik") ;
