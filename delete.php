<?php
// include file in project
include 'querifyphp/querify.php';

// set instance of class to querify variable
$querify = new Querify();

//initialise connection 
$querify->connect("localhost","root","","querifyblog");

//declare variables
$id = $_GET['id'];
$tablename = "querifytbl";

//pass values through the delete method
$deleted = $querify->Delete($tablename,$id);

// redirects to index if delete method runs
if($deleted)
{
	header('location:index.php');
}


 ?>