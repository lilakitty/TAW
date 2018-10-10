<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase 
require_once "conexion.php";

//heredar la clase conexion de conexion.php para poder utilizar "Conexion" del archivo conexion.php

class Datos extends Conexion{
	#AGREGAR ALUMNOS
	public function agregarAlumnoModel($datosModel, $tabla){
		$stmt = Conexion::conector()->prepare("INSERT INTO $tabla(fotografia,nombre, matricula, carrera, situacion_alumno, email, tutor) VALUES (:fotografia,:nombre,:matricula,:carrera, :situacion_alumno, :email, :tutor)");
		$stmt->bindParam(":fotografia", $datosModel["fotografia"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_INT);
		$stmt->bindParam(":situacion_alumno", $datosModel["situacion_alumno"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":tutor", $datosModel["tutor"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}
		$stmt->close();
	}

	//Selecciona las carreras
	public function allCarrerasModel($tabla){
  		$stmt = Conexion::conector()->prepare("SELECT * FROM $tabla");
  		$stmt->execute();
  		return $stmt->fetchAll();
  		$stmt->close();
  	}

  	//Hace la consulta para seleccionar los tutores
  	public function allTutorModel($tabla){
  		$stmt = Conexion::conector()->prepare("SELECT * FROM $tabla");
  		$stmt->execute();
  		return $stmt->fetchAll();
  		$stmt->close();
  	}

  	//Listar los alumnos
  	public function listarAlumnosModel(){
  		$stmt = Conexion::conector()->prepare("SELECT a.fotografia,a.nombre,a.matricula, c.nombre_carrera as carrera, a.situacion_alumno,a.email,t.nombre_tutor as tutor FROM alumno as a INNER JOIN tutor as t on t.id = a.tutor INNER JOIN carrera as c on c.id = a.carrera");
  		$stmt->execute();
  		return $stmt->fetchAll();
  		$stmt->close();

  	}

  	//eliminar alumnos
  	public function eliminarAlumnosModel($tabla,$datosModel){
  		$stmt = Conexion::conector()->prepare("DELETE FROM $tabla WHERE matricula=:id");
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

  	//Editar alumno
  	public function editarAlumnoModel($datosModel,$tabla){
  		$stmt = Conexion::conector()->prepare("SELECT * FROM $tabla WHERE matricula = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();

  	}

	

}




?>