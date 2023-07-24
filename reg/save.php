<?php


require_once("Class/Curd.php");
require_once("../fun.php");

$tableName = "ad"; // Replace "ad" with the actual table name you want to work with
$crud = new crud($tableName);

// Call the fetchLastRow() method to get the last row data
$lastRowData = $crud->fetchLastRow();
$last_id=$lastRowData['id']+1;
$_24TIME=date("Ymd");

$slug_code=$_24TIME."".$last_id;


$slug=createSlug($_POST['title']);
$slug=$slug."@".$slug_code;





// Set the values for the dynamically created properties
$crud->title =($_POST['title']);
$crud->des =($_POST['des']);
$crud->tel1 = ($_POST['tel1']);
$crud->address = ($_POST['address']);
$crud->email = ($_POST['email']);
$crud->name = ($_POST['name']);
$crud->gender = ($_POST['gender']);
$crud->tag = ($_POST['tag']);
$crud->slug = $slug;
$crud->date = $_DATE;
$crud->time = $_TIME;
$crud->status ='ACTIVE';
$crud->all_tag = $crud->title." ".$crud->des." ".$crud->tel1." ".$crud->address." ".$crud->email." ".$crud->name." ".$crud->gender." ".$crud->tag." ".$crud->slug." ".$crud->date." ".$crud->time." ".$crud->status;




// Call the insertData() method to insert the data into the specified table
$crud->insertData();


