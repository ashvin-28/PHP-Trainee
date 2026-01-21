<?php
interface Machine{
    public function active();
    public function deactive();
    public function isactive();
}
class Ac implements Machine{
    private $isOn=false;
    public function active(){
        $this->isOn=true;
    }
    public function deactive(){
        $this->isOn=false;
    }
    public function isactive(){
        return $this->isOn;
    }
}
$ac=new Ac();

 $ac->active();
if($ac->isactive()){
    echo "AC is ON";
}
else{
    echo "AC is OFF";
}
echo "<br>";

$ac->deactive();
if($ac->isactive()){
    echo "AC is ON";
}
else{
    echo "AC is OFF";
}
