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
    <h3>Please fill up the following form to register yourself</h3>
  </div>
<div class="formulario">
  <div class="row">
    <form class="col s8" method="post">
      <fieldset>
      <div class="row">
        <div class="nput-field col s12">
          <div class="tituloFormulario">Registration Form</div>
          <label for="name">Name</label>
          <input type="text" name="name" id="name" value="<?php echo $_REQUEST["name"]; ?>">
          <font color="red"><?php echo $errors["name"]; ?></font>
        </div>
      </div>
      <div class="row">
        <div class="nput-field col s12">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" value="<?php echo $_REQUEST["username"]; ?>">
          <font color="red"><?php echo $errors["username"]; ?></font>
        </div>
      </div>
      <div class="row">
        <div class="nput-field col s12">
          <label for="password">Password</label>
          <input type="password" name="password" id="password">
          <font color="red"><?php echo $errors["password"]; ?></font>
        </div>
      </div>
        <input type="hidden" name="page" value="register">
        <input type="hidden" name="caller" value="self">
        <div class="formularioBoton"><button class="waves-effect waves-light btn-small pink lighten-1" type="submit" name="action">Sign Up</button></div>
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
		<h3>Registration Successful</h3>
  </div>
<?php
	}
?>

<?php
	include_once "footer.php";
?>
