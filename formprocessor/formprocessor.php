<?php
include '../querifyphp/querify.php';

//geting instance of class
$querify = new Querify();

//creating a connection variable
$querify->connect("localhost","root","","querifyblog");

// this condition runs when upload button is clicked
if(isset($_POST['upload']))
{  
	//input table column and equivalent values into an array
	$data = array 
	(
		'title' => $_POST['title'],
		'content' =>$_POST['content']
	);

    // declare tablename as a string
	$tblname = "querifytbl";

	//pass tablename and array variable through the Insert method
	if($querify->Insert($tblname,$data))
	{
		header('location:../index.php');
	}
    
	
}

// this condition statement runs if edit button is clicked
if(isset($_POST['edit']))
{
	// declare tablename as a string
	$tablename = "querifytbl";

	// input column names as array key and input values as array value
	$data = array 
	(
		'title' => $_POST['title'],
		'content' => $_POST['content']

	);

	// input column names as array key and condition values as array value
	$condition = array 
	(
		'id' =>$_POST['id']
	);

    //input variables into the update method
	$updated = $querify->Update($tablename,$data,$condition);

    // redirects to index page after update method runs
	if($updated)
	{
		header('location:../index.php');
	}
}

 ?>