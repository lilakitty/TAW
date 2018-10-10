<h1>INGRESO DE USUARIO</h1>
<form method="POST">
	<input type="text" placeholder="Usuario" name="usuario" required>
	<input type="password" placeholder="Contraseña" name="pass" required>
	<input type="submit" value="Enviar">
	
</form>
<?php
//Enviar los datos al controlador MvcController (es la clase principal de controller.php)
$registro = new MvcController();
//Se invoca la función registroUsuarioController de la clase MvcController:
$registro-> ingresoUsuarioController();

if(isset($_GET["action"])){
	if($_GET["action"] == "ok"){
		echo "Registro Exitoso";
	}
}
?>