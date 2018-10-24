<?php 
	include_once "header.php";
	if($logged_in)
	{
		$after_login=true;
		include_once "menu.php";
?>
	<div class="tabla">
	<div class="row s9">
		<div class="col s9">
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
				<td><a  class="waves-effect waves-light btn pink lighten-1" role="button" href="index.php?page=book_edit&id=<?php echo $book["id"]; ?>">Edit</a></th>
				<td><a class="waves-effect waves-light btn pink lighten-1" role="button" href="index.php?page=book_delete&id=<?php echo $book["id"]; ?>">Delete</a></th>
			</tr>
<?php
		}
?>
		</table>
	</div>
</div>
</div>


<?php
	}
	else
	{
		$before_login=true;
		include_once "menu.php";
?>
<div class="titulos">
<h3>Invalid Login!!! Try Again.</h3>
</div>
<?php
	}
	include_once "footer.php";
?>
