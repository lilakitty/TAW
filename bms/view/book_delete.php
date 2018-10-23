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
	<h3>Please fill up the following form to delete book</h3>
	<form method="post">
		<fieldset>
			<legend>Book Delete Form</legend>
			<div class="col-md-2">
			<div class="form-group">
			<label for="title">Do you really want to delete book <?php echo $book[0]["title"]; ?>?</label>
			<br>
			<select class="form-control" name="choice">
				<option value="yes">Yes</option>
				<option value="no" selected>No</option>
			</select>
			</div>
			<input class="form-control" type="hidden" name="page" value="book_delete">
			<input class="form-control" type="hidden" name="caller" value="self">
			<input class="form-control" type="hidden" name="id" value="<?php echo $book[0]["id"]; ?>">
			<input class="btn btn-dark" type="submit" value="Delete">
		</div>
		</fieldset>
	</form>
<?php
		}
		else
		{
?>
		<h3>Book Deleted</h3>
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
