<?php  
session_start();

if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {

	include "db_conn.php";

	include "php/func-book.php";
    $books = get_all_books($conn);

	include "php/func-author.php";
    $authors = get_all_author($conn);

	include "php/func-category.php";
    $categories = get_all_categories($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ADMIN</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
            background-image: url("uploads/cover/books-background.jpg");
        }

        .container {
            background-color: #ffffff;
            margin-top: 20px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .navbar {
            background-color: #28a745;
            border-radius: 5px;
        }

        .navbar-brand {
            color: #ffffff;
            font-size: 1.5rem;
        }

        .navbar-toggler-icon {
            background-color: #ffffff;
        }

        .navbar-nav .nav-link {
            color: #007bff;
            margin: 0 10px;
            font-size: 1.2rem;
        }

        h4 {
            color: #5F9EA0;

        .link-dark {
            color: #007bff;
        }

        .link-dark:hover {
            text-decoration: underline;
        }
    </style>


</head>
<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="admin.php">Home Page</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" 
		         id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link" style="margin-left: 1050px;" 
		             href="logout.php">Logout</a>
		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>

<br>
<br>

<a class ="btn btn-dark" href="add-category.php">Add New Genre</a>

        <?php  if ($categories == 0) { ?>
        	<div class="alert alert-warning 
        	            text-center p-5" 
        	     role="alert">
        	     <br>
			  We don't have this category in the database. Try another one.
		    </div>
        <?php }else {?>
		<h4 class="mt-5">All Genres</h4>
		<table class="table table-bordered shadow">
			<thead>
				<tr>
					<th></th>
					<th>Genre Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$j = 0;
				foreach ($categories as $category ) {
				$j++;	
				?>
				<tr>
					<td><?=$j?></td>
					<td><?=$category['name']?></td>
					<td>
						<a href="edit-category.php?id=<?=$category['id']?>" 
						   class="btn btn-light">
						   Edit</a>

						<a href="php/delete-category.php?id=<?=$category['id']?>" 
						   class="btn btn-dark">
					       Delete</a>
					</td>
				</tr>
			    <?php } ?>
			</tbody>
		</table>
	    <?php } ?>
	    <br>
	    <br>
		<a class ="btn btn-dark" href="add-author.php">Add New Author</a>

	    <?php  if ($authors == 0) { ?>
        	<div class="alert alert-warning 
        	            text-center p-5" 
        	     role="alert">
        	     <br>
			  We don't have this author in the database. Try another one.
		    </div>
        <?php }else {?>
		<h4 class="mt-5">All Authors</h4>
         <table class="table table-bordered shadow">
			<thead>
				<tr>
					<th></th>
					<th>Author Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$k = 0;
				foreach ($authors as $author ) {
				$k++;	
				?>
				<tr>
					<td><?=$k?></td>
					<td><?=$author['name']?></td>
					<td>
						<a href="edit-author.php?id=<?=$author['id']?>" 
						   class="btn btn-light">
						   Edit</a>

						<a href="php/delete-author.php?id=<?=$author['id']?>" 
						   class="btn btn-dark">
					       Delete</a>
					</td>
				</tr>
			    <?php } ?>
			</tbody>
		</table> 
		<?php } ?>
	</div>
</body>
</html>

<?php }else{
  header("Location: login.php");
  exit;
} ?>