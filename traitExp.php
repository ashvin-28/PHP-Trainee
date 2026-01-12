<?php

trait welcome{
    public function sayHello(){
        echo "Hello";
    }
}
trait welcome2{
    public function sayWorld(){
        echo "World";
    }
}
class   SayHelloWorld{
    use welcome,welcome2;
    function getHelloWorld(){
         $this->sayHello();
         echo " ";
          $this->sayWorld();
    }
}
$sayhelloworld=new SayHelloWorld();
$sayhelloworld->getHelloWorld();
echo "<br>";

class Base{
    function method1(){
        echo "this is method1 in base class";
    }
}
trait methodContain{
    function method1(){
        parent::method1();
        echo "<br>";
        echo "this is method1 in methodContain trait";
    }
}
class Child extends Base{
       use methodContain;
       public function getMethod1(){
            $this->method1();
       }
}
$child=new Child();
$child->getMethod1();