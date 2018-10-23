<?php 
	include_once "header.php";
	$before_login=true;
	include_once "menu.php";
?>

<?php
	if($status=="before_submission" or $status=="failure")
	{
?>

	
	
	<h3>Please fill up the following form to register yourself</h3>
	<form method="post">
		<fieldset>
			<legend>Registration Form</legend>
		
    		<div class="col-md-2">
			<div class="form-group">
			<label for="name">Name</label>
			<input class="form-control" type="text" name="name" id="name" value="<?php echo $_REQUEST["name"]; ?>">
			<font color="red"><?php echo $errors["name"]; ?></font>
			</div>
			<div class="form-group">
			<label for="username">Username</label>
			<input class="form-control" type="text" name="username" id="username" value="<?php echo $_REQUEST["username"]; ?>">
			<font color="red"><?php echo $errors["username"]; ?></font>
			</div>
			<div class="form-group">
			<label for="password">Password</label>
			<input class="form-control" type="password" name="password" id="password">
			<font color="red"><?php echo $errors["password"]; ?></font>
			</div>
			<input class="form-control" type="hidden" name="page" value="register">
			<input class="form-control" type="hidden" name="caller" value="self">
			<input class="btn btn-dark" type="submit" value="Sign Up">
		</fieldset>
	</form>
	</div>
	
<?php
	}
	else
	{
?>
		<h3>Registration Successful</h3>
<?php
	}
?>

<?php
	include_once "footer.php";
?>
