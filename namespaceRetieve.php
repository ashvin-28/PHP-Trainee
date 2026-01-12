<?php
namespace Html;
include "nameSpaceExp.php";
$table=new Table();
$table->title="Employee Table";
$table->numRows=5;
$table->message();
echo "<br>";
$row=new Row();
$row->numCells=3;
$row->message();