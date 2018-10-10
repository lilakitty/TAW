<h1>AGREGAR ALUMNO</h1>
<form method="POST">
    <label for="exampleFormControlFile1">Fotografía:</label>
    <input type="file" name="fotografia"><br>
  <label>Nombre:</label>
  <input type="text" name="nombre"><br>
  <label>Matricula:</label>
  <input type="text" placeholder="Matricula" name="matricula" required><br>
  <label>Carrera:</label>
  <select name="carrera">
  	<?php
    $carrera = new MvcController();
    $carrera -> allCarrerasController();
  	?>
  </select><br>
 	<label>Situacion academica:</label>
  <input type="text" placeholder="Situacion academica" name="situacion_alumno" required><br>
 	<label>Email:</label>
  <input type="email" placeholder="Email" name="email" required><br>
 	<label>Tutor:</label>
 	<select name="tutor">
 		<?php
    $tutor = new MvcController();
    $tutor -> allTutorController();
    ?>
 	</select><br>
  <input type="submit" value="Agregar">
</form>

<?php
//Enviar los datos al controlador MvcController (es la clase principal de controller.php)
$registro = new MvcController();
//Se invoca la función registroUsuarioController de la clase MvcController:
$registro->agregarAlumnoController();

if(isset($_GET["action"])){
	if($_GET["action"] == "ok"){
		echo "Registro Exitoso";
	}
}
?>