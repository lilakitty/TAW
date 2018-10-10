<?php
class MvcController{
	//Llamar a la platilla
	public function plantilla(){
		//include se utiliza para invocar el archivo que contiene el codigo html
		include "views/templete.php";
	}
	//INTERACCIÓN CON EL USUARIO
	public function EnlacesPaginasController(){
		//TRABAJAR CON LOS ENLACES DE LAS PAGINAS
		//VALIDAMOS SI LA VARIABLE "action" VIENE VACIA, ES DECIR, CUANDO SE ABRE LA PAGINA POR PRIMERA VEZ SE DEBE CARGAR LA VISTA index.php
		if(isset($_GET["action"])){
			//guardar el valor de la variable action en "views/modules/navegacion.php" en el cual se recibe mediante el método GET esa variable
			$enlacesController = $_GET["action"];
		}
		else{
			//si viene vacío inicializo con index
			$enlacesController = "index";
		}
		//Mostrar los archivos de los enlaces de cada una de las secciones: Inicio, nosotros, etc.
		//PARA ESTO HAY QUE MANDAR AL MODELO PARA QUE HAGA DICHO PROCESO Y MUESTRE LA INFORMACIÓN
		$respuesta = EnlacesPaginas::EnlacesPaginasModel($enlacesController);
		include $respuesta;
	}
}

?>