<?php


require_once("Class/Curd.php");
require_once("fun.php");

$tableName = "ad"; // Replace "ad" with the actual table name you want to work with
$crud = new crud($tableName);

// Call the fetchLastRow() method to get the last row data
$lastRowData = $crud->r('');

print_r($lastRowData);