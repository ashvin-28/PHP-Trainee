<?php

class People{
    
    public $name;
    public $age;

    function setName($name){
        $this->name=$name;
    }
    function setAge($age){
        $this->age=$age;
    }
    function getName(){
        return $this->name;
    }
    function getAge(){
        return $this->age;
    }

}

$people1=new People();
$people1->setName("Ashvin");
$people1->setAge(21);
echo $people1->getName() . "<br>";
echo $people1->getAge();
echo "<br>";

// use constructor nd destructor

class Animal{
     public $name;
     public $sound;
    function __construct($name,$sound){
          $this->name=$name;
          $this->sound=$sound; 
    }
    function __destruct()
    {
        
  
        echo " <br>All operation are complated clean up class";
    

    }
    function getDetail(){
        

            echo "Animal Name is " .  $this->name . " and his sound is " . $this->sound;
    }
  
}
$dog=new Animal("Dog","Woof! Woof!");
$dog->getDetail();
echo "<br>";
$cat=new Animal("Cat","Meow! Meow!");
$cat->getDetail();
