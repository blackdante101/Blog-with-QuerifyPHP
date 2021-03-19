<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.css">
	<title>Blog with QuerifyPHP</title>
</head>
<body>
	<nav class="navbar fixed-top bg-dark navbar-light navbar-expand-lg">
		<a href="#" class="navbar-brand text-white">Blog with QuerifyPHP</a>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a target="_blank" href="https://www.github.com/blackdante101/QuerifyPHP" class="nav-link text-white">Documentation</a>
			</li>
		</ul>
	</nav>
	<div class="mt-5 container-fluid">
		<div  class="row">
			<div class="col-md-7 p-5">
				<h4>Lastest Updates</h4>
				<?php
				// include file in project
				include 'querifyphp/querify.php';
				$querify = new Querify();

				//initialize connection to database
				$con = $querify->connect("localhost","root","","querifyblog");
				

				//set table name
                $tablename = "querifytbl";

				//fetching blog posts array into a variable
				$posts = $querify->SelectAll($tablename);

				//looping out data from blog posts array 
				foreach($posts as $post)
				{
					echo '<div class="container mt-3 rounded bg-light p-5">
					<h5>'.$post['title'].'</h5>
					<p>'.$post['content'].'</p>
					<div class="row">
                     <a href="index.php?id='.$post['id'].'" class="ml-2 btn btn-sm btn-info">Edit</a>
                     <a href="delete.php?id='.$post['id'].'" class="btn ml-2 btn-sm btn-danger">Delete</a>
					</div>
				</div>';
				}

				 ?>
			</div>
			<div class="col-md-5 p-5">
				<h4>Fill in details</h4>
				<?php 

				//displays edit form if id value from url is set
				if(isset($_GET['id']))
				{
					echo '<form class="mt-3" method="POST" action="formprocessor/formprocessor.php">
					<div class="form-group">
						<input type="text" name="title" placeholder="Title" class="form-control">
					</div>
					<div class="form-group">
						<textarea type="text" name="content" placeholder="Body" class="form-control"></textarea>
					</div>
					<input name="id" type="hidden" value="'.$_GET['id'].'"/>
					<button name="edit" class="btn btn-primary">Edit</button>
					
				</form>	';

				}
				else
				{
				echo '<form class="mt-3" method="POST" action="formprocessor/formprocessor.php">
					<div class="form-group">
						<input type="text" name="title" placeholder="Title" class="form-control">
					</div>
					<div class="form-group">
						<textarea type="text" name="content" placeholder="Body" class="form-control"></textarea>
					</div>
					<button name="upload" class="btn btn-primary">Upload</button>
					
				</form>	';
				}
				
				?>
			</div>
		</div>
	</div>
	
</body>
</html>