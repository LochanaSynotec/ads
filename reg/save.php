<?php


require_once("Class/Curd.php");

$tableName = "ad"; // Replace "ad" with the actual table name you want to work with
$crud = new crud($tableName);

// Set the values for the dynamically created properties
$crud->title =($_POST['title']);
$crud->des =($_POST['des']);
$crud->tel1 = ($_POST['tel1']);
$crud->address = ($_POST['address']);
$crud->email = ($_POST['email']);
$crud->name = ($_POST['name']);
$crud->gender = ($_POST['gender']);
$crud->tag = ($_POST['tag']);




// Call the insertData() method to insert the data into the specified table
$crud->insertData();


