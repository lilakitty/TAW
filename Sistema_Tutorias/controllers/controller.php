<?php
class MvcController{
	//Llamar a la platilla
	public function pagina(){
		//include se utiliza para invocar el archivo que contiene el codigo html
		include "views/templete.php";
	}
	//INTERACCIÓN CON EL USUARIO
	public function EnlacesPaginasController(){
		//TRABAJAR CON LOS ENLACES DE LAS PAGINAS
		//VALIDAMOS SI LA VARIABLE "action" VIENE VACIA, ES DECIR, CUANDO SE ABRE LA PAGINA POR PRIMERA VEZ SE DEBE CARGAR LA VISTA index.php
		if(isset($_GET["action"])){
			//guardar el valor de la variable action en "views/modules/navegacion.php" en el cual se recibe mediante el método GET esa variable
			$enlaces = $_GET["action"];
		}
		else{
			//si viene vacío inicializo con index
			$enlaces = "index";
		}
		//Mostrar los archivos de los enlaces de cada una de las secciones: Inicio, nosotros, etc.
		//PARA ESTO HAY QUE MANDAR AL MODELO PARA QUE HAGA DICHO PROCESO Y MUESTRE LA INFORMACIÓN
		$respuesta = Paginas::enlacesPaginasModel($enlaces);
		include $respuesta;
	}

	//AGREGAR ALUMNO
	public function agregarAlumnoController(){
		if(isset($_POST["matricula"])){
			//Recibe a traves del método POST el name (html) de img, matricula, carrera, situacion academica, email y tutor, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (img, matricula,carrera, situacion academica, email, tutor):

			$datosController = array("fotografia"=>$_POST["fotografia"],
									 "nombre"=>$_POST["nombre"],
									 "matricula"=>$_POST["matricula"],
									 "carrera"=>$_POST["carrera"],
									 "situacion_alumno"=>$_POST["situacion_alumno"],
									 "email"=>$_POST["email"],
									 "tutor"=>$_POST["tutor"]);
			//Se le dice al modelo models/crud.php ( Datos::registroUsuarioModel), que en la clase "Datos", la función "registroUsuarioModel" reciba en sus 2 parametros los valores $
			$respuesta=Datos::agregarAlumnoModel($datosController,"alumno");

			//Se imprime la respuesta en la vista
			if($respuesta=="success"){
				header("location:index.php?action=ok");
			}
			else{
				header("location:index.php");
			}
		}
	}

	//Seleccionar todas las carreras disponibles en la tabla
	public function allCarrerasController(){
		$respuesta = Datos::allCarrerasModel("carrera");
       
        foreach($respuesta as $row => $item) {
			echo '<option value='.$item["id"].'> '.$item["nombre_carrera"].' </option>';
			}

	}

	//Seleccionar los tutores disponibles en la tabla
	public function allTutorController(){
		$respuesta = Datos::allTutorModel("tutor");
       
        foreach($respuesta as $row => $item) {
			echo '<option value='.$item["id"].'> '.$item["nombre_tutor"].' </option>';
			}

	}

	//Lista a los alumnos registrados en la tabla de alumnos
	public function listarAlumnosController(){
		$respuesta = Datos::listarAlumnosModel();
		    foreach($respuesta as $row => $item){
		            echo'<tr>
		                <td>'.$item["fotografia"].'</td>
		            	<td>'.$item["nombre"].'</td>
		                <td>'.$item["matricula"].'</td> 
		                <td>'.$item["carrera"].'</td>
		                <td>'.$item["situacion_alumno"].'</td>
		                <td>'.$item["email"].'</td>
		                <td>'.$item["tutor"].'</td>
		                <td><a href="index.php?action=editar_alumno&id='.$item["matricula"].'"><button>Modificar</button></a></td>
		                <td><a href="index.php?action=listar_alumno&id='.$item["matricula"].'"><button>Eliminar</button></a></td>
		                </tr>';
		    }

	}

	//Función para eliminar registros de alumnos
	public function eliminarAlumnosController(){
		if(isset($_GET["id"])){
			//Se almacena el id en la variable de $datosController
			$datosController = $_GET["id"];
			//Almacena la consulta que se hacer models/crud.php en la funcion de eliminarUsuariosModel.
			$respuesta = Datos::eliminarAlumnosModel("alumno",$datosController);
			header("Location:index.php?action=listar_alumno");
		}

	}

	//Función para editar alumno
	public function editarAlumnoController(){
		$datosController = $_GET["id"];
			$respuesta = Datos::editarAlumnoModel($datosController, "alumno");
			$carera = Datos::allCarrerasModel("carrera");
			$tutor = Datos::allTutorModel("tutor");

			$datosController = array("id")
			echo'<form method="POST">
				<label>Nombre:</label>
				<input type="text" value="'.$respuesta["nombre"].'" name="nombre"><br>
				<label>Matricula:</label>
				<input type="text" value="'.$respuesta["matricula"].'"name="matricula"><br>
				<label>Carrera:</label>
				<select>
				<?php
				foreach($carrera as $row => $item) {
			    echo '<option value='.$item["id"].'> '.$item["nombre_tutor"].' </option>';
			    }
			    ?>
				</select>
				<br>
				<label>Situación academica:</label>
				<input type="text" value="'.$respuesta["situacion_alumno"].'" name="situacion_alumno"><br>
				<label>Email</label>
				<input type="email" value="'.$respuesta["email"].'" name="email"><br>
				<label>Tutor:</label>
				<select>
				<?php
				foreach($tutor as $row => $item) {
				echo '<option value='.$item["id"].'> '.$item["nombre_tutor"].' </option>';
				}
				?>
				</select><br>
				<input type="submit" value="Actualizar">
				</form>';

	}

	//Función para actualizar los datos editados en la función de editarAlumnoController
	public function actualizarAlumnoController(){

	}
}

?>