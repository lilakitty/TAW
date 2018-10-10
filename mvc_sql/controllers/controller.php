<?php
class MvcController{
	//Llamar a la platilla
	public function pagina(){
		//include se utiliza para invocar el archivo que contiene el codigo html
		include("views/templete.php");
	}
	//INTERACCIÓN CON EL USUARIO
	public function enlacesPaginasController(){
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

	#REGISTRO DE USUARIO
	public function registroUsuarioController(){
		if(isset($_POST["usuarioRegistro"])){
			//Recibe a traves del método POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email):

			$datosController = array("usuario"=>$_POST["usuarioRegistro"],
									 "pass"=>$_POST["passRegistro"],
									 "email"=>$_POST["emailRegistro"]);
			//Se le dice al modelo models/crud.php ( Datos::registroUsuarioModel), que en la clase "Datos", la función "registroUsuarioModel" reciba en sus 2 parametros los valores $
			$respuesta=Datos::registroUsuarioModel($datosController,"usuario");

			//Se imprime la respuesta en la vista
			if($respuesta=="success"){
				header("location:index.php?action=ok");
			}
			else{
				header("location:index.php");
			}
		}
	}

	#INGRESO DE USUARIOS
	public function ingresoUsuarioController(){
		if(isset($_POST['usuario'])){
			//Se recibe los names del usuario y contraseña para almacenarlos en un array.
			$datos = array('usuario' => $_POST['usuario'],
						   'pass' => $_POST['pass']);
			//Se mandan los datos de usuario y contraseña al modelo de ingresoUsuarioModel
			$respuesta = Datos::ingresoUsuarioModel($datos);
			//Se valida que el usuario y contraseña esten registrados. Para eso usamos la variable $resultados, la cual hace la consulta necesario en el modelo de ingresoUsuarioModel 
			if($respuesta['usuario'] == $_POST['usuario'] && $respuesta["pass"] == $_POST["pass"]){
				session_start();
				$_SESSION['validar'] = true;
				$_SESSION['pass'] = $respuesta['pass'];
				header('Location: index.php?action=usuarios');
				echo "<script>alert('entro');</script>";
			}
			else{
				header('Location: index.php?action=fallo');
			}
		}

	}

	#LISTA DE USUARIO
	public function listarUsuariosController(){
		//Guarda la consulta para listar los usuarion en la variable de $respuesta, la cual recibe los datos del modelo de listarUsuariosModel. 
		$respuesta = Datos::listarUsuariosModel("usuario");
		//Con un ciclo imprime los valores de la tabla 
		    foreach($respuesta as $row => $item){
		            echo'<tr>
		                <td>'.$item["id"].'</td>
		                <td>'.$item["usuario"].'</td>
		                <td>'.$item["pass"].'</td>
		                <td>'.$item["email"].'</td>
		                <td><a href="index.php?action=editar&id='.$item["id"].'"><button>Editar</button></a></td>
		                <td><a href="index.php?action=usuarios&id='.$item["id"].'"><button>Eliminar</button></a></td>
		                </tr>';
		    }

	}

	#ELIMINAR USUARIO
	public function eliminarUsuariosController(){
			if(isset($_GET["id"])){
			//Se almacena el id en la variable de $datosController
			$datosController = $_GET["id"];
			//Almacena la consulta que se hacer models/crud.php en la funcion de eliminarUsuariosModel.
			$respuesta = Datos::eliminarUsuariosModel("usuario",$datosController);
		}

		}

	#EDITAR USUARIO
	/*public function editarUsuariosController(){
		//obtenemos el id
		$datosController = $_GET["id"];
		//En la variable de $respuesta se almacena la consulta que se realiza en models/crud.php el cual usa el modelo de editarUsuarioModel
		$respuesta = Datos::editarUsuariosModel($datosController, "usuario");
		echo'
		<form>
		
		<input type="text" placeholder="Usuario" name="usuarioEditar" value="'.$respuesta["usuario"].'">
		<input type="password" placeholder="Contraseña" name="passEditar" value="'.$respuesta["pass"].'">
		<input type="email" placeholder="Email" name="emailEditar" value="'.$respuesta["email"].'">
		<input type="submit" value="actualizar">
		</form>';

	}

	#ACTUALIZAR USUARIO
	public function actualizarUsuariosController(){
		if(isset($_POST["usuarioEditar"])){
			$datosController = array( 
									  "usuario"=>$_POST["usuarioEditar"],
							          "pass"=>$_POST["passEditar"],
							      	  "email"=>$_POST["emailEditar"]);
			
			$respuesta = Datos::actualizarUsuariosModel($datosController, "usuario");
			if($respuesta == "success"){
				header("location:index.php?action=usuarios");
			}
			else{
				echo "error";
			}
		}

	}*/
	public function editarUsuarioController(){
			$datosController = $_GET["id"];
			$respuesta = Datos::editarUsuarioModel($datosController, "usuario");
			echo'<form method="POST">
				<input type="hidden" value="'.$respuesta["id"].'" name="idE">
				<input type="text" value="'.$respuesta["usuario"].'"name="usuarioE" placeholder="Nombre" required><br>
				<input type="text" value="'.$respuesta["pass"].'" name="passwordE" placeholder="Contraseña" required><br>
				<input type="email" value="'.$respuesta["email"].'" name="emailE" placeholder="E-mail" required><br>
				 <input type="submit" value="Actualizar">
				 </form>';
		}
		public function actualizarUsuarioController(){
			if(isset($_POST["usuarioE"])){
				$datosController = array("id"=>$_POST["idE"],"usuario"=>$_POST["usuarioE"], "pass"=>$_POST["passwordE"],"email"=>$_POST["emailE"]);
				
				$respuesta = Datos::actualizarUsuarioModel($datosController, "usuario");
				if($respuesta =="success"){
					header("location:index.php?action=usuarios");
				}
				else{
					echo "error";
				}
			}
		}

}

?>