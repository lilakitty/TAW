<?php

class Paginas{
	public function enlacesPaginasModel($enlaces){
		if($enlaces == "editar" || $enlaces == "ingreso" || $enlaces == "usuarios" || $enlaces == "salir") {
			$module = "views/modules/".$enlaces.".php";
		}
		else if($enlaces == "index"){
			$module = "views/modules/registro.php";
		}
		else if($enlaces == "ok"){
			$module = "views/modules/registro.php";
		}
		else if($enlaces == "fallo"){
			$module = "views/modules/ingreso.php";
		}
		else if($enlaces == "cambio"){
			$module = "views/modules/usuarios.php";
		}
		else{
			$module = "views/modules/registro.php";
		}
		return $module;
	}
}
?>