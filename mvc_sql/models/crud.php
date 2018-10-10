<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase 
require_once "conexion.php";

//heredar la clase conexion de conexion.php para poder utilizar "Conexion" del archivo conexion.php

class Datos extends Conexion{
	public function registroUsuarioModel($datosModel, $tabla){
		$stmt = Conexion::conector()->prepare("INSERT INTO $tabla(usuario, pass, email) VALUES (:usuario,:pass,:email)");
		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":pass", $datosModel["pass"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}
		$stmt->close();
	}

	#INGRESO DE USUARIOS
	public function ingresoUsuarioModel($datosModel){
		//Se realiza la consulta
		$stmt = Conexion::conector()->prepare("SELECT * FROM usuario WHERE usuario=:usuario and pass = :pass");	
		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":pass", $datosModel["pass"], PDO::PARAM_STR);
		$stmt->execute(); 
		return $stmt->fetch();
		$stmt->close();
	}

	#LISTA DE USUARIOS
	public function listarUsuariosModel($tabla){
		//Se realiza la consulta, pasando como un parametro el nombre de la tabla que almacena la variable $tabla
  		$stmt = Conexion::conector()->prepare("SELECT * FROM $tabla");
  		$stmt->execute();
  		return $stmt->fetchAll();
  		$stmt->close();

  	}

  	#ELIMINAR USUARIO
  	public function eliminarUsuariosModel($tabla,$datosModel){
  		//Se realiza la consulta, pasando los parable de $tabla que contiene el nombre de la tabla y $datosModel contiene el id del registro
		$stmt = Conexion::conector()->prepare("DELETE FROM $tabla WHERE id=:id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_STR);
		$stmt->execute();
		
		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}
		$stmt->close();
	}

	#EDITAR USUARIO
	/*public function editarUsuariosModel($datosModel, $tabla){
		$stmt = Conexion::conector()->prepare("SELECT usuario, pass, email FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();

	}

	public function actualizarUsuariosModel($datosModel, $tabla){
		$stmt = Conexion::conector()->prepare("UPDATE $tabla SET usuario = :usuario, pass = :pass, email = :email WHERE id = :id");
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":pass", $datosModel["pass"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
		$stmt->close();

	}*/

	public function editarUsuarioModel($datosModel,$tabla){
		$stmt = Conexion::conector()->prepare("SELECT id, usuario, pass, email FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}
	public function actualizarUsuarioModel($datosModel, $tabla){
		$stmt = Conexion::conector()->prepare("UPDATE $tabla SET usuario = :usuario, pass = :pass, email = :email WHERE id = :id");
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":pass", $datosModel["pass"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		if($stmt->execute()){
			
			return "success";
		}
		else{
			return "error";
		}
		$stmt->close();
	}

}




?>