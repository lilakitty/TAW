<?php 
	include_once "header.php";
	if($logged_in)
	{
		$after_login=true;
		include_once "menu.php";
?>

		<table class="table" border="1" width="50%" align="center">
			 <thead class="thead-dark">
			<tr>
				<th scope="col">Title</th>
				<th scope="col">Author</th>
				<th scope="col">Description</th>
				<th scope="col">Edit</th>
				<th scope="col">Delete</th>
			</tr>
		</thead>
<?php
		foreach($books as $book)
		{
?>
			<tr>
				<td><?php echo $book["title"]; ?></th>
				<td><?php echo $book["author"]; ?></th>
				<td><?php echo $book["description"]; ?></th>
				<td><a  class="btn btn-success" role="button" href="index.php?page=book_edit&id=<?php echo $book["id"]; ?>">Edit</a></th>
				<td><a class="btn btn-danger" role="button" href="index.php?page=book_delete&id=<?php echo $book["id"]; ?>">Delete</a></th>
			</tr>
<?php
		}
?>
		</table>

<?php
	}
	else
	{
		$before_login=true;
		include_once "menu.php";
?>
<h3>Invalid Login!!! Try Again.</h3>
<?php
	}
	include_once "footer.php";
?>
