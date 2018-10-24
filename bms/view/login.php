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
	<h3>Please fill up the following form to login to your account</h3>
</div>
<div class="formulario">
	<div class="row">
    <form class="col s8" method="post">
		<fieldset>
			<div class="tituloFormulario">Login Form</div>
		<div class="row">
        	<div class="input-field col s12">
				<label for="username">Username</label>
				<input class="validate" type="text" name="username" id="username" value="<?php echo $_REQUEST["username"]; ?>">
				<font color="red"><?php echo $errors["username"]; ?></font>
			</div>
		</div>
		<div class="row">
        	<div class="input-field col s12">
				<label for="password">Password</label>
				<input class="form-control" type="password" class="validate" name="password" id="password">
				<font color="red"><?php echo $errors["password"]; ?></font>
			</div>
		</div>
			<input class="form-control" type="hidden" name="page" value="login">
			<input class="form-control" type="hidden" name="caller" value="self">
			<div class="formularioBoton">
				<button class="waves-effect waves-light btn pink lighten-1" type="submit" name="action">Sign In</button>
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
		<form method="post">
			<input type="hidden" name="username" id="username" value="<?php echo $_REQUEST["username"]; ?>">
			<input type="hidden" name="password" id="password" value="<?php echo $_REQUEST["password"]; ?>">
			<input type="hidden" name="page" value="home">
		</form>
		<script>
			document.forms[0].submit();
		</script>
<?php
	}
?>

<?php
	include_once "footer.php";
?>
