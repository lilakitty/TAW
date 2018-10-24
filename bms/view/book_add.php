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
	<h3>Please fill up the following form to add new book</h3>
</div>
<div class="formulario">
	<div class="row">
		<form class="col s8" method="post">
			<fieldset>
				<div class="tituloFormulario">Book Add Form</div>
				<div class="row">
        			<div class="input-field col s12">
						<label for="title">Title</label>
						<input class="form-control" type="text" name="title" id="title" value="<?php echo $_REQUEST["title"]; ?>">
						<font color="red"><?php echo $errors["title"]; ?></font>
					</div>
				</div>
				<div class="row">
        			<div class="input-field col s12">
						<label for="author">Author</label>
						<input class="form-control" type="text" name="author" id="author" value="<?php echo $_REQUEST["author"]; ?>">
						<font color="red"><?php echo $errors["author"]; ?></font>
					</div>
				</div>
				<div class="row">
        			<div class="input-field col s12">
						<label for="description">Description</label>
						<input class="validation" type="text" name="description" id="description" value="<?php echo $_REQUEST["description"]; ?>">
						<font color="red"><?php echo $errors["description"]; ?></font>
					</div>
				</div>
				<input class="form-control" type="hidden" name="page" value="book_add">
				<input class="form-control" type="hidden" name="caller" value="self">
				<div class="formularioBoton"><button class="waves-effect waves-light btn pink lighten-1" type="submit" name="action">Save</button>
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
		<h3>Book Saved</h3>
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
