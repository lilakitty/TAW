<?php 
	include_once "header.php";
	$before_login=true;
	include_once "menu.php";
?>

<?php
	if($status=="before_submission" or $status=="failure")
	{
?>
<div class="titulos">
	<h3>Please fill up the following form to retrieve password of your account</h3>
</div>
<div class="formulario">
	<div class="row">
		<form class="col s8" method="post">
			<fieldset>
				<div class="tituloFormulario">Forgot Password Form</div>
					<div class="row">
	        			<div class="input-field col s12">
						<label for="username">Username</label>
						<input class="form-control" type="text" name="username" id="username" value="<?php echo $_REQUEST["username"]; ?>">
						<font color="red"><?php echo $errors["username"]; ?></font>
					</div>
				</div>
				<input class="form-control" type="hidden" name="page" value="forgot_password">
				<input class="form-control" type="hidden" name="caller" value="self">
				<div class="formularioBoton"><button class="waves-effect waves-light btn pink lighten-1" type="submit" name="action">Retrieve Password</button></div>
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
	<h3>Please check your mail for new password</h3>
</div>
<?php
	}
?>

<?php
	include_once "footer.php";
?>
