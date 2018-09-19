<?php
//Se llama al archivo connection que contiene la conexión la DB con PDO
require_once('connection.php');

//Función que cuenta el número de usurios registrados. 
function count_users(){
	global $pdo;
	$stmt = $pdo->prepare("SELECT COUNT(*) AS total_users FROM user");
	$stmt->execute();
	$r = $stmt->fetchAll();
	$users = $r[0]['total_users'];
	return $users;

}

//Función que cuenta los tipos de usuarios.
function count_types(){
	global $pdo;
	$stmt = $pdo->prepare("SELECT COUNT(*) AS total_types FROM user_type");
	$stmt->execute();
	$r = $stmt->fetchAll();
	$types = $r[0]['total_types'];
	return $types;

}

//Función que cuenta el estado de los usuarios (Activo o Inactivo)
function count_status(){
	global $pdo;
	$stmt = $pdo->prepare("SELECT COUNT(*) AS total_status FROM status");
	$stmt->execute();
	$r = $stmt->fetchAll();
	$status = $r[0]['total_status'];
	return $status;

}

//Función para contar los accesos de los usuarios
function count_access(){
	global $pdo;
	$stmt = $pdo->prepare("SELECT COUNT(*) AS total_access FROM user_log");
	$stmt->execute();
	$r = $stmt->fetchAll();
	$access = $r[0]['total_access'];
	return $access;

}

//Función que cuenta los usuarios activos.
function count_active(){
	global $pdo;
	$stmt = $pdo->prepare("SELECT COUNT(*) AS total_active FROM user WHERE status_id=1");
	$stmt->execute();
	$r = $stmt->fetchAll();
	$active = $r[0]['total_active'];
	return $active;

}

//Función que cuenta los usuarios inactivos.
function count_inactive(){
	global $pdo;
	$stmt = $pdo->prepare("SELECT COUNT(*) AS total_inactive FROM user WHERE status_id=2");
	$stmt->execute();
	$r = $stmt->fetchAll();
	$inactive = $r[0]['total_inactive'];
	return $inactive;

}

//Función para seleccionar los datos de las tablas(Todas).
function selectAllFromTable($t){
	global $pdo;
	$stmt = $pdo->prepare("SELECT * FROM ".$t);
	$stmt->execute();
	return $stmt->fetchAll();

}

//Función que selecciona los datos de las tablas para futbolistas y de basketbol
function getAll($t){
	global $pdo;
	$stmt = $pdo->prepare("SELECT * FROM sport_team");
	$stmt->execute();
	return $stmt->fetchAll();
}

//funcion que inserta un nuevo jugador
	function add($id,$nombre,$posicion,$carrera,$email,$id_type){
		global $pdo;
		$stmt = $pdo->prepare("INSERT INTO sport_team(id,nombre,posicion,carrera,email,id_type)
					VALUES('$id', '$nombre', '$posicion', '$carrera', '$email', '$id_type')");
		return $stmt->execute();
	}

//Función que actualiza un jugador
	function update($id,$nombre,$posicion,$carrera,$email,$id_type){
		global $pdo;
		$stmt = $pdo->prepare("UPDATE sport_team SET id = '$id', nombre='$nombre', posicion='$posicion', carrera='$carrera', email='$email', id_type='$id_type' WHERE id='$id' AND id_type='$id_type'");
		return $stmt->execute();
	}

//funcion que elimina un jugador
	function delete($id){
		global $pdo;
		$stmt = $pdo->prepare("DELETE FROM sport_team WHERE id = '$id'");
		return $stmt->execute();
	}

	//funcion que busca un jugador

	function search($id){
		global $pdo;

		$sql = $pdo->prepare("SELECT * FROM sport_team where id=:id");
		$sql->bindParam(':id',$id);
		$sql->execute();
		return $sql->fetch(PDO::FETCH_ASSOC);
	}





?>