<?php

class Paginas{
	public function enlacesPaginasModel($enlaces){
		if($enlaces == "editar_alumno" || $enlaces == "agregar_alumno" || $enlaces == "listar_alumno") {
			$module = "views/modules/".$enlaces.".php";
		}
		else if($enlaces == "index"){
			$module = "views/modules/inicio.php";
		}
		else if($enlaces == "ok"){
			$module = "views/modules/agregar_alumno.php";
		}
		else if($enlaces == "fallo"){
			$module = "views/modules/inicio.php";
		}
		else if($enlaces == "cambio"){
			$module = "views/modules/listar_alumnos.php";
		}
		else{
			$module = "views/modules/agregar_alumno.php";
		}
		return $module;
	}
}
?>