<?php
class Animal{
    public static  $eat="Grass";
    
    public static function eating(){
        echo "Horse can eat " .self::$eat;
  
}
}
Animal::eating();
echo "<br>";

class User{
    private $userName;
    function __construct($userName)
    {
         $this->userName=$userName;
    }
    public static function welcomeuser($userObject){
        echo "welcome $userObject->userName";
    }
}
$user=new User("Ashvin Parmar");
User::welcomeuser($user);
echo "<br>";

class Pi{
    public static $value=3.14;
    public static function getPiValue(){
        echo self::$value;
    }
}
Pi::getPiValue();