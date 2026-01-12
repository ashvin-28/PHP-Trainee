<?php
namespace html;
class Table{
    public $title;
    public $numRows;
    public function message(){
        echo "My table title is $this->title & table row is $this->numRows";
    }
}
class Row{
    public $numCells;
    public function message(){
        echo "Row has return $this->numCells cells";
    }
}