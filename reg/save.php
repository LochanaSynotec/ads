<?php

require_once("Class/Curd.php");

// Create a new instance of the crud class
$crud = new crud();

// Set the values for the dynamically created properties
$crud->title  = "John";


// Call the insertData() method to insert the data into the "ad" table
$crud->insertData();
