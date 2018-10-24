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
	<h3>Please fill up the following form to update your profile</h3>
</div>
<div class="formulario">
	<div class="row">
	<form class="col s8" method="post">
		<fieldset>
			<div class="tituloFormulario">Profile Update Form</div>
		<div class="row">
        	<div class="input-field col s12">
				<label for="name">Name</label>
				<input class="form-control" type="text" name="name" id="name" value="<?php echo $profile[0]["name"]; ?>">
				<font color="red"><?php echo $errors["name"]; ?></font>
			</div>
		</div>
		<div class="row">
        	<div class="input-field col s12">
				<label for="username">Username</label>
				<input class="form-control" type="text" name="username" id="username" value="<?php echo $profile[0]["username"]; ?>" readonly="true">
				<font color="red"><?php echo $errors["username"]; ?></font>
			</div>
		</div>
		<div class="row">
        	<div class="input-field col s12">
				<label for="password">Password</label>
				<input class="form-control" type="password" name="password" id="password">
				<font color="red"><?php echo $errors["password"]; ?></font>
			</div>
		</div>
			[Fill up only if you want to change it]
			<br>
			<input class="form-control" type="hidden" name="page" value="profile">
			<input class="form-control" type="hidden" name="caller" value="self">
			<div class="formularioBoton"><button class="waves-effect waves-light btn pink lighten-1" type="submit" name="action">Update</button></div>

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
		<h3>Profile Updated</h3>
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
