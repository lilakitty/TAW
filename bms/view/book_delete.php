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
<div class="titulos">
	<h3>Please fill up the following form to delete book</h3>
</div>
<div class="formulario">
	<div class="row">
		<form class="col s8" method="post">
			<fieldset>
				<div class="tituloFormulario">Book Delete Form</div>
				<div class="col-md-2">
				<div class="form-group">
				<label for="title">Do you really want to delete book <?php echo $book[0]["title"]; ?>?</label>
				<br>
				<select class="browser-default" name="choice">
					<option value="yes">Yes</option>
					<option value="no" selected>No</option>
				</select>
				</div>
				<input class="form-control" type="hidden" name="page" value="book_delete">
				<input class="form-control" type="hidden" name="caller" value="self">
				<input class="form-control" type="hidden" name="id" value="<?php echo $book[0]["id"]; ?>">
				<div class="formularioBoton"><button class="waves-effect waves-light btn pink lighten-1" type="submit" name="action">Delete</button></div>
			</div>
			</fieldset>
		</form>
	</div>
</div>
<?php
		}
		else
		{
?>
<div class="titulos">
		<h3>Book Deleted</h3>
	</div>
<?php
		}
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
