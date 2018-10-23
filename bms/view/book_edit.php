<?php 
	include_once "header.php";
	if($logged_in)
	{
		$after_login=true;
		include_once "menu.php";
?>

<?php
		if($status=="before_submission" or $status=="failure")
		{
?>
	<h3>Please fill up the following form to update book information</h3>
	<form method="post">
		<fieldset>
			<legend>Book Update Form</legend>
			<div class="col-md-2">
			<div class="form-group">
			<label for="title">Title</label>
			<input class="form-control" type="text" name="title" id="title" value="<?php echo $book[0]["title"]; ?>">
			<font color="red"><?php echo $errors["title"]; ?></font>
			</div>
			<div class="form-group">
			<label for="author">Author</label>
			<input class="form-control" type="text" name="author" id="author" value="<?php echo $book[0]["author"]; ?>">
			<font color="red"><?php echo $errors["author"]; ?></font>
			</div>
			<div class="form-group">
			<label for="description">Description</label>
			<input class="form-control" type="description" name="description" id="description" value="<?php echo $book[0]["description"]; ?>">
			<font color="red"><?php echo $errors["description"]; ?></font>
			</div>
			<input class="form-control" type="hidden" name="page" value="book_edit">
			<input class="form-control" type="hidden" name="caller" value="self">
			<input class="form-control" type="hidden" name="id" value="<?php echo $book[0]["id"]; ?>">
			<input class="btn btn-dark" type="submit" value="Update">
		</div>
		</fieldset>
	</form>
<?php
		}
		else
		{
?>
		<h3>Book Updated</h3>
<?php
		}
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
