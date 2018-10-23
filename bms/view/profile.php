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
	<h3>Please fill up the following form to update your profile</h3>
	<form method="post">
		<fieldset>
			<legend>Profile Update Form</legend>
			<div class="col-md-2">
			<div class="form-group">
			<label for="name">Name</label>
			<input class="form-control" type="text" name="name" id="name" value="<?php echo $profile[0]["name"]; ?>">
			<font color="red"><?php echo $errors["name"]; ?></font>
			</div>
			<div class="form-group">
			<label for="username">Username</label>
			<input class="form-control" type="text" name="username" id="username" value="<?php echo $profile[0]["username"]; ?>" readonly="true">
			<font color="red"><?php echo $errors["username"]; ?></font>
			</div>
			<div class="form-group">
			<label for="password">Password</label>
			<input class="form-control" type="password" name="password" id="password">
			<font color="red"><?php echo $errors["password"]; ?></font>
			</div>
			[Fill up only if you want to change it]
			<br>
			<input class="form-control" type="hidden" name="page" value="profile">
			<input class="form-control" type="hidden" name="caller" value="self">
			<input class="btn btn-dark" type="submit" value="Update">
		</div>
		</fieldset>
	</form>
<?php
		}
		else
		{
?>
		<h3>Profile Updated</h3>
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
