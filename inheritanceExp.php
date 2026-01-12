<?php
// single inheritance

class Animal{
    public $name;
    public $sound;

    function __construct($name,$sound)
    {
         $this->name=$name;
         $this->sound=$sound;
    }
    
}
class Dog extends Animal{
     function __construct($name,$sound)
    {
        parent:: __construct($name,$sound);
    }
     public function getDetail(){
          echo "Animal name is $this->name & sound is $this->sound";
     }
}
$dog=new Dog("Dog","Bark");
$dog->getDetail();
echo "<br>";

// multilevel inheritance

class Animal2 {
    public $animalSound;

    function __construct($animalSound)
    {
        $this->animalSound=$animalSound;
    }
    function animalSound(){
          echo "Animal can  $this->animalSound sound";
    }
 
}
class Dog2 extends Animal2{
    public $dogSound;
    function __construct($animalSound,$dogSound)
    {
        $this->dogSound=$dogSound;

        parent::__construct($animalSound);
    }
    function dogSound(){
          echo "Dog can make $this->dogSound sound";
    }

}
class Puppy extends Dog2{
    public $puppySound;

    function __construct($animalSound,$dogSound,$puppySound)
    {
        $this->puppySound=$puppySound;
        parent::__construct($animalSound,$dogSound);
    }
    function puppySound(){
          echo "Puppy can make $this->puppySound sound";
    }

}
$puppy=new Puppy("Make","Woof","Bark");
$puppy->animalSound();
echo "<br>";
$puppy->dogSound();
echo "<br>";
$puppy->puppySound();


