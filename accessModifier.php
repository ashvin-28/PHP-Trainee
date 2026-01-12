<?php

// public access modifier
class Animal{
    public $name;
    public $sound;

    function __construct($name,$sound)
    {
        $this->name=$name;
        $this->sound=$sound;

    }
    function getDetail(){
        echo "Animal Name is " .  $this->name . " and his sound is " . $this->sound;
      
    }
}
class Dog
{
     function getDetailAnimalClass(Animal $animalObject){
          $animalObject->getDetail();
     }
}
$animalObject=new Animal("Dog","Bark");
$dogObject=new Dog();
$dogObject->getDetailAnimalClass($animalObject);
echo "<br>";

// protected access modifier

class Calculaton{
    protected $num1;
    protected $num2;
    function __construct($num1,$num2)
    {
         $this->num1=$num1;
         $this->num2=$num2;
    }
}
class Sum extends Calculaton{
    function __construct($num1, $num2)
    {
         parent::__construct($num1,$num2);
    }
    function summation(){
        echo "Sum of $this->num1 & $this->num2 is ". $this->num1+$this->num2;
    }

   

}
 $sum=new Sum(10,20);
 $sum->summation();  
 echo "<br>";
  

//  private access modifier
class Substract{
    private $num1=20;
    private $num2=10;
    
    public function sub(){
        // $this->num1=40;   modified like this
          echo "Substraction of $this->num1 & $this->num2 is ". $this->num1-$this->num2;
    }


}
$substract =new Substract();
// $substract->num1=50; does not modified private variable outside class
$substract->sub();
echo "<br>";


class Fruit {
  public $name;
  public $color;
  public $weight;

  function set_name($n) { 
    $this->name = $n;
  }
  protected function set_color($n) { 
    $this->color = $n;
  }
  private function set_weight($n) { 
    $this->weight = $n;
  }
}
class Banana extends Fruit{
       function setBananColor(){
            parent::set_color("Yellow");
       }
       function getBananaColor(){
          echo $this->color;
       }
}

$mango = new Fruit();
$banana=new Banana();
$mango->set_name('Mango'); 
$banana->setBananColor();
$banana->getBananaColor();
// $banana->set_color('Yellow'); // ERROR
// $mango->set_weight('300'); // ERROR


