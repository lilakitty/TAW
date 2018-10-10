<?php 
	class EnlacesPaginas{
	//una función con el parametro $enlacesModel que se recibe a travez de controlador
	public function EnlacesPaginasModel($enlacesModel){
		//validamos 
		if($enlacesModel == "nosotros" || $enlacesModel == "servicios" || $enlacesModel == "contacto"){
	//mostramos el URL concatenado con $enlacesModel
			$module = "views/modules/".$enlacesModel.".php";

}
//Una vez "action" viene cacío (validando en el controlador) entonces se consulta si la variable $enlacesModel es igual a la cadena "index" para de ser así se muestre index.php
else if($enlacesModel=="index"){
	$module="views/modules/inicio.php";
	}

	//Validar una LISTA BLANCA (la cual es una lista que tiene unicamente con los URL que estamos usando)
	else
	{
		$module = "views/modules/inicio.php";
	}
	return $module;
}
	
}

?>